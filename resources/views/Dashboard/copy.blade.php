<!DOCTYPE html>
<html lang="en">
@include('Dashboard.layout.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('Dashboard.layout.navbar')

@include('Dashboard.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @yield('content-header')
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @yield('content-body')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@include('Dashboard.layout.footer')
</div>
<!-- ./wrapper -->

@include('Dashboard.layout.script')
</body>
</html>
