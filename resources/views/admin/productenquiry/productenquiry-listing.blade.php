@include('admin/include/header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Enquiry Listing</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product-Enquiry-listing</li>
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
                            <h3 class="card-title">Newsletter Listing</h3>
                            <div class="row">
                                <div class="col-md-6 offset-md-6 col-sm-12">
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
                                <!--<div class="col-md-2 col-sm-12 mt-3 mt-md-0">-->
                                <!--    <div class="project-actions text-md-right text-center">-->
                                <!--        <a class="btn btn-info btn-sm" href="{{-- route('admin.blogs.create') --}}" style="font-size: 1.1rem; line-height: 2.2; width: 100%;">-->
                                <!--            Add Newsletter-->
                                <!--        </a>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('admin/flash_data')
                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SR.NO</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Company Name</th>
                                        <th>Country</th>
                                        <th>Contact Number</th>
                                        <th>Comments</th>
                                        <th>Products</th>
                                        <th>Date</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productEnquiry as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->company_name }}</td>
                                        <td>{{ $value->country }}</td>
                                        <td>{{ $value->contact_number }}</td>
                                        <td>{{ $value->comments }}</td>
                                        <td>{{ $value->products }}</td>
                                        <td>{{ $value->created_at->format('Y-m-d') }}</td>
                                        <!-- <td class="project-actions text-left">
                                                <form method="POST"
                                                    action="{{ route('delete-product-enquiry', ['id' => $value->id, 'status' => 2]) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td> -->
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
    .DataTable({
        scrollX: true
    }); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$('#myInputTextField').keyup(function() {
    oTable.search($(this).val()).draw();
})

// Hide the DataTable wrapper
document.getElementById('myTable_length').style.display = 'none';
document.getElementById('myTable_filter').style.display = 'none';
</script>
</body>

</html>