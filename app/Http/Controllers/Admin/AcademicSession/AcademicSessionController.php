<?php

namespace App\Http\Controllers\Admin\AcademicSession;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicSession\AcademicSession;

class AcademicSessionController extends Controller
{
    public function index(Request $request)
    {
        $academicSessions = AcademicSession::query();

        if ($request->filled('search')) {

            $academicSessions->where(
                'name',
                'like',
                '%'.$request->search.'%'
            );
        }

        $academicSessions = $academicSessions
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.academic-sessions.index',
            compact('academicSessions')
        );
    }

    public function create()
    {
        return view(
            'admin.academic-sessions.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',

            'start_date' => 'nullable|date',

            'end_date' => 'nullable|date',

            'sort_order' => 'nullable|integer'
        ]);

        if ($request->has('is_current')) {

            AcademicSession::query()
                ->update([
                    'is_current' => 0
                ]);
        }

        AcademicSession::create([

            'name' => $request->name,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'is_current' => $request->has('is_current'),

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order ?? 0
        ]);

        return redirect()
            ->route('academic-sessions.index')
            ->with(
                'success',
                'Academic Session added successfully'
            );
    }

    public function edit(
        AcademicSession $academicSession
    ) {

        return view(
            'admin.academic-sessions.edit',
            compact('academicSession')
        );
    }

    public function update(
        Request $request,
        AcademicSession $academicSession
    ) {

        $request->validate([

            'name' => 'required|max:255',

            'start_date' => 'nullable|date',

            'end_date' => 'nullable|date',

            'sort_order' => 'nullable|integer'
        ]);

        if ($request->has('is_current')) {

            AcademicSession::query()
                ->update([
                    'is_current' => 0
                ]);
        }

        $academicSession->update([

            'name' => $request->name,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'is_current' => $request->has('is_current'),

            'status' => $request->has('status'),

            'sort_order' => $request->sort_order ?? 0
        ]);

        return redirect()
            ->route('academic-sessions.index')
            ->with(
                'success',
                'Academic Session updated successfully'
            );
    }

    public function destroy(
        AcademicSession $academicSession
    ) {

        $academicSession->delete();

        return redirect()
            ->route('academic-sessions.index')
            ->with(
                'success',
                'Academic Session deleted successfully'
            );
    }

    public function changeStatus(
        AcademicSession $academicSession
    ) {

        $academicSession->update([

            'status' => !$academicSession->status
        ]);

        return back();
    }
}