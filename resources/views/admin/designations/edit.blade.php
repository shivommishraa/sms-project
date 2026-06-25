@extends('adminlte::page')

@section('title', 'Edit Designation')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Edit Designation</h4>

    </div>

    <form action="{{ route('designations.update',$designation->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Name</label>

                        <input type="text"
                               name="name"
                               value="{{ $designation->name }}"
                               class="form-control">

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Code</label>

                        <input type="text"
                               name="code"
                               value="{{ $designation->code }}"
                               class="form-control">

                    </div>

                </div>

            </div>

            @if($designation->image)

                <img
                    src="{{ asset('uploads/designations/'.$designation->image) }}"
                    width="100"
                    class="mb-3">

            @endif

            <div class="form-group">

                <label>Image</label>

                <input type="file"
                       name="image"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Description</label>

                <textarea
                    name="description"
                    rows="4"
                    class="form-control">{{ $designation->description }}</textarea>

            </div>

            <div class="row">

                <div class="col-md-4">

                    <label>Sort Order</label>

                    <input type="number"
                           name="sort_order"
                           value="{{ $designation->sort_order }}"
                           class="form-control">

                </div>

                <div class="col-md-4">

                    <label>Status</label>

                    <div>

                        <input type="checkbox"
                               name="status"
                               {{ $designation->status ? 'checked' : '' }}>

                        Enable

                    </div>

                </div>

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-success">

                Update Designation

            </button>

            <a href="{{ route('designations.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </form>

</div>

@endsection