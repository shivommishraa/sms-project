@extends('adminlte::page')

@section('title', 'Edit Customer')

@section('content_header')
    <h1>Edit Customer</h1>
@stop

@section('content')

    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title">Update Customer Details</h3>
        </div>

        <form action="{{ route('customers.update', $customer->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="form-group">
                    <label for="name">Name</label>

                    <input type="text"
                           name="name"
                           id="name"
                           value="{{ old('name', $customer->name) }}"
                           class="form-control @error('name') is-invalid @enderror"
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
                           value="{{ old('email', $customer->email) }}"
                           class="form-control @error('email') is-invalid @enderror"
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
                           value="{{ old('phone', $customer->phone) }}"
                           class="form-control @error('phone') is-invalid @enderror"
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
                           value="{{ old('city', $customer->city) }}"
                           class="form-control @error('city') is-invalid @enderror"
                           placeholder="Enter city">

                    @error('city')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Customer
                </button>

                <a href="{{ route('customers.index') }}"
                   class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>

            </div>

        </form>

    </div>

@stop