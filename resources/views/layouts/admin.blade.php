<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>  @yield('title') </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('admin.common.header')  
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('admin.common.topmenu')
  @include('admin.common.leftmenu')
  @yield('main-content')  
  @include('admin.common.footer')  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>
