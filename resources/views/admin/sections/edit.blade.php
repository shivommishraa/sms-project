@extends('adminlte::page')

@section('title', 'Edit Section')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Edit Section</h4>

    </div>

    <form action="{{ route('sections.update',$section->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">

                <label>
                    Class
                </label>

                <select name="class_master_id"
                        class="form-control">

                    @foreach($classes as $class)

                        <option
                            value="{{ $class->id }}"
                            {{ $section->class_master_id == $class->id ? 'selected' : '' }}>

                            {{ $class->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>
                    Section Name
                </label>

                <input type="text"
                       name="name"
                       value="{{ $section->name }}"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>
                    Section Code
                </label>

                <input type="text"
                       name="code"
                       value="{{ $section->code }}"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>
                    Description
                </label>

                <textarea name="description"
                          rows="4"
                          class="form-control">{{ $section->description }}</textarea>

            </div>

            <div class="form-group">

                <label>
                    Sort Order
                </label>

                <input type="number"
                       name="sort_order"
                       value="{{ $section->sort_order }}"
                       class="form-control">

            </div>

            <div class="form-group">

                <input type="checkbox"
                       name="status"
                       {{ $section->status ? 'checked' : '' }}>

                Enable

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-success">

                Update Section

            </button>

        </div>

    </form>

</div>

@endsection