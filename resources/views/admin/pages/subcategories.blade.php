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
            SubCategories</button>
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Categories Name</th>
                        <th>SubCategories Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- menampilkan subcategories --}}
                    @foreach ($subcategory as $index => $subcategories)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $subcategories->categories->name }}</td>
                            <td>{{ $subcategories->name }}</td>
                            <td>
                                <form action="{{ route('subcategories.destroy', $subcategories->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="javascript:;" id="edit_btn" data-id="{{ $subcategories->id }}"
                                        data-category="{{ $subcategories->categories->id }}"
                                        data-name="{{ $subcategories->name }}" style="margin-right: 20px"><i
                                            class="lnr lnr-pencil"></i></a>
                                    <button style="border: none;background: none;"><i class="lnr lnr-trash"></i></button>
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
        <form action="{{ route('subcategories.store') }}" method="post">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">New SubCategories</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Categories</label>
                            <select name="categories_id" class="form-control">
                                <option value="">-- Choose category -- </option>
                                @foreach ($category as $categories)
                                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name SubCategories</label>
                            <input type="text" name="name_subcategories" class="form-control"
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

    <!-- Modal Edit -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{ route('subcategories.store') }}" method="post">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit SubCategories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id">
                            <label>Categories</label>
                            <select name="categories_id" id="categories_id" class="form-control">
                                @foreach ($category as $categories)
                                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name SubCategories</label>
                            <input type="text" name="name_subcategories" id="name_subcategories" class="form-control"
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
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $("table #edit_btn").click(function() {
                var id = $(this).data('id');
                var category = $(this).data('category');
                var name = $(this).data('name');
                $('#editmodal').modal('show');
                $('#id').val(id);
                $("#categories_id").val(category);
                $('#name_subcategories').val(name);
            })
        });

    </script>

@endpush
