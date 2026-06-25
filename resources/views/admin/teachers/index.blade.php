@extends('adminlte::page')

@section('title', 'Teachers')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">

            Teachers Management

        </h4>

        <div class="float-right">

            <a href="{{ route('teachers.export.excel') }}"
               class="btn btn-success">

                <i class="fas fa-file-excel"></i>

                Excel

            </a>

            <a href="{{ route('teachers.export.pdf') }}"
               class="btn btn-danger">

                <i class="fas fa-file-pdf"></i>

                PDF

            </a>

            <a href="{{ route('teachers.export.pdf.filtered', request()->query()) }}"
               class="btn btn-dark">

                <i class="fas fa-filter"></i>

                Filtered PDF

            </a>

            <a href="{{ route('teachers.create') }}"
               class="btn btn-primary">

                <i class="fas fa-plus"></i>

                Add Teacher

            </a>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success m-3">

            {{ session('success') }}

        </div>

    @endif

    <div class="card-body">

        <form method="GET"
              action="{{ route('teachers.index') }}"
              class="mb-4">

            <div class="row">

                <div class="col-md-3">

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control"
                           placeholder="Search Name / Employee ID / Mobile">

                </div>

                <div class="col-md-3">

                    <select name="department"
                            class="form-control">

                        <option value="">

                            All Departments

                        </option>

                        @foreach($departments as $department)

                            <option
                                value="{{ $department->id }}"
                                {{ request('department') == $department->id ? 'selected' : '' }}>

                                {{ $department->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-3">

                    <select name="designation"
                            class="form-control">

                        <option value="">

                            All Designations

                        </option>

                        @foreach($designations as $designation)

                            <option
                                value="{{ $designation->id }}"
                                {{ request('designation') == $designation->id ? 'selected' : '' }}>

                                {{ $designation->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-3">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-search"></i>

                        Search

                    </button>

                    <a href="{{ route('teachers.index') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-sync"></i>

                        Reset

                    </a>

                </div>

            </div>

        </form>

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Photo</th>

                        <th>Employee ID</th>

                        <th>Name</th>

                        <th>Department</th>

                        <th>Designation</th>

                        <th>Mobile</th>

                        <th>Class Teacher</th>

                        <th>Employment</th>

                        <th>Status</th>

                        <th width="250">

                            Actions

                        </th>

                    </tr>

                </thead>

                <tbody>
                @forelse($teachers as $teacher)

                    <tr>

                        <td>

                            {{
                                $loop->iteration +
                                (
                                    ($teachers->currentPage() - 1)
                                    *
                                    $teachers->perPage()
                                )
                            }}

                        </td>

                        <td>

                            @if($teacher->image)

                                <img
                                    src="{{ asset('uploads/teachers/'.$teacher->image) }}"
                                    width="50"
                                    height="50"
                                    class="img-thumbnail">

                            @else

                                <img
                                    src="{{ asset('images/no-image.png') }}"
                                    width="50"
                                    height="50"
                                    class="img-thumbnail">

                            @endif

                        </td>

                        <td>

                            {{ $teacher->employee_id }}

                        </td>

                        <td>

                            <strong>

                                {{ $teacher->name }}

                            </strong>

                        </td>

                        <td>

                            {{ $teacher->department->name ?? '-' }}

                        </td>

                        <td>

                            {{ $teacher->designation->name ?? '-' }}

                        </td>

                        <td>

                            {{ $teacher->mobile }}

                        </td>

                        <td>

                            @if($teacher->classTeacherAssignment)

                                <span class="badge badge-primary">

                                    {{
                                        $teacher->classTeacherAssignment->classMaster->name ?? ''
                                    }}

                                    -

                                    {{
                                        $teacher->classTeacherAssignment->section->name ?? ''
                                    }}

                                </span>

                            @else

                                -

                            @endif

                        </td>

                        <td>

                            @if($teacher->employment_status == 'Active')

                                <span class="badge badge-success">

                                    Active

                                </span>

                            @elseif($teacher->employment_status == 'Inactive')

                                <span class="badge badge-danger">

                                    Inactive

                                </span>

                            @else

                                <span class="badge badge-secondary">

                                    {{ $teacher->employment_status }}

                                </span>

                            @endif

                        </td>

                        <td>

                            <form
                                action="{{ route('teachers.status',$teacher->id) }}"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-sm {{ $teacher->status ? 'btn-success' : 'btn-danger' }}">

                                    {{
                                        $teacher->status
                                        ? 'Enabled'
                                        : 'Disabled'
                                    }}

                                </button>

                            </form>

                        </td>

                        <td>

                            <a href="{{ route('teachers.show',$teacher->id) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('teachers.edit',$teacher->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <a href="{{ route('teachers.pdf',$teacher->id) }}"
                               class="btn btn-danger btn-sm">

                                <i class="fas fa-file-pdf"></i>

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="11"
                            class="text-center">

                            No Teachers Found

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $teachers->links() }}

        </div>

    </div>

</div>

@endsection


