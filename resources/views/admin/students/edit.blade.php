@extends('adminlte::page')

@section('title','Edit Student')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">

            Edit Student

        </h4>

        <div class="float-right">

            <a href="{{ route('students.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

    <form action="{{ route('students.update',$student->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @method('PUT')

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif





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

                                    Admission Number

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $student->admission_no }}"
                                    readonly>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Roll Number

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $student->roll_no }}"
                                    readonly>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Admission Date

                                </label>

                                <input
                                    type="date"
                                    name="admission_date"
                                    value="{{ old('admission_date',$student->admission_date ? $student->admission_date->format('Y-m-d') : '') }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>





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

                                    @foreach($sessions as $session)

                                        <option
                                            value="{{ $session->id }}"
                                            {{ old('academic_session_id',$student->academic_session_id)==$session->id ? 'selected' : '' }}>

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
                                            {{ old('department_id',$student->department_id)==$department->id ? 'selected' : '' }}>

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

                                </label>

                                <select
                                    name="class_master_id"
                                    class="form-control"
                                    required>

                                    @foreach($classes as $class)

                                        <option
                                            value="{{ $class->id }}"
                                            {{ old('class_master_id',$student->class_master_id)==$class->id ? 'selected' : '' }}>

                                            {{ $class->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>

                                    Section

                                </label>

                                <select
                                    name="section_id"
                                    class="form-control"
                                    required>

                                    @foreach($sections as $section)

                                        <option
                                            value="{{ $section->id }}"
                                            {{ old('section_id',$student->section_id)==$section->id ? 'selected' : '' }}>

                                            {{ $section->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

            </div>





            <div class="card card-primary mt-3">

                <div class="card-header">

                    <h5 class="mb-0">

                        Student Photo

                    </h5>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-3 text-center">

                            @if($student->image)

                                <img
                                    src="{{ asset('uploads/students/'.$student->image) }}"
                                    id="previewImage"
                                    class="img-thumbnail"
                                    style="width:180px;height:200px;object-fit:cover;">

                            @else

                                <img
                                    src="{{ asset('images/no-image.png') }}"
                                    id="previewImage"
                                    class="img-thumbnail"
                                    style="width:180px;height:200px;object-fit:cover;">

                            @endif

                        </div>

                        <div class="col-md-9">

                            <div class="form-group">

                                <label>

                                    Change Photo

                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    class="form-control">

                            </div>

                            @if($student->image)

                                <div class="form-check mt-3">

                                    <input
                                        type="checkbox"
                                        name="delete_image"
                                        value="1"
                                        class="form-check-input"
                                        id="deleteImage">

                                    <label
                                        class="form-check-label"
                                        for="deleteImage">

                                        Delete Current Image

                                    </label>

                                </div>

                            @endif

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
                                    value="{{ old('name',$student->name) }}"
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

                                    <option value="">Select Gender</option>

                                    <option value="Male"
                                        {{ old('gender',$student->gender)=='Male' ? 'selected' : '' }}>

                                        Male

                                    </option>

                                    <option value="Female"
                                        {{ old('gender',$student->gender)=='Female' ? 'selected' : '' }}>

                                        Female

                                    </option>

                                    <option value="Other"
                                        {{ old('gender',$student->gender)=='Other' ? 'selected' : '' }}>

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
                                    value="{{ old('dob',$student->dob ? $student->dob->format('Y-m-d') : '') }}"
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

                                    <option value="">Select Blood Group</option>

                                    <option value="A+" {{ old('blood_group',$student->blood_group)=='A+'?'selected':'' }}>A+</option>

                                    <option value="A-" {{ old('blood_group',$student->blood_group)=='A-'?'selected':'' }}>A-</option>

                                    <option value="B+" {{ old('blood_group',$student->blood_group)=='B+'?'selected':'' }}>B+</option>

                                    <option value="B-" {{ old('blood_group',$student->blood_group)=='B-'?'selected':'' }}>B-</option>

                                    <option value="AB+" {{ old('blood_group',$student->blood_group)=='AB+'?'selected':'' }}>AB+</option>

                                    <option value="AB-" {{ old('blood_group',$student->blood_group)=='AB-'?'selected':'' }}>AB-</option>

                                    <option value="O+" {{ old('blood_group',$student->blood_group)=='O+'?'selected':'' }}>O+</option>

                                    <option value="O-" {{ old('blood_group',$student->blood_group)=='O-'?'selected':'' }}>O-</option>

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

                                    <option value="">Select Category</option>

                                    <option value="General"
                                        {{ old('category',$student->category)=='General' ? 'selected' : '' }}>

                                        General

                                    </option>

                                    <option value="OBC"
                                        {{ old('category',$student->category)=='OBC' ? 'selected' : '' }}>

                                        OBC

                                    </option>

                                    <option value="SC"
                                        {{ old('category',$student->category)=='SC' ? 'selected' : '' }}>

                                        SC

                                    </option>

                                    <option value="ST"
                                        {{ old('category',$student->category)=='ST' ? 'selected' : '' }}>

                                        ST

                                    </option>

                                    <option value="EWS"
                                        {{ old('category',$student->category)=='EWS' ? 'selected' : '' }}>

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
                                    value="{{ old('religion',$student->religion) }}"
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
                                    value="{{ old('aadhaar_no',$student->aadhaar_no) }}"
                                    class="form-control">

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
                                    value="{{ old('student_mobile',$student->student_mobile) }}"
                                    class="form-control">

                            </div>

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
                                    value="{{ old('father_name',$student->father_name) }}"
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
                                    value="{{ old('father_mobile',$student->father_mobile) }}"
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
                                    value="{{ old('father_occupation',$student->father_occupation) }}"
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
                                    value="{{ old('mother_name',$student->mother_name) }}"
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
                                    value="{{ old('mother_mobile',$student->mother_mobile) }}"
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
                                    value="{{ old('mother_occupation',$student->mother_occupation) }}"
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
                                    value="{{ old('guardian_name',$student->guardian_name) }}"
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
                                    value="{{ old('guardian_mobile',$student->guardian_mobile) }}"
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
                                    value="{{ old('guardian_relation',$student->guardian_relation) }}"
                                    class="form-control">

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
                                    value="{{ old('email',$student->email) }}"
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
                                    value="{{ old('emergency_contact',$student->emergency_contact) }}"
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
                            class="form-control">{{ old('address',$student->address) }}</textarea>

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
                                    value="{{ old('city',$student->city) }}"
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
                                    value="{{ old('state',$student->state) }}"
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
                                    value="{{ old('pincode',$student->pincode) }}"
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
                                        {{ old('transport_allotted',$student->transport_allotted)=='0' ? 'selected' : '' }}>

                                        No

                                    </option>

                                    <option value="1"
                                        {{ old('transport_allotted',$student->transport_allotted)=='1' ? 'selected' : '' }}>

                                        Yes

                                    </option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-8"
                             id="bus_number_div"
                             style="{{ old('transport_allotted',$student->transport_allotted) ? '' : 'display:none;' }}">

                            <div class="form-group">

                                <label>

                                    Bus Number

                                </label>

                                <input
                                    type="text"
                                    name="bus_number"
                                    value="{{ old('bus_number',$student->bus_number) }}"
                                    class="form-control">

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
                            value="{{ old('previous_school',$student->previous_school) }}"
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
                            class="form-control">{{ old('description',$student->description) }}</textarea>

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

                                    <option value="1"
                                        {{ old('status',$student->status)==1 ? 'selected' : '' }}>

                                        Active

                                    </option>

                                    <option value="0"
                                        {{ old('status',$student->status)==0 ? 'selected' : '' }}>

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
                                    value="{{ old('sort_order',$student->sort_order) }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>



                    <hr>



                    <button
                        type="submit"
                        class="btn btn-success">

                        <i class="fas fa-save"></i>

                        Update Student

                    </button>



                    <a href="{{ route('students.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection



@section('js')

<script>

document.getElementById('image').addEventListener('change',function(e){

    if(e.target.files.length){

        const reader=new FileReader();

        reader.onload=function(event){

            document.getElementById('previewImage').src=event.target.result;

        }

        reader.readAsDataURL(e.target.files[0]);

    }

});



function toggleBus(){

    let value=document.getElementById('transport_allotted').value;

    let busDiv=document.getElementById('bus_number_div');

    if(value=="1"){

        busDiv.style.display='block';

    }else{

        busDiv.style.display='none';

    }

}

toggleBus();

document.getElementById('transport_allotted').addEventListener('change',toggleBus);



let deleteImage=document.getElementById('deleteImage');

if(deleteImage){

    deleteImage.addEventListener('change',function(){

        if(this.checked){

            document.getElementById('previewImage').src="{{ asset('images/no-image.png') }}";

        }else{

            @if($student->image)

            document.getElementById('previewImage').src="{{ asset('uploads/students/'.$student->image) }}";

            @endif

        }

    });

}

</script>

@endsection