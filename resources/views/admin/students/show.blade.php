@extends('adminlte::page')

@section('title','Student Details')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">

            Student Profile

        </h4>

        <div class="float-right">

            <a href="{{ route('students.pdf',$student->id) }}"
               class="btn btn-danger">

                <i class="fas fa-file-pdf"></i>

                Download PDF

            </a>

            <a href="{{ route('students.edit',$student->id) }}"
               class="btn btn-warning">

                <i class="fas fa-edit"></i>

                Edit

            </a>

            <a href="{{ route('students.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3">

                <div class="card">

                    <div class="card-body text-center">

                        @if($student->image)

                            <img
                                src="{{ asset('uploads/students/'.$student->image) }}"
                                class="img-thumbnail mb-3"
                                style="width:220px;height:240px;object-fit:cover;">

                        @else

                            <img
                                src="{{ asset('images/no-image.png') }}"
                                class="img-thumbnail mb-3"
                                style="width:220px;height:240px;object-fit:cover;">

                        @endif

                        <h5>

                            {{ $student->name }}

                        </h5>

                        <p class="text-muted mb-1">

                            {{ $student->admission_no }}

                        </p>

                        <span class="badge badge-primary">

                            Roll No :
                            {{ $student->roll_no }}

                        </span>

                        <br><br>

                        @if($student->status)

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

                <div class="card">

                    <div class="card-header bg-primary">

                        <h5 class="mb-0 text-white">

                            Basic Information

                        </h5>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            <tr>

                                <th width="250">

                                    Admission Number

                                </th>

                                <td>

                                    {{ $student->admission_no }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Roll Number

                                </th>

                                <td>

                                    {{ $student->roll_no }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Student Name

                                </th>

                                <td>

                                    {{ $student->name }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Gender

                                </th>

                                <td>

                                    {{ $student->gender }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Date Of Birth

                                </th>

                                <td>

                                    {{ optional($student->dob)->format('d-m-Y') }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Blood Group

                                </th>

                                <td>

                                    {{ $student->blood_group ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Category

                                </th>

                                <td>

                                    {{ $student->category ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Religion

                                </th>

                                <td>

                                    {{ $student->religion ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Aadhaar Number

                                </th>

                                <td>

                                    {{ $student->aadhaar_no ?: '-' }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>
        <div class="row mt-3">

            <div class="col-md-6">

                <div class="card">

                    <div class="card-header bg-success">

                        <h5 class="mb-0 text-white">

                            Academic Information

                        </h5>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            <tr>

                                <th width="220">

                                    Academic Session

                                </th>

                                <td>

                                    {{ $student->academicSession->name ?? '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Class

                                </th>

                                <td>

                                    {{ $student->classMaster->name ?? '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Section

                                </th>

                                <td>

                                    {{ $student->section->name ?? '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Admission Date

                                </th>

                                <td>

                                    {{ optional($student->admission_date)->format('d-m-Y') }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Sort Order

                                </th>

                                <td>

                                    {{ $student->sort_order }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>





            <div class="col-md-6">

                <div class="card">

                    <div class="card-header bg-info">

                        <h5 class="mb-0 text-white">

                            Parent Information

                        </h5>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            <tr>

                                <th width="220">

                                    Father Name

                                </th>

                                <td>

                                    {{ $student->father_name ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Father Mobile

                                </th>

                                <td>

                                    {{ $student->father_mobile ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Father Occupation

                                </th>

                                <td>

                                    {{ $student->father_occupation ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Mother Name

                                </th>

                                <td>

                                    {{ $student->mother_name ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Mother Mobile

                                </th>

                                <td>

                                    {{ $student->mother_mobile ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Mother Occupation

                                </th>

                                <td>

                                    {{ $student->mother_occupation ?: '-' }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>





        <div class="row mt-3">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header bg-warning">

                        <h5 class="mb-0">

                            Guardian Information

                        </h5>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            <tr>

                                <th width="220">

                                    Guardian Name

                                </th>

                                <td>

                                    {{ $student->guardian_name ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Guardian Mobile

                                </th>

                                <td>

                                    {{ $student->guardian_mobile ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Guardian Relation

                                </th>

                                <td>

                                    {{ $student->guardian_relation ?: '-' }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>
        <div class="row mt-3">

            <div class="col-md-6">

                <div class="card">

                    <div class="card-header bg-secondary">

                        <h5 class="mb-0 text-white">

                            Contact Information

                        </h5>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            <tr>

                                <th width="220">

                                    Student Mobile

                                </th>

                                <td>

                                    {{ $student->student_mobile ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Email Address

                                </th>

                                <td>

                                    {{ $student->email ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Emergency Contact

                                </th>

                                <td>

                                    {{ $student->emergency_contact ?: '-' }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>





            <div class="col-md-6">

                <div class="card">

                    <div class="card-header bg-dark">

                        <h5 class="mb-0 text-white">

                            Address Information

                        </h5>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            <tr>

                                <th width="220">

                                    Address

                                </th>

                                <td>

                                    {{ $student->address ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    City

                                </th>

                                <td>

                                    {{ $student->city ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    State

                                </th>

                                <td>

                                    {{ $student->state ?: '-' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Pincode

                                </th>

                                <td>

                                    {{ $student->pincode ?: '-' }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>





        <div class="row mt-3">

            <div class="col-md-6">

                <div class="card">

                    <div class="card-header bg-primary">

                        <h5 class="mb-0 text-white">

                            Transport Information

                        </h5>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            <tr>

                                <th width="220">

                                    Transport Facility

                                </th>

                                <td>

                                    @if($student->transport_allotted)

                                        <span class="badge badge-success">

                                            Yes

                                        </span>

                                    @else

                                        <span class="badge badge-danger">

                                            No

                                        </span>

                                    @endif

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Bus Number

                                </th>

                                <td>

                                    @if($student->transport_allotted)

                                        {{ $student->bus_number ?: '-' }}

                                    @else

                                        -

                                    @endif

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>





            <div class="col-md-6">

                <div class="card">

                    <div class="card-header bg-success">

                        <h5 class="mb-0 text-white">

                            Previous School Information

                        </h5>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            <tr>

                                <th width="220">

                                    Previous School

                                </th>

                                <td>

                                    {{ $student->previous_school ?: '-' }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>
        <div class="row mt-3">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header bg-info">

                        <h5 class="mb-0 text-white">

                            Description

                        </h5>

                    </div>

                    <div class="card-body">

                        @if($student->description)

                            {!! nl2br(e($student->description)) !!}

                        @else

                            <p class="text-muted mb-0">

                                No description available.

                            </p>

                        @endif

                    </div>

                </div>

            </div>





            <div class="col-md-4">

                <div class="card">

                    <div class="card-header bg-secondary">

                        <h5 class="mb-0 text-white">

                            Student Status

                        </h5>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered mb-0">

                            <tr>

                                <th width="150">

                                    Status

                                </th>

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

                            </tr>

                            <tr>

                                <th>

                                    Created At

                                </th>

                                <td>

                                    {{ optional($student->created_at)->format('d-m-Y h:i A') }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Last Updated

                                </th>

                                <td>

                                    {{ optional($student->updated_at)->format('d-m-Y h:i A') }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
