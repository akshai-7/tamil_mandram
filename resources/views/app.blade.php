<!DOCTYPE html>
<html lang="en">
@include('includes.layouts.header')

@php
$navClass ="sidebar-mini";
$murl = Request::segment(1);

$allowUrl = ['users','user_bulk_upload','staff_import','staff_import','learning-path','course','report'];
if(in_array($murl,$allowUrl)) {
    $navClass = "sidebar-mini sidebar-collapse";
}
@endphp

<body class="hold-transition {{$navClass}}">
<div class="wrapper">
  <!-- Navbar -->
  @include('includes.layouts.nav')

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('includes.layouts.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="  " style="margin: 0;">
    <!-- Content Header (Page header) -->
    @yield('content')

    <!-- /.content -->
  </div>
  <!-- fotter -->
  @include('includes.layouts.footer')


  <!-- fotter -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- script -->
@include('includes.layouts.script')


<!-- script -->

</body>
</html>
