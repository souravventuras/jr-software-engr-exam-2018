<!doctype html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
         <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
        <!-- Custom Font Icons CSS-->
        <link rel="stylesheet" href="{{ asset('admin/css/font.css')}}">
            <!-- Google fonts - Muli-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{ asset('admin/css/style.default.css')}}" id="theme-stylesheet">
            <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{ asset('admin/css/custom.css')}}">
            <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">




        <link href="{{ asset('css/select2.min.css')}}" rel="stylesheet"/>


       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

      <script src="{{ asset('js/select2.min.js')}}"></script>

      <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>



      <!-- DataTable -->

      <link rel="stylesheet"  href="{{ asset('admin/css/datatables.min.css')}}">

      <link rel="stylesheet"  href="{{ asset('admin/css/buttons.dataTables.min.css')}}">

    <style type="text/css">

        .title {
            color: #fff;
        }
    </style>

      <!-- DataTable -->


        <!-- Styles -->

        @include('sweetalert::alert')

    </head>
    <body>

        @include('layouts.header_nav')

        <div class="d-flex align-items-stretch">

            @include('layouts.sidebar')

            <div class="page-content">
                 <!-- Page Header-->
                    <div class="page-header no-margin-bottom">
                      <div class="container-fluid">
                        <h2 class="h5 no-margin-bottom">@yield('dashboard-name')</h2>
                      </div>
                    </div>
                    <!-- Breadcrumb-->
                    <div class="container-fluid">
                      <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">@yield('menu-name') </li>
                      </ul>
                    </div>

                 @yield('content')

                 @include('layouts.footer')

            </div>

        </div>

    <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
     <!-- <script src="{{ asset('admin/js/charts-home.js')}}"></script>  -->
     <script src="{{ asset('admin/js/front.js')}}"></script>

     <!-- DataTable -->

     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>





    </body>
</html>
