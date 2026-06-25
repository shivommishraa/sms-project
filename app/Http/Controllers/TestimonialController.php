<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()
            ->paginate(5);

        return view(
            'admin.testimonials.index',
            compact('testimonials')
        );
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
         //dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
            'designation' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'_'.uniqid().'.'.
                $request->image->extension();

            $request->image->move(
                public_path('uploads/testimonials'),
                $imageName
            );
        }

        Testimonial::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imageName,
            'rating' => $request->rating,
            'message' => $request->message,
            'status' => $request->has('status'),
        ]);

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial added successfully');
    }

    public function edit(Testimonial $testimonial)
    {
        return view(
            'admin.testimonials.edit',
            compact('testimonial')
        );
    }

    public function update(
        Request $request,
        Testimonial $testimonial
    ) {

        $request->validate([
            'name' => 'required|max:255',
            'designation' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required',
        ]);

        $imageName = $testimonial->image;

        if ($request->hasFile('image')) {

            $oldImage = public_path(
                'uploads/testimonials/'.$testimonial->image
            );

            if (
                $testimonial->image &&
                File::exists($oldImage)
            ) {
                File::delete($oldImage);
            }

            $imageName = time().'_'.uniqid().'.'.
                $request->image->extension();

            $request->image->move(
                public_path('uploads/testimonials'),
                $imageName
            );
        }

        $testimonial->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imageName,
            'rating' => $request->rating,
            'message' => $request->message,
            'status' => $request->has('status'),
        ]);

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Updated successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {

            $imagePath = public_path(
                'uploads/testimonials/'.$testimonial->image
            );

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $testimonial->delete();

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Deleted successfully');
    }

    public function changeStatus(Testimonial $testimonial)
    {
        $testimonial->update([
            'status' => !$testimonial->status
        ]);

        return back();
    }
}