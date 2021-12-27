<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Dashboard </title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <form method="POST" action="/logout">
                    @csrf

                     <a class="nav-link" href="/logout" onclick="event.preventDefault();
                                         this.closest('form').submit();"> <i class="fas fa-sign-out-alt"></i> Log Out</a>
                 </form>
            </li>
        </ul>
    </nav>









    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">

                    <img  src="{{asset('uploads/admin/'.$admin->avatar)}}" class="img-circle mx-auto d-block " style="width:60px;height:60px">
                </div>
                <div class="info">
                    <h3 class="d-block" style="color: white;font-size:20px;padding:12px"> {{ $admin->first_name }} </h3>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-user-tag" style="margin-right: 10px"></i>
                            <p>
                                Roles
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admins.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Admins </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('showusers')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>Users</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- ////// --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-user-tag" style="margin-right: 10px"></i>
                            <p>
                                Tags
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('tags.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Manage Tags </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('tags.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>add Tags</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- ???????????? --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-user-tag" style="margin-right: 10px"></i>
                            <p>
                                article
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('articles.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Manage articles </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('articles.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>add article</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- ////////// --}}
                       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-user-tag" style="margin-right: 10px"></i>
                            <p>
                                Newspaper
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('newspapers.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Add newspaper </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('newspapers.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon "></i>
                                    <p>Manage newpapers</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- ظظظظ --}}

                    {{-- ظظظظ --}}
                    <li class="nav-item">
                        <a href="{{ route('editprofile') }}" class="nav-link">
                            <i class="fas fa-edit"></i>
                            <p> Edit Profile </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="padding-top: 30px">
             @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
