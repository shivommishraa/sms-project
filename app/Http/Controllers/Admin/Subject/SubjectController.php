<?php

namespace App\Http\Controllers\Admin\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Subject\Subject;
use App\Models\Department\Department;
use App\Models\ClassMaster\ClassMaster;
use App\Models\Section\Section;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $subjects = Subject::with([
            'department',
            'classMaster',
            'section'
        ]);

        if ($request->filled('search')) {

            $subjects->where(function ($query) use ($request) {

                $query->where(
                    'name',
                    'like',
                    '%'.$request->search.'%'
                )
                ->orWhere(
                    'code',
                    'like',
                    '%'.$request->search.'%'
                );
            });
        }

        $subjects = $subjects
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.subjects.index',
            compact('subjects')
        );
    }

    public function create()
    {
        $departments = Department::where(
            'status',
            1
        )->orderBy('name')->get();

        $classes = ClassMaster::where(
            'status',
            1
        )->orderBy('name')->get();

        $sections = Section::where(
            'status',
            1
        )->orderBy('name')->get();

        return view(
            'admin.subjects.create',
            compact(
                'departments',
                'classes',
                'sections'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'department_id' => 'required',

            'class_master_id' => 'required',

            'name' => 'required|max:255',

            'code' => 'required|unique:subjects',

            'type' => 'required',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'_'.uniqid().'.'
                .$request->image->extension();

            $request->image->move(
                public_path('uploads/subjects'),
                $imageName
            );
        }

        Subject::create([

            'department_id' => $request->department_id,

            'class_master_id' => $request->class_master_id,

            'section_id' => $request->section_id,

            'name' => $request->name,

            'code' => $request->code,

            'type' => $request->type,

            'image' => $imageName,

            'description' => $request->description,

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('subjects.index')
            ->with(
                'success',
                'Subject added successfully'
            );
    }

    public function edit(Subject $subject)
    {
        $departments = Department::where(
            'status',
            1
        )->orderBy('name')->get();

        $classes = ClassMaster::where(
            'status',
            1
        )->orderBy('name')->get();

        $sections = Section::where(
            'status',
            1
        )->orderBy('name')->get();

        return view(
            'admin.subjects.edit',
            compact(
                'subject',
                'departments',
                'classes',
                'sections'
            )
        );
    }

    public function update(
        Request $request,
        Subject $subject
    ) {

        $request->validate([

            'department_id' => 'required',

            'class_master_id' => 'required',

            'name' => 'required|max:255',

            'code' => 'required|unique:subjects,code,'.$subject->id,

            'type' => 'required',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imageName = $subject->image;

        if ($request->hasFile('image')) {

            $oldImage = public_path(
                'uploads/subjects/'.$subject->image
            );

            if (
                $subject->image &&
                File::exists($oldImage)
            ) {
                File::delete($oldImage);
            }

            $imageName = time().'_'.uniqid().'.'
                .$request->image->extension();

            $request->image->move(
                public_path('uploads/subjects'),
                $imageName
            );
        }

        $subject->update([

            'department_id' => $request->department_id,

            'class_master_id' => $request->class_master_id,

            'section_id' => $request->section_id,

            'name' => $request->name,

            'code' => $request->code,

            'type' => $request->type,

            'image' => $imageName,

            'description' => $request->description,

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('subjects.index')
            ->with(
                'success',
                'Subject updated successfully'
            );
    }

    public function destroy(
        Subject $subject
    ) {

        if ($subject->image) {

            $imagePath = public_path(
                'uploads/subjects/'.$subject->image
            );

            if (File::exists($imagePath)) {

                File::delete($imagePath);
            }
        }

        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->with(
                'success',
                'Subject deleted successfully'
            );
    }

    public function changeStatus(
        Subject $subject
    ) {

        $subject->update([

            'status' => !$subject->status

        ]);

        return back();
    }
}