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
                        System users
                      </h3>
                      <a href="#" class="float-right pull-right btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Add new user</a>
                    </div>

                          <div class="card-body">
                              <?php  
                                  if(null != $this->session->flashdata('msg')){
                                     echo '<div class="text-center alert alert-warning text-danger"><i class="fa fa-exclamation-triangle"></i><br/>' . $this->session->flashdata('msg') . '</div>';
                                  }
                              ?>
                              <table id="T-table" class="display table table-striped" cellspacing="0" width="100%">
                                 <thead>
                                    <th>#</th>
                                    <th>Names</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Options</th>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; foreach ($users as $user) { ?>
                                      <tr>
                                          <td><?= $i ?></td>
                                          <td><?= $user['full_name'] ?></td>
                                          <td><?= $user['email'] ?></td>
                                          <td><span class="badge <?= $user['role'] == 'admin' ? 'badge-danger' : 'badge-warning' ?>"><?= ucfirst($user['role']) ?></span></td>
                                          <td>

                                              <?php if($user['id'] != $this->session->user[0]['id']){ ?>
                                              <a href="#" class="text-success" data-toggle="modal" data-target="#editModal-<?= $user['id'] ?>"><i class="fa fa-edit"></i></a>
                                              &nbsp;&nbsp;&nbsp;
                                              <a href="#" class="text-danger" onclick="confirmDelete(<?= $user['id'] ?>)"><i class="fa fa-trash"></i></a>

                                              <?php
                                                  $this->load->view('admin/edit-user', array('user' => $user));
                                               ?>

                                             <?php } ?>

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





<!-- new user modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>add-new-user" method="post">
        <div class="modal-body">

          <div class="form-group">
            <label>Names*</label>
            <input type="text" name="full_name" class="form-control" required>
          </div>


          <div class="form-group">
            <label>Email*</label>
            <input type="email" name="email" class="form-control" required>
          </div>


          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
          </div>


          <div class="form-group">
            <label>Role</label>
            <select class="custom-select" name="role">
                <option value="user" selected>User</option>
                <option value="admin">Admin</option>
            </select>
          </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  function confirmDelete(id){
        swal({
            title: "Are you sure to delete?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
               location.href = '<?= base_url() ?>delete-user/' + id;
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
    $('#T-table').DataTable();
  });
</script>


 <?php $this->load->view('_partials/logged_footer') ?>
