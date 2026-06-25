@extends('adminlte::page')

@section('title', 'Add Class')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">
            Add Class
        </h4>

        <a href="{{ route('classes.index') }}"
           class="btn btn-secondary float-right">

            Back

        </a>

    </div>

    <form action="{{ route('classes.store') }}"
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

                <div class="col-md-6">

                    <div class="form-group">

                        <label>
                            Department
                            <span class="text-danger">*</span>
                        </label>

                        <select name="department_id"
                                class="form-control"
                                required>

                            <option value="">
                                Select Department
                            </option>

                            @foreach($departments as $department)

                                <option value="{{ $department->id }}"
                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>

                                    {{ $department->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label>
                            Class Name
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               class="form-control"
                               placeholder="Enter Class Name"
                               required>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label>
                            Class Code
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="code"
                               value="{{ old('code') }}"
                               class="form-control"
                               placeholder="SCI11"
                               required>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label>
                            Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>

                </div>

            </div>

            <div class="form-group">

                <label>
                    Description
                </label>

                <textarea name="description"
                          rows="5"
                          class="form-control"
                          placeholder="Enter Description">{{ old('description') }}</textarea>

            </div>

            <div class="row">

                <div class="col-md-4">

                    <div class="form-group">

                        <label>
                            Sort Order
                        </label>

                        <input type="number"
                               name="sort_order"
                               value="{{ old('sort_order',0) }}"
                               class="form-control">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label>
                            Status
                        </label>

                        <div class="mt-2">

                            <input type="checkbox"
                                   name="status"
                                   checked>

                            Enable

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-primary">

                Save Class

            </button>

            <a href="{{ route('classes.index') }}"
               class="btn btn-secondary">

                Cancel

            </a>

        </div>

    </form>

</div>

@endsection