@include('admin/include/header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product Category</h1>
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
                        <form id="editProductCategory"
                            action="{{ route('admin.product_categories.update', ['product_category' => $product_category->id]) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="old_img" value="{{ $product_category->image }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="text">Title<span class="error">*</span></label>
                                    <input type="text" class="form-control" value="{{ $product_category->name }}"
                                        id="title" name="name" placeholder="Enter Title">
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="exampleInputFile">Product Category Image (400x485 pixels)</label>
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
                                            <img src="{{ asset('ProductCategorys/' . $product_category->image) }}"
                                                style="height: 100%; width: auto;">
                                        </div>

                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="text">Image Title tag</label>
                                        <input type="text" class="form-control"
                                            value="{{ $product_category->title_tag }}" id="title" name="title_tag"
                                            placeholder="Enter Title">
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="text">Image alt tag</label>
                                        <input type="text" class="form-control" value="{{ $product_category->alt_tag }}"
                                            id="title" name="alt_tag" placeholder="Enter Title">
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-outline card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Description
                                                </h3>
                                            </div>
                                            
                                            <div class="card-body">
                                                <textarea name="description" id="summernote">
                                                  {{ $product_category->description }}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title"
                                        value="{{ $product_category->meta_title }}" id="meta_title"
                                        placeholder="Meta Title">
                                </div>
                                <div class="form-group">
                                    <label for="meta_title">Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keyword"
                                        value="{{ $product_category->meta_keyword }}" id="meta_keyword"
                                        placeholder="Meta Keywords">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" rows="4" name="meta_description"
                                        id="meta_description">{{ $product_category->meta_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="page_schema">Meta Schema</label>
                                    <textarea class="form-control" rows="4" name="page_schema" id="page_schema">
                        {{ $product_category->page_schema }}
                      </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="og_code">OG Code</label>
                                    <textarea class="form-control" rows="4" name="og_code"
                                        id="og_code">{{ $product_category->og_code }}</textarea>
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

    reader.onloadend = function() {
        var img = new Image();
        img.src = reader.result;

        img.onload = function() {
            // Check if the uploaded image dimensions match the required size (100x100 pixels)
            if (img.width === 400 && img.height === 485) {
                preview.innerHTML = '<img src="' + reader.result + '" style="width: 100%; height: 100%;">';
            } else {
                Swal.fire('Please upload an image with dimensions 400x485 pixels.');
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

    reader.onloadend = function() {
        var img = new Image();
        img.src = reader.result;

        img.onload = function() {
            // Check if the uploaded image dimensions match the required size (100x100 pixels)
            if (img.width === 500 && img.height === 345) {
                preview.innerHTML = '<img src="' + reader.result + '" style="width: 100%; height: 100%;">';
            } else {
                Swal.fire('Please upload an image with dimensions 500x345 pixels.');
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



$('#editProductCategory').validate({
    rules: {
        // Define validation rules for your form fields
        name: {
            required: true,
            // Add other validation rules as needed
        },

    },
    messages: {
        // Define error messages for your form fields
        name: {
            required: "Please enter product category title",
            // Add other error messages as needed
        },

    },
    submitHandler: function(form) {
        // If form is valid, submit it
        form.submit();
    }
});
</script>
</body>

</html>