@extends('admin.master')
@section('content')
    <!-- BORDERED TABLE -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <i class="fa fa-check-circle"></i> {{ $message }}
        </div>
    @endif
    <div class="panel">

        <button type="button" data-toggle="modal" class="btn btn-primary" data-target="#createmodal">New
            Categories</button>
        <div class="panel-heading">
            <h3 class="panel-title">Bordered Table</h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Categories Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $index => $categories)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $categories->name }}</td>
                            <td>
                                <form action="{{ route('categories.destroy', $categories->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="javascript:;" id="edit_btn" data-id="{{ $categories->id }}"
                                        data-name="{{ $categories->name }}" style="margin-right: 20px"><i
                                            class="lnr lnr-pencil"></i></a>
                                    <button style="border: none;
                                            background: none;
                                            "><i class="lnr lnr-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">New Categories</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name Categories</label>
                            <input type="text" name="name_categories" class="form-control"
                                placeholder="Insert Category Name...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
        </form>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id">
                            <label for="name">Name Categories</label>
                            <input type="text" name="name_categories" id="name_categories" class="form-control" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
        </form>
    </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $("table #edit_btn").click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#editmodal').modal('show');
                $('#id').val(id);
                $('#name_categories').val(name);
            })
        });

    </script>

@endpush
