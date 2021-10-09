s<?php
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
                        <i class="fas fa-file mr-1"></i>
                        Pages
                      </h3>
                      <!-- <a href="#" class="float-right pull-right btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Add new page</a> -->
                    </div>

                          <div class="card-body">
                              <?php  
                                  // if(null != $this->session->flashdata('msg')){
                                  //    echo '<div class="text-center alert alert-warning text-danger"><i class="fa fa-exclamation-triangle"></i><br/>' . $this->session->flashdata('msg') . '</div>';
                                  // }
                              ?>
                              <table id="" class="display table table-striped" cellspacing="0" width="100%">
                                 <thead>
                                    <th>#</th>
                                    <th>Page</th>
                                    <th>Visibility</th>
                                    <th>Options</th>
                                  </thead>
                                  <tbody>

                                    <?php
                                      $i = 1;
                                      $p = ['about', 'terms', 'privacy'];
                                      foreach ($pages as $page) { if(in_array($page['page_slug'], $p)){ ?>
                                    <tr>
                                      <td><?= $i ?></td>
                                      <td><?= ucfirst($page['page_slug']) ?></td>
                                      <td style="color: #<?= $page['visibility'] == 1 ? '15C211' : 'FF3945' ?>;"><i class="fa <?= $page['visibility'] == 1 ? 'fa-eye' : 'fa-eye-slash' ?>"></i></td>
                                      <td>
                                         <a href="#" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                         <a href="#" class="btn btn-danger"  onclick="confirmChangeVis(<?= $page['id'] ?>)"><?= $page['visibility'] == 0 ? '<i class="fa fa-eye"></i>' : '<i class="fa fa-eye-slash"></i>' ?></a>
                                      </td>
                                    </tr>
                                    <?php
                                        $i++;}

                                      }
                                    ?>
                                      
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




<script type="text/javascript">
  function confirmChangeVis(id){
        swal({
            title: "Are you sure to change visibility of this page?",
            text: "It is recommened that all page be visible",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
               location.href = '<?= base_url() ?>change-page-visibility/' + id;
            } else {
                swal.close();
            }
          });
    }
</script>


<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#T-table').DataTable({
       // ofnSearch : false
    });
  });
</script>


 <?php $this->load->view('_partials/logged_footer') ?>
