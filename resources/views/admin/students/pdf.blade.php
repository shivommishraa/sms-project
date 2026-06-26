<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>

        Student Profile

    </title>

    <style>

        @page{
            margin:25px;
        }

        body{

            font-family: DejaVu Sans;

            font-size:12px;

            color:#333;

            line-height:1.5;
        }

        table{

            width:100%;

            border-collapse:collapse;
        }

        .header-table{

            border-bottom:2px solid #777;

            padding-bottom:10px;

            margin-bottom:20px;
        }

        .logo{

            width:70px;

            height:70px;
        }

        .college-title{

            font-size:24px;

            font-weight:bold;

            color:#444;
        }

        .college-sub{

            font-size:12px;

            color:#666;
        }

        .profile-photo{

            width:120px;

            height:140px;

            border:1px solid #999;

            padding:3px;
        }

        .section-title{

            background:#e8e8e8;

            color:#222;

            font-size:14px;

            font-weight:bold;

            padding:8px;

            margin-top:18px;

            border:1px solid #cfcfcf;
        }

        .info-table{

            margin-top:0;

            margin-bottom:10px;
        }

        .info-table td{

            border:1px solid #d8d8d8;

            padding:8px;
        }

        .label{

            width:30%;

            background:#f5f5f5;

            font-weight:bold;
        }

    </style>

</head>

<body>

<table class="header-table">

    <tr>

        <td width="12%"
            align="left">

            {{-- Dummy Logo --}}
            <img
                src="{{ public_path('images/logo.png') }}"
                class="logo">

        </td>

        <td width="68%"
            align="center">

            <div class="college-title">

                ABC INTERNATIONAL SCHOOL

            </div>

            <div class="college-sub">

                123 Education Street, New Delhi - 110001

            </div>

            <div class="college-sub">

                Phone : +91 9876543210 |
                Email : info@abcschool.com

            </div>

            <div class="college-sub">

                Student Profile Report

            </div>

        </td>

        <td width="20%"
            align="right">

            @if($student->image)

                <img
                    src="{{ public_path('uploads/students/'.$student->image) }}"
                    class="profile-photo">

            @else

                <img
                    src="{{ public_path('images/no-image.png') }}"
                    class="profile-photo">

            @endif

        </td>

    </tr>

</table>





<div class="section-title">

    Basic Information

</div>

<table class="info-table">

    <tr>

        <td class="label">

            Admission No.

        </td>

        <td>

            {{ $student->admission_no }}

        </td>

        <td class="label">

            Roll No.

        </td>

        <td>

            {{ $student->roll_no }}

        </td>

    </tr>

    <tr>

        <td class="label">

            Student Name

        </td>

        <td>

            {{ $student->name }}

        </td>

        <td class="label">

            Gender

        </td>

        <td>

            {{ $student->gender }}

        </td>

    </tr>

    <tr>

        <td class="label">

            Date Of Birth

        </td>

        <td>

            {{ optional($student->dob)->format('d-m-Y') }}

        </td>

        <td class="label">

            Blood Group

        </td>

        <td>

            {{ $student->blood_group ?: '-' }}

        </td>

    </tr>

    <tr>

        <td class="label">

            Category

        </td>

        <td>

            {{ $student->category ?: '-' }}

        </td>

        <td class="label">

            Religion

        </td>

        <td>

            {{ $student->religion ?: '-' }}

        </td>

    </tr>

    <tr>

        <td class="label">

            Aadhaar No.

        </td>

        <td>

            {{ $student->aadhaar_no ?: '-' }}

        </td>

        <td class="label">

            Status

        </td>

        <td>

            {{ $student->status ? 'Active' : 'Inactive' }}

        </td>

    </tr>

</table>
<div class="section-title">

    Academic Information

</div>

<table class="info-table">

    <tr>

        <td class="label">

            Academic Session

        </td>

        <td>

            {{ $student->academicSession->name ?? '-' }}

        </td>

        <td class="label">

            Admission Date

        </td>

        <td>

            {{ optional($student->admission_date)->format('d-m-Y') }}

        </td>

    </tr>

    <tr>

        <td class="label">

            Class

        </td>

        <td>

            {{ $student->classMaster->name ?? '-' }}

        </td>

        <td class="label">

            Section

        </td>

        <td>

            {{ $student->section->name ?? '-' }}

        </td>

    </tr>

</table>





<div class="section-title">

    Parent Information

</div>

<table class="info-table">

    <tr>

        <td class="label">

            Father Name

        </td>

        <td>

            {{ $student->father_name ?: '-' }}

        </td>

        <td class="label">

            Father Mobile

        </td>

        <td>

            {{ $student->father_mobile ?: '-' }}

        </td>

    </tr>

    <tr>

        <td class="label">

            Father Occupation

        </td>

        <td>

            {{ $student->father_occupation ?: '-' }}

        </td>

        <td class="label">

            Mother Name

        </td>

        <td>

            {{ $student->mother_name ?: '-' }}

        </td>

    </tr>

    <tr>

        <td class="label">

            Mother Mobile

        </td>

        <td>

            {{ $student->mother_mobile ?: '-' }}

        </td>

        <td class="label">

            Mother Occupation

        </td>

        <td>

            {{ $student->mother_occupation ?: '-' }}

        </td>

    </tr>

</table>





<div class="section-title">

    Guardian Information

</div>

<table class="info-table">

    <tr>

        <td class="label">

            Guardian Name

        </td>

        <td>

            {{ $student->guardian_name ?: '-' }}

        </td>

        <td class="label">

            Guardian Mobile

        </td>

        <td>

            {{ $student->guardian_mobile ?: '-' }}

        </td>

    </tr>

    <tr>

        <td class="label">

            Guardian Relation

        </td>

        <td>

            {{ $student->guardian_relation ?: '-' }}

        </td>

        <td class="label">

            Emergency Contact

        </td>

        <td>

            {{ $student->emergency_contact ?: '-' }}

        </td>

    </tr>

</table>





<div class="section-title">

    Contact Information

</div>

<table class="info-table">

    <tr>

        <td class="label">

            Student Mobile

        </td>

        <td>

            {{ $student->student_mobile ?: '-' }}

        </td>

        <td class="label">

            Email Address

        </td>

        <td>

            {{ $student->email ?: '-' }}

        </td>

    </tr>

</table>
<div class="section-title">

    Address Information

</div>

<table class="info-table">

    <tr>

        <td class="label">

            Address

        </td>

        <td colspan="3">

            {{ $student->address ?: '-' }}

        </td>

    </tr>

    <tr>

        <td class="label">

            City

        </td>

        <td>

            {{ $student->city ?: '-' }}

        </td>

        <td class="label">

            State

        </td>

        <td>

            {{ $student->state ?: '-' }}

        </td>

    </tr>

    <tr>

        <td class="label">

            Pincode

        </td>

        <td>

            {{ $student->pincode ?: '-' }}

        </td>

        <td class="label">

            Previous School

        </td>

        <td>

            {{ $student->previous_school ?: '-' }}

        </td>

    </tr>

</table>





<div class="section-title">

    Transport Information

</div>

<table class="info-table">

    <tr>

        <td class="label">

            Transport Facility

        </td>

        <td>

            {{ $student->transport_allotted ? 'YES' : 'NO' }}

        </td>

        <td class="label">

            Bus Number

        </td>

        <td>

            @if($student->transport_allotted)

                {{ $student->bus_number ?: '-' }}

            @else

                -

            @endif

        </td>

    </tr>

</table>





<div class="section-title">

    Additional Information

</div>

<table class="info-table">

    <tr>

        <td class="label">

            Description

        </td>

    </tr>

    <tr>

        <td>

            @if($student->description)

                {!! nl2br(e($student->description)) !!}

            @else

                No Description Available.

            @endif

        </td>

    </tr>

</table>





<br><br>

<hr>

<table style="border:none;">

    <tr>

        <td style="border:none;font-size:11px;color:#666;">

            <strong>

                Generated On :

            </strong>

            {{ now()->format('d-m-Y h:i A') }}

        </td>

        <td
            align="right"
            style="border:none;font-size:11px;color:#666;">

            <strong>

                Powered By School ERP Management System

            </strong>

        </td>

    </tr>

</table>

</body>

</html>



