<!DOCTYPE html>
<html lang="en">
<head>
  {{-- <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
  {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
  {{-- --------------------------------------------------------------------- --}}
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">  
   {{-- --------------------------------------------------------------------- --}}
 

  <title>Master Dil</title>

  <!-- Google Font: Source Sans Pro -->
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">
  
  {{-- <meta http-equiv="refresh" content="5"> --}}
   <!-- Theme style -->
   {{-- <meta http-equiv ="refresh" content="{{ $sec; }}" URL="{{ $page; }}"> --}}
   @yield('test')
   @stack('style')
   {{-- <style>
    .loader-div {
       display: none;
       position: fixed;
       margin: 0px;
       padding: 0px;
       right: 0px;
       top: 0px;
       width: 100%;
       height: 100%;
       background-color: #fff;
       z-index: 30001;
       opacity: 0.8;
     }
     .loader-img {
       position: absolute;
       top: 0;
       bottom: 0;
       left: 0;
       right: 0;
       margin: auto;
     }
 </style> --}}
 {{-- <style>
  #jam {
    color:blue;
    background-color: aqua;
    font-size: 24px;
    border-radius: 10px 10px 10px 10px;
   }
   
</style> --}}
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('adminLTE/dist/img/a.png') }}" alt="P E R U M D A" height="100" width="100">
  </div>  --}}

  <!-- Navbar -->

      @include('templates.v_navbar')
      <!-- Sidebar Menu -->
        @include('templates.v_sidebar')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper" style="min-height: 100%;"> 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<div>
 <marquee>!!! DILAN Sudah Bisa Digunakan, Apabila ditemukan ada BUG silahkan hubungi IT atau HUMAS dan kami sangat support bila ada yang mengembangkan, Mohon ma'af yang sebesar besarnya dengan keterbatasan ilmu yang TIM Kami Miliki !!!</marquee>

</div>
  

    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h6 class="m-0">@yield('title')</h6>
         <!-- /.col -->
         
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Profile</li> --}}
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <section class="tabel">
        @yield('tabel')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
   
    <strong class="text-warning">&copy; 2023</strong>
    <span class="text-white">Tim H U M A S || بسم الله</span>
    <div class="float-right d-none d-sm-inline-block">
      <b class="text-white"></b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('adminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
{{-- <script src="{{ asset('adminLTE/') }}plugins/jquery-mapael/maps/usa_states.min.js"></script> --}}
<!-- ChartJS -->
<script src="{{ asset('adminLTE/plugins/chart.js/Chart.min.js') }}"></script>
{{-- <script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminLTE/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('adminLTE/dist/js/pages/dashboard2.js') }}"></script> --}}
{{-- ck editor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<!-- DataTables -->

<script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>


@stack('wilayah');
@stack('jalan');
@yield('footer2');
@yield('footer');
@stack('scripts');
@stack('kodescripts');
{{-- <script type="text/javascript">
  window.onload = function() { jam(); }
 
  function jam() {
      var e = document.getElementById('jam'),
      d = new Date(), h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());
 
      e.innerHTML = h +':'+ m +':'+ s;
 
      setTimeout('jam()', 1000);
  }
 
  function set(e) {
      e = e < 10 ? '0'+ e : e;
      return e;
  }

</script>   --}}
{{-- <script>
  function autoRefresh() {
      window.location = window.location.href;
  }
  setInterval('autoRefresh()', 2000);
</script> --}}
</body>
</html>
