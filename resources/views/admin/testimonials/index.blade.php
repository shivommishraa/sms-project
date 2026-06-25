@extends('adminlte::page')

@section('title', 'Testimonials')

@section('plugins.Datatables', true)

@section('content')

<div class="card">

    <div class="card-header">

        <h4 class="d-inline">Testimonials</h4>

        <a href="{{ route('testimonials.create') }}"
           class="btn btn-primary float-right">

            Add New

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">

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

    <div class="card-body">

        <table id="testimonialTable"
               class="table table-bordered table-striped">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th width="180">Action</th>
                </tr>

            </thead>

            <tbody>

            @forelse($testimonials as $item)

                <tr>

                    <td>{{ $item->id }}</td>

                    <td>

                        @if($item->image)

                            <img src="{{ asset('uploads/testimonials/'.$item->image) }}"
                                 width="60"
                                 class="img-thumbnail">

                        @endif

                    </td>

                    <td>{{ $item->name }}</td>

                    <td>{{ $item->designation }}</td>

                    <td>

                        @for($i=1; $i <= $item->rating; $i++)
                            ⭐
                        @endfor

                    </td>

                    <td>

                        <form action="{{ route('testimonials.status',$item->id) }}"
                              method="POST">

                            @csrf

                            <button class="btn btn-sm {{ $item->status ? 'btn-success' : 'btn-danger' }}">

                                {{ $item->status ? 'Enabled' : 'Disabled' }}

                            </button>

                        </form>

                    </td>

                    <td>{{ $item->created_at->format('d M Y h:i A') }}</td>

                    <td>{{ $item->updated_at->format('d M Y h:i A') }}</td>

                    <td>

                        <a href="{{ route('testimonials.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('testimonials.destroy',$item->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Delete Testimonial?')"
                                    class="btn btn-danger btn-sm">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="9" class="text-center">

                        No Data Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $testimonials->links() }}

        </div>

    </div>

</div>

@endsection


@section('js')

<script>

$(document).ready(function () {

    $('#testimonialTable').DataTable({

        responsive: true,
        autoWidth: false,

        paging: false,
        searching: true,
        ordering: true,
        info: false,

        order: [[0, 'desc']],

        columnDefs: [
            {
                targets: [1, 8], // Image, Status, Action
                orderable: false
            }
        ]

    });

});

</script>

@endsection