@extends('adminlte::page')

@section('title', 'Teacher Details')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">

            Teacher Profile

        </h4>

        <div class="float-right">

            <a href="{{ route('teachers.pdf',$teacher->id) }}"
               class="btn btn-danger">

                <i class="fas fa-file-pdf"></i>

                Download PDF

            </a>

            <a href="{{ route('teachers.edit',$teacher->id) }}"
               class="btn btn-warning">

                Edit

            </a>

            <a href="{{ route('teachers.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3 text-center">

                @if($teacher->image)

                    <img
                        src="{{ asset('uploads/teachers/'.$teacher->image) }}"
                        class="img-thumbnail"
                        style="max-width:220px;">

                @else

                    <img
                        src="{{ asset('images/no-image.png') }}"
                        class="img-thumbnail"
                        style="max-width:220px;">

                @endif

            </div>

            <div class="col-md-9">

                <table class="table table-bordered">

                    <tr>

                        <th width="250">

                            Employee ID

                        </th>

                        <td>

                            {{ $teacher->employee_id }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Teacher Name

                        </th>

                        <td>

                            {{ $teacher->name }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Gender

                        </th>

                        <td>

                            {{ $teacher->gender }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Date Of Birth

                        </th>

                        <td>

                            {{ $teacher->dob }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Department

                        </th>

                        <td>

                            {{ $teacher->department->name ?? '-' }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Designation

                        </th>

                        <td>

                            {{ $teacher->designation->name ?? '-' }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Academic Session

                        </th>

                        <td>

                            {{ $teacher->academicSession->name ?? '-' }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Qualification

                        </th>

                        <td>

                            {{ $teacher->qualification }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Experience

                        </th>

                        <td>

                            {{ $teacher->experience }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Joining Date

                        </th>

                        <td>

                            {{ $teacher->joining_date }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Service End Date

                        </th>

                        <td>

                            {{ $teacher->service_end_date }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Employment Status

                        </th>

                        <td>

                            <span class="badge badge-info">

                                {{ $teacher->employment_status }}

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Active Status

                        </th>

                        <td>

                            @if($teacher->status)

                                <span class="badge badge-success">

                                    Active

                                </span>

                            @else

                                <span class="badge badge-danger">

                                    Inactive

                                </span>

                            @endif

                        </td>

                    </tr>

                </table>

            </div>

        </div>

        <hr>

        <h5>

            Contact Information

        </h5>

        <table class="table table-bordered">

            <tr>

                <th width="250">

                    Mobile

                </th>

                <td>

                    {{ $teacher->mobile }}

                </td>

            </tr>

            <tr>

                <th>

                    Alternate Mobile

                </th>

                <td>

                    {{ $teacher->alternate_mobile }}

                </td>

            </tr>

            <tr>

                <th>

                    Email

                </th>

                <td>

                    {{ $teacher->email }}

                </td>

            </tr>

            <tr>

                <th>

                    Address

                </th>

                <td>

                    {{ $teacher->address }}

                </td>

            </tr>

        </table>

        <hr>

        <h5>

            Assigned Subjects

        </h5>

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>

                        Subject Name

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($teacher->subjects as $subject)

                    <tr>

                        <td>

                            {{ $subject->name }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td>

                            No Subject Assigned

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <hr>

        <h5>

            Class Teacher Assignment

        </h5>

        <table class="table table-bordered">

            <tr>

                <th width="250">

                    Class

                </th>

                <td>

                    {{
                        $teacher->classTeacherAssignment->classMaster->name
                        ?? '-'
                    }}

                </td>

            </tr>

            <tr>

                <th>

                    Section

                </th>

                <td>

                    {{
                        $teacher->classTeacherAssignment->section->name
                        ?? '-'
                    }}

                </td>

            </tr>

        </table>

        <hr>

        <h5>

            Short Bio

        </h5>

        <div class="border p-3">

            {!! nl2br(e($teacher->short_bio)) !!}

        </div>

        <hr>

        <h5>

            Description

        </h5>

        <div class="border p-3">

            {!! nl2br(e($teacher->description)) !!}

        </div>

    </div>

</div>

@endsection