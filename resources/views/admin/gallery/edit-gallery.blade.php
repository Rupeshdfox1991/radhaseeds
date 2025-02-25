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
                    <h1>Update Gallery Image</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Gallery Image</li>
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
                            <h3 class="card-title">Gallery Image Details</h3>
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
                        <form id="addImageCategory" action="{{ route('update-gallery', $gallery->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="old_img" value="{{ $gallery->images }}">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Image Category<span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="defaultSelect" id="img_cat_id"
                                        name="img_cat_id" style="width: 100%;">
                                        @foreach ($imagecategory as $value)
                                        <option value="{{ $value->id}}"
                                            {{$value->id == $gallery->img_cat_id ? "selected" : ""}}>
                                            {{ $value->name}}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="row col-md-12">

                                    <div class="form-group col-md-12 mb-3">
                                        <label for="exampleInputFile">Image<span class="error">*</span>
                                            (600x376 pixels)</label>
                                        <div class="input-group">
                                            <div class="custom-file">

                                                <input type="file" class="form-control" name="images" id="image"
                                                    onchange="previewImage(this);" />

                                            </div>

                                        </div>

                                        <div id="imagePreview" class="mt-2"
                                            style="height: 100px; width: 100px; border: 1px solid #ccc; padding: 4px;">

                                            <img src="{{ asset('gallery-images/' . $gallery->images) }}"
                                                class="img-fluid" alt="Preview">

                                        </div>

                                    </div>


                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
            if (img.width === 600 && img.height === 376) {
                preview.innerHTML = '<img src="' + reader.result + '" style="width: 100%; height: 100%;">';
            } else {
                Swal.fire('Please upload an image with dimensions 600x376 pixels.');
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
</script>
</body>

</html>