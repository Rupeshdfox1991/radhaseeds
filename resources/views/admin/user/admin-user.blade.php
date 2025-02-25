@include('admin/include/header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin User Listing</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin-user-listing</li>
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
                  <h3 class="card-title">Admin User Listing</h3>
                  <div class="row">
                      <div class="col-md-6 offset-md-4 col-sm-12">
                          <form action="simple-results.html">
                              <div class="input-group">
                                  <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
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
                              <a class="btn btn-info btn-sm" href="{{ url('admin/register') }}" style="font-size: 1.1rem; line-height: 2.2; width: 100%;">
                                  Add User
                              </a>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                @include('admin/flash_data')
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>SR.NO</th>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Country</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($users as $user)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role_name }}</td>
                    <td>{{ $user->countryData->name }}</td>
                    <td class="text-center">
                        <img src="{{ asset('profiles/' . $user->profile) }}" alt="User Profile Image" style="height: 30px; width: 30px;">
                    </td>
                   
                    <td>{{ $user->created_at }}</td>
                    <td class="project-state">
                      <!-- <span class="badge badge-success">Success</span> -->
                      <a href="{{ route('admin_change_user_status', ['id' => $user->id, 'status' => $user->is_active == 1 ? 0 : 1]) }}" class="btn btn-sm btn-{{ $user->is_active == 1 ? 'danger' : 'success' }}">{{ $user->is_active == 1 ? 'Deactivate' : 'Activate' }}</a>
                    </td>

                    <td class="project-actions text-left">
                        <!-- <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            Show
                        </a> -->
                        <a class="btn btn-info btn-sm" href="{{ route('admin_user_edit', ['id' => $user->id]) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Update
                        </a>
                        <!-- <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a> -->
                    </td>
                  </tr>
                  @endforeach

                  <!-- <tr>
                    <td>2</td>
                    <td>Trident</td>
                    <td>IMG
                    </td>                    
                    <td>12-03-2023</td>
                    <td class="project-state">
                      <span class="badge badge-success">Success</span>
                    </td>
                    <td class="project-actions text-left">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Trident</td>
                    <td>IMG
                    </td>                    
                    <td>12-03-2023</td>
                    <td class="project-state">
                      <span class="badge badge-success">Success</span>
                    </td>
                    <td class="project-actions text-left">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                    </td>
                  </tr> -->
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
  </body>
</html>

