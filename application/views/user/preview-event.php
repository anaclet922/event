<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
  
  if($this->session->user[0]['role'] == 'admin'){
    $this->load->view('admin/nav');
  }else{
    $this->load->view('user/nav');
  }
  
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="">
    
    <?php $this->load->view('_partials/_auth_breadcrumb'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
              
          <div class="row">
              
              <div class="col-md-12">
                  
                  <div class="card card-danger">
                      <div class="card-header">
                        <h2 class="card-title"><?= $event[0]['title'] ?></h2>
                        <a href="<?= base_url() ?>manage-event" class="float-right btn btn-secondary">
                            Cancel
                        </a>
                        <a href="<?= base_url() ?>edit-event/<?= $event[0]['id'] ?>" class="float-right btn btn-primary">
                           Edit
                        </a>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                        <div class="card-body">
                              <div class="row">
                                 <div class="col-md-6">
                                    <img src="<?= base_url() ?>uploads/img/<?= $event[0]['thumbnail'] ?>" class="img-thumbnail">
                                    <br>
                                    <?= $event['0']['description'] ?>
                                 </div>
                                <div class="col-md-6">
                                    <h3>Ticket plan(s):</h3>
                                    <?php
                                        $bgs = array(
                                            0 => 'bg-warning',
                                            1 => 'bg-primary',
                                            2 => 'bg-success'
                                        );
                                        $i = 0;
                                        foreach ($tickets_plans as $plan) {
                                    ?>
                                    <div class="info-box <?= $bgs[$i] ?>">
                                      <span class="info-box-icon"><i class="fas fa-chair"></i></span>
                                      <div class="info-box-content">
                                        <span class="info-box-text">
                                          <b><?= $plan['plan_name'] ?></b> for <b><?= $plan['price'] ?> <?= webSettings()['site_currency'] ?></b>
                                          </span>
                                        <span class="info-box-number">
                                          Seats: <span></span><?= $plan['seats'] ?>
                                        </span>
                                      </div>
                                    </div>
                                    <?php
                                        $i++;
                                      }
                                    ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="info-box">
                                              <span class="info-box-icon bg-info"><i class="fas fa-calendar-alt"></i></span>

                                              <div class="info-box-content">
                                                <span class="info-box-text">Date</span>
                                                <span class="info-box-number"><?= $event[0]['date_'] ?></span>
                                              </div>
                                              <!-- /.info-box-content -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-box">
                                              <span class="info-box-icon bg-info"><i class="fas fa-clock"></i></span>

                                              <div class="info-box-content">
                                                <span class="info-box-text">Time</span>
                                                <span class="info-box-number"><?= $event[0]['time_'] ?></span>
                                              </div>
                                              <!-- /.info-box-content -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>                        
                        </div>
                    </div>

              </div>

          </div>       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->





  </div>
  <script type="text/javascript">
   

  </script>
  <style type="text/css">
     .swal-button,  .swal-button:hover{
        background-color: #D81B60;
        color: white;
     }
    .swal-button--cancel, .swal-button--cancel:hover{
       color: #555;
        background-color: #efefef;
     }
  </style>




 <?php $this->load->view('_partials/logged_footer') ?>
