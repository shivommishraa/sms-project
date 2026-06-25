@extends('adminlte::page')

@section('title', 'Edit Testimonial')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Edit Testimonial</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('testimonials.update',$testimonial->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            @include('admin.testimonials.form')

            @if($testimonial->image)

                <img src="{{ asset('uploads/testimonials/'.$testimonial->image) }}"
                     width="120"
                     class="mb-3">

            @endif

            <br>

            <button class="btn btn-success">
                Update
            </button>

        </form>

    </div>

</div>

@endsection