<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?> | <?= webSettings()['site_name'] ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- jQuery -->
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">
   <script src="<?= base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>

 
  <script type="text/javascript" src="<?= base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>

  
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/style.css">

  <!--  FAVICON  ICONS -->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/<?=webSettings()['favicon'] ?>"/>
  <!-- this icon shows in browser toolbar -->
  <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/<?=webSettings()['favicon'] ?>"/>



<link href="<?= base_url() ?>assets/plugins/drag-drop-image-uploader/dist/image-uploader.min.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/plugins/drag-drop-image-uploader/dist/image-uploader.min.js"></script>


<?php if($this->session->user){ ?>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<?php } ?>


</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">