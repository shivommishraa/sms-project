@extends('adminlte::page')

@section('title', 'Add Student')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">

            Add Student

        </h4>

        <div class="float-right">

            <a href="{{ route('students.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

    <div class="card-body">

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

        <form action="{{ route('students.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="card card-primary">

                <div class="card-header">

                    <h5 class="mb-0">

                        Academic Information

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Academic Session
                                    <span class="text-danger">*</span>

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
                                            {{ old('academic_session_id')==$session->id ? 'selected' : '' }}>

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
                                    <span class="text-danger">*</span>

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
                                            {{ old('department_id')==$department->id ? 'selected' : '' }}>

                                            {{ $department->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Class
                                    <span class="text-danger">*</span>

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
                                            {{ old('class_master_id')==$class->id ? 'selected' : '' }}>

                                            {{ $class->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Section
                                    <span class="text-danger">*</span>

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
                                            {{ old('section_id')==$section->id ? 'selected' : '' }}>

                                            {{ $section->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Admission Number

                                </label>

                                <input
                                    type="text"
                                    name="admission_no"
                                    value="{{ old('admission_no') }}"
                                    class="form-control"
                                    readonly
                                    placeholder="Auto Generated">

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Roll Number

                                </label>

                                <input
                                    type="text"
                                    name="roll_no"
                                    value="{{ old('roll_no') }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Admission Date

                                </label>

                                <input
                                    type="date"
                                    name="admission_date"
                                    value="{{ old('admission_date') }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <div class="card card-primary mt-3">

                <div class="card-header">

                    <h5 class="mb-0">

                        Student Personal Information

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Student Name
                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control"
                                    required>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Gender
                                    <span class="text-danger">*</span>

                                </label>

                                <select
                                    name="gender"
                                    class="form-control"
                                    required>

                                    <option value="">

                                        Select Gender

                                    </option>

                                    <option value="Male"
                                        {{ old('gender')=='Male' ? 'selected' : '' }}>

                                        Male

                                    </option>

                                    <option value="Female"
                                        {{ old('gender')=='Female' ? 'selected' : '' }}>

                                        Female

                                    </option>

                                    <option value="Other"
                                        {{ old('gender')=='Other' ? 'selected' : '' }}>

                                        Other

                                    </option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Date Of Birth
                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="date"
                                    name="dob"
                                    value="{{ old('dob') }}"
                                    class="form-control"
                                    required>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Blood Group

                                </label>

                                <select
                                    name="blood_group"
                                    class="form-control">

                                    <option value="">

                                        Select Blood Group

                                    </option>

                                    <option value="A+"
                                        {{ old('blood_group')=='A+' ? 'selected' : '' }}>

                                        A+

                                    </option>

                                    <option value="A-"
                                        {{ old('blood_group')=='A-' ? 'selected' : '' }}>

                                        A-

                                    </option>

                                    <option value="B+"
                                        {{ old('blood_group')=='B+' ? 'selected' : '' }}>

                                        B+

                                    </option>

                                    <option value="B-"
                                        {{ old('blood_group')=='B-' ? 'selected' : '' }}>

                                        B-

                                    </option>

                                    <option value="AB+"
                                        {{ old('blood_group')=='AB+' ? 'selected' : '' }}>

                                        AB+

                                    </option>

                                    <option value="AB-"
                                        {{ old('blood_group')=='AB-' ? 'selected' : '' }}>

                                        AB-

                                    </option>

                                    <option value="O+"
                                        {{ old('blood_group')=='O+' ? 'selected' : '' }}>

                                        O+

                                    </option>

                                    <option value="O-"
                                        {{ old('blood_group')=='O-' ? 'selected' : '' }}>

                                        O-

                                    </option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Category

                                </label>

                                <select
                                    name="category"
                                    class="form-control">

                                    <option value="">

                                        Select Category

                                    </option>

                                    <option value="General"
                                        {{ old('category')=='General' ? 'selected' : '' }}>

                                        General

                                    </option>

                                    <option value="OBC"
                                        {{ old('category')=='OBC' ? 'selected' : '' }}>

                                        OBC

                                    </option>

                                    <option value="SC"
                                        {{ old('category')=='SC' ? 'selected' : '' }}>

                                        SC

                                    </option>

                                    <option value="ST"
                                        {{ old('category')=='ST' ? 'selected' : '' }}>

                                        ST

                                    </option>

                                    <option value="EWS"
                                        {{ old('category')=='EWS' ? 'selected' : '' }}>

                                        EWS

                                    </option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Religion

                                </label>

                                <input
                                    type="text"
                                    name="religion"
                                    value="{{ old('religion') }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>

                                    Aadhaar Number

                                </label>

                                <input
                                    type="text"
                                    name="aadhaar_no"
                                    value="{{ old('aadhaar_no') }}"
                                    class="form-control"
                                    maxlength="12">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>

                                    Student Mobile

                                </label>

                                <input
                                    type="text"
                                    name="student_mobile"
                                    value="{{ old('student_mobile') }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-8">

                            <div class="form-group">

                                <label>

                                    Student Photo

                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    class="form-control"
                                    accept="image/*">

                                <small class="text-muted">

                                    JPG, PNG, JPEG (Max 2MB)

                                </small>

                            </div>

                        </div>

                        <div class="col-md-4 text-center">

                            <label>

                                Photo Preview

                            </label>

                            <br>

                            <img
                                src="{{ asset('images/no-image.png') }}"
                                id="previewImage"
                                class="img-thumbnail"
                                style="width:170px;height:190px;object-fit:cover;">

                        </div>

                    </div>

                </div>

            </div>
            <div class="card card-primary mt-3">

                <div class="card-header">

                    <h5 class="mb-0">

                        Parent / Guardian Information

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Father Name

                                </label>

                                <input
                                    type="text"
                                    name="father_name"
                                    value="{{ old('father_name') }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Father Mobile

                                </label>

                                <input
                                    type="text"
                                    name="father_mobile"
                                    value="{{ old('father_mobile') }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Father Occupation

                                </label>

                                <input
                                    type="text"
                                    name="father_occupation"
                                    value="{{ old('father_occupation') }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Mother Name

                                </label>

                                <input
                                    type="text"
                                    name="mother_name"
                                    value="{{ old('mother_name') }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Mother Mobile

                                </label>

                                <input
                                    type="text"
                                    name="mother_mobile"
                                    value="{{ old('mother_mobile') }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Mother Occupation

                                </label>

                                <input
                                    type="text"
                                    name="mother_occupation"
                                    value="{{ old('mother_occupation') }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Guardian Name

                                </label>

                                <input
                                    type="text"
                                    name="guardian_name"
                                    value="{{ old('guardian_name') }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Guardian Mobile

                                </label>

                                <input
                                    type="text"
                                    name="guardian_mobile"
                                    value="{{ old('guardian_mobile') }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Guardian Relation

                                </label>

                                <input
                                    type="text"
                                    name="guardian_relation"
                                    value="{{ old('guardian_relation') }}"
                                    class="form-control"
                                    placeholder="Uncle, Aunt, Brother etc.">

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <div class="card card-primary mt-3">

                <div class="card-header">

                    <h5 class="mb-0">

                        Contact & Address Information

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>

                                    Email Address

                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>

                                    Emergency Contact

                                </label>

                                <input
                                    type="text"
                                    name="emergency_contact"
                                    value="{{ old('emergency_contact') }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label>

                            Address

                        </label>

                        <textarea
                            name="address"
                            rows="3"
                            class="form-control">{{ old('address') }}</textarea>

                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    City

                                </label>

                                <input
                                    type="text"
                                    name="city"
                                    value="{{ old('city') }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    State

                                </label>

                                <input
                                    type="text"
                                    name="state"
                                    value="{{ old('state') }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Pincode

                                </label>

                                <input
                                    type="text"
                                    name="pincode"
                                    value="{{ old('pincode') }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                </div>

            </div>





            <div class="card card-primary mt-3">

                <div class="card-header">

                    <h5 class="mb-0">

                        Transport Information

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Transport Required

                                </label>

                                <select
                                    name="transport_allotted"
                                    id="transport_allotted"
                                    class="form-control">

                                    <option value="0"
                                        {{ old('transport_allotted')=='0' ? 'selected' : '' }}>

                                        No

                                    </option>

                                    <option value="1"
                                        {{ old('transport_allotted')=='1' ? 'selected' : '' }}>

                                        Yes

                                    </option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-8"
                             id="bus_number_div"
                             style="display:none;">

                            <div class="form-group">

                                <label>

                                    Bus Number

                                </label>

                                <input
                                    type="text"
                                    name="bus_number"
                                    value="{{ old('bus_number') }}"
                                    class="form-control"
                                    placeholder="Example : BUS-01">

                            </div>

                        </div>

                    </div>

                </div>

            </div>





            <div class="card card-primary mt-3">

                <div class="card-header">

                    <h5 class="mb-0">

                        Previous School Information

                    </h5>

                </div>

                <div class="card-body">

                    <div class="form-group">

                        <label>

                            Previous School Name

                        </label>

                        <input
                            type="text"
                            name="previous_school"
                            value="{{ old('previous_school') }}"
                            class="form-control">

                    </div>

                </div>

            </div>





            <div class="card card-primary mt-3">

                <div class="card-header">

                    <h5 class="mb-0">

                        Additional Information

                    </h5>

                </div>

                <div class="card-body">

                    <div class="form-group">

                        <label>

                            Description

                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            class="form-control">{{ old('description') }}</textarea>

                    </div>

                    <div class="row">

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>

                                    Status

                                </label>

                                <select
                                    name="status"
                                    class="form-control">

                                    <option value="1" selected>

                                        Active

                                    </option>

                                    <option value="0">

                                        Inactive

                                    </option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>

                                    Sort Order

                                </label>

                                <input
                                    type="number"
                                    name="sort_order"
                                    value="{{ old('sort_order',0) }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <hr>

                    <button
                        class="btn btn-success">

                        <i class="fas fa-save"></i>

                        Save Student

                    </button>

                    <a href="{{ route('students.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection

@section('js')

<script>

document.getElementById('image').addEventListener('change',function(e){

    const reader=new FileReader();

    reader.onload=function(){

        document.getElementById('previewImage').src=reader.result;

    }

    reader.readAsDataURL(e.target.files[0]);

});

function toggleBus(){

    if(document.getElementById('transport_allotted').value==1){

        document.getElementById('bus_number_div').style.display='block';

    }else{

        document.getElementById('bus_number_div').style.display='none';

    }

}

toggleBus();

document.getElementById('transport_allotted').addEventListener('change',toggleBus);

</script>

@endsection