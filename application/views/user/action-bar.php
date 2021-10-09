<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Navbar -->
  <nav class="navbar navbar-expand navbar-white navbar-light sticky-top" style="background-color: white;box-shadow: 0 14px 28px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.22) !important;">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#" id="event-title-top-bar" style="font-size: 25px; color: #000;">
           <?= isset($event[0]['title']) == TRUE ? $event[0]['title'] : '' ?>
        </a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item" style="margin-right: 20px;">        
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-globe"></i>
            Publish
          </button>
      </li>
      <li class="nav-item">
          <a href="<?= base_url() ?>account-home" class="float-right btn btn-secondary">
            <i class="fas fa-times-circle"></i>
            Cancel</a>        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <br>