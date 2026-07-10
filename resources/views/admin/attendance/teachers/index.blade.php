@extends('adminlte::page')

@section('title', 'Teacher Attendance')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">

            Teacher Attendance

        </h4>

        <div class="float-right">

            <a href="{{ url()->previous() }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form
            method="GET"
            action="{{ route('attendance.teachers.load') }}">

            <div class="card card-primary">

                <div class="card-header">

                    <h5 class="mb-0">

                        Attendance Filter

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

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
                                            {{ (old('academic_session_id',$academic_session_id ?? '')==$session->id)?'selected':'' }}>

                                            {{ $session->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

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
                                            {{ (old('department_id',$department_id ?? '')==$department->id)?'selected':'' }}>

                                            {{ $department->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Attendance Date

                                </label>

                                <input
                                    type="date"
                                    name="attendance_date"
                                    value="{{ old('attendance_date',$attendance_date ?? date('Y-m-d')) }}"
                                    class="form-control"
                                    required>

                            </div>

                        </div>

                    </div>

                    <button
                        class="btn btn-primary">

                        <i class="fas fa-search"></i>

                        Load Teachers

                    </button>

                </div>

            </div>

        </form>
       @if(isset($teachers) && $teachers->count())

<form
    method="POST"
    action="{{ route('attendance.teachers.store') }}">

    @csrf

    <input
        type="hidden"
        name="attendance_date"
        value="{{ $attendance_date }}">

    <div class="card card-success mt-3">

        <div class="card-header">

            <h5 class="mb-0">

                Teacher Attendance

            </h5>

        </div>

        <div class="card-body">

            <div class="mb-3">

                <button
                    type="button"
                    class="btn btn-success btn-sm"
                    id="markAllPresent">

                    <i class="fas fa-check-circle"></i>

                    Mark All Present

                </button>

                <button
                    type="button"
                    class="btn btn-danger btn-sm"
                    id="markAllAbsent">

                    <i class="fas fa-times-circle"></i>

                    Mark All Absent

                </button>

            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Photo</th>

                            <th>Employee ID</th>

                            <th>Teacher Name</th>

                            <th>Designation</th>

                            <th width="180">

                                Attendance

                            </th>

                            <th>

                                Remarks

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($teachers as $teacher)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

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

                                {{ $teacher->designation->name ?? '-' }}

                            </td>

                            <td>

                                <select
                                    name="attendance[{{ $teacher->id }}]"
                                    class="form-control attendance-status">

                                    <option
                                        value="Present"
                                        {{ (($attendance[$teacher->id] ?? '')=='Present') ? 'selected' : '' }}>

                                        Present

                                    </option>

                                    <option
                                        value="Absent"
                                        {{ (($attendance[$teacher->id] ?? '')=='Absent') ? 'selected' : '' }}>

                                        Absent

                                    </option>

                                    <option
                                        value="Late"
                                        {{ (($attendance[$teacher->id] ?? '')=='Late') ? 'selected' : '' }}>

                                        Late

                                    </option>

                                    <option
                                        value="Leave"
                                        {{ (($attendance[$teacher->id] ?? '')=='Leave') ? 'selected' : '' }}>

                                        Leave

                                    </option>

                                    <option
                                        value="Half Day"
                                        {{ (($attendance[$teacher->id] ?? '')=='Half Day') ? 'selected' : '' }}>

                                        Half Day

                                    </option>

                                </select>

                            </td>

                            <td>

                                <input
                                    type="text"
                                    name="remarks[{{ $teacher->id }}]"
                                    value="{{ $remarks[$teacher->id] ?? '' }}"
                                    class="form-control"
                                    placeholder="Remarks">

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

            <button
                type="submit"
                class="btn btn-primary mt-3">

                <i class="fas fa-save"></i>

                Save Attendance

            </button>

        </div>

    </div>

</form>

@endif

</div>

</div>

@endsection
@section('js')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const attendanceDropdowns =
        document.querySelectorAll('.attendance-status');

    function applyColor(select) {

        select.classList.remove(

            'bg-success',

            'bg-danger',

            'bg-warning',

            'bg-info',

            'bg-secondary',

            'text-white'

        );

        switch(select.value){

            case 'Present':

                select.classList.add(
                    'bg-success',
                    'text-white'
                );

                break;

            case 'Absent':

                select.classList.add(
                    'bg-danger',
                    'text-white'
                );

                break;

            case 'Late':

                select.classList.add(
                    'bg-warning'
                );

                break;

            case 'Leave':

                select.classList.add(
                    'bg-info',
                    'text-white'
                );

                break;

            case 'Half Day':

                select.classList.add(
                    'bg-secondary',
                    'text-white'
                );

                break;

        }

    }

    attendanceDropdowns.forEach(function(select){

        applyColor(select);

        select.addEventListener('change', function(){

            applyColor(this);

        });

    });

    document
        .getElementById('markAllPresent')
        .addEventListener('click', function(){

            attendanceDropdowns.forEach(function(select){

                select.value='Present';

                applyColor(select);

            });

        });

    document
        .getElementById('markAllAbsent')
        .addEventListener('click', function(){

            attendanceDropdowns.forEach(function(select){

                select.value='Absent';

                applyColor(select);

            });

        });

});

</script>

@endsection