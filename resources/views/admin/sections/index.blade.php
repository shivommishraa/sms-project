@extends('adminlte::page')

@section('title', 'Sections')

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">
            Sections
        </h4>

        <a href="{{ route('sections.create') }}"
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

        {{-- Search Form --}}

        <form method="GET"
              action="{{ route('sections.index') }}"
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

                    <a href="{{ route('sections.index') }}"
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

                        <th width="60">
                            #
                        </th>

                        <th>
                            Class
                        </th>

                        <th>
                            Section Name
                        </th>

                        <th>
                            Code
                        </th>

                        <th>
                            Sort Order
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Created
                        </th>

                        <th>
                            Updated
                        </th>

                        <th width="180">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($sections as $item)

                    <tr>

                        <td>

                            {{ $loop->iteration + (($sections->currentPage()-1) * $sections->perPage()) }}

                        </td>

                        <td>

                            {{ $item->classMaster->name ?? '-' }}

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

                            <form action="{{ route('sections.status',$item->id) }}"
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

                            <a href="{{ route('sections.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('sections.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete Section?')"
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

        </div>

        <div class="mt-3">

            {{ $sections->links() }}

        </div>

    </div>

</div>

@endsection