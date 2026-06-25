@extends('adminlte::page')

@section('title', 'Customers')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Customers</h1>

        <a href="{{ route('customers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Customer
        </a>
    </div>
@stop

@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}

            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th width="180">Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($customers as $customer)

                        <tr>

                            <td>
                                {{ $loop->iteration + (($customers->currentPage() - 1) * $customers->perPage()) }}
                            </td>

                            <td>
                                {{ $customer->name }}
                            </td>

                            <td>
                                {{ $customer->email }}
                            </td>

                            <td>
                                {{ $customer->phone }}
                            </td>

                            <td>
                                {{ $customer->city }}
                            </td>

                            <td>

                                <a href="{{ route('customers.edit', $customer->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i> Edit

                                </a>

                                <form action="{{ route('customers.destroy', $customer->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this customer?')">

                                        <i class="fas fa-trash"></i> Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center">
                                No Customers Found
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        @if($customers->hasPages())
            <div class="card-footer clearfix">
                {{ $customers->links() }}
            </div>
        @endif

    </div>

@stop