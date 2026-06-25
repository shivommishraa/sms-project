@extends('adminlte::page')

@section('title', 'Add Academic Session')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Add Academic Session</h4>

    </div>

    <form action="{{ route('academic-sessions.store') }}"
          method="POST">

        @csrf

        <div class="card-body">

            <div class="form-group">

                <label>Session Name *</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       placeholder="2025-26"
                       required>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Start Date</label>

                        <input type="date"
                               name="start_date"
                               class="form-control">

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label>End Date</label>

                        <input type="date"
                               name="end_date"
                               class="form-control">

                    </div>

                </div>

            </div>

            <div class="form-group">

                <label>Sort Order</label>

                <input type="number"
                       name="sort_order"
                       value="0"
                       class="form-control">

            </div>

            <div class="form-group">

                <input type="checkbox"
                       name="is_current">

                <label>
                    Current Session
                </label>

            </div>

            <div class="form-group">

                <input type="checkbox"
                       name="status"
                       checked>

                <label>
                    Enable
                </label>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-primary">

                Save

            </button>

            <a href="{{ route('academic-sessions.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </form>

</div>

@endsection