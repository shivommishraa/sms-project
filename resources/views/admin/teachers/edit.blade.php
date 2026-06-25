@extends('adminlte::page')

@section('title', 'Edit Teacher')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Edit Teacher</h4>

    </div>

    <form action="{{ route('teachers.update',$teacher->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

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

                                <option value="{{ $department->id }}"
                                    {{ old('department_id',$teacher->department_id) == $department->id ? 'selected' : '' }}>

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

                                <option value="{{ $designation->id }}"
                                    {{ old('designation_id',$teacher->designation_id) == $designation->id ? 'selected' : '' }}>

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

                                <option value="{{ $session->id }}"
                                    {{ old('academic_session_id',$teacher->academic_session_id) == $session->id ? 'selected' : '' }}>

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
                               value="{{ old('name',$teacher->name) }}"
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

                            <option value="Male"
                                {{ old('gender',$teacher->gender) == 'Male' ? 'selected' : '' }}>
                                Male
                            </option>

                            <option value="Female"
                                {{ old('gender',$teacher->gender) == 'Female' ? 'selected' : '' }}>
                                Female
                            </option>

                            <option value="Other"
                                {{ old('gender',$teacher->gender) == 'Other' ? 'selected' : '' }}>
                                Other
                            </option>

                        </select>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="form-group">

                        <label>DOB</label>
                        <input type="date"
                               name="dob"
                               value="{{ old('dob', optional($teacher->dob)->format('Y-m-d')) }}"
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

                    @if($teacher->image)

                        <div class="mt-2">

                            <img
                                src="{{ asset('uploads/teachers/'.$teacher->image) }}"
                                width="120"
                                class="img-thumbnail">

                        </div>

                    @endif

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Qualification</label>

                        <input type="text"
                               name="qualification"
                               value="{{ old('qualification',$teacher->qualification) }}"
                               class="form-control">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Experience</label>

                        <input type="text"
                               name="experience"
                               value="{{ old('experience',$teacher->experience) }}"
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

                        <option value="{{ $subject->id }}"
                            {{ in_array($subject->id, old('subjects', $teacher->subjects->pluck('id')->toArray())) ? 'selected' : '' }}>

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

                                <option value="{{ $class->id }}"
                                    {{ old(
                                        'class_master_id',
                                        optional(
                                            $teacher->classTeacherAssignment
                                        )->class_master_id
                                    ) == $class->id
                                    ? 'selected'
                                    : '' }}>

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

                                <option value="{{ $section->id }}"
                                    {{ old(
                                        'section_id',
                                        optional(
                                            $teacher->classTeacherAssignment
                                        )->section_id
                                    ) == $section->id
                                    ? 'selected'
                                    : '' }}>

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
                               value="{{ old('joining_date', optional($teacher->joining_date)->format('Y-m-d')) }}"
                               class="form-control">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Service End Date</label>

                        <input type="date"
                               name="service_end_date"
                               value="{{ old('service_end_date', optional($teacher->service_end_date)->format('Y-m-d')) }}"
                               class="form-control">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Employment Status</label>

                        <select name="employment_status"
                                class="form-control">

                            <option value="Active"
                                {{ old('employment_status',$teacher->employment_status) == 'Active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="Inactive"
                                {{ old('employment_status',$teacher->employment_status) == 'Inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                            <option value="Resigned"
                                {{ old('employment_status',$teacher->employment_status) == 'Resigned' ? 'selected' : '' }}>
                                Resigned
                            </option>

                            <option value="Retired"
                                {{ old('employment_status',$teacher->employment_status) == 'Retired' ? 'selected' : '' }}>
                                Retired
                            </option>

                            <option value="Terminated"
                                {{ old('employment_status',$teacher->employment_status) == 'Terminated' ? 'selected' : '' }}>
                                Terminated
                            </option>

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
                               value="{{ old('mobile',$teacher->mobile) }}"
                               class="form-control"
                               required>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Alternate Mobile</label>

                        <input type="text"
                               name="alternate_mobile"
                               value="{{ old('alternate_mobile',$teacher->alternate_mobile) }}"
                               class="form-control">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Email</label>

                        <input type="email"
                               name="email"
                               value="{{ old('email',$teacher->email) }}"
                               class="form-control">

                    </div>

                </div>

            </div>

            <div class="form-group">

                <label>Address</label>

                <textarea name="address"
                          rows="3"
                          class="form-control">{{ old('address',$teacher->address) }}</textarea>

            </div>

            <div class="form-group">

                <label>Short Bio</label>

                <textarea name="short_bio"
                          rows="3"
                          class="form-control">{{ old('short_bio',$teacher->short_bio) }}</textarea>

            </div>

            <div class="form-group">

                <label>Description</label>

                <textarea name="description"
                          rows="5"
                          class="form-control">{{ old('description',$teacher->description) }}</textarea>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-check">

                        <input type="checkbox"
                               name="status"
                               value="1"
                               {{ old('status',$teacher->status) ? 'checked' : '' }}
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
                               value="{{ old('sort_order',$teacher->sort_order) }}"
                               class="form-control">

                    </div>

                </div>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-primary">

                Update Teacher

            </button>

            <a href="{{ route('teachers.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </form>

</div>

@endsection