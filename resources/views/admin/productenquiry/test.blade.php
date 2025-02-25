@include('admin/include/header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product Category</h1>
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
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Category Details</h3>
                        </div>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                        @endif
                        <hr>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="addProductCategory" action="{{ route('product-enquiry-store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="text">name<span class="error">*</span></label>
                                    <input type="text" class="form-control" id="title" name="name"
                                        placeholder="Enter Title">
                                </div>

                                <div class="form-group">
                                    <label for="text">email<span class="error">*</span></label>
                                    <input type="text" class="form-control" id="title" name="email"
                                        placeholder="Enter Title">
                                </div>

                                <div class="form-group">
                                    <label for="text">companyname<span class="error">*</span></label>
                                    <input type="text" class="form-control" id="title" name="company_name"
                                        placeholder="Enter Title">
                                </div>

                                <div class="form-group">
                                    <label for="text">country<span class="error">*</span></label>
                                    <input type="text" class="form-control" id="title" name="country"
                                        placeholder="Enter Title">
                                </div>

                                <div class="form-group">
                                    <label for="text">phone<span class="error">*</span></label>
                                    <input type="text" class="form-control" id="title" name="contact_number"
                                        placeholder="Enter Title">
                                </div>

                                <div class="form-group">
                                    <label for="text">comments<span class="error">*</span></label>
                                    <input type="text" class="form-control" id="title" name="comments"
                                        placeholder="Enter Title">
                                </div>

                                <div class="form-group">
                                    <label for="text">products<span class="error">*</span></label>
                                    <input type="text" class="form-control" id="title" name="products"
                                        placeholder="Enter Title">
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@include('admin/include/footer')

@include('admin/include/js')

</body>

</html>