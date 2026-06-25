@extends('adminlte::page')

@section('title', 'Edit Subject')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Edit Subject</h4>

    </div>

    <form action="{{ route('subjects.update',$subject->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Department *</label>

                        <select name="department_id"
                                class="form-control">

                            @foreach($departments as $department)

                                <option value="{{ $department->id }}"
                                    {{ $subject->department_id == $department->id ? 'selected' : '' }}>

                                    {{ $department->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Class *</label>

                        <select name="class_master_id"
                                class="form-control">

                            @foreach($classes as $class)

                                <option value="{{ $class->id }}"
                                    {{ $subject->class_master_id == $class->id ? 'selected' : '' }}>

                                    {{ $class->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Section</label>

                        <select name="section_id"
                                class="form-control">

                            <option value="">
                                Select Section
                            </option>

                            @foreach($sections as $section)

                                <option value="{{ $section->id }}"
                                    {{ $subject->section_id == $section->id ? 'selected' : '' }}>

                                    {{ $section->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Subject Name *</label>

                        <input type="text"
                               name="name"
                               value="{{ $subject->name }}"
                               class="form-control">

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Subject Code *</label>

                        <input type="text"
                               name="code"
                               value="{{ $subject->code }}"
                               class="form-control">

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Subject Type</label>

                        <select name="type"
                                class="form-control">

                            <option value="Theory"
                                {{ $subject->type == 'Theory' ? 'selected' : '' }}>
                                Theory
                            </option>

                            <option value="Practical"
                                {{ $subject->type == 'Practical' ? 'selected' : '' }}>
                                Practical
                            </option>

                            <option value="Both"
                                {{ $subject->type == 'Both' ? 'selected' : '' }}>
                                Both
                            </option>

                            <option value="Other"
                                {{ $subject->type == 'Other' ? 'selected' : '' }}>
                                Other
                            </option>

                        </select>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Sort Order</label>

                        <input type="number"
                               name="sort_order"
                               value="{{ $subject->sort_order }}"
                               class="form-control">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Image</label>

                        <input type="file"
                               name="image"
                               class="form-control">

                        @if($subject->image)

                            <img src="{{ asset('uploads/subjects/'.$subject->image) }}"
                                 width="80"
                                 class="mt-2 border">

                        @endif

                    </div>

                </div>

            </div>

            <div class="form-group">

                <label>Description</label>

                <textarea name="description"
                          rows="5"
                          class="form-control">{{ $subject->description }}</textarea>

            </div>

            <div class="form-group">

                <input type="checkbox"
                       name="status"
                       {{ $subject->status ? 'checked' : '' }}>

                <label>Enable</label>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-success">

                Update Subject

            </button>

            <a href="{{ route('subjects.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </form>

</div>

@endsection