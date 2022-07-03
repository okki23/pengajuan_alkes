<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url('assets/backend/dist/img/alkes.png'); ?>" rel="icon">
  <title>Sistem Pengurusan Alkes</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>dist/css/adminlte.min.css"> 
</head>
<body class="hold-transition login-page" style="background-color:#CCCDD2;"> 
<div align="center">
  <h1>
    Sistem Pengurusan Alkes
  </h1>
    <img src="<?php echo base_url('assets/backend/dist/img/alkes.png'); ?>" style="width:15%; margin-bottom:40px;" alt="">
</div> 
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card card-outline card-success">
  
    <div class="card-body">
      <p class="login-box-msg">Login Page</p>
      
        <form id="sign_in" action="<?php echo base_url('login/autentikasi'); ?>" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" name="username" id="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password"  class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Masuk</button>
          </div> 
        </div>
        </form>  
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

 
</body>
</html>
