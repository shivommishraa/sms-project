@extends('adminlte::page')

@section('title', 'Add Teacher')

@section('content')

<div class="card">

```
<div class="card-header">

    <h4>Add Teacher</h4>

</div>

<form action="{{ route('teachers.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="card-body">

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="row">

            <div class="col-md-4">

                <div class="form-group">

                    <label>Department *</label>

                    <select name="department_id"
                            class="form-control"
                            required>

                        <option value="">
                            Select Department
                        </option>

                        @foreach($departments as $department)

                            <option value="{{ $department->id }}">

                                {{ $department->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">

                    <label>Designation *</label>

                    <select name="designation_id"
                            class="form-control"
                            required>

                        <option value="">
                            Select Designation
                        </option>

                        @foreach($designations as $designation)

                            <option value="{{ $designation->id }}">

                                {{ $designation->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">

                    <label>Academic Session *</label>

                    <select name="academic_session_id"
                            class="form-control"
                            required>

                        <option value="">
                            Select Session
                        </option>

                        @foreach($sessions as $session)

                            <option value="{{ $session->id }}">

                                {{ $session->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

        </div>

        <hr>

        <h5>Teacher Information</h5>

        <div class="row">

            <div class="col-md-6">

                <div class="form-group">

                    <label>Teacher Name *</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           required>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>Gender *</label>

                    <select name="gender"
                            class="form-control"
                            required>

                        <option value="">Select</option>

                        <option value="Male">Male</option>

                        <option value="Female">Female</option>

                        <option value="Other">Other</option>

                    </select>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>DOB</label>

                    <input type="date"
                           name="dob"
                           class="form-control">

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-4">

                <div class="form-group">

                    <label>Photo</label>

                    <input type="file"
                           name="image"
                           class="form-control">

                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">

                    <label>Qualification</label>

                    <input type="text"
                           name="qualification"
                           class="form-control">

                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">

                    <label>Experience</label>

                    <input type="text"
                           name="experience"
                           class="form-control">

                </div>

            </div>

        </div>

        <hr>

        <h5>Subjects Assignment</h5>

        <div class="form-group">

            <label>Subjects</label>

            <select name="subjects[]"
                    class="form-control"
                    multiple>

                @foreach($subjects as $subject)

                    <option value="{{ $subject->id }}">

                        {{ $subject->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <hr>

        <h5>Class Teacher Assignment</h5>

        <div class="row">

            <div class="col-md-6">

                <div class="form-group">

                    <label>Class</label>

                    <select name="class_master_id"
                            class="form-control">

                        <option value="">
                            Select Class
                        </option>

                        @foreach($classes as $class)

                            <option value="{{ $class->id }}">

                                {{ $class->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group">

                    <label>Section</label>

                    <select name="section_id"
                            class="form-control">

                        <option value="">
                            Select Section
                        </option>

                        @foreach($sections as $section)

                            <option value="{{ $section->id }}">

                                {{ $section->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

        </div>

        <hr>

        <h5>Employment Information</h5>

        <div class="row">

            <div class="col-md-4">

                <div class="form-group">

                    <label>Joining Date</label>

                    <input type="date"
                           name="joining_date"
                           class="form-control">

                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">

                    <label>Service End Date</label>

                    <input type="date"
                           name="service_end_date"
                           class="form-control">

                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">

                    <label>Employment Status</label>

                    <select name="employment_status"
                            class="form-control">

                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                        <option value="Resigned">Resigned</option>
                        <option value="Retired">Retired</option>
                        <option value="Terminated">Terminated</option>

                    </select>

                </div>

            </div>

        </div>

        <hr>

        <h5>Contact Information</h5>

        <div class="row">

            <div class="col-md-4">

                <div class="form-group">

                    <label>Mobile *</label>

                    <input type="text"
                           name="mobile"
                           class="form-control"
                           required>

                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">

                    <label>Alternate Mobile</label>

                    <input type="text"
                           name="alternate_mobile"
                           class="form-control">

                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">

                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control">

                </div>

            </div>

        </div>

        <div class="form-group">

            <label>Address</label>

            <textarea name="address"
                      rows="3"
                      class="form-control"></textarea>

        </div>

        <div class="form-group">

            <label>Short Bio</label>

            <textarea name="short_bio"
                      rows="3"
                      class="form-control"></textarea>

        </div>

        <div class="form-group">

            <label>Description</label>

            <textarea name="description"
                      rows="5"
                      class="form-control"></textarea>

        </div>

        <div class="row">

            <div class="col-md-6">

                <div class="form-check">

                    <input type="checkbox"
                           name="status"
                           value="1"
                           checked
                           class="form-check-input">

                    <label class="form-check-label">

                        Enable

                    </label>

                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group">

                    <label>Sort Order</label>

                    <input type="number"
                           name="sort_order"
                           value="0"
                           class="form-control">

                </div>

            </div>

        </div>

    </div>

    <div class="card-footer">

        <button type="submit"
                class="btn btn-primary">

            Save Teacher

        </button>

        <a href="{{ route('teachers.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>

</form>
```

</div>

@endsection
