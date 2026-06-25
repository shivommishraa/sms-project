<!DOCTYPE html>
<html>
<head>

    <title>Teacher Profile</title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:13px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table td{
            border:1px solid #ddd;
            padding:8px;
        }

        h2{
            text-align:center;
        }

    </style>

</head>
<body>

<h2>

    Teacher Profile

</h2>

<table>

<tr>

    <td width="30%">
        Employee ID
    </td>

    <td>
        {{ $teacher->employee_id }}
    </td>

</tr>

<tr>

    <td>
        Name
    </td>

    <td>
        {{ $teacher->name }}
    </td>

</tr>

<tr>

    <td>
        Department
    </td>

    <td>
        {{ $teacher->department->name ?? '' }}
    </td>

</tr>

<tr>

    <td>
        Designation
    </td>

    <td>
        {{ $teacher->designation->name ?? '' }}
    </td>

</tr>

<tr>

    <td>
        Mobile
    </td>

    <td>
        {{ $teacher->mobile }}
    </td>

</tr>

<tr>

    <td>
        Email
    </td>

    <td>
        {{ $teacher->email }}
    </td>

</tr>

<tr>

    <td>
        Qualification
    </td>

    <td>
        {{ $teacher->qualification }}
    </td>

</tr>

<tr>

    <td>
        Experience
    </td>

    <td>
        {{ $teacher->experience }}
    </td>

</tr>

<tr>

    <td>
        Employment Status
    </td>

    <td>
        {{ $teacher->employment_status }}
    </td>

</tr>

<tr>

    <td>
        Subjects
    </td>

    <td>

        @foreach($teacher->subjects as $subject)

            {{ $subject->name }}

            @if(!$loop->last)
                ,
            @endif

        @endforeach

    </td>

</tr>

</table>

</body>
</html>