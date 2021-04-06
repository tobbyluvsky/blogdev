<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/adminlte.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/css/toastr.css">
    {{--<link rel="stylesheet" href="{{asset('admin/css/summernote-bs4.min.css')}}">--}}

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('dashboard')}}" class="brand-link">

            <span class="brand-text font-weight-light">Admin Panel</span>
        </a>
a
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    {{--<img src=" {{ asset($user->image) }} " alt="{{$user->name}}" class="img-fluid rounded-circle img-rounded">--}}
                    <img src="{{ asset( Auth::user()->image ) }} " class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{route('user.profile')}}" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                              Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link {{ (request()->is('admin/category*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Categories
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tag.index') }}" class="nav-link {{ (request()->is('admin/tag*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>
                                Tags
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('post.index') }}" class="nav-link {{ (request()->is('admin/post*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>
                                Post
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('setting.index') }}" class="nav-link {{ (request()->is('admin/setting')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Settings
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact.index') }}" class="nav-link {{ (request()->is('admin/message')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Messages
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('newsletter.index') }}" class="nav-link {{ (request()->is('admin/newsletter')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>

                                Newsletter
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Your Account</li>
                    <li class="nav-item">
                        <a href="{{ route('user.profile') }}" class="nav-link {{ (request()->is('admin/profile')) ? 'active' : '' }}">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Your Profile
                            </p>
                        </a>
                    </li>

                    <li class="nav-item mt-auto ">
                        <a href="http://blogdev.test/logout" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"
                           class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                    <hr>
                    <li class="text-center mt-1">
                        <a href="{{route('homepage')}}" class="btn btn-sm btn-primary" target="_blank">
                                Visit Website
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@yield('script')
<!-- jQuery -->
<script src="{{asset('admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin')}}/js/adminlte.min.js"></script>
<script src="{{asset('admin')}}/js/toastr.js"></script>
<script src="{{asset('admin')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
{{--<script src="{{asset('admin/js/summernote-bs4.min.js')}}"></script>--}}
<script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )

</script>

<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>

{{--<script>--}}
    {{--$('#description').summernote({--}}
        {{--tabsize: 2,--}}
        {{--height: 100--}}
    {{--});--}}
{{--</script>--}}

<script>
    @if(Session::has('success'))
    // Display a success toast, with a title
    toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('error'))
    // Display a success toast, with a title
    toastr.error("{{ Session::get('error') }}");
    @endif
</script>
</body>
</html>
