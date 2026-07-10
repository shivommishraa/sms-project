<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>

Attendance Report

</title>

<style>

body{

    font-family: DejaVu Sans,sans-serif;

    font-size:11px;

    color:#333;

}

table{

    width:100%;

    border-collapse:collapse;

}

th,td{

    border:1px solid #999;

    padding:6px;

    text-align:left;

}

th{

    background:#f2f2f2;

}

.header{

    text-align:center;

    margin-bottom:20px;

}

.logo{

    width:80px;

    height:80px;

}

.title{

    font-size:22px;

    font-weight:bold;

}

.subtitle{

    font-size:13px;

}

.report-title{

    margin-top:15px;

    font-size:18px;

    font-weight:bold;

}

.summary{

    margin-top:20px;

    margin-bottom:20px;

}

.summary td{

    border:1px solid #444;

    text-align:center;

    font-weight:bold;

}

.present{

    background:#28a745;

    color:white;

}

.absent{

    background:#dc3545;

    color:white;

}

.late{

    background:#ffc107;

}

.leave{

    background:#17a2b8;

    color:white;

}

.half{

    background:#6c757d;

    color:white;

}

.footer{

    margin-top:30px;

    text-align:right;

    font-size:10px;

}

</style>

</head>

<body>

<div class="header">

@if(file_exists(public_path('images/logo.png')))

<img

src="{{ public_path('images/logo.png') }}"

class="logo">

@endif

<div class="title">

{{ config('app.name') }}

</div>

<div class="subtitle">

School Management System

</div>

<div class="report-title">

Student Attendance Report

</div>

</div>
@php

$present = $attendance->where('status','Present')->count();

$absent = $attendance->where('status','Absent')->count();

$late = $attendance->where('status','Late')->count();

$leave = $attendance->where('status','Leave')->count();

$halfday = $attendance->where('status','Half Day')->count();

$total = $attendance->count();

$percentage = $total > 0
    ? round(($present / $total) * 100,2)
    : 0;

@endphp

<table style="margin-bottom:20px;">

    <tr>

        <td width="25%">

            <strong>Academic Session</strong>

        </td>

        <td width="25%">

            {{ $session->name ?? '-' }}

        </td>

        <td width="25%">

            <strong>Department</strong>

        </td>

        <td width="25%">

            {{ $department->name ?? '-' }}

        </td>

    </tr>

    <tr>

        <td>

            <strong>Class</strong>

        </td>

        <td>

            {{ $class->name ?? '-' }}

        </td>

        <td>

            <strong>Section</strong>

        </td>

        <td>

            {{ $section->name ?? '-' }}

        </td>

    </tr>

    <tr>

        <td>

            <strong>From Date</strong>

        </td>

        <td>

            {{ \Carbon\Carbon::parse($fromDate)->format('d M Y') }}

        </td>

        <td>

            <strong>To Date</strong>

        </td>

        <td>

            {{ \Carbon\Carbon::parse($toDate)->format('d M Y') }}

        </td>

    </tr>

</table>

<table class="summary">

    <tr>

        <td class="present">

            Present

            <br>

            {{ $present }}

        </td>

        <td class="absent">

            Absent

            <br>

            {{ $absent }}

        </td>

        <td class="late">

            Late

            <br>

            {{ $late }}

        </td>

        <td class="leave">

            Leave

            <br>

            {{ $leave }}

        </td>

        <td class="half">

            Half Day

            <br>

            {{ $halfday }}

        </td>

        <td>

            <strong>

                Total

            </strong>

            <br>

            {{ $total }}

        </td>

        <td>

            <strong>

                Attendance %

            </strong>

            <br>

            {{ $percentage }}%

        </td>

    </tr>

</table>
<table>

    <thead>

        <tr>

            <th width="5%">

                Sr.

            </th>

            <th width="12%">

                Date

            </th>

            <th width="12%">

                Admission No

            </th>

            <th width="10%">

                Roll No

            </th>

            <th width="28%">

                Student Name

            </th>

            <th width="13%">

                Department

            </th>

            <th width="10%">

                Status

            </th>

            <th width="10%">

                Remarks

            </th>

        </tr>

    </thead>

    <tbody>

    @forelse($attendance as $record)

        <tr>

            <td>

                {{ $loop->iteration }}

            </td>

            <td>

                {{ \Carbon\Carbon::parse($record->attendance_date)->format('d-m-Y') }}

            </td>

            <td>

                {{ $record->student->admission_no ?? '-' }}

            </td>

            <td>

                {{ $record->student->roll_no ?? '-' }}

            </td>

            <td>

                {{ $record->student->name ?? '-' }}

            </td>

            <td>

                {{ $record->department->name ?? '-' }}

            </td>

            <td>

                @if($record->status=='Present')

                    <span style="color:green;font-weight:bold;">

                        PRESENT

                    </span>

                @elseif($record->status=='Absent')

                    <span style="color:red;font-weight:bold;">

                        ABSENT

                    </span>

                @elseif($record->status=='Late')

                    <span style="color:#d4a000;font-weight:bold;">

                        LATE

                    </span>

                @elseif($record->status=='Leave')

                    <span style="color:#0c7cd5;font-weight:bold;">

                        LEAVE

                    </span>

                @else

                    <span style="color:#555;font-weight:bold;">

                        HALF DAY

                    </span>

                @endif

            </td>

            <td>

                {{ $record->remarks ?? '-' }}

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="8" style="text-align:center;">

                No Attendance Records Found

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

<br><br>

<table style="border:none;">

    <tr>

        <td style="border:none;">

            <strong>

                Generated By :

            </strong>

            {{ auth()->user()->name ?? 'Administrator' }}

        </td>

        <td style="border:none;text-align:right;">

            <strong>

                Generated On :

            </strong>

            {{ now()->format('d M Y h:i A') }}

        </td>

    </tr>

</table>

<div class="footer">

    This is a computer generated attendance report.

</div>

</body>

</html>