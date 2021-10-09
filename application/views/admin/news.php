<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

  // echo '<pre>';print_r($tickets);die();
	
	$this->load->view('admin/nav');

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
   
    <?php $this->load->view('_partials/_auth_breadcrumb'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
         <div class="row">
            <div class="col-md-12">
             <div class="card card-danger" id="new-category-card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-newspaper"></i>
                        News
                      </h3>
                      <a href="<?= base_url('news/new_post') ?>" class="float-right pull-right btn btn-secondary">New post</a>
                    </div>

                          <div class="card-body">

                            

                              <table id="T-table" class="display table table-striped" cellspacing="0" width="100%">
                                 <thead>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Views</th>
                                    <th>Time</th>
                                    <th></th>
                                  </thead>
                                  <tfoot>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Views</th>
                                    <th>Time</th>
                                    <th></th>
                                  </tfoot>
                                  <tbody>

                                    <?php $i = 1; foreach ($news as $new) { ?>
                                     <tr>
                                        <td style="vertical-align: middle;"><?= $i ?></td>
                                        <td><img src="<?= base_url('uploads/news/' . $new['thumbnail']) ?>" class="img-thumbnail" style="width: 150px;"/></td>
                                        <td style="vertical-align: middle;"><?= $new['title'] ?></td>
                                        <td style="vertical-align: middle;"><?= $new['views'] ?></td>
                                        <td style="vertical-align: middle;"><?= time_elapsed_string($new['created_at']) ?></td>
                                        <td style="vertical-align: middle;"></td>
                                        <td style="vertical-align: middle;">
                                           <a href="<?= base_url('news/update-news/' . $new['id']) ?>" class="text-primary option-icon"><i class="fas fa-edit"></i></a>
                                           <a href="javascript:void(0)" onclick="confirmAction(<?= $new['id'] ?>)" class="text-danger option-icon"><i class="fas fa-trash"></i></a>
                                           <a href="<?= base_url('article/' . $new['slug']) ?>" target="_blank" class="text-success option-icon"><i class="fas fa-eye"></i></a>
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

<script type="text/javascript">
    function confirmAction(id){
       swal({
              title: "Are you sure to delete?",
              text: "It will be deleted permenantly.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                 location.href = '<?= base_url() ?>delete-news/' + id;
              } else {
                  swal.close();
              }
            });
    }
  </script>



 <?php $this->load->view('_partials/logged_footer') ?>
