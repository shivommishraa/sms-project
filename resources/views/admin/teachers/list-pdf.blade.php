```php
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>

        Teachers List Report

    </title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:11px;
            color:#333;
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

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#666;
            color:#fff;
            border:1px solid #444;
            padding:8px;
            text-align:center;
            font-size:11px;
        }

        table td{
            border:1px solid #ccc;
            padding:7px;
            font-size:10px;
        }

        .text-center{
            text-align:center;
        }

        .footer{
            margin-top:25px;
            text-align:center;
            font-size:10px;
            color:#666;
        }

        .summary{
            margin-bottom:15px;
            font-size:12px;
            font-weight:bold;
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

                        TEACHERS MASTER REPORT

                    </div>

                </td>

            </tr>

        </table>

    </div>

    <div class="summary">

        Total Teachers :
        {{ $teachers->count() }}

    </div>

    <table>

        <thead>

            <tr>

                <th width="5%">

                    Sr.

                </th>

                <th width="10%">

                    Employee ID

                </th>

                <th width="18%">

                    Teacher Name

                </th>

                <th width="12%">

                    Department

                </th>

                <th width="12%">

                    Designation

                </th>

                <th width="10%">

                    Mobile

                </th>

                <th width="15%">

                    Email

                </th>

                <th width="8%">

                    Gender

                </th>

                <th width="10%">

                    Employment

                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($teachers as $teacher)

                <tr>

                    <td class="text-center">

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        {{ $teacher->employee_id }}

                    </td>

                    <td>

                        {{ $teacher->name }}

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

                        {{ $teacher->email ?? '-' }}

                    </td>

                    <td class="text-center">

                        {{ $teacher->gender ?? '-' }}

                    </td>

                    <td class="text-center">

                        {{ $teacher->employment_status }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="9"
                        class="text-center">

                        No Teachers Found

                    </td>

                </tr>

            @endforelse

        </tbody>

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
