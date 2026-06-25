@extends('adminlte::page')

@section('title', 'Add Department')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Add Department</h4>

    </div>

    <form action="{{ route('departments.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Name <span class="text-danger">*</span></label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               required>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Code <span class="text-danger">*</span></label>

                        <input type="text"
                               name="code"
                               class="form-control"
                               value="{{ old('code') }}"
                               required>

                    </div>

                </div>

            </div>

            <div class="form-group">

                <label>Image</label>

                <input type="file"
                       name="image"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Description</label>

                <textarea name="description"
                          rows="4"
                          class="form-control"></textarea>

            </div>

            <div class="row">

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

                        <label>Status</label>

                        <div>

                            <input type="checkbox"
                                   checked
                                   name="status">

                            Enable

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-primary">

                Save Department

            </button>

            <a href="{{ route('departments.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </form>

</div>

@endsection