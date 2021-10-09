<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<nav class="navbar navbar-expand top-nav-front" style="height: 35px;">
  <ul class="navbar-nav ml-auto">
  	  

      <?php if(isset(webSettings()['site_contact_phone']) && webSettings()['site_contact_phone'] != ''){ ?>
      <li class="nav-item">
         <a href="tel:<?php echo webSettings()['site_contact_phone']; ?>" class="nav-link">
          <i class="fas fa-phone-alt"></i> <?php echo webSettings()['site_contact_phone']; ?>
         </a>
      </li>
      <?php } ?>


      <?php if(isset(webSettings()['site_contact_email']) && webSettings()['site_contact_email'] != ''){ ?>
      <li class="nav-item">
         <a href="mailto:<?php echo webSettings()['site_contact_email']; ?>" class="nav-link">
          <i class="fas fa-envelope"></i> <?php echo webSettings()['site_contact_email']; ?>
         </a>
      </li>
      <?php } ?>

     <!--  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-flag"></i> 
          Language          
  	  	  <i class="fas fa-caret-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> English
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Francais
          </a>
        </div>
      </li> -->


    </ul>
</nav>


<nav class="navbar navbar-expand navbar-danger navbar-dark">
	   
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url() ?>assets/img/<?= webSettings()['logo'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b><?= webSettings()['site_name'] ?></b></span>
    </a>


    <!-- responsive menu button -->

    <button id="toglemenubtn" class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fas fa-align-right" style=""></span>
    </button>

<div class="collapse navbar-collapse order-3" id="navbarCollapse">

  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= base_url() ?>" class="nav-link">Home</a>
    </li>
   <!--  <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Upcoming</a>
    </li> -->


    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= base_url('news') ?>" class="nav-link">News</a>
    </li>

    <?php if(pageVis()['contact'] == 1){ ?>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= base_url() ?>page/contact" class="nav-link">Contact</a>
    </li>
    <?php } if(pageVis()['about'] == 1){ ?>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= base_url() ?>page/view/about" class="nav-link">About</a>
    </li>
    <?php } ?>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>


    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class= "nav-link" href="<?= base_url() ?>register">
          <!-- <i class="fas fa-user-plus"></i>  -->
          Sign up
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>login">
          <!-- <i class="fas fa-user"></i>  -->
          Sign in
        </a>
      </li>
    </ul>



  </div>
</nav>




<style type="text/css">
	.top-nav-front .nav-link{
		color: rgba(0,0,0,.5);
		font-size: 14px;
	}
</style>