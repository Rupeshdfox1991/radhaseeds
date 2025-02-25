@include('admin/include/header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Category Listing</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product-Category-listing</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Category Listing</h3>
                            <div class="row">
                                <div class="col-md-6 offset-md-4 col-sm-12">
                                    <form id="searchForm">
                                        <div class="input-group">
                                            <input id="myInputTextField" type="search"
                                                class="form-control form-control-lg"
                                                placeholder="Type your keywords here">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-lg btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-2 col-sm-12 mt-3 mt-md-0">
                                    <div class="project-actions text-md-right text-center">
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('admin.product_categories.create') }}"
                                            style="font-size: 1.1rem; line-height: 2.2; width: 100%;">
                                            Add Category
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('admin/flash_data')
                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SR.NO</th>
                                        <th>ProductCategory Name</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ProductCategorys as $ProductCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ProductCategory->name }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('ProductCategorys/' . $ProductCategory->image) }}"
                                                alt="User Profile Image" style="height: 40px; width: auto;">
                                        </td>
                                        <td>{{ $ProductCategory->created_at->format('Y-m-d') }}</td>
                                        <td class="project-state">
                                            <!-- <span class="badge badge-success">Success</span> -->
                                            <a href="{{ route('admin_change_product_categories_status', ['id' => $ProductCategory->id, 'status' => $ProductCategory->is_active == 1 ? 0 : 1]) }}"
                                                class="btn btn-sm btn-{{ $ProductCategory->is_active == 1 ? 'danger' : 'success' }}">
                                                {{ $ProductCategory->is_active == 1 ? 'Deactivate' : 'Activate' }}</a>
                                        </td>
                                        <td class="project-actions text-left">

                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.product_categories.edit', ['product_category' => $ProductCategory->id]) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Update
                                            </a>

                                            <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                                data-target="#deleteConfirmationModal{{$ProductCategory->id}}">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>

                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade" id="deleteConfirmationModal{{$ProductCategory->id}}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="deleteConfirmationModalLabel{{$ProductCategory->id}}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteConfirmationModalLabel{{$ProductCategory->id}}">
                                                                Confirm Deletion</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this item?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a href="{{ route('admin_product_categories_delete', ['id' => $ProductCategory->id, 'status' => 2]) }}"
                                                                class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@include('admin/include/footer')
@include('admin/include/js')

<script>
oTable = $('#myTable')
    .DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$('#myInputTextField').keyup(function() {
    oTable.search($(this).val()).draw();
})

// Hide the DataTable wrapper
document.getElementById('myTable_length').style.display = 'none';
document.getElementById('myTable_filter').style.display = 'none';
</script>
</body>

</html>