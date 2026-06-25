<?php

namespace App\Http\Controllers\Admin\ClassMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\ClassMaster\ClassMaster;
use App\Models\Department\Department;

class ClassMasterController extends Controller
{
    public function index(Request $request)
    {
        $classes = ClassMaster::with('department');

        if ($request->filled('search')) {

            $classes->where(function ($query) use ($request) {

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

        $classes = $classes
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.classes.index',
            compact('classes')
        );
    }

    public function create()
    {
        $departments = Department::where(
            'status',
            1
        )->orderBy('name')->get();

        return view(
            'admin.classes.create',
            compact('departments')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'department_id' => 'required',

            'name' => 'required|max:255',

            'code' => 'required|unique:class_masters',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'_'.
                uniqid().'.'.
                $request->image->extension();

            $request->image->move(
                public_path('uploads/classes'),
                $imageName
            );
        }

        ClassMaster::create([

            'department_id' => $request->department_id,

            'name' => $request->name,

            'code' => $request->code,

            'image' => $imageName,

            'description' => $request->description,

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('classes.index')
            ->with(
                'success',
                'Class added successfully'
            );
    }

    public function edit(ClassMaster $class)
    {
        $departments = Department::where(
            'status',
            1
        )->orderBy('name')->get();

        return view(
            'admin.classes.edit',
            [
                'classMaster' => $class,
                'departments' => $departments
            ]
        );
    }

    public function update(
        Request $request,
        ClassMaster $class
    ) {

        $request->validate([

            'department_id' => 'required',

            'name' => 'required|max:255',

            'code' => 'required|unique:class_masters,code,'.$class->id,

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $imageName = $class->image;

        if ($request->hasFile('image')) {

            $oldImage = public_path(
                'uploads/classes/'.$class->image
            );

            if (
                $class->image &&
                File::exists($oldImage)
            ) {
                File::delete($oldImage);
            }

            $imageName = time().'_'.
                uniqid().'.'.
                $request->image->extension();

            $request->image->move(
                public_path('uploads/classes'),
                $imageName
            );
        }

        $class->update([

            'department_id' => $request->department_id,

            'name' => $request->name,

            'code' => $request->code,

            'image' => $imageName,

            'description' => $request->description,

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('classes.index')
            ->with(
                'success',
                'Class updated successfully'
            );
    }

    public function destroy(ClassMaster $class)
    {
        if ($class->image) {

            $path = public_path(
                'uploads/classes/'.$class->image
            );

            if (File::exists($path)) {

                File::delete($path);

            }
        }

        $class->delete();

        return back()
            ->with(
                'success',
                'Class deleted successfully'
            );
    }

    public function changeStatus(
        ClassMaster $class
    ) {

        $class->update([

            'status' => !$class->status

        ]);

        return back();
    }
}