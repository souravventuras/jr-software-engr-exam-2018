<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('plugins/bootstrap/dist/css/bootstrap.min.css') !!}

  <!-- Font Awesome -->
  {!! Html::style('plugins/font-awesome/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('plugins/Ionicons/css/ionicons.min.css') !!}

  <!-- Theme style -->
  {!! Html::style('css/AdminLTE.min.css') !!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
  {!! Html::style('css/skins/_all-skins.min.css') !!}


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">JSE</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>JSE</b>2018</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>
  </header>
  @include('layouts.blocks.navigation')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-{{ date("Y")}} <a href="mailto:md.ikbalhossain@gmail.com">Md Ikbal Hossain</a>.</strong> All rights
    reserved.
  </footer>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
{!! Html::script('plugins/jquery/dist/jquery.min.js') !!}
<!-- Bootstrap 3.3.7 -->
{!! Html::script('plugins/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- Slimscroll -->
{{-- <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> --}}
<!-- FastClick -->
{{-- <script src="../../bower_components/fastclick/lib/fastclick.js"></script> --}}
<!-- AdminLTE App -->
{!! Html::script('js/adminlte.min.js') !!}
<!-- AdminLTE for demo purposes -->
{!! Html::script('js/demo.js') !!}
</body>
</html>
