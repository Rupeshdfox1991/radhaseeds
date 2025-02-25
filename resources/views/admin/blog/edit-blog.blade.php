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
                    <h1>Edit Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog-listing</li>
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
                            <h3 class="card-title">Blog Details</h3>
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
                        <form id="editBlog" action="{{ route('admin.blogs.update', ['blog' => $blog->id]) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="old_img" value="{{ $blog->image }}">
                            <input type="hidden" name="old_thumb_img" value="{{ $blog->image_thumb }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="text">Title<span class="error">*</span></label>
                                    <input type="text" class="form-control" value="{{ $blog->name }}" id="title"
                                        name="name" placeholder="Enter Title">
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="exampleInputFile">Blog Thumbnail Image<span class="error">*</span>
                                            (600x460 pixels)</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="image_thumb" onchange="previewImage(this);">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        <div id="imagePreview" class="mt-2"
                                            style="height: 100px; width: 100px; border: 1px solid #ccc; padding: 4px;">
                                            <img src="{{ asset('blogs-images/image_thumb/' . $blog->image_thumb) }}"
                                                class="img-fluid" alt="Preview">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="text">Thumb Image Title tag</label>
                                        <input type="text" class="form-control" value="{{ $blog->title_tag }}"
                                            id="image_thumb_title_tag" name="image_thumb_title_tag"
                                            placeholder="Enter Thumb Image Title Tag">
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="text">Thumb Image alt tag</label>
                                        <input type="text" class="form-control" value="{{ $blog->image_thumb_alt_tag }}"
                                            id="image_thumb_alt_tag" name="image_thumb_alt_tag"
                                            placeholder="Enter image alt tag ">
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="exampleInputFile">Blog Detail Page Image<span
                                                class="error">*</span>(800x477 pixels)</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile1"
                                                    name="image" onchange="previewImage1(this);">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        <div id="imagePreview1" class="mt-2"
                                            style="height: 100px; width: 100px; border: 1px solid #ccc; padding: 4px;">
                                            <img src="{{ asset('blogs-images/' . $blog->image) }}" class="img-fluid"
                                                alt="Preview">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="text">Image Title tag</label>
                                        <input type="text" class="form-control" value="{{ $blog->title_tag }}"
                                            id="title_tag" name="title_tag" placeholder="Enter Image Title Tag">
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="text">Image alt tag</label>
                                        <input type="text" class="form-control" value="{{ $blog->alt_tag }}"
                                            id="alt_tag" name="alt_tag" placeholder="Enter image alt tag ">
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
                                                <textarea name="description" id="summernote"> {{ $blog->description }}
                          </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-->
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="Yes" name="for_home"
                                            id="exampleCheck1" @if($blog->for_home == 'Yes') {{ 'checked' }} @endif>
                                        <label class="form-check-label" for="exampleCheck1">For Home Page</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control" value="{{ $blog->meta_title }}"
                                        name="meta_title" id="meta_title" placeholder="Meta title">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keywords</label>
                                    <input type="text" class="form-control" value="{{ $blog->meta_keyword }}"
                                        name="meta_keyword" id="meta_keyword" placeholder="Meta keywords">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" rows="4" name="meta_description"
                                        id="meta_description">{{ $blog->meta_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="page_schema">Meta Schema</label>
                                    <textarea class="form-control" rows="4" name="page_schema"
                                        id="page_schema">{{ $blog->page_schema }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="og_code">OG Code</label>
                                    <textarea class="form-control" rows="4" name="og_code"
                                        id="og_code">{{ $blog->og_code }}</textarea>
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
            if (img.width === 600 && img.height === 460) {
                preview.innerHTML = '<img src="' + reader.result + '" style="width: 100%; height: 100%;">';
            } else {
                Swal.fire('Please upload an image with dimensions 600x460 pixels.');
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
            if (img.width === 800 && img.height === 477) {
                preview.innerHTML = '<img src="' + reader.result + '" style="width: 100%; height: 100%;">';
            } else {
                Swal.fire('Please upload an image with dimensions 800x477 pixels.');
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

$('#editBlog').validate({
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
            required: "Please enter blog title",
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