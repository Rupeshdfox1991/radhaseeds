@include('admin/include/header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banner Listing</h1>
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
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Banner Listing</h3>
                  <div class="row">
                      <div class="col-md-6 offset-md-4 col-sm-12">                        
                          <form id="searchForm">
                            <div class="input-group">
                                <input id="myInputTextField" type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
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
                              <a class="btn btn-info btn-sm" href="{{ route('admin.downloads.create') }}" style="font-size: 1.1rem; line-height: 2.2; width: 100%;">
                                  Add Banner
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
                    <th>Banner Name</th>
                    <th>Image </th>
                    <th>Banner Link </th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach( $Downloads as $download )
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::limit($download->name, 20)}}</td>
                    <!-- <td class="text-center">
                        <img src="{{-- asset('downloads/' . $download->doc_file) --}}" alt="User Profile Image" style="height: 30px; width: 30px;">
                    </td> -->

                    <td class="text-center">
                      <a href="{{ asset('downloads/' . $download->doc_file) }}" target="_blank">
                          <img src="{{ asset('downloads/' . $download->doc_file) }}" alt="Icon" style="height: 50px; width: auto;">
                      </a> 
                    </td> 

                    <td>{{ $download->external_link }}</td>                  
                    <td>{{ $download->created_at }}</td>
                    <td class="project-state">
                      <!-- <span class="badge badge-success">Success</span> -->
                      <a href="{{ route('admin_change_download_status', ['id' => $download->id, 'status' => $download->is_active == 1 ? 0 : 1]) }}" class="btn btn-sm btn-{{ $download->is_active == 1 ? 'danger' : 'success' }}">{{ $download->is_active == 1 ? 'Deactivate' : 'Activate' }}</a>
                    </td>
                    <td class="project-actions text-left">
                          
                          <a class="btn btn-info btn-sm" href="{{ route('admin.downloads.edit', ['download' => $download->id]) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Update
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{ route('admin_download_delete', ['id' => $download->id, 'status' => 2]) }}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
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
       oTable = $('#myTable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
    $('#myInputTextField').keyup(function(){
          oTable.search($(this).val()).draw() ;
    })

    // Hide the DataTable wrapper
    document.getElementById('myTable_length').style.display = 'none';
    document.getElementById('myTable_filter').style.display = 'none';
  </script>
</body>
</html>
