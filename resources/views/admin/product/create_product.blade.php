@include('admin/include/header')
<style>
    #exampleInputFile-error {
        margin-top: 100px;
    }

    #exampleInputFile1-error {
        margin-top: 100px;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                            <h3 class="card-title">Add Product Details</h3>
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
                        <form action="{{ route('product-store') }}" method="post" id="addProductForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div id="highlightedElements"></div>

                                <div class="form-group">
                                    <label>Product Categorys<span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="pro_cat_id" name="pro_cat_id"
                                        style="width: 100%;">
                                        @foreach($ProductCategorys as $productcategory)
                                            <option value="{{ $productcategory->id }}">{{ $productcategory->name }}</option>
                                        @endforeach

                                    </select>
                                </div>


                                <div class=" form-group">
                                    <label for="text">Product Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="product_name"
                                        placeholder="Enter Title">
                                </div>

                                <div class="form-group">
                                    <label for="text">Product Code<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="productcode" name="product_code"
                                        placeholder="Enter Product Code">
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="exampleInputFile">Product Image (800x967 pixels)<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="image" onchange="previewImage(this);">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        <div id="imagePreview" class="mt-2"
                                            style="height: 100px; width: 100px; border: 1px solid #ccc; padding: 4px;">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="text">Image Title tag</label>
                                        <input type="text" class="form-control" id="title" name="title_tag"
                                            placeholder="Enter Title">
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="text">Image alt tag</label>
                                        <input type="text" class="form-control" id="title" name="alt_tag"
                                            placeholder="Enter Title">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-outline card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Description
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <textarea name="product_desc" id="summernote">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-->
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="Yes" name="for_home"
                                            id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">For Home Page</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                                        placeholder="Meta Title">
                                </div>
                                <div class="form-group">
                                    <label for="meta_title">Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keyword" id="meta_title"
                                        placeholder="Meta Keywords">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" rows="4" name="meta_description"
                                        id="meta_description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="page_schema">Meta Schema</label>
                                    <textarea class="form-control" rows="4" name="page_schema"
                                        id="page_schema"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="og_code">OG Code</label>
                                    <textarea class="form-control" rows="4" name="og_code" id="og_code"></textarea>
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
<script>
    function previewImage(input) {
        var preview = document.getElementById('imagePreview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            var img = new Image();
            img.src = reader.result;

            img.onload = function () {
                // Check if the uploaded image dimensions match the required size (100x100 pixels)
                if (img.width === 800 && img.height === 967) {
                    preview.innerHTML = '<img src="' + reader.result + '" style="width: 100%; height: 100%;">';
                } else {
                    Swal.fire('Please upload an image with dimensions 800x967 pixels.');
                    // Reset the file input
                    input.value = '';
                    preview.innerHTML = '';
                }
            };
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function previewImage1(input) {
        var preview = document.getElementById('imagePreview1');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            var img = new Image();
            img.src = reader.result;

            img.onload = function () {
                // Check if the uploaded image dimensions match the required size (100x100 pixels)
                if (img.width === 600 && img.height === 552) {
                    preview.innerHTML = '<img src="' + reader.result + '" style="width: 100%; height: 100%;">';
                } else {
                    Swal.fire('Please upload an image with dimensions 600x552 pixels.');
                    // Reset the file input
                    input.value = '';
                    preview.innerHTML = '';
                }
            };
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    $(document).ready(function () {

        //multiselect
        $('#pro_cat_id').select2({
            placeholder: 'Select product  category',
            allowClear: true,
            closeOnSelect: true
        });
        $('#pro_subcat_id').select2({
            placeholder: 'Select product subcategory',
            allowClear: true,
            closeOnSelect: true
        });
        $('#pro_material_filt_id').select2({
            placeholder: 'Select material filter',
            allowClear: true,
            closeOnSelect: true
        });
        $('#pro_shape_filt_id').select2({
            placeholder: 'Select shape filter',
            allowClear: true,
            closeOnSelect: true
        });
        $('#pro_capacity_volume_filt_id').select2({
            placeholder: 'Select capacity/volume filter',
            allowClear: true,
            closeOnSelect: true
        });
        $('#pro_necksize_filt_id').select2({
            placeholder: 'Select neck size filter',
            allowClear: true,
            closeOnSelect: true
        });
        $('#pro_producttype_filt_id').select2({
            placeholder: 'Select product type filter',
            allowClear: true,
            closeOnSelect: true
        });
        $('#pro_market_filt_id').select2({
            placeholder: 'Select market filter',
            allowClear: true,
            closeOnSelect: true
        });



        $('#pro_cat_id').on('change', function (evt) {
            // var pro_cat_id = $(this).val();
            var pro_cat_id = $(evt.target).val();


            $.ajax({
                url: "{{ url('/admin/getproductsubcategory') }}/" + pro_cat_id,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    if (response.length > 0) {
                        $('#pro_subcat_id').empty(); // Clear previous options

                        $.each(response, function (index, item) {
                            $('#pro_subcat_id').append('<option value="' + item.id +
                                '">' + item.name + '</option>');
                        });
                    } else {
                        $('#pro_subcat_id').empty();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText); // Log the response text
                }
            });
        }).change();

        $('#addProductForm').validate({
            rules: {
                // Define validation rules for your form fields
                product_name: {
                    required: true,
                    // Add other validation rules as needed
                },
                product_code: {
                    required: true,
                },
                pro_cat_id: {
                    required: true,

                },
                pro_subcat_id: {
                    required: true,

                },
                image: {
                    required: true,
                },
                pro_material_filt_id: {
                    required: true,
                },
                pro_shape_filt_id: {
                    required: true,
                },
                pro_capacity_volume_filt_id: {
                    required: true,
                },
                pro_necksize_filt_id: {
                    required: true,
                },
                pro_market_filt_id: {
                    required: true,
                },
            },
            messages: {
                // Define error messages for your form fields
                product_name: {
                    required: "Please enter product title",
                    // Add other error messages as needed
                },
                product_code: {
                    required: "Please enter product code",
                },
                pro_cat_id: {
                    required: "Please select product category",
                },
                pro_subcat_id: {
                    required: "Please select product subcategory",
                },
                image: {
                    required: "Please select image",
                },
                pro_material_filt_id: {
                    required: "Please select material filter",
                },
                pro_shape_filt_id: {
                    required: "Please select shape filter",
                },
                pro_capacity_volume_filt_id: {
                    required: "Please select capacity volume filter",
                },
                pro_necksize_filt_id: {
                    required: "Please select necksize filter",
                },
                pro_market_filt_id: {
                    required: "Please select market filter",
                },

            },
            submitHandler: function (form) {
                // If form is valid, submit it
                form.submit();
            }
        });


    })
</script>
</body>

</html>