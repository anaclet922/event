<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	$this->load->view('user/nav');
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
               
               <div class="row">
                  <div class="col-md-4">
                    

                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>65</h3>

                        <p>Total Events</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                      <a href="<?= base_url() ?>manage-events" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>


               </div>
                <div class="col-md-4">
                    

                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>65</h3>

                        <p>Tickets sold</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-coins"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>


               </div>

               <div class="col-md-4">
                 

                   <div class="small-box bg-success">
                      <div class="inner">
                        <h3>65</h3>

                        <p>Total earned</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-money-bill-alt"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>


               </div>
               </div>

            </div>
            <div class="col-md-1"></div>
          </div> 

          <div class="row">
             <div class="col-md-1"></div>
             <div class="col-md-10">
                

                  <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-chart-pie mr-1"></i>
                            Tickets sales
                        </h3>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content p-0">
                          <!-- Morris chart - Sales -->
                          <div class="chart tab-pane active" id="revenue-chart"
                               style="position: relative; height: 300px;">
                              <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                           </div>
                          <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                          </div>  
                        </div>
                      </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->

             </div>
             <div class="col-md-1"></div>
          </div>
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




 <?php $this->load->view('_partials/logged_footer') ?>
