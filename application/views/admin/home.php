<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	$this->load->view('admin/nav');
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
   
    <?php $this->load->view('_partials/_auth_breadcrumb'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
               
               <div class="row justify-items" style="height: 60vh;">
                  <div class="col-md-6">
                    

                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3><?= $events ?></h3>

                        <p>Total Events</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                      <a href="<?= base_url() ?>manage-events" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>


               </div>
                <div class="col-md-6">
                    

                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3><?= $tickets ?></h3>

                        <p>Tickets sold</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-coins"></i>
                      </div>
                      <a href="<?= base_url() ?>tickets" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>


               </div>

               <div class="col-md-6">
                 

                   <div class="small-box bg-success">
                      <div class="inner">
                        <h3><?= $earned ?></h3>

                        <p>Total earned(<?= webSettings()['site_currency'] ?>)</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-money-bill-alt"></i>
                      </div>
                      <a href="<?= base_url() ?>revenue" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>


               </div>

               <div class="col-md-6">
                 

                   <div class="small-box bg-primary">
                      <div class="inner">
                        <h3><?= $users ?></h3>

                        <p>Users</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-users"></i>
                      </div>
                      <a href="<?= base_url() ?>users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>


               </div>
               </div>

            </div>
            <div class="col-md-1"></div>
          </div> 

       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<style type="text/css">
   .small-box{
     min-height: 200px;
   }
   .small-box>.small-box-footer {
      background: rgba(0,0,0,.1);
      color: rgba(255,255,255,.8);
      display: block;
      padding: 3px 0;
      position: absolute;
      text-align: center;
      /* text-decoration: none; */
      z-index: 10;
      bottom: 0;
      width: 100%;
  }
  .small-box .icon {
      color: #fff;
      z-index: 0;
  }
  .small-box .inner{
    padding: 40px;
  }
  .small-box .inner h3{
     font-size: 50px;
  }
  .small-box .icon>i.fa, .small-box .icon>i.fab, .small-box .icon>i.far, .small-box .icon>i.fas, .small-box .icon>i.glyphicon, .small-box .icon>i.ion {
      font-size: 90px;
      top: 20px;
  }
</style>



 <?php $this->load->view('_partials/logged_footer') ?>
