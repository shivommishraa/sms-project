@extends('adminlte::page')

@section('title', 'Designations')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">
            Designations
        </h4>

        <a href="{{ route('designations.create') }}"
           class="btn btn-primary float-right">

            Add Designation

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

            @forelse($designations as $designation)

                <tr>

                    <td>{{ $designation->id }}</td>

                    <td>

                        @if($designation->image)

                            <img
                                src="{{ asset('uploads/designations/'.$designation->image) }}"
                                width="50">

                        @endif

                    </td>

                    <td>{{ $designation->name }}</td>

                    <td>{{ $designation->code }}</td>

                    <td>{{ $designation->sort_order }}</td>

                    <td>

                        <form action="{{ route('designations.status',$designation->id) }}"
                              method="POST">

                            @csrf

                            <button class="btn btn-sm {{ $designation->status ? 'btn-success' : 'btn-danger' }}">

                                {{ $designation->status ? 'Enabled' : 'Disabled' }}

                            </button>

                        </form>

                    </td>

                    <td>
                        {{ $designation->created_at->format('d M Y') }}
                    </td>

                    <td>
                        {{ $designation->updated_at->format('d M Y') }}
                    </td>

                    <td>

                        <a href="{{ route('designations.edit',$designation->id) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('designations.destroy',$designation->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Delete designation?')"
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

            {{ $designations->links() }}

        </div>

    </div>

</div>

@endsection