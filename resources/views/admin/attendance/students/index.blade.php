@extends('adminlte::page')

@section('title','Student Attendance')


@section('content')


<div class="card">


    <div class="card-header">


        <h4 class="d-inline">
            Student Attendance
        </h4>


        <div class="float-right">

            <a href="{{ url()->previous() }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Back

            </a>

        </div>


    </div>



    {{-- ==============================
        LOAD STUDENTS FILTER FORM
    =============================== --}}


    <form action="{{ route('attendance.students.load') }}"
          method="GET">


        <div class="card-body">



            {{-- Success Message --}}

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif




            {{-- Error Message --}}

            @if($errors->any())

                <div class="alert alert-danger">


                    <ul class="mb-0">


                        @foreach($errors->all() as $error)


                            <li>
                                {{ $error }}
                            </li>


                        @endforeach


                    </ul>


                </div>


            @endif





            <div class="card card-primary">



                <div class="card-header">


                    <h5 class="mb-0">

                        Attendance Filters

                    </h5>


                </div>




                <div class="card-body">



                    <div class="row">



                        {{-- Academic Session --}}

                        <div class="col-md-3">


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
                                            {{ ($selectedSession ?? request('academic_session_id')) == $session->id ? 'selected' : '' }}>


                                            {{ $session->name }}


                                        </option>



                                    @endforeach



                                </select>


                            </div>


                        </div>





                        {{-- Department --}}

                        <div class="col-md-3">


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
                                            {{ ($selectedDepartment ?? request('department_id')) == $department->id ? 'selected' : '' }}>


                                            {{ $department->name }}


                                        </option>



                                    @endforeach



                                </select>


                            </div>


                        </div>





                        {{-- Class --}}

                        <div class="col-md-3">


                            <div class="form-group">


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
                                            {{ ($selectedClass ?? request('class_master_id')) == $class->id ? 'selected' : '' }}>


                                            {{ $class->name }}


                                        </option>



                                    @endforeach



                                </select>


                            </div>


                        </div>





                        {{-- Section --}}

                        <div class="col-md-3">


                            <div class="form-group">


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
                                            {{ ($selectedSection ?? request('section_id')) == $section->id ? 'selected' : '' }}>


                                            {{ $section->name }}


                                        </option>



                                    @endforeach



                                </select>


                            </div>


                        </div>



                    </div>





                    <div class="row">



                        {{-- Attendance Date --}}

                        <div class="col-md-3">


                            <div class="form-group">


                                <label>
                                    Attendance Date
                                </label>



                                <input
                                    type="date"
                                    name="attendance_date"
                                    class="form-control"
                                    value="{{ $selectedDate ?? request('attendance_date',date('Y-m-d')) }}"
                                    required>


                            </div>


                        </div>





                        <div class="col-md-9 d-flex align-items-end">



                            <button
                                type="submit"
                                class="btn btn-primary">


                                <i class="fas fa-search"></i>

                                Load Students


                            </button>



                        </div>




                    </div>




                </div>



            </div>




        </div>



    </form>
    {{-- ==============================
    SAVE ATTENDANCE FORM
================================ --}}


@if(isset($students) && $students->count())


<form action="{{ route('attendance.students.store') }}"
      method="POST">


    @csrf



    {{-- Hidden Values --}}

    <input type="hidden"
           name="academic_session_id"
           value="{{ $selectedSession }}">


    <input type="hidden"
           name="department_id"
           value="{{ $selectedDepartment }}">


    <input type="hidden"
           name="class_master_id"
           value="{{ $selectedClass }}">


    <input type="hidden"
           name="section_id"
           value="{{ $selectedSection }}">


    <input type="hidden"
           name="attendance_date"
           value="{{ $selectedDate }}">





    <div class="card card-success mt-3">



        <div class="card-header">


            <h5 class="mb-0">

                Student Attendance

            </h5>


        </div>





        <div class="card-body">



            {{-- Bulk Action Buttons --}}


            <div class="mb-3">


                <button type="button"
                        class="btn btn-success btn-sm"
                        id="markAllPresent">


                    <i class="fas fa-check-circle"></i>

                    Mark All Present


                </button>




                <button type="button"
                        class="btn btn-danger btn-sm"
                        id="markAllAbsent">


                    <i class="fas fa-times-circle"></i>

                    Mark All Absent


                </button>



            </div>







            <div class="table-responsive">



                <table class="table table-bordered table-striped table-hover">



                    <thead class="bg-primary text-white">


                    <tr>


                        <th width="50">
                            #
                        </th>


                        <th width="80">
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


                        <th width="150">
                            Status
                        </th>


                        <th>
                            Remarks
                        </th>


                    </tr>


                    </thead>




                    <tbody>




                    @foreach($students as $student)



                    @php

                        $status = $attendance[$student->id] ?? 'Present';

                    @endphp




                    <tr>



                        <td>

                            {{ $loop->iteration }}

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

                            {{ $student->admission_no }}

                        </td>





                        <td>

                            {{ $student->roll_no }}

                        </td>





                        <td>


                            <strong>

                                {{ $student->name }}

                            </strong>


                        </td>






                        <td>



                            <select
                                name="attendance[{{ $student->id }}]"
                                class="form-control attendance-status">


                                @foreach([
                                    'Present',
                                    'Absent',
                                    'Late',
                                    'Leave',
                                    'Half Day'
                                ] as $option)



                                    <option value="{{ $option }}"
                                        {{ $status == $option ? 'selected' : '' }}>


                                        {{ $option }}


                                    </option>



                                @endforeach



                            </select>



                        </td>







                        <td>



                            <input
                                type="text"
                                class="form-control"
                                name="remarks[{{ $student->id }}]"
                                value="{{ $remarks[$student->id] ?? '' }}"
                                placeholder="Remarks">


                        </td>





                    </tr>



                    @endforeach




                    </tbody>



                </table>



            </div>







            <div class="mt-3">


                <button type="submit"
                        class="btn btn-primary">


                    <i class="fas fa-save"></i>

                    Save Attendance


                </button>



            </div>





        </div>



    </div>





</form>




@elseif(isset($students))



<div class="alert alert-warning mt-3">


    No students found for selected filters.


</div>



@endif






</div>


@endsection







@section('js')


<script>


$(document).ready(function(){



    /*
    |--------------------------------------------------------------------------
    | Change Dropdown Color
    |--------------------------------------------------------------------------
    */


    function changeColor(select){


        select.removeClass(
            'bg-success bg-danger bg-warning bg-info bg-secondary text-white'
        );



        switch(select.val()){



            case 'Present':

                select.addClass(
                    'bg-success text-white'
                );

                break;




            case 'Absent':

                select.addClass(
                    'bg-danger text-white'
                );

                break;




            case 'Late':

                select.addClass(
                    'bg-warning'
                );

                break;




            case 'Leave':

                select.addClass(
                    'bg-info text-white'
                );

                break;




            case 'Half Day':

                select.addClass(
                    'bg-secondary text-white'
                );

                break;



        }


    }







    /*
    |--------------------------------------------------------------------------
    | Initial Dropdown Color
    |--------------------------------------------------------------------------
    */


    $('.attendance-status').each(function(){


        changeColor($(this));


    });








    /*
    |--------------------------------------------------------------------------
    | On Change
    |--------------------------------------------------------------------------
    */


    $('.attendance-status').change(function(){


        changeColor($(this));


    });









    /*
    |--------------------------------------------------------------------------
    | Mark All Present
    |--------------------------------------------------------------------------
    */


    $('#markAllPresent').click(function(){


        $('.attendance-status')
            .val('Present')
            .trigger('change');


    });








    /*
    |--------------------------------------------------------------------------
    | Mark All Absent
    |--------------------------------------------------------------------------
    */


    $('#markAllAbsent').click(function(){


        $('.attendance-status')
            .val('Absent')
            .trigger('change');


    });



});



</script>


@endsection