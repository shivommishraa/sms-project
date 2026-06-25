@extends('adminlte::page')

@section('title', 'Subjects')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">
            Subjects
        </h4>

        <a href="{{ route('subjects.create') }}"
           class="btn btn-primary float-right">

            Add New

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show m-3">

            <i class="fas fa-check-circle"></i>

            {{ session('success') }}

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    @endif

    <div class="card-body">

        <form method="GET"
              action="{{ route('subjects.index') }}"
              class="mb-3">

            <div class="row">

                <div class="col-md-4">

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control"
                           placeholder="Search Name / Code">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary">

                        Search

                    </button>

                    <a href="{{ route('subjects.index') }}"
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

                        <th>#</th>

                        <th>Image</th>

                        <th>Department</th>

                        <th>Class</th>

                        <th>Section</th>

                        <th>Subject</th>

                        <th>Code</th>

                        <th>Type</th>

                        <th>Sort</th>

                        <th>Status</th>

                        <th>Created</th>

                        <th>Updated</th>

                        <th width="180">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($subjects as $item)

                    <tr>

                        <td>

                            {{ $loop->iteration + (($subjects->currentPage()-1) * $subjects->perPage()) }}

                        </td>

                        <td>

                            @if($item->image)

                                <img src="{{ asset('uploads/subjects/'.$item->image) }}"
                                     width="60"
                                     class="img-thumbnail">

                            @endif

                        </td>

                        <td>

                            {{ $item->department->name ?? '-' }}

                        </td>

                        <td>

                            {{ $item->classMaster->name ?? '-' }}

                        </td>

                        <td>

                            {{ $item->section->name ?? '-' }}

                        </td>

                        <td>

                            {{ $item->name }}

                        </td>

                        <td>

                            {{ $item->code }}

                        </td>

                        <td>

                            @if($item->type == 'Theory')

                                <span class="badge badge-primary">
                                    Theory
                                </span>

                            @elseif($item->type == 'Practical')

                                <span class="badge badge-success">
                                    Practical
                                </span>

                            @elseif($item->type == 'Both')

                                <span class="badge badge-warning">
                                    Both
                                </span>

                            @else

                                <span class="badge badge-secondary">
                                    Other
                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $item->sort_order }}

                        </td>

                        <td>

                            <form action="{{ route('subjects.status',$item->id) }}"
                                  method="POST">

                                @csrf

                                <button
                                    class="btn btn-sm {{ $item->status ? 'btn-success' : 'btn-danger' }}">

                                    {{ $item->status ? 'Enabled' : 'Disabled' }}

                                </button>

                            </form>

                        </td>

                        <td>

                            {{ $item->created_at->format('d M Y h:i A') }}

                        </td>

                        <td>

                            {{ $item->updated_at->format('d M Y h:i A') }}

                        </td>

                        <td>

                            <a href="{{ route('subjects.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('subjects.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete Subject?')"
                                    class="btn btn-danger btn-sm">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="13"
                            class="text-center">

                            No Data Found

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $subjects->links() }}

        </div>

    </div>

</div>

@endsection