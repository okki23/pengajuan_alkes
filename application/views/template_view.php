<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Pengurusan Alkes</title>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/backend/'); ?>dist/img/alkes.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/summernote/summernote-bs4.min.css">

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/chart.js/Chart.min.js"></script>
   
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/toastr/toastr.min.css">
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/toastr/toastr.min.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/backend/'); ?>dist/js/adminlte.js"></script>  
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?php echo base_url('assets/backend/'); ?>dist/js/pages/dashboard.js"></script> -->

    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url('assets/backend/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="" src="<?php echo base_url('assets/backend/'); ?>dist/img/alkes.png" alt="AdminLTELogo" height="500" width="560">
  </div>

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
      
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> &nbsp; <?php echo $this->session->userdata('username'); ?> 
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> 
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('login/logout'); ?>" class="dropdown-item">
            <i class="fas fa-lock"></i> Logout
             
          </a>
         
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
 
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/backend/dist/img/alkes.png'); ?>" alt="AdminLTE Logo" class="brand-image  elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> ALKES</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) --> 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-header">MASTER DATA</li>
          <li class="nav-item">
            <a href="<?php echo base_url('barang'); ?>" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
              <p>
                Barang 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('user'); ?>" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
              <p>
                User 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('karyawan'); ?>" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
              <p>
                Karyawan 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('jabatan'); ?>" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
              <p>
                Posisi 
              </p>
            </a>
          </li>
         
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="<?php echo base_url('trans_pengajuan'); ?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Pengajuan
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
         

          <li class="nav-header">REPORT</li>
          <li class="nav-item">
            <a href="<?php echo base_url('print_laporan'); ?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Cetak Laporan
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Dashboard</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <?php 
           echo $this->load->view($konten);
        ?>
        
      
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">AKAGYM.net</a>.</strong>
    All rights reserved. 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
