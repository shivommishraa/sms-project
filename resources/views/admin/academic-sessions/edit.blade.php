@extends('adminlte::page')

@section('title', 'Edit Academic Session')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Edit Academic Session</h4>

    </div>

    <form action="{{ route('academic-sessions.update',$academicSession->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">

                <label>Session Name *</label>

                <input type="text"
                       name="name"
                       value="{{ $academicSession->name }}"
                       class="form-control"
                       required>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Start Date</label>

                        <input type="date"
                               name="start_date"
                               value="{{ $academicSession->start_date }}"
                               class="form-control">

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label>End Date</label>

                        <input type="date"
                               name="end_date"
                               value="{{ $academicSession->end_date }}"
                               class="form-control">

                    </div>

                </div>

            </div>

            <div class="form-group">

                <label>Sort Order</label>

                <input type="number"
                       name="sort_order"
                       value="{{ $academicSession->sort_order }}"
                       class="form-control">

            </div>

            <div class="form-group">

                <input type="checkbox"
                       name="is_current"
                       {{ $academicSession->is_current ? 'checked' : '' }}>

                <label>
                    Current Session
                </label>

            </div>

            <div class="form-group">

                <input type="checkbox"
                       name="status"
                       {{ $academicSession->status ? 'checked' : '' }}>

                <label>
                    Enable
                </label>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-success">

                Update

            </button>

            <a href="{{ route('academic-sessions.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </form>

</div>

@endsection