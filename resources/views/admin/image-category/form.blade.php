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
                    <h1>{{ isset($imagecategory) ? 'Update' : 'Add' }} Category Image</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category-Image-listing</li>
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
                            <h3 class="card-title">Category Image Details</h3>
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
                        <form id="addImageCategory"
                            action="{{ isset($imagecategory) ? route('store-category', $imagecategory->id) : route('store-category') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($imagecategory))
                            @method('PUT')
                            <!-- or @method('PATCH') -->
                            <input type="hidden" name="old_img" value="{{ $imagecategory->image }}">
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="text">Title<span class="error">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $imagecategory ? $imagecategory->name : "" }}"
                                        placeholder="Enter Title" autofocus>
                                </div>

                                <div class="row col-md-12">

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="exampleInputFile">Image<span class="error">*</span>
                                            (800x600 pixels)</label>
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
                                            @if (isset($imagecategory))
                                            <img src="{{ asset('imagecategory/' . $imagecategory->image) }}"
                                                class="img-fluid" alt="Preview">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="text">Image title tag</label>
                                        <input class="form-control" type="text" name="title_tag" id="title_tag"
                                            value="{{ $imagecategory ? $imagecategory->title_tag : "" }}"
                                            placeholder="Enter title tag" />
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="text">Image alt tag</label>
                                        <input class="form-control" type="text" id="alt_tag" name="alt_tag"
                                            value="{{ $imagecategory ? $imagecategory->alt_tag : "" }}"
                                            placeholder="Enter alt tag" />
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit"
                                    class="btn btn-primary">{{ $imagecategory ? "Update" : "Save" }}</button>
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
            if (img.width === 800 && img.height === 600) {
                preview.innerHTML = '<img src="' + reader.result + '" style="width: 100%; height: 100%;">';
            } else {
                Swal.fire('Please upload an image with dimensions 800x600 pixels.');
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



$('#addImageCategory').validate({
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
            required: "Please enter title",
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