<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Models\Student\Student;

use App\Models\Department\Department;
use App\Models\AcademicSession\AcademicSession;
use App\Models\ClassMaster\ClassMaster;
use App\Models\Section\Section;

use App\Exports\StudentsExport;

use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Student Listing
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Student::with([

            'academicSession',

            'department',

            'classMaster',

            'section'

        ]);

        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where(
                    'name',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'admission_no',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'roll_no',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'student_mobile',
                    'like',
                    '%' . $request->search . '%'
                );

            });

        }

        if ($request->filled('academic_session')) {

            $query->where(

                'academic_session_id',

                $request->academic_session

            );

        }

        if ($request->filled('department')) {

            $query->where(

                'department_id',

                $request->department

            );

        }

        if ($request->filled('class_master')) {

            $query->where(

                'class_master_id',

                $request->class_master

            );

        }

        if ($request->filled('section')) {

            $query->where(

                'section_id',

                $request->section

            );

        }

        if ($request->filled('status')) {

            $query->where(

                'status',

                $request->status

            );

        }

        $students = $query

            ->latest()

            ->paginate(20)

            ->withQueryString();

        $sessions = AcademicSession::where(

            'status',

            1

        )->orderBy(

            'sort_order'

        )->get();

        $departments = Department::where(

            'status',

            1

        )->orderBy(

            'name'

        )->get();

        $classes = ClassMaster::where(

            'status',

            1

        )->orderBy(

            'name'

        )->get();

        $sections = Section::where(

            'status',

            1

        )->orderBy(

            'name'

        )->get();

        return view(

            'admin.students.index',

            compact(

                'students',

                'sessions',

                'departments',

                'classes',

                'sections'

            )

        );
    }

    /*
    |--------------------------------------------------------------------------
    | Create Student
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $sessions = AcademicSession::where(

            'status',

            1

        )->orderBy(

            'sort_order'

        )->get();

        $departments = Department::where(

            'status',

            1

        )->orderBy(

            'name'

        )->get();

        $classes = ClassMaster::where(

            'status',

            1

        )->orderBy(

            'name'

        )->get();

        $sections = Section::where(

            'status',

            1

        )->orderBy(

            'name'

        )->get();

        return view(

            'admin.students.create',

            compact(

                'sessions',

                'departments',

                'classes',

                'sections'

            )

        );
    }
    /*
    |--------------------------------------------------------------------------
    | Store Student
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'academic_session_id' => 'required|exists:academic_sessions,id',

            'department_id' => 'required|exists:departments,id',

            'class_master_id' => 'required|exists:class_masters,id',

            'section_id' => 'required|exists:sections,id',

            'name' => 'required|max:255',

            'gender' => 'required',

            'student_mobile' => 'nullable|max:20',

            'father_mobile' => 'nullable|max:20',

            'mother_mobile' => 'nullable|max:20',

            'guardian_mobile' => 'nullable|max:20',

            'email' => 'nullable|email|max:255',
            'roll_no' => 'nullable|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'transport_allotted' => 'nullable|boolean',

            'bus_number' => 'nullable|max:100'

        ]);

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | Generate Admission Number
            |--------------------------------------------------------------------------
            */

            $lastStudent = Student::latest('id')->first();

            $nextId = $lastStudent
                ? $lastStudent->id + 1
                : 1;

            $admissionNo =
                'ADM' .
                str_pad(
                    $nextId,
                    4,
                    '0',
                    STR_PAD_LEFT
                );

            /*
            |--------------------------------------------------------------------------
            | Upload Image
            |--------------------------------------------------------------------------
            */

            $imageName = null;

            if ($request->hasFile('image')) {

                $image = $request->file('image');

                $imageName =
                    time() .
                    '_' .
                    $image->getClientOriginalName();

                $image->move(

                    public_path('uploads/students'),

                    $imageName

                );
            }

            /*
            |--------------------------------------------------------------------------
            | Save Student
            |--------------------------------------------------------------------------
            */

            Student::create([

                'academic_session_id' =>
                    $request->academic_session_id,

                'department_id' =>
                    $request->department_id,

                'class_master_id' =>
                    $request->class_master_id,

                'section_id' =>
                    $request->section_id,

                'admission_no' =>
                    $admissionNo,

                'roll_no' =>
                    $request->roll_no,

                'admission_date' =>
                    $request->admission_date,

                'name' =>
                    $request->name,

                'gender' =>
                    $request->gender,

                'dob' =>
                    $request->dob,

                'blood_group' =>
                    $request->blood_group,

                'category' =>
                    $request->category,

                'religion' =>
                    $request->religion,

                'aadhaar_no' =>
                    $request->aadhaar_no,

                'image' =>
                    $imageName,

                'father_name' =>
                    $request->father_name,

                'father_mobile' =>
                    $request->father_mobile,

                'mother_name' =>
                    $request->mother_name,

                'mother_mobile' =>
                    $request->mother_mobile,

                'guardian_name' =>
                    $request->guardian_name,

                'guardian_mobile' =>
                    $request->guardian_mobile,

                'student_mobile' =>
                    $request->student_mobile,

                'email' =>
                    $request->email,

                'address' =>
                    $request->address,

                'city' =>
                    $request->city,

                'state' =>
                    $request->state,

                'pincode' =>
                    $request->pincode,

                'father_occupation' => $request->father_occupation,
                'mother_occupation' => $request->mother_occupation,
                'guardian_relation' => $request->guardian_relation,
                'emergency_contact' => $request->emergency_contact,

                'transport_allotted' =>
                    $request->transport_allotted ? 1 : 0,

                'bus_number' =>
                    $request->transport_allotted
                        ? $request->bus_number
                        : null,

                'previous_school' =>
                    $request->previous_school,

                'description' =>
                    $request->description,

                'status' =>
                    $request->status ? 1 : 0,

                'sort_order' =>
                    $request->sort_order ?? 0

            ]);

            DB::commit();

            return redirect()

                ->route('students.index')

                ->with(

                    'success',

                    'Student Created Successfully.'

                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()

                ->withInput()

                ->withErrors(

                    $e->getMessage()

                );
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Show Student
    |--------------------------------------------------------------------------
    */

    public function show(string $id)
    {
        $student = Student::with([

            'academicSession',

            'department',

            'classMaster',

            'section'

        ])->findOrFail($id);

        return view(

            'admin.students.show',

            compact(

                'student'

            )

        );
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Student
    |--------------------------------------------------------------------------
    */

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);

        $sessions = AcademicSession::where(

            'status',

            1

        )->orderBy(

            'sort_order'

        )->get();

        $departments = Department::where(

            'status',

            1

        )->orderBy(

            'name'

        )->get();

        $classes = ClassMaster::where(

            'status',

            1

        )->orderBy(

            'name'

        )->get();

        $sections = Section::where(

            'status',

            1

        )->orderBy(

            'name'

        )->get();

        return view(

            'admin.students.edit',

            compact(

                'student',

                'sessions',

                'departments',

                'classes',

                'sections'

            )

        );
    }
    /*
    |--------------------------------------------------------------------------
    | Update Student
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);
        
        $request->validate([

            'academic_session_id' => 'required|exists:academic_sessions,id',

            'department_id' => 'required|exists:departments,id',

            'class_master_id' => 'required|exists:class_masters,id',

            'section_id' => 'required|exists:sections,id',

            'name' => 'required|max:255',

            'gender' => 'required',

            'student_mobile' => 'nullable|max:20',

            'father_mobile' => 'nullable|max:20',

            'mother_mobile' => 'nullable|max:20',

            'guardian_mobile' => 'nullable|max:20',

            'email' => 'nullable|email',

            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | Image Delete
            |--------------------------------------------------------------------------
            */

            if ($request->delete_image == 1) {

                if (

                    $student->image &&

                    File::exists(

                        public_path(
                            'uploads/students/' .
                            $student->image
                        )

                    )

                ) {

                    File::delete(

                        public_path(
                            'uploads/students/' .
                            $student->image
                        )

                    );

                }

                $student->image = null;
            }

            /*
            |--------------------------------------------------------------------------
            | Upload New Image
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('image')) {

                if (

                    $student->image &&

                    File::exists(

                        public_path(
                            'uploads/students/' .
                            $student->image
                        )

                    )

                ) {

                    File::delete(

                        public_path(
                            'uploads/students/' .
                            $student->image
                        )

                    );

                }

                $image = $request->file('image');

                $imageName =

                    time() .

                    '_' .

                    $image->getClientOriginalName();

                $image->move(

                    public_path('uploads/students'),

                    $imageName

                );

                $student->image = $imageName;
            }

            /*
            |--------------------------------------------------------------------------
            | Update Student
            |--------------------------------------------------------------------------
            */

            $student->academic_session_id =
                $request->academic_session_id;

            $student->department_id =
                $request->department_id;

            $student->class_master_id =
                $request->class_master_id;

            $student->section_id =
                $request->section_id;


            $student->admission_date =
                $request->admission_date;

            $student->name =
                $request->name;

            $student->gender =
                $request->gender;

            $student->dob =
                $request->dob;

            $student->blood_group =
                $request->blood_group;

            $student->category =
                $request->category;

            $student->religion =
                $request->religion;

            $student->aadhaar_no =
                $request->aadhaar_no;

            $student->father_name =
                $request->father_name;

            $student->father_mobile =
                $request->father_mobile;

            $student->mother_name =
                $request->mother_name;

            $student->mother_mobile =
                $request->mother_mobile;

            $student->guardian_name =
                $request->guardian_name;

            $student->guardian_mobile =
                $request->guardian_mobile;

            $student->student_mobile =
                $request->student_mobile;


            $student->father_occupation =
                $request->father_occupation;
            $student->mother_occupation =
                $request->mother_occupation;
            $student->guardian_relation =
                $request->guardian_relation;
            $student->emergency_contact =
                $request->emergency_contact;



            $student->email =
                $request->email;

            $student->address =
                $request->address;

            $student->city =
                $request->city;

            $student->state =
                $request->state;

            $student->pincode =
                $request->pincode;

            $student->transport_allotted =
                $request->transport_allotted ? 1 : 0;

            $student->bus_number =
                $request->transport_allotted
                ? $request->bus_number
                : null;

            $student->previous_school =
                $request->previous_school;

            $student->description =
                $request->description;

            $student->status =
                $request->status ? 1 : 0;

            $student->sort_order =
                $request->sort_order ?? 0;

            $student->save();

            DB::commit();

            return redirect()

                ->route('students.index')

                ->with(

                    'success',

                    'Student Updated Successfully.'

                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()

                ->withInput()

                ->withErrors(

                    $e->getMessage()

                );
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Change Status
    |--------------------------------------------------------------------------
    */

    public function changeStatus(string $id)
    {
        $student = Student::findOrFail($id);

        $student->status = !$student->status;

        $student->save();

        return back()->with(

            'success',

            'Student Status Updated Successfully.'

        );
    }

    /*
    |--------------------------------------------------------------------------
    | Disable Student
    |--------------------------------------------------------------------------
    */

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Permanent Delete NOT Allowed
        |--------------------------------------------------------------------------
        */

        $student->status = 0;

        $student->save();

        return redirect()

            ->route('students.index')

            ->with(

                'success',

                'Student Disabled Successfully.'

            );
    }

    /*
    |--------------------------------------------------------------------------
    | Download Single Student PDF
    |--------------------------------------------------------------------------
    */

    public function downloadPdf(string $id)
    {
        $student = Student::with([

            'academicSession',

            'department',

            'classMaster',

            'section'

        ])->findOrFail($id);

        $pdf = Pdf::loadView(

            'admin.students.pdf',

            compact(

                'student'

            )

        );

        return $pdf->download(

            'student-' .

            $student->admission_no .

            '.pdf'

        );
    }

    /*
    |--------------------------------------------------------------------------
    | Export Excel
    |--------------------------------------------------------------------------
    */

    public function exportExcel()
    {
        return Excel::download(

            new StudentsExport(),

            'students.xlsx'

        );
    }

    /*
    |--------------------------------------------------------------------------
    | Export All Students PDF
    |--------------------------------------------------------------------------
    */

    public function exportPdf()
    {
        $students = Student::with([

            'academicSession',

            'department',

            'classMaster',

            'section'

        ])->orderBy(

            'name'

        )->get();

        $pdf = Pdf::loadView(

            'admin.students.list-pdf',

            compact(

                'students'

            )

        );

        return $pdf->download(

            'students-list.pdf'

        );
    }

    /*
    |--------------------------------------------------------------------------
    | Export Filtered Students PDF
    |--------------------------------------------------------------------------
    */

    public function exportFilteredPdf(Request $request)
    {
        $query = Student::with([

            'academicSession',

            'department',

            'classMaster',

            'section'

        ]);

        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where(
                    'name',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'admission_no',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'roll_no',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'student_mobile',
                    'like',
                    '%' . $request->search . '%'
                );

            });

        }

        if ($request->filled('academic_session')) {

            $query->where(

                'academic_session_id',

                $request->academic_session

            );

        }

        if ($request->filled('department')) {

            $query->where(

                'department_id',

                $request->department

            );

        }

        if ($request->filled('class_master')) {

            $query->where(

                'class_master_id',

                $request->class_master

            );

        }

        if ($request->filled('section')) {

            $query->where(

                'section_id',

                $request->section

            );

        }

        if ($request->filled('status')) {

            $query->where(

                'status',

                $request->status

            );

        }

        $students = $query

            ->orderBy('name')

            ->get();

        $pdf = Pdf::loadView(

            'admin.students.list-pdf',

            compact(

                'students'

            )

        );

        return $pdf->download(

            'filtered-students-list.pdf'

        );
    }
}
