@extends('adminlte::page')

@section('title', 'Add Testimonial')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Add Testimonial</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('testimonials.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            @include('admin.testimonials.form')

            <button class="btn btn-primary">
                Save
            </button>

        </form>

    </div>
</div>

@endsection