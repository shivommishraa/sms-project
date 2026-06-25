@extends('adminlte::page')

@section('title', 'Teacher Details')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">

        <h4 class="d-inline mb-0">

            <i class="fas fa-user-tie"></i>

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

            <div class="col-md-3">

                <div class="card">

                    <div class="card-body text-center">

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

                        <h5 class="mt-3">

                            {{ $teacher->name }}

                        </h5>

                        <p class="text-muted">

                            {{ $teacher->designation->name ?? '-' }}

                        </p>

                        <span class="badge badge-primary">

                            {{ $teacher->employee_id }}

                        </span>

                        <br><br>

                        @if($teacher->status)

                            <span class="badge badge-success">

                                Active

                            </span>

                        @else

                            <span class="badge badge-danger">

                                Inactive

                            </span>

                        @endif

                    </div>

                </div>

            </div>

            <div class="col-md-9">

                <table class="table table-bordered table-striped">

                    <tr>

                        <th width="250" class="bg-light">

                            Employee ID

                        </th>

                        <td>

                            {{ $teacher->employee_id }}

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

                            Teacher Name

                        </th>

                        <td>

                            {{ $teacher->name }}

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

                            Gender

                        </th>

                        <td>

                            {{ $teacher->gender }}

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

                            Date Of Birth

                        </th>

                        <td>

                            {{ $teacher->dob }}

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

                            Department

                        </th>

                        <td>

                            {{ $teacher->department->name ?? '-' }}

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

                            Designation

                        </th>

                        <td>

                            {{ $teacher->designation->name ?? '-' }}

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

                            Academic Session

                        </th>

                        <td>

                            {{ $teacher->academicSession->name ?? '-' }}

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

                            Qualification

                        </th>

                        <td>

                            {{ $teacher->qualification }}

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

                            Experience

                        </th>

                        <td>

                            {{ $teacher->experience }}

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

                            Joining Date

                        </th>

                        <td>

                            {{ $teacher->joining_date }}

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

                            Service End Date

                        </th>

                        <td>

                            {{ $teacher->service_end_date ?? '-' }}

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

                            Employment Status

                        </th>

                        <td>

                            <span class="badge badge-info">

                                {{ $teacher->employment_status }}

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <th class="bg-light">

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

        <h5 class="text-primary">

            <i class="fas fa-phone"></i>

            Contact Information

        </h5>

        <table class="table table-bordered table-striped">

            <tr>

                <th width="250" class="bg-light">

                    Mobile

                </th>

                <td>

                    {{ $teacher->mobile }}

                </td>

            </tr>

            <tr>

                <th class="bg-light">

                    Alternate Mobile

                </th>

                <td>

                    {{ $teacher->alternate_mobile ?? '-' }}

                </td>

            </tr>

            <tr>

                <th class="bg-light">

                    Email

                </th>

                <td>

                    {{ $teacher->email ?? '-' }}

                </td>

            </tr>

            <tr>

                <th class="bg-light">

                    Address

                </th>

                <td>

                    {{ $teacher->address ?? '-' }}

                </td>

            </tr>

        </table>

        <hr>

        <h5 class="text-info">

            <i class="fas fa-book"></i>

            Assigned Subjects

        </h5>

        <div class="card">

            <div class="card-body">

                @forelse($teacher->subjects as $subject)

                    <span
                        class="badge badge-primary mr-2 mb-2 p-2">

                        {{ $subject->name }}

                    </span>

                @empty

                    <span class="text-danger">

                        No Subject Assigned

                    </span>

                @endforelse

            </div>

        </div>

        <hr>
                <h5 class="text-success">

            <i class="fas fa-chalkboard-teacher"></i>

            Class Teacher Assignment

        </h5>

        <table class="table table-bordered table-striped">

            <tr>

                <th width="250" class="bg-light">

                    Class

                </th>

                <td>

                    {{
                        optional(
                            optional(
                                $teacher->classTeacherAssignment
                            )->classMaster
                        )->name ?? '-'
                    }}

                </td>

            </tr>

            <tr>

                <th class="bg-light">

                    Section

                </th>

                <td>

                    {{
                        optional(
                            optional(
                                $teacher->classTeacherAssignment
                            )->section
                        )->name ?? '-'
                    }}

                </td>

            </tr>

        </table>

        <hr>

        <h5 class="text-warning">

            <i class="fas fa-user-edit"></i>

            Short Bio

        </h5>

        <div class="border rounded p-3 bg-light">

            {!! nl2br(e($teacher->short_bio ?? '-')) !!}

        </div>

        <hr>

        <h5 class="text-dark">

            <i class="fas fa-align-left"></i>

            Description

        </h5>

        <div class="border rounded p-3 bg-light">

            {!! nl2br(e($teacher->description ?? '-')) !!}

        </div>

    </div>

</div>

@endsection