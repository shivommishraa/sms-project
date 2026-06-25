@extends('adminlte::page')

@section('title', 'Edit Class')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">
            Edit Class
        </h4>

        <a href="{{ route('classes.index') }}"
           class="btn btn-secondary float-right">

            Back

        </a>

    </div>

    <form action="{{ route('classes.update',$classMaster->id) }}"
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

                <div class="col-md-6">

                    <div class="form-group">

                        <label>
                            Department
                            <span class="text-danger">*</span>
                        </label>

                        <select name="department_id"
                                class="form-control"
                                required>

                            @foreach($departments as $department)

                                <option value="{{ $department->id }}"
                                    {{ $classMaster->department_id == $department->id ? 'selected' : '' }}>

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
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ $classMaster->name }}"
                               class="form-control"
                               required>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label>
                            Class Code
                        </label>

                        <input type="text"
                               name="code"
                               value="{{ $classMaster->code }}"
                               class="form-control"
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

            @if($classMaster->image)

                <div class="mb-3">

                    <img src="{{ asset('uploads/classes/'.$classMaster->image) }}"
                         width="120"
                         class="img-thumbnail">

                </div>

            @endif

            <div class="form-group">

                <label>
                    Description
                </label>

                <textarea name="description"
                          rows="5"
                          class="form-control">{{ $classMaster->description }}</textarea>

            </div>

            <div class="row">

                <div class="col-md-4">

                    <div class="form-group">

                        <label>
                            Sort Order
                        </label>

                        <input type="number"
                               name="sort_order"
                               value="{{ $classMaster->sort_order }}"
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
                                   {{ $classMaster->status ? 'checked' : '' }}>

                            Enable

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-success">

                Update Class

            </button>

            <a href="{{ route('classes.index') }}"
               class="btn btn-secondary">

                Cancel

            </a>

        </div>

    </form>

</div>

@endsection