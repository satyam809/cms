<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Tech Classes</title>
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/admin/images/logo.jpg">
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <!-- jQuery -->
   <script src="<?php echo base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
   <style type="text/css">
      body {
         font-family: none !important;
         height: auto !important;
         font-size: larger !important;
      }

      @media (min-width: 481px) and (max-width: 767px) {
         .center_btn {
            text-align: center;
         }
      }

      /* 
         ##Device = Most of the Smartphones Mobiles (Portrait)
         ##Screen = B/w 320px to 479px
         */
      @media (min-width: 320px) and (max-width: 480px) {
         .center_btn {
            text-align: center;
         }
      }
   </style>
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bbootstrap 4 -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/summernote/summernote-bs4.css">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Ekko Lightbox -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/ekko-lightbox/ekko-lightbox.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" id="logo_size"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <span style="position: absolute;
               top: 50%;
               left: 50%;
               transform: translateX(-50%) translateY(-50%)" ;>Welcome to Tech Classes Dashboard</span>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <!-- <a href="index.php" style="border: none;">
            <img src="dist/img/logo1.jpg" alt="" class="img-circle elevation-3" style="opacity: .8;float: none;max-width: 100%;height: auto;display: block;" id="logo_size_change">
         </a> -->
         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>admin/gallery" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                           Gallery
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>admin/downloads" class="nav-link">
                        <i class="nav-icon fas fa-upload"></i>
                        <p>Downloads</p>
                     </a>
                  </li>
                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                           Courses
                           <i class="fas fa-angle-left right"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="<?php echo base_url(); ?>admin/addCourses" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Courses</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url(); ?>admin/viewCourses" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>View Courses</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>admin/contact" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Contact</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo base_url(); ?>admin/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                     </a>
                  </li>
               </ul>
            </nav>
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>