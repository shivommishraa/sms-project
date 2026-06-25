<?php
namespace App\Http\Controllers\Admin\Department;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::query();

        if ($request->filled('search')) {

            $departments->where(function($q) use ($request){

                $q->where(
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

        $departments = $departments
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.departments.index',
            compact('departments')
        );
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',

            'code' => 'required|unique:departments',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',

        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'_'.
                uniqid().'.'.
                $request->image->extension();

            $request->image->move(
                public_path('uploads/departments'),
                $imageName
            );
        }

        Department::create([

            'name' => $request->name,

            'code' => $request->code,

            'image' => $imageName,

            'description' => $request->description,

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('departments.index')
            ->with(
                'success',
                'Department added successfully'
            );
    }

    public function edit(Department $department)
    {
        return view(
            'admin.departments.edit',
            compact('department')
        );
    }

    public function update(
        Request $request,
        Department $department
    ) {

        $request->validate([

            'name' => 'required|max:255',

            'code' => 'required|unique:departments,code,'.$department->id,

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp'

        ]);

        $imageName = $department->image;

        if ($request->hasFile('image')) {

            $oldImage = public_path(
                'uploads/departments/'.$department->image
            );

            if (
                $department->image &&
                File::exists($oldImage)
            ) {
                File::delete($oldImage);
            }

            $imageName = time().'_'.
                uniqid().'.'.
                $request->image->extension();

            $request->image->move(
                public_path('uploads/departments'),
                $imageName
            );
        }

        $department->update([

            'name' => $request->name,

            'code' => $request->code,

            'image' => $imageName,

            'description' => $request->description,

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('departments.index')
            ->with(
                'success',
                'Department updated successfully'
            );
    }

    public function destroy(Department $department)
    {
        if ($department->image) {

            $path = public_path(
                'uploads/departments/'.$department->image
            );

            if (File::exists($path)) {

                File::delete($path);

            }
        }

        $department->delete();

        return back()
            ->with(
                'success',
                'Department deleted successfully'
            );
    }

    public function changeStatus(
        Department $department
    ) {

        $department->update([

            'status' => !$department->status

        ]);

        return back();
    }
}