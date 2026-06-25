@extends('adminlte::page')

@section('title', 'Add Customer')

@section('content_header')
    <h1>Add Customer</h1>
@stop

@section('content')

    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title">Customer Details</h3>
        </div>

        <form action="{{ route('customers.store') }}" method="POST">

            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label for="name">Name</label>

                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="Enter customer name"
                           required>

                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>

                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           placeholder="Enter email address"
                           required>

                    @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>

                    <input type="text"
                           name="phone"
                           id="phone"
                           class="form-control @error('phone') is-invalid @enderror"
                           value="{{ old('phone') }}"
                           placeholder="Enter phone number"
                           required>

                    @error('phone')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="city">City</label>

                    <input type="text"
                           name="city"
                           id="city"
                           class="form-control @error('city') is-invalid @enderror"
                           value="{{ old('city') }}"
                           placeholder="Enter city">
                </div>

            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Customer
                </button>

                <a href="{{ route('customers.index') }}"
                   class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>

            </div>

        </form>

    </div>

@stop