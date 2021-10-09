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

            <?php  //echo '<pre>';print_r($events_revenue); ?>
            <div class="col-md-12">
             <div class="card card-danger" id="new-category-card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        Revenue
                      </h3>
                    </div>

                          <div class="card-body">
                              <table id="T-table" class="display table table-striped" cellspacing="0" width="100%">
                                 <thead>
                                    <th>#</th>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Tickets</th>
                                    <th>Revenue</th>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; foreach ($events_revenue as $revenue) { ?>
                                      <tr>
                                          <td><?= $i ?></td>
                                          <td><?= $revenue['title'] ?></td>
                                          <td><?= $revenue['created_at'] ?></td>
                                          <td><?= $revenue['tickets'] ?></td>
                                          <td><?= $revenue['sale'] ?></td>
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
