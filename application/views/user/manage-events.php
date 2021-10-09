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

    <?php //$this->load->view('user/action-bar'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
       
            <div class="row">
               <div class="col-md-1"></div>
               <div class="col-md-10">
                    <div class="card card-danger" id="new-category-card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        List of all events
                      </h3>
                    </div>

                          <div class="card-body">

                             <table id="example1" class="table table-striped">
                                <thead>
                                    <tr>
                                      <th style="width: 30px">#</th>
                                      <th>Title</th>
                                      <th>Tickets Plan</th>
                                      <th style="width: 200px;">Date&Time</th>
                                      <th style="width: 100px;">Options</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                      <th style="width: 30px">#</th>
                                      <th>Title</th>
                                      <th>Tickets Plan</th>
                                      <th style="width: 200px;">Date&Time</th>
                                      <th style="width: 100px;">Options</th>
                                  </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                      $i = 1;
                                      foreach ($events as $event) {
                                    ?>
                                    <tr>
                                       <td><?= $i ?></td>
                                       <td><?= $event['title'] ?></td>
                                       <td>
                                          <table class="table">
                                          <?php 
                                             foreach ($event['tickets_plans'] as $tickets_plan) { ?>
                                              <tr class="table-warning">
                                                 <td><?= $tickets_plan['plan_name'] ?></td>
                                                 <td><i class="fas fa-coins"></i> <?= $tickets_plan['price'] ?></td>
                                                 <td><i class="fas fa-chair "></i> <?= $tickets_plan['seats'] ?></td>
                                              </tr>
                                          <?php     
                                             }
                                          ?>
                                          </table>
                                       </td>
                                       <td><?= date("F d, Y", strtotime($event['date_'] . ' ' . $event['time_'])) . ' @ ' . $event['time_'] ?></td>
                                       <td class="dropdown">
                                          <a class="nav-link dropdown-toggle text-danger" data-toggle="dropdown" href="#">
                                             <i class="fas fa-sliders-h"></i>
                                          </a>
                                          <div class="dropdown-menu">
                                              <a class="dropdown-item text-success" tabindex="-1" href="<?= base_url() ?>edit-event/<?= $event['id'] ?>"><i class="fas fa-edit"></i> Edit</a>
                                              <a class="dropdown-item text-danger" tabindex="-1" onclick="confirmDelete(<?= $event['id'] ?>)" href="#"><i class="fas fa-trash"></i> Delete</a>
                                          </div>
                                        </td>
                                    </tr>
                                    <?php

                                      $i++;
                                      }
                                     ?>
                                </tbody>                                
                              </table>

                          </div>
                  </div>
               </div>
               <div class="col-md-1"></div>
            </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->




  </div>

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      $("#example1").DataTable();

    });

   
     function confirmDelete(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
               location.href = '<?= base_url() ?>event-delete/' + id;
            } else {
                swal.close();
            }
          });
    }
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
