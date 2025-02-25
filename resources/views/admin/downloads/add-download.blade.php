@include('admin/include/header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Banner-listing</li>
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
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Banner Details</h3>
              </div>
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                <hr>
                @endif
                
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.downloads.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="text">Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Title">
                  </div> 
                  <!-- <div class="form-group">
                        <div class="form-group">
                            <label for="exampleInputFile">File(Please upload a file less than 20MB)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="doc_file" id="exampleInputFile" onchange="updateFileName()">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>                    
                    <div id="uploadedFileName" class="mt-2"></div>                   
                  </div> -->

                  <div class="form-group col-md-4 mb-3">
                      <label for="exampleInputFile">Banner Image (1920x700 pixels)</label>
                      <div class="input-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile" name="doc_file" onchange="previewImage1(this);" required>
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                          </div>
                      </div>
                      <div id="imagePreview1" class="mt-2" style="height: 100px; width: auto; border: 1px solid #ccc; padding: 4px;">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="text">Banner Link</label>
                    <input type="text" class="form-control" name="external_link" id="title" placeholder="Enter Title">
                  </div>                  
                  <!-- <div class="form-group">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">For Home Page</label>
                    </div>
                  </div>  -->                 
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
    function updateFileName() {
        // Get the file input element
        var fileInput = document.getElementById('exampleInputFile');

        // Get the label element
        var label = document.querySelector('.custom-file-label');

        // Get the container for displaying the uploaded file name
        var fileNameContainer = document.getElementById('uploadedFileName');

        // Check if a file is selected
        if (fileInput.files.length > 0) {
            var fileSizeInMB = fileInput.files[0].size / (1024 * 1024); // Convert bytes to MB

            // Check if the file size is less than 20MB
            if (fileSizeInMB <= 20) {
                // Display the selected file name
                fileNameContainer.textContent = 'Uploaded File: ' + fileInput.files[0].name;
            } else {
                // Clear the file input and display an error message
                fileInput.value = '';
                alert('File size exceeds 20MB. Please upload a file less than 20MB.');
                fileNameContainer.textContent = 'File size exceeds 20MB. Please upload a file less than 20MB.';
            }
        } else {
            // No file selected, clear the displayed file name
            fileNameContainer.textContent = '';
        }
    }
</script>

<script>
  function previewImage1(input) {
      var preview = document.getElementById('imagePreview1');
      var file = input.files[0];
      var reader = new FileReader();

      reader.onloadend = function () {
          var img = new Image();
          img.src = reader.result;

          img.onload = function () {
              // Check if the uploaded image dimensions match the required size (100x100 pixels)
              if (img.width === 1920 && img.height === 700) {
                  preview.innerHTML = '<img src="' + reader.result + '" style="width: auto; height: 100%;">';
              } else {
                  alert('Please upload an image with dimensions 1920x700 pixels.');
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
