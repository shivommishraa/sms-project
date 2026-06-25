<?php
namespace App\Http\Controllers\Admin\Designation;

use App\Http\Controllers\Controller;
use App\Models\Designation\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DesignationController extends Controller
{
    public function index(Request $request)
    {
        $designations = Designation::query();

        if ($request->filled('search')) {

            $designations->where(function($q) use ($request){

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

        $designations = $designations
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.designations.index',
            compact('designations')
        );
    }

    public function create()
    {
        return view('admin.designations.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',

            'code' => 'required|unique:designations',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',

        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'_'.
                uniqid().'.'.
                $request->image->extension();

            $request->image->move(
                public_path('uploads/designations'),
                $imageName
            );
        }

        Designation::create([

            'name' => $request->name,

            'code' => $request->code,

            'image' => $imageName,

            'description' => $request->description,

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('designations.index')
            ->with(
                'success',
                'Designation added successfully'
            );
    }

    public function edit(Designation $designation)
    {
        return view(
            'admin.designations.edit',
            compact('designation')
        );
    }

    public function update(
        Request $request,
        Designation $designation
    ) {

        $request->validate([

            'name' => 'required|max:255',

            'code' => 'required|unique:designations,code,'.$designation->id,

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp'

        ]);

        $imageName = $designation->image;

        if ($request->hasFile('image')) {

            $oldImage = public_path(
                'uploads/designations/'.$designation->image
            );

            if (
                $designation->image &&
                File::exists($oldImage)
            ) {
                File::delete($oldImage);
            }

            $imageName = time().'_'.
                uniqid().'.'.
                $request->image->extension();

            $request->image->move(
                public_path('uploads/designations'),
                $imageName
            );
        }

        $designation->update([

            'name' => $request->name,

            'code' => $request->code,

            'image' => $imageName,

            'description' => $request->description,

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('designations.index')
            ->with(
                'success',
                'Designation updated successfully'
            );
    }

    public function destroy(Designation $designation)
    {
        if ($designation->image) {

            $path = public_path(
                'uploads/designations/'.$designation->image
            );

            if (File::exists($path)) {

                File::delete($path);

            }
        }

        $designation->delete();

        return back()
            ->with(
                'success',
                'Designation deleted successfully'
            );
    }

    public function changeStatus(
        Designation $designation
    ) {

        $designation->update([

            'status' => !$designation->status

        ]);

        return back();
    }
}