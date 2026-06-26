@extends('adminlte::page')

@section('title', 'Students')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">

            Student Management

        </h4>

        <div class="float-right">

            <a href="{{ route('students.export.excel') }}"
               class="btn btn-success">

                <i class="fas fa-file-excel"></i>

                Excel

            </a>

            <a href="{{ route('students.export.pdf') }}"
               class="btn btn-danger">

                <i class="fas fa-file-pdf"></i>

                PDF

            </a>

            <a href="{{ route('students.export.pdf.filtered', request()->query()) }}"
               class="btn btn-dark">

                <i class="fas fa-filter"></i>

                Filtered PDF

            </a>

            <a href="{{ route('students.create') }}"
               class="btn btn-primary">

                <i class="fas fa-plus-circle"></i>

                Add Student

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
              action="{{ route('students.index') }}"
              class="mb-4">

            <div class="row">

                <div class="col-md-3 mb-2">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Admission No / Roll No / Name">

                </div>

                <div class="col-md-3 mb-2">

                    <select
                        name="academic_session"
                        class="form-control">

                        <option value="">

                            Academic Session

                        </option>

                        @foreach($sessions as $session)

                            <option
                                value="{{ $session->id }}"
                                {{ request('academic_session')==$session->id ? 'selected' : '' }}>

                                {{ $session->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-3 mb-2">

                    <select
                        name="department"
                        class="form-control">

                        <option value="">

                            Department

                        </option>

                        @foreach($departments as $department)

                            <option
                                value="{{ $department->id }}"
                                {{ request('department')==$department->id ? 'selected' : '' }}>

                                {{ $department->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-3 mb-2">

                    <select
                        name="class_master"
                        class="form-control">

                        <option value="">

                            Class

                        </option>

                        @foreach($classes as $class)

                            <option
                                value="{{ $class->id }}"
                                {{ request('class_master')==$class->id ? 'selected' : '' }}>

                                {{ $class->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="row mt-2">

                <div class="col-md-3 mb-2">

                    <select
                        name="section"
                        class="form-control">

                        <option value="">

                            Section

                        </option>

                        @foreach($sections as $section)

                            <option
                                value="{{ $section->id }}"
                                {{ request('section')==$section->id ? 'selected' : '' }}>

                                {{ $section->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-3 mb-2">

                    <select
                        name="status"
                        class="form-control">

                        <option value="">

                            Status

                        </option>

                        <option value="1"
                            {{ request('status')==='1' ? 'selected' : '' }}>

                            Active

                        </option>

                        <option value="0"
                            {{ request('status')==='0' ? 'selected' : '' }}>

                            Inactive

                        </option>

                    </select>

                </div>

                <div class="col-md-6">

                    <button
                        class="btn btn-primary">

                        <i class="fas fa-search"></i>

                        Search

                    </button>

                    <a href="{{ route('students.index') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-sync"></i>

                        Reset

                    </a>

                </div>

            </div>

        </form>

        <div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">

	    <thead class="thead-dark">

	        <tr>

	            <th width="50">

	                #

	            </th>

	            <th width="70">

	                Photo

	            </th>

	            <th>

	                Admission No

	            </th>

	            <th>

	                Roll No

	            </th>

	            <th>

	                Student Name

	            </th>

	            <th>

	                Class

	            </th>

	            <th>

	                Section

	            </th>

	            <th>

	                Department

	            </th>

	            <th>

	                Student Mobile

	            </th>

	            <th>

	                Parent Mobile

	            </th>

	            <th>

	                Transport

	            </th>

	            <th>

	                Status

	            </th>

	            <th width="240">

	                Actions

	            </th>

	        </tr>

	    </thead>

	    <tbody>

	    @forelse($students as $student)

	        <tr>

	            <td>

	                {{ $loop->iteration + (($students->currentPage()-1) * $students->perPage()) }}

	            </td>

	            <td class="text-center">

	                @if($student->image)

	                    <img
	                        src="{{ asset('uploads/students/'.$student->image) }}"
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

	                <strong>

	                    {{ $student->admission_no }}

	                </strong>

	            </td>

	            <td>

	                {{ $student->roll_no ?? '-' }}

	            </td>

	            <td>

	                <strong>

	                    {{ $student->name }}

	                </strong>

	                <br>

	                <small class="text-muted">

	                    {{ $student->gender }}

	                </small>

	            </td>

	            <td>

	                {{ $student->classMaster->name ?? '-' }}

	            </td>

	            <td>

	                {{ $student->section->name ?? '-' }}

	            </td>

	            <td>

	                {{ $student->department->name ?? '-' }}

	            </td>

	            <td>

	                {{ $student->student_mobile ?? '-' }}

	            </td>

	            <td>

	                {{ $student->father_mobile ?? '-' }}

	            </td>

	            <td>

	                @if($student->transport_allotted)

	                    <span class="badge badge-success">

	                        YES

	                    </span>

	                    <br>

	                    <small>

	                        {{ $student->bus_number }}

	                    </small>

	                @else

	                    <span class="badge badge-secondary">

	                        NO

	                    </span>

	                @endif

	            </td>

	            <td>

	                @if($student->status)

	                    <span class="badge badge-success">

	                        Active

	                    </span>

	                @else

	                    <span class="badge badge-danger">

	                        Inactive

	                    </span>

	                @endif

	            </td>

	            <td>

                        <a href="{{ route('students.show',$student->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ route('students.edit',$student->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <a href="{{ route('students.pdf',$student->id) }}"
                           class="btn btn-danger btn-sm">

                            <i class="fas fa-file-pdf"></i>

                        </a>

                        <form
                            action="{{ route('students.status',$student->id) }}"
                            method="POST"
                            style="display:inline;">

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-sm {{ $student->status ? 'btn-success' : 'btn-secondary' }}"
                                onclick="return confirm('Change student status?')">

                                @if($student->status)

                                    <i class="fas fa-toggle-on"></i>

                                @else

                                    <i class="fas fa-toggle-off"></i>

                                @endif

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="13"
                        class="text-center text-muted">

                        <i class="fas fa-info-circle"></i>

                        No Students Found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        </div>

        <div class="mt-3">

            {{ $students->links() }}

        </div>

    </div>

</div>

@endsection