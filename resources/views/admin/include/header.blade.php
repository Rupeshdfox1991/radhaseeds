<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ($title ?? 'Radha Seeds') }} | Radha seeds</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- multiselect -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/multi-select/css/multi-select.css') }}">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">
    <!-- multiinput textfield -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.css') }}">





</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('admin_assets/dist/img/radha_seeds.jpg') }}" alt="radha seeds"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('admin/dashboard') }}" class="nav-link">Home</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
            </ul>
            @php
            $secoundSegment = request()->segment(2);
            @endphp
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="{{ asset('profiles/' . Auth::user()->profile) }}" class="user-image" alt="User Image"
                            style="height: 30px; width: 30px;">
                        <!-- <i class="fas fa-user"></i> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @auth
                        <!-- If user is logged in -->
                        <span class="dropdown-header">Welcome, {{ Auth::user()->name }}</span>
                        <div class="dropdown-divider"></div>
                        <!-- User profile link -->
                        <a href="{{ route('admin_user_edit', ['id' => Auth::user()->id]) }}"
                            class="
                                                                                                                                                dropdown-item"><i
                                class="fas fa-user"></i>
                            Profile</a>
                        <!-- Logout link -->
                        <a href="{{ route('logout') }}" class=" dropdown-item"><i class="fas fa-sign-out-alt"></i>
                            Logout</a>
                        @else
                        <!-- If user is not logged in -->
                        <span class="dropdown-header">Guest</span>
                        <div class="dropdown-divider"></div>
                        <!-- Login link -->
                        <a href="{{ url('login') }}" class=" dropdown-item"><i class="fas fa-sign-in-alt"></i>
                            Login</a>
                        @endauth
                    </div>
                </li>
                <!-- End User Dropdown -->
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('admin/dashboard') }}" class="brand-link">
                <img src="{{ asset('admin_assets/dist/img/radha_seeds.jpg') }}" alt="radha seeds"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Radha Seeds</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="{{ url('admin/dashboard') }}"
                                class="nav-link {{($secoundSegment == "dashboard" ? "active" : "")}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="display:none">
                            <a href="{{ route('admin_user') }}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Admin User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blogs.index') }}"
                                class="nav-link {{($secoundSegment == "blogs" ? "active" : "")}}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Manage Blog
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Manage Products
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" <?php 
                            if ($secoundSegment == 'product_categories' || $secoundSegment == 'product') {
    echo 'style="display: block;"';
} ?>>
                                <li class="nav-item">
                                    <a href="{{ route('admin.product_categories.index') }}" class="nav-link <?php 
                                            if ($secoundSegment == 'product_categories') {
    echo 'active';
} ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product Category</p>
                                    </a>
                                </li>



                                <li class="nav-item">
                                    <a href="{{ route('product-list') }}" class="nav-link <?php if ($secoundSegment == 'product') {
    echo 'active';
} ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Products</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Manage Gallery
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" <?php 
                            if ($secoundSegment == 'image-category' || $secoundSegment == 'image-gallery') {
    echo 'style="display: block;"';
} ?>>
                                <li class="nav-item">
                                    <a href="{{ route('image-category') }}" class="nav-link <?php 
                                            if ($secoundSegment == 'image-category') {
    echo 'active';
} ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Image Category</p>
                                    </a>
                                </li>



                                <li class="nav-item">
                                    <a href="{{ route('image-gallery') }}" class="nav-link <?php if ($secoundSegment == 'gallery') {
    echo 'active';
} ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Image Gallery</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="{{ route('product-enquiry') }}" class="nav-link <?php if ($secoundSegment == 'product-enquiry') {
    echo 'active';
} ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Products Enquiry</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Sign-out
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>