@extends('adminlte::page')

@section('title', 'Departments')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">
            Departments
        </h4>

        <a href="{{ route('departments.create') }}"
           class="btn btn-primary float-right">

            Add Department

        </a>

    </div>

    <div class="card-body">

        <form method="GET" class="mb-3">

            <div class="row">

                <div class="col-md-4">

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search Name or Code"
                           class="form-control">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary">

                        Search

                    </button>

                </div>

            </div>

        </form>

        <table class="table table-bordered table-striped">

            <thead>

            <tr>

                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Code</th>
                <th>Sort Order</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th width="180">Action</th>

            </tr>

            </thead>

            <tbody>

            @forelse($departments as $department)

                <tr>

                    <td>{{ $department->id }}</td>

                    <td>

                        @if($department->image)

                            <img
                                src="{{ asset('uploads/departments/'.$department->image) }}"
                                width="50">

                        @endif

                    </td>

                    <td>{{ $department->name }}</td>

                    <td>{{ $department->code }}</td>

                    <td>{{ $department->sort_order }}</td>

                    <td>

                        <form action="{{ route('departments.status',$department->id) }}"
                              method="POST">

                            @csrf

                            <button class="btn btn-sm {{ $department->status ? 'btn-success' : 'btn-danger' }}">

                                {{ $department->status ? 'Enabled' : 'Disabled' }}

                            </button>

                        </form>

                    </td>

                    <td>
                        {{ $department->created_at->format('d M Y') }}
                    </td>

                    <td>
                        {{ $department->updated_at->format('d M Y') }}
                    </td>

                    <td>

                        <a href="{{ route('departments.edit',$department->id) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('departments.destroy',$department->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Delete Department?')"
                                class="btn btn-danger btn-sm">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="9"
                        class="text-center">

                        No Data Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $departments->links() }}

        </div>

    </div>

</div>

@endsection