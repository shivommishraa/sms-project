<!DOCTYPE html>
<html>
<head>

<title>
Teachers List
</title>

<style>

body{
    font-family: DejaVu Sans;
    font-size:12px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th,
table td{

    border:1px solid #000;

    padding:6px;
}

</style>

</head>
<body>

<h2>

Teachers List

</h2>

<table>

<thead>

<tr>

    <th>ID</th>

    <th>Name</th>

    <th>Department</th>

    <th>Designation</th>

    <th>Mobile</th>

    <th>Status</th>

</tr>

</thead>

<tbody>

@foreach($teachers as $teacher)

<tr>

    <td>

        {{ $teacher->employee_id }}

    </td>

    <td>

        {{ $teacher->name }}

    </td>

    <td>

        {{ $teacher->department->name ?? '' }}

    </td>

    <td>

        {{ $teacher->designation->name ?? '' }}

    </td>

    <td>

        {{ $teacher->mobile }}

    </td>

    <td>

        {{ $teacher->employment_status }}

    </td>

</tr>

@endforeach

</tbody>

</table>

</body>
</html>