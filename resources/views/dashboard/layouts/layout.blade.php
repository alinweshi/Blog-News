<!--
    * CoreUI - Open Source Bootstrap Admin Template
    * @version v1.0.0-alpha.2
    * @link http://coreui.io
    * Copyright (c) 2016 creativeLabs Łukasz Holeczek
    * @license MIT
    -->
<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <title>CoreUI Bootstrap 4 Admin Template</title>
    <!-- Icons -->
    <link href="{{ asset('adminassets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('adminassets/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{ asset('adminassets/dest/style.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

</head>
<!-- BODY options, add following classes to body to change options
           1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
           2. 'sidebar-nav'		  - Navigation on the left
               2.1. 'sidebar-off-canvas'	- Off-Canvas
                   2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
                   2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
           3. 'fixed-nav'			  - Fixed navigation
           4. 'navbar-fixed'		  - Fixed navbar
       -->

<body class="navbar-fixed sidebar-nav fixed-nav">
    <header class="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="#"></a>
            <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-left hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link aside-toggle" href="#"><i class="icon-bell"></i><span
                            class="tag tag-pill tag-danger">5</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-list"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('adminassets/img/avatars/6.jpg')}}" class="img-avatar"
                            alt="admin@bootstrapmaster.com">
                        <span class="hidden-md-down">مدیر</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-xs-center">
                            <strong>تنظیمات</strong>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fa fa-user"></i> profile </a>
                        <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> تنظیمات</a>ny
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type=submit>__('Logout')</button>
                        </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-toggler aside-toggle" href="#">&#9776;</a>
                </li>

            </ul>
        </div>
    </header>

    <!-- Main content -->
    <main class="main">
        @yield("body")
        <!--/.container-fluid-->
    </main>
    @include("dashboard.layouts.sidebar")
    @include("dashboard.layouts.navbar")
    @include("dashboard.layouts.footer")




    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('adminassets/js/libs/jquery.min.js')}}"></script>
    <script src="{{ asset('adminassets/js/libs/tether.min.js')}}"></script>
    <script src="{{ asset('adminassets/js/libs/bootstrap.min.js')}}"></script>
    <script src="{{ asset('adminassets/js/libs/pace.min.js')}}"></script>




    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('adminassets')}}/js/libs/Chart.min.js"></script>

    <!-- CoreUI main scripts -->

    <script src="{{ asset('adminassets/js/app.js')}}"></script>

    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->
    <script src="{{ asset('adminassets/js/views/main.js')}}"></script>

    <!-- Grunt watch plugin -->
    <script src="//localhost:35729/livereload.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    @stack("javascript")
</body>

</html>