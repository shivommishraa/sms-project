<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Models\Teacher\Teacher;
use App\Models\Teacher\ClassTeacherAssignment;

use App\Models\Department\Department;
use App\Models\Designation\Designation;
use App\Models\AcademicSession\AcademicSession;
use App\Models\Subject\Subject;

use App\Models\ClassMaster\ClassMaster;
use App\Models\Section\Section;
use App\Exports\TeachersExport;

use Maatwebsite\Excel\Facades\Excel;

use Barryvdh\DomPDF\Facade\Pdf;
class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = Teacher::with([
            'department',
            'designation',
            'academicSession',
            'classTeacherAssignment.classMaster',
            'classTeacherAssignment.section'
        ]);

        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where(
                    'name',
                    'like',
                    '%' . $request->search . '%'
                )
                ->orWhere(
                    'employee_id',
                    'like',
                    '%' . $request->search . '%'
                )
                ->orWhere(
                    'mobile',
                    'like',
                    '%' . $request->search . '%'
                );
            });
        }

        if ($request->filled('department')) {

            $query->where(
                'department_id',
                $request->department
            );
        }

        if ($request->filled('designation')) {

            $query->where(
                'designation_id',
                $request->designation
            );
        }

        if ($request->filled('employment_status')) {

            $query->where(
                'employment_status',
                $request->employment_status
            );
        }

        if ($request->filled('academic_session')) {

            $query->where(
                'academic_session_id',
                $request->academic_session
            );
        }

        $teachers = $query
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $departments = Department::where(
            'status',
            1
        )->orderBy('name')->get();

        $designations = Designation::where(
            'status',
            1
        )->orderBy('name')->get();

        $sessions = AcademicSession::where(
            'status',
            1
        )->orderBy('sort_order')
        ->get();

        return view(
            'admin.teachers.index',
            compact(
                'teachers',
                'departments',
                'designations',
                'sessions'
            )
        );
    }

    public function create()
    {
        $departments = Department::where(
            'status',
            1
        )->orderBy('name')->get();

        $designations = Designation::where(
            'status',
            1
        )->orderBy('name')->get();

        $sessions = AcademicSession::where(
            'status',
            1
        )->orderBy('sort_order')
        ->get();

        $subjects = Subject::where(
            'status',
            1
        )->orderBy('name')
        ->get();

        $classes = ClassMaster::where(
            'status',
            1
        )->orderBy('name')
        ->get();

        $sections = Section::where(
            'status',
            1
        )->orderBy('name')
        ->get();

        return view(
            'admin.teachers.create',
            compact(
                'departments',
                'designations',
                'sessions',
                'subjects',
                'classes',
                'sections'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'department_id' => 'required',

            'designation_id' => 'required',

            'academic_session_id' => 'required',

            'name' => 'required|max:255',

            'gender' => 'required',

            'mobile' => 'required|max:20',

            'image' => 'nullable|image',

            'class_master_id' => 'nullable',

            'section_id' => 'nullable'
        ]);

        DB::beginTransaction();

        try {

            if (
                $request->class_master_id &&
                $request->section_id
            ) {

                $exists = ClassTeacherAssignment::where(
                    'academic_session_id',
                    $request->academic_session_id
                )
                ->where(
                    'class_master_id',
                    $request->class_master_id
                )
                ->where(
                    'section_id',
                    $request->section_id
                )
                ->exists();

                if ($exists) {

                    return back()
                        ->withErrors([
                            'section_id' =>
                            'Class Teacher already assigned.'
                        ])
                        ->withInput();
                }
            }

            $lastTeacher = Teacher::latest('id')->first();

            $nextId = $lastTeacher
                ? $lastTeacher->id + 1
                : 1;

            $employeeId =
                'EMP' .
                str_pad(
                    $nextId,
                    4,
                    '0',
                    STR_PAD_LEFT
                );

            $imageName = null;

            if ($request->hasFile('image')) {

                $image = $request->file('image');

                $imageName =
                    time() .
                    '_' .
                    $image->getClientOriginalName();

                $image->move(
                    public_path(
                        'uploads/teachers'
                    ),
                    $imageName
                );
            }

            $teacher = Teacher::create([

                'department_id' =>
                $request->department_id,

                'designation_id' =>
                $request->designation_id,

                'academic_session_id' =>
                $request->academic_session_id,

                'employee_id' =>
                $employeeId,

                'name' =>
                $request->name,

                'gender' =>
                $request->gender,

                'dob' =>
                $request->dob,

                'image' =>
                $imageName,

                'qualification' =>
                $request->qualification,

                'experience' =>
                $request->experience,

                'joining_date' =>
                $request->joining_date,

                'service_end_date' =>
                $request->service_end_date,

                'employment_status' =>
                $request->employment_status,

                'mobile' =>
                $request->mobile,

                'alternate_mobile' =>
                $request->alternate_mobile,

                'email' =>
                $request->email,

                'address' =>
                $request->address,

                'short_bio' =>
                $request->short_bio,

                'description' =>
                $request->description,

                'status' =>
                $request->status ? 1 : 0,

                'sort_order' =>
                $request->sort_order ?? 0
            ]);

            if ($request->subjects) {

                $teacher->subjects()
                    ->sync(
                        $request->subjects
                    );
            }

            if (
                $request->class_master_id &&
                $request->section_id
            ) {

                ClassTeacherAssignment::create([

                    'academic_session_id' =>
                    $request->academic_session_id,

                    'class_master_id' =>
                    $request->class_master_id,

                    'section_id' =>
                    $request->section_id,

                    'teacher_id' =>
                    $teacher->id,

                    'status' => 1
                ]);
            }

            DB::commit();

            return redirect()
                ->route('teachers.index')
                ->with(
                    'success',
                    'Teacher Created Successfully'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withErrors(
                    $e->getMessage()
                );
        }
    }
    public function show(string $id)
    {
        $teacher = Teacher::with([

            'department',
            'designation',
            'academicSession',
            'subjects',
            'classTeacherAssignment.classMaster',
            'classTeacherAssignment.section'

        ])->findOrFail($id);

        return view(
            'admin.teachers.show',
            compact('teacher')
        );
    }

    public function edit(string $id)
    {
        $teacher = Teacher::with([
            'subjects',
            'classTeacherAssignment'
        ])->findOrFail($id);

        $departments = Department::where(
            'status',
            1
        )->orderBy('name')->get();

        $designations = Designation::where(
            'status',
            1
        )->orderBy('name')->get();

        $sessions = AcademicSession::where(
            'status',
            1
        )->orderBy('sort_order')
        ->get();

        $subjects = Subject::where(
            'status',
            1
        )->orderBy('name')
        ->get();

        $classes = ClassMaster::where(
            'status',
            1
        )->orderBy('name')
        ->get();

        $sections = Section::where(
            'status',
            1
        )->orderBy('name')
        ->get();

        return view(
            'admin.teachers.edit',
            compact(
                'teacher',
                'departments',
                'designations',
                'sessions',
                'subjects',
                'classes',
                'sections'
            )
        );
    }

    public function update(
        Request $request,
        string $id
    )
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([

            'department_id' => 'required',

            'designation_id' => 'required',

            'academic_session_id' => 'required',

            'name' => 'required|max:255',

            'gender' => 'required',

            'mobile' => 'required|max:20',

            'image' => 'nullable|image'
        ]);

        DB::beginTransaction();

        try {

            if (
                $request->class_master_id &&
                $request->section_id
            ) {

                $exists =
                ClassTeacherAssignment::where(
                    'academic_session_id',
                    $request->academic_session_id
                )
                ->where(
                    'class_master_id',
                    $request->class_master_id
                )
                ->where(
                    'section_id',
                    $request->section_id
                )
                ->where(
                    'teacher_id',
                    '!=',
                    $teacher->id
                )
                ->exists();

                if ($exists) {

                    return back()
                        ->withErrors([
                            'section_id' =>
                            'Class Teacher already assigned.'
                        ])
                        ->withInput();
                }
            }

            $imageName = $teacher->image;

            if ($request->hasFile('image')) {

                if (
                    $teacher->image &&
                    File::exists(
                        public_path(
                            'uploads/teachers/' .
                            $teacher->image
                        )
                    )
                ) {

                    File::delete(
                        public_path(
                            'uploads/teachers/' .
                            $teacher->image
                        )
                    );
                }

                $image =
                $request->file('image');

                $imageName =
                time() .
                '_' .
                $image->getClientOriginalName();

                $image->move(
                    public_path(
                        'uploads/teachers'
                    ),
                    $imageName
                );
            }

            $teacher->update([

                'department_id' =>
                $request->department_id,

                'designation_id' =>
                $request->designation_id,

                'academic_session_id' =>
                $request->academic_session_id,

                'name' =>
                $request->name,

                'gender' =>
                $request->gender,

                'dob' =>
                $request->dob,

                'image' =>
                $imageName,

                'qualification' =>
                $request->qualification,

                'experience' =>
                $request->experience,

                'joining_date' =>
                $request->joining_date,

                'service_end_date' =>
                $request->service_end_date,

                'employment_status' =>
                $request->employment_status,

                'mobile' =>
                $request->mobile,

                'alternate_mobile' =>
                $request->alternate_mobile,

                'email' =>
                $request->email,

                'address' =>
                $request->address,

                'short_bio' =>
                $request->short_bio,

                'description' =>
                $request->description,

                'status' =>
                $request->status ? 1 : 0,

                'sort_order' =>
                $request->sort_order ?? 0
            ]);

            $teacher->subjects()->sync(
                $request->subjects ?? []
            );

            if (
                $request->class_master_id &&
                $request->section_id
            ) {

                ClassTeacherAssignment::updateOrCreate(

                    [
                        'teacher_id' =>
                        $teacher->id
                    ],

                    [
                        'academic_session_id' =>
                        $request->academic_session_id,

                        'class_master_id' =>
                        $request->class_master_id,

                        'section_id' =>
                        $request->section_id,

                        'status' => 1
                    ]
                );
            }

            DB::commit();

            return redirect()
                ->route('teachers.index')
                ->with(
                    'success',
                    'Teacher Updated Successfully'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withErrors(
                    $e->getMessage()
                );
        }
    }

    public function changeStatus(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $teacher->status =
        !$teacher->status;

        $teacher->save();

        return back()->with(
            'success',
            'Status Updated Successfully'
        );
    }

    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $teacher->status = 0;

        if (
            $teacher->employment_status ==
            'Active'
        ) {

            $teacher->employment_status =
            'Inactive';
        }

        $teacher->save();

        return redirect()
            ->route('teachers.index')
            ->with(
                'success',
                'Teacher Disabled Successfully'
            );
    }
    public function downloadPdf(string $id)
    {
        $teacher = Teacher::with([

            'department',
            'designation',
            'academicSession',
            'subjects',
            'classTeacherAssignment.classMaster',
            'classTeacherAssignment.section'

        ])->findOrFail($id);

        $pdf = Pdf::loadView(
            'admin.teachers.pdf',
            compact('teacher')
        );

        return $pdf->download(
            'teacher-' .
            $teacher->employee_id .
            '.pdf'
        );
    }

    public function exportExcel()
    {
        return Excel::download(
            new TeachersExport(),
            'teachers.xlsx'
        );
    }

    public function exportPdf()
    {
        $teachers = Teacher::with([

            'department',
            'designation'

        ])->get();

        $pdf = Pdf::loadView(
            'admin.teachers.list-pdf',
            compact('teachers')
        );

        return $pdf->download(
            'teachers-list.pdf'
        );
    }
}