@extends('adminlte::page')

@section('title','Student Attendance Report')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">

            Student Attendance Report

        </h4>

        <div class="float-right">

            <a href="{{ route('attendance.students.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

    <div class="card-body">

        <form method="GET"
              action="{{ route('attendance.students.report') }}">

            <div class="card card-primary">

                <div class="card-header">

                    <h5 class="mb-0">

                        Search Filters

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-3">

                            <label>

                                Academic Session

                            </label>

                            <select
                                name="academic_session_id"
                                class="form-control"
                                required>

                                <option value="">

                                    Select Session

                                </option>

                                @foreach($sessions as $session)

                                    <option
                                        value="{{ $session->id }}"
                                        {{ request('academic_session_id')==$session->id ? 'selected':'' }}>

                                        {{ $session->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>
                        @if(request()->filled('from_date'))

					<div class="mb-3">

					    <a
					        href="{{ route('attendance.students.report.pdf',request()->query()) }}"
					        class="btn btn-danger">

					        <i class="fas fa-file-pdf"></i>

					        Export PDF

					    </a>

					    <a
					        href="{{ route('attendance.students.report.excel',request()->query()) }}"
					        class="btn btn-success">

					        <i class="fas fa-file-excel"></i>

					        Export Excel

					    </a>

					    <button
					        onclick="window.print()"
					        class="btn btn-primary">

					        <i class="fas fa-print"></i>

					        Print

					    </button>

					</div>

					@endif

                        <div class="col-md-3">

                            <label>

                                Department

                            </label>

                            <select
                                name="department_id"
                                class="form-control"
                                required>

                                <option value="">

                                    Select Department

                                </option>

                                @foreach($departments as $department)

                                    <option
                                        value="{{ $department->id }}"
                                        {{ request('department_id')==$department->id ? 'selected':'' }}>

                                        {{ $department->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-3">

                            <label>

                                Class

                            </label>

                            <select
                                name="class_master_id"
                                class="form-control"
                                required>

                                <option value="">

                                    Select Class

                                </option>

                                @foreach($classes as $class)

                                    <option
                                        value="{{ $class->id }}"
                                        {{ request('class_master_id')==$class->id ? 'selected':'' }}>

                                        {{ $class->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-3">

                            <label>

                                Section

                            </label>

                            <select
                                name="section_id"
                                class="form-control"
                                required>

                                <option value="">

                                    Select Section

                                </option>

                                @foreach($sections as $section)

                                    <option
                                        value="{{ $section->id }}"
                                        {{ request('section_id')==$section->id ? 'selected':'' }}>

                                        {{ $section->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-md-3">

                            <label>

                                From Date

                            </label>

                            <input
                                type="date"
                                name="from_date"
                                value="{{ request('from_date') }}"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-3">

                            <label>

                                To Date

                            </label>

                            <input
                                type="date"
                                name="to_date"
                                value="{{ request('to_date') }}"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-6 d-flex align-items-end">

                            <button
                                class="btn btn-primary">

                                <i class="fas fa-search"></i>

                                Search Report

                            </button>

                            <a href="{{ route('attendance.students.report') }}"
                               class="btn btn-secondary ml-2">

                                Reset

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </form>
        @if($attendance->count())

@php

$present = $attendance->where('status','Present')->count();

$absent = $attendance->where('status','Absent')->count();

$late = $attendance->where('status','Late')->count();

$leave = $attendance->where('status','Leave')->count();

$halfday = $attendance->where('status','Half Day')->count();

@endphp

<div class="row mt-4">

    <div class="col-md-2">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $present }}</h3>

                <p>Present</p>

            </div>

            <div class="icon">

                <i class="fas fa-check-circle"></i>

            </div>

        </div>

    </div>

    <div class="col-md-2">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>{{ $absent }}</h3>

                <p>Absent</p>

            </div>

            <div class="icon">

                <i class="fas fa-times-circle"></i>

            </div>

        </div>

    </div>

    <div class="col-md-2">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>{{ $late }}</h3>

                <p>Late</p>

            </div>

            <div class="icon">

                <i class="fas fa-clock"></i>

            </div>

        </div>

    </div>

    <div class="col-md-2">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $leave }}</h3>

                <p>Leave</p>

            </div>

            <div class="icon">

                <i class="fas fa-user-minus"></i>

            </div>

        </div>

    </div>

    <div class="col-md-2">

        <div class="small-box bg-secondary">

            <div class="inner">

                <h3>{{ $halfday }}</h3>

                <p>Half Day</p>

            </div>

            <div class="icon">

                <i class="fas fa-adjust"></i>

            </div>

        </div>

    </div>

    <div class="col-md-2">

        <div class="small-box bg-primary">

            <div class="inner">

                <h3>{{ $attendance->count() }}</h3>

                <p>Total Records</p>

            </div>

            <div class="icon">

                <i class="fas fa-users"></i>

            </div>

        </div>

    </div>

</div>

<div class="card card-primary">

    <div class="card-header">

        <h5 class="mb-0">

            Attendance Report

        </h5>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Date</th>

                        <th>Photo</th>

                        <th>Admission No</th>

                        <th>Roll No</th>

                        <th>Student Name</th>

                        <th>Department</th>

                        <th>Class</th>

                        <th>Section</th>

                        <th>Status</th>

                        <th>Remarks</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($attendance as $record)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ \Carbon\Carbon::parse($record->attendance_date)->format('d M Y') }}</td>

                    <td>

                        @if($record->student && $record->student->image)

                            <img
                                src="{{ asset('uploads/students/'.$record->student->image) }}"
                                width="45"
                                class="img-thumbnail">

                        @else

                            <img
                                src="{{ asset('images/no-image.png') }}"
                                width="45"
                                class="img-thumbnail">

                        @endif

                    </td>

                    <td>{{ $record->student->admission_no ?? '-' }}</td>

                    <td>{{ $record->student->roll_no ?? '-' }}</td>

                    <td>{{ $record->student->name ?? '-' }}</td>

                    <td>{{ $record->department->name ?? '-' }}</td>

                    <td>{{ $record->classMaster->name ?? '-' }}</td>

                    <td>{{ $record->section->name ?? '-' }}</td>

                    <td>

                        @switch($record->status)

                            @case('Present')

                                <span class="badge badge-success">Present</span>

                                @break

                            @case('Absent')

                                <span class="badge badge-danger">Absent</span>

                                @break

                            @case('Late')

                                <span class="badge badge-warning">Late</span>

                                @break

                            @case('Leave')

                                <span class="badge badge-info">Leave</span>

                                @break

                            @default

                                <span class="badge badge-secondary">Half Day</span>

                        @endswitch

                    </td>

                    <td>{{ $record->remarks }}</td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@else

<div class="alert alert-info mt-3">

    No attendance records found.

</div>

@endif

</div>

</div>

@endsection