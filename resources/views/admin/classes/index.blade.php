@extends('adminlte::page')

@section('title', 'Classes')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">
            Classes
        </h4>

        <a href="{{ route('classes.create') }}"
           class="btn btn-primary float-right">

            Add Class

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show m-3">

            {{ session('success') }}

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    @endif

    <div class="card-body">

        <form method="GET">

            <div class="row mb-3">

                <div class="col-md-4">

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control"
                           placeholder="Search Class Name or Code">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary">

                        Search

                    </button>

                </div>

                <div class="col-md-2">

                    <a href="{{ route('classes.index') }}"
                       class="btn btn-secondary">

                        Reset

                    </a>

                </div>

            </div>

        </form>

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Image</th>
                        <th>Department</th>
                        <th>Class Name</th>
                        <th>Code</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($classes as $item)

                    <tr>

                        <td>{{ $item->id }}</td>

                        <td>

                            @if($item->image)

                                <img src="{{ asset('uploads/classes/'.$item->image) }}"
                                     width="60"
                                     class="img-thumbnail">

                            @endif

                        </td>

                        <td>
                            {{ $item->department->name ?? '' }}
                        </td>

                        <td>
                            {{ $item->name }}
                        </td>

                        <td>
                            {{ $item->code }}
                        </td>

                        <td>
                            {{ $item->sort_order }}
                        </td>

                        <td>

                            <form action="{{ route('classes.status',$item->id) }}"
                                  method="POST">

                                @csrf

                                <button class="btn btn-sm {{ $item->status ? 'btn-success' : 'btn-danger' }}">

                                    {{ $item->status ? 'Enabled' : 'Disabled' }}

                                </button>

                            </form>

                        </td>

                        <td>
                            {{ $item->created_at->format('d M Y') }}
                        </td>

                        <td>
                            {{ $item->updated_at->format('d M Y') }}
                        </td>

                        <td>

                            <a href="{{ route('classes.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('classes.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete Class?')"
                                    class="btn btn-danger btn-sm">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="10"
                            class="text-center">

                            No Data Found

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $classes->links() }}

        </div>

    </div>

</div>

@endsection