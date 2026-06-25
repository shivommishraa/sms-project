<?php

namespace App\Http\Controllers\Admin\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Section\Section;
use App\Models\ClassMaster\ClassMaster;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $sections = Section::with('classMaster');

        if ($request->filled('search')) {

            $sections->where(function ($query) use ($request) {

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

        $sections = $sections
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.sections.index',
            compact('sections')
        );
    }

    public function create()
    {
        $classes = ClassMaster::where(
            'status',
            1
        )->orderBy('name')->get();

        return view(
            'admin.sections.create',
            compact('classes')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'class_master_id' => 'required',

            'name' => 'required|max:255',

            'code' => 'required|unique:sections'

        ]);

        Section::create([

            'class_master_id' => $request->class_master_id,

            'name' => $request->name,

            'code' => $request->code,

            'description' => $request->description,

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('sections.index')
            ->with(
                'success',
                'Section added successfully'
            );
    }

    public function edit(Section $section)
    {
        $classes = ClassMaster::where(
            'status',
            1
        )->orderBy('name')->get();

        return view(
            'admin.sections.edit',
            compact(
                'section',
                'classes'
            )
        );
    }

    public function update(
        Request $request,
        Section $section
    ) {

        $request->validate([

            'class_master_id' => 'required',

            'name' => 'required|max:255',

            'code' => 'required|unique:sections,code,'.$section->id

        ]);

        $section->update([

            'class_master_id' => $request->class_master_id,

            'name' => $request->name,

            'code' => $request->code,

            'description' => $request->description,

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order

        ]);

        return redirect()
            ->route('sections.index')
            ->with(
                'success',
                'Section updated successfully'
            );
    }

    public function destroy(
        Section $section
    ) {

        $section->delete();

        return redirect()
            ->route('sections.index')
            ->with(
                'success',
                'Section deleted successfully'
            );
    }

    public function changeStatus(
        Section $section
    ) {

        $section->update([

            'status' => !$section->status

        ]);

        return back();
    }
}