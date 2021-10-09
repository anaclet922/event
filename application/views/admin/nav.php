<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() ?>" class="nav-link" target="_blank"><i class="fas fa-globe"></i> Visit site</a>
      </li>
     <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Support</a>
      </li> -->
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

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
     <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>user/logout" role="button"><i
            class="fas fa-sign-out-alt"></i> Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->






<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-danger elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?= base_url() ?>assets/img/<?= webSettings()['logo'] ?>" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b><?= webSettings()['site_name'] ?></b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php 
                    echo base_url();
                    echo $this->session->user[0]['profile_pic'] == '' ? 'assets/img/user8-128x128.jpg' : 'uploads/profiles/' . $this->session->user[0]['profile_pic'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url() ?>my-profile" class="d-block"><?= $this->session->user[0]['full_name'] ?></a>
        </div>
      </div>





      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <?php
              $active = $this->uri->segment(1);
           ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>admin-home" class="nav-link  <?= $active == 'admin-home' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>



          <li class="nav-item has-treeview <?php if($active == 'new-event' || $active == 'manage-events' || $active == 'categories'){echo 'menu-open';} ?>">
            <a href="#" class="nav-link  <?php if($active == 'new-event' || $active == 'manage-events' || $active == 'categories'){echo 'active';} ?>">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                EVENTS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>new-event" class="nav-link  <?php if($active == 'new-event'){echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>manage-events" class="nav-link  <?php if($active == 'manage-events'){echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All events</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>categories" class="nav-link  <?php if($active == 'categories'){echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">TICKES</li>
          <li class="nav-item">
             <a href="<?= base_url() ?>tickets" class="nav-link <?= $active == 'tickets' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                 Tickets
              </p>
            </a>
          </li>
          <li class="nav-item">
             <a href="<?= base_url() ?>revenue" class="nav-link <?= $active == 'revenue' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                 Revenue
              </p>
            </a>
          </li>

          <li class="nav-header">ACCOUNT SETTINGS</li>
         <!--   <li class="nav-item">
             <a href="<?= base_url() ?>users" class="nav-link <?= $active == 'my-profile' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li> -->
          <li class="nav-item">
             <a href="<?= base_url() ?>my-profile" class="nav-link <?= $active == 'my-profile' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                My profile
              </p>
            </a>
          </li>

          <li class="nav-item">
             <a href="<?= base_url() ?>users" class="nav-link <?= $active == 'users' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>



          <li class="nav-header">PAGES</li>
          <li class="nav-item">
             <a href="<?= base_url() ?>pages" class="nav-link <?= $active == 'pages' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                 Pages
              </p>
            </a>
          </li>

          <li class="nav-item">
             <a href="<?= base_url() ?>news-cp" class="nav-link <?= $active == 'news' || $active == 'news-cp' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                 News
              </p>
            </a>
          </li>


          <li class="nav-header">SYSTEM SETTINGS</li>
          <li class="nav-item">
             <a href="<?= base_url() ?>sys-settings" class="nav-link <?= $active == 'sys-settings' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
              </p>
            </a>
          </li>




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 