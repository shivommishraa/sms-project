@extends('adminlte::page')

@section('title', 'Academic Sessions')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">
            Academic Sessions
        </h4>

        <a href="{{ route('academic-sessions.create') }}"
           class="btn btn-primary float-right">

            Add New

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

        <form method="GET"
              action="{{ route('academic-sessions.index') }}"
              class="mb-3">

            <div class="row">

                <div class="col-md-4">

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control"
                           placeholder="Search Session">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary">

                        Search

                    </button>

                    <a href="{{ route('academic-sessions.index') }}"
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
                        <th>Session</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Current</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($academicSessions as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration + (($academicSessions->currentPage()-1) * $academicSessions->perPage()) }}
                        </td>

                        <td>
                            {{ $item->name }}
                        </td>

                        <td>
                            {{ $item->start_date ? \Carbon\Carbon::parse($item->start_date)->format('d M Y') : '-' }}
                        </td>

                        <td>
                            {{ $item->end_date ? \Carbon\Carbon::parse($item->end_date)->format('d M Y') : '-' }}
                        </td>

                        <td>

                            @if($item->is_current)

                                <span class="badge badge-success">
                                    Current
                                </span>

                            @else

                                <span class="badge badge-secondary">
                                    Old
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $item->sort_order }}
                        </td>

                        <td>

                            <form action="{{ route('academic-sessions.status',$item->id) }}"
                                  method="POST">

                                @csrf

                                <button class="btn btn-sm {{ $item->status ? 'btn-success' : 'btn-danger' }}">

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

                            <a href="{{ route('academic-sessions.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('academic-sessions.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete Session?')"
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

            {{ $academicSessions->links() }}

        </div>

    </div>

</div>

@endsection