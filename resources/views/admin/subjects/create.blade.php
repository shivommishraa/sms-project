@extends('adminlte::page')

@section('title', 'Add Subject')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Add Subject</h4>

    </div>

    <form action="{{ route('subjects.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="card-body">

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

                        <label>Class *</label>

                        <select name="class_master_id"
                                class="form-control"
                                required>

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

                <div class="col-md-4">

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

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Subject Name *</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               required>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Subject Code *</label>

                        <input type="text"
                               name="code"
                               class="form-control"
                               required>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Subject Type *</label>

                        <select name="type"
                                class="form-control">

                            <option value="Theory">
                                Theory
                            </option>

                            <option value="Practical">
                                Practical
                            </option>

                            <option value="Both">
                                Both
                            </option>

                            <option value="Other">
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
                               value="0"
                               class="form-control">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Image</label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>

                </div>

            </div>

            <div class="form-group">

                <label>Description</label>

                <textarea name="description"
                          rows="5"
                          class="form-control"></textarea>

            </div>

            <div class="form-group">

                <input type="checkbox"
                       name="status"
                       checked>

                <label>Enable</label>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-primary">

                Save Subject

            </button>

            <a href="{{ route('subjects.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </form>

</div>

@endsection