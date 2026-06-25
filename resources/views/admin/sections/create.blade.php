@extends('adminlte::page')

@section('title', 'Add Section')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Add Section</h4>

    </div>

    <form action="{{ route('sections.store') }}"
          method="POST">

        @csrf

        <div class="card-body">

            <div class="form-group">

                <label>
                    Class
                </label>

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

            <div class="form-group">

                <label>
                    Section Name
                </label>

                <input type="text"
                       name="name"
                       class="form-control"
                       required>

            </div>

            <div class="form-group">

                <label>
                    Section Code
                </label>

                <input type="text"
                       name="code"
                       class="form-control"
                       required>

            </div>

            <div class="form-group">

                <label>
                    Description
                </label>

                <textarea name="description"
                          rows="4"
                          class="form-control"></textarea>

            </div>

            <div class="form-group">

                <label>
                    Sort Order
                </label>

                <input type="number"
                       name="sort_order"
                       value="0"
                       class="form-control">

            </div>

            <div class="form-group">

                <input type="checkbox"
                       name="status"
                       checked>

                Enable

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-primary">

                Save Section

            </button>

        </div>

    </form>

</div>

@endsection