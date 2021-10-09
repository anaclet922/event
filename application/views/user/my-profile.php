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
                        <i class="fas fa-user mr-1"></i>
                          My Profile
                      </h3>
                    </div>

                          <div class="card-body">

                              <div class="row">
                                  <div class="col-md-4">
                                      <img src="<?php 
                                                echo base_url();
                                                echo $this->session->user[0]['profile_pic'] == '' ? 'assets/img/user8-128x128.jpg' : 'uploads/profiles/' . $this->session->user[0]['profile_pic'] ?>" class="img-thumbnail w-100">
                                      <br><br><br>


                                      <div class="nav flex-column nav-tabs" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                          <a class="nav-link my-nav-link active" id="vert-tabs-personal-info-tab" data-toggle="pill" href="#vert-tabs-profile-info" role="tab" aria-controls="vert-tabs-profile-info" aria-selected="false"><i class="fas fa-user"></i> Personal info</a>
                                          <a class="nav-link my-nav-link" id="vert-tabs-profile-picture-tab" data-toggle="pill" href="#vert-tabs-profile-picture" role="tab" aria-controls="vert-tabs-profile-picture" aria-selected="false"><i class="fas fa-image"></i> Profile Picture</a>

                                          <a class="nav-link my-nav-link" id="vert-tabs-password-tab" data-toggle="pill" href="#vert-tabs-password" role="tab" aria-controls="vert-tabs-password" aria-selected="false"><i class="fas fa-lock"></i> Password</a>
                                        </div>

                                  </div>
                                  <div class="col-md-8">
                                    <div class="tab-content" id="vert-tabs-tabContent"> 
                                      <div class="tab-pane fade active show" id="vert-tabs-profile-info" role="tabpanel" aria-labelledby="vert-tabs-personal-info-tab">
                                        <form class="form" method="post" id="id-profile-info-form" action="<?= base_url() ?>change-user-info">


                                            <div class="form-group">
                                            <label for="exampleInputFname">Full name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleInputFname" placeholder="Enter First Name" required="true" value="<?= $profile[0]['full_name'] ?>" name="full_name">
                                          </div>


                                          <div class="form-group">
                                            <label for="exampleInputEmail">Email<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter Email" required="true" value="<?= $profile[0]['email'] ?>" name="email">
                                          </div>

                                          <div class="form-group">
                                            <label for="exampleInputPhone">Phone</label>
                                            <input type="text" class="form-control" id="exampleInputPhone" placeholder="Enter Phone" value="<?= $profile[0]['phone'] ?>" name="phone">
                                          </div>

                                          <div class="form-group">
                                            <label for="exampleInputAddress">Address</label>
                                            <input type="text" class="form-control" id="exampleInputAddress" placeholder="Enter address" value="<?= $profile[0]['address'] ?>" name="address">
                                          </div>

                                          <br>

                                          <button class="btn btn-danger"><i class="fas fa-save"></i> Save changes</button> </form>
                                      </div>
                                       <div class="tab-pane fade" id="vert-tabs-profile-picture" role="tabpanel" aria-labelledby="vert-tabs-profile-picture-tab">
                                        
                                        <form method="post" id="id-profile-picture-form" enctype="multipart/form-data" action="<?= base_url() ?>change-user-profile">
                                            <div>
                                               <img src="" id="image-preview" class="w-100" style="display: none;">
                                            </div>
                                            <div class="form-group">
                                              <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                              </div>
                                            </div>
                                            <br>
                                          
                                            <button class="btn btn-danger" type="submit"><i class="fas fa-save"></i> Save changes</button>

                                        </form>

                                      </div>

                                       <div class="tab-pane fade" id="vert-tabs-password" role="tabpanel" aria-labelledby="vert-tabs-password-tab">

                                          <form class="form" method="post" id="id-profile-password-form" action="<?= base_url() ?>change-user-password">


                                          <div class="form-group">
                                            <label for="exampleInputOPassword">Old password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="exampleInputOPassword" placeholder="Enter old password" required="true" name="old_password">
                                          </div>

                                           <div class="form-group">
                                            <label for="exampleInputNPassword">New password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="exampleInputNPassword" placeholder="Enter new password" required="true" name="password">
                                          </div>

                                           <div class="form-group">
                                            <label for="exampleInputCNPassword">Confirm new password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="exampleInputCNPassword" placeholder="Confirm new password" required="true" name="cpassword">
                                          </div>
                                         

                                          <br>

                                          <button class="btn btn-danger" type="submit"><i class="fas fa-save"></i> Save changes</button> </form>
                                      </div>
                                    </div>
                                  </div>
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
     .swal-button,  .swal-button:hover{
        background-color: #D81B60;
        color: white;
     }
    .swal-button--cancel, .swal-button--cancel:hover{
       color: #555;
        background-color: #efefef;
     }
     .my-nav-link{
        color: #343a40;
     }
     .nav-tabs .my-nav-link.active{
       color: #fff;
     }
  </style>

  <script type="text/javascript">
       function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
            $('#image-preview').attr('src', e.target.result);
          }
          $('#image-preview').show();
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      } 

        $("#customFile").change(function() {
          readURL(this);
        });
  </script>



 <?php $this->load->view('_partials/logged_footer') ?>
