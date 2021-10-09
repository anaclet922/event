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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href=".<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css"><!-- jquery-validation -->
  <!-- jQuery -->
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>


  <script src="<?= base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>

  <script src="<?= base_url() ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>

  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/style.css">
  <!--  FAVICON  ICONS -->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/<?=webSettings()['favicon'] ?>"/>
  <!-- this icon shows in browser toolbar -->
  <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/<?=webSettings()['favicon'] ?>"/>



  <link href="<?= base_url() ?>assets/plugins/drag-drop-image-uploader/dist/image-uploader.min.css" rel="stylesheet">
  <script src="<?= base_url() ?>assets/plugins/drag-drop-image-uploader/dist/image-uploader.min.js"></script>

  <?php  if($this->session->user){ ?>
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <?php } ?>


</head>
<body class="hold-transition login-page">