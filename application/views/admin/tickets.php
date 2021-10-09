<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

  // echo '<pre>';print_r($tickets);die();
	
	$this->load->view('admin/nav');

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
   
    <?php $this->load->view('_partials/_auth_breadcrumb'); ?>


    <script src="<?= base_url() ?>assets/plugins/qrcode/qrcode.min.js"></script>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
         <div class="row">
            <div class="col-md-12">
             <div class="card card-danger" id="new-category-card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        Tickets
                      </h3>
                    </div>

                          <div class="card-body">

                               <?php  
                                  if(null != $this->session->flashdata('msg')){
                                     echo '<div class="text-center alert alert-success"><i class="fa fa-check-circle"></i><br/>' . $this->session->flashdata('msg') . '</div>';
                                  }
                              ?>

                              <table id="T-table" class="display table table-striped" cellspacing="0" width="100%">
                                 <thead>
                                    <th>#</th>
                                    <th>Ticket No.</th>
                                    <th>Event</th>
                                    <th> # tickets & Amount</th>
                                    <!-- <th>Personal Info</th> -->
                                    <th>Option</th>
                                  </thead>
                                  <tfoot>
                                    <th>#</th>
                                    <th>Ticket No.</th>
                                    <th>Event</th>
                                    <th> # tickets & Amount</th>
                                    <!-- <th>Personal Info</th> -->
                                    <th>Option</th>
                                  </tfoot>
                                  <tbody>
                                      <?php $i = 1; foreach ($tickets as $ticket) { ?>
                                      <tr>
                                          <td><?= $i ?></td>
                                          <td><?= $ticket['ticket_no'] ?></td>
                                          <td><?= $ticket['event'][0]['title'] ?></td>
                                          <td>(# <?= $ticket['tickets_nbr'] ?>) <?= $ticket['amount'] ?></td>
                                          <td>
                                              <a href="#"data-toggle="modal" data-target="#moreModal-<?= $ticket['id'] ?>"><i class="fas fa-bars"></i></a>

                                              <?php $this->load->view('admin/more', array('ticket' => $ticket)); ?>
                                          </td>
                                      </tr>
                                      <?php $i++;} ?>
                                  </tbody>
                              </table>
                            </div>
                          </div>

            </div>
        </div>
        <!-- /.row -->
       
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
    $('#T-table').DataTable();
  });
</script>



 <?php $this->load->view('_partials/logged_footer') ?>
