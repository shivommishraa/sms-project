```php
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Teacher Profile Report</title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
            color:#333;
            margin:0;
            padding:0;
        }

        .header{
            border-bottom:2px solid #666;
            padding-bottom:12px;
            margin-bottom:20px;
        }

        .college-name{
            font-size:22px;
            font-weight:bold;
            color:#222;
            text-transform:uppercase;
        }

        .college-address{
            font-size:11px;
            color:#555;
            margin-top:3px;
        }

        .report-title{
            margin-top:8px;
            font-size:16px;
            font-weight:bold;
            color:#444;
            letter-spacing:1px;
        }

        .section-title{
            background:#666;
            color:#fff;
            padding:8px;
            font-size:14px;
            font-weight:bold;
            margin-top:15px;
            margin-bottom:0;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            background:#f2f2f2;
            border:1px solid #ccc;
            padding:8px;
            text-align:left;
            width:30%;
        }

        td{
            border:1px solid #ccc;
            padding:8px;
        }

        .footer{
            margin-top:30px;
            text-align:center;
            font-size:11px;
            color:#666;
        }

    </style>

</head>

<body>

    <div class="header">

        <table style="border:none;">

            <tr>

                <td
                    style="
                        border:none;
                        width:70px;
                        vertical-align:middle;
                    ">

                    <img
                        src="{{ public_path('images/college-logo.png') }}"
                        style="
                            width:55px;
                            height:55px;
                        ">

                </td>

                <td
                    style="
                        border:none;
                        text-align:center;
                    ">

                    <div class="college-name">

                        ABC COLLEGE OF EDUCATION

                    </div>

                    <div class="college-address">

                        Sitapur Road, Lucknow,
                        Uttar Pradesh - 226021

                    </div>

                    <div class="college-address">

                        Phone :
                        +91-9876543210

                        |

                        Email :
                        info@abccollege.edu.in

                    </div>

                    <div class="report-title">

                        TEACHER PROFILE REPORT

                    </div>

                </td>

            </tr>

        </table>

    </div>

    <div class="section-title">

        Basic Information

    </div>

    <table>

        <tr>

            <th>Employee ID</th>

            <td>{{ $teacher->employee_id }}</td>

        </tr>

        <tr>

            <th>Teacher Name</th>

            <td>{{ $teacher->name }}</td>

        </tr>

        <tr>

            <th>Gender</th>

            <td>{{ $teacher->gender }}</td>

        </tr>

        <tr>

            <th>Date Of Birth</th>

            <td>{{ $teacher->dob }}</td>

        </tr>

        <tr>

            <th>Department</th>

            <td>{{ $teacher->department->name ?? '-' }}</td>

        </tr>

        <tr>

            <th>Designation</th>

            <td>{{ $teacher->designation->name ?? '-' }}</td>

        </tr>

        <tr>

            <th>Academic Session</th>

            <td>{{ $teacher->academicSession->name ?? '-' }}</td>

        </tr>

    </table>

    <div class="section-title">

        Professional Information

    </div>

    <table>

        <tr>

            <th>Qualification</th>

            <td>{{ $teacher->qualification }}</td>

        </tr>

        <tr>

            <th>Experience</th>

            <td>{{ $teacher->experience }}</td>

        </tr>

        <tr>

            <th>Joining Date</th>

            <td>{{ $teacher->joining_date }}</td>

        </tr>

        <tr>

            <th>Service End Date</th>

            <td>{{ $teacher->service_end_date ?? '-' }}</td>

        </tr>

        <tr>

            <th>Employment Status</th>

            <td>{{ $teacher->employment_status }}</td>

        </tr>

        <tr>

            <th>Status</th>

            <td>

                {{ $teacher->status ? 'Active' : 'Inactive' }}

            </td>

        </tr>

    </table>

    <div class="section-title">

        Contact Information

    </div>

    <table>

        <tr>

            <th>Mobile</th>

            <td>{{ $teacher->mobile }}</td>

        </tr>

        <tr>

            <th>Alternate Mobile</th>

            <td>{{ $teacher->alternate_mobile ?? '-' }}</td>

        </tr>

        <tr>

            <th>Email</th>

            <td>{{ $teacher->email ?? '-' }}</td>

        </tr>

        <tr>

            <th>Address</th>

            <td>{{ $teacher->address ?? '-' }}</td>

        </tr>

    </table>

    <div class="section-title">

        Assigned Subjects

    </div>

    <table>

        <tr>

            <td>

                @forelse($teacher->subjects as $subject)

                    {{ $subject->name }}

                    @if(!$loop->last)

                        ,

                    @endif

                @empty

                    No Subject Assigned

                @endforelse

            </td>

        </tr>

    </table>

    <div class="section-title">

        Class Teacher Assignment

    </div>

    <table>

        <tr>

            <th>Class</th>

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

            <th>Section</th>

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

    <div class="section-title">

        Short Bio

    </div>

    <table>

        <tr>

            <td>

                {{ $teacher->short_bio ?? '-' }}

            </td>

        </tr>

    </table>

    <div class="section-title">

        Description

    </div>

    <table>

        <tr>

            <td>

                {{ $teacher->description ?? '-' }}

            </td>

        </tr>

    </table>

    <div class="footer">

        --------------------------------------------------

        <br><br>

        Generated On :
        {{ now()->format('d-m-Y h:i A') }}

        <br>

        ABC College Of Education

    </div>

</body>

</html>
```
