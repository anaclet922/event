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
          <!-- left column -->


          <div class="col-md-6">
            <!-- general form elements -->


              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Logo</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form" method="post" action="<?= base_url() ?>settings-change-logo" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <!-- <label for="customFile">Custom File</label> -->

                    
                      <center>
                        <img 
                        src="<?= base_url() ?>assets/img/<?= webSettings()['logo'] ?>" 
                        alt="Logo" 
                        class="brand-image image-logo-preview"
                  style="width: auto;height: 100px;">
                </center>
                <br>


                      <div class="custom-file">
                        <input type="file" name="imgInpLogoChooser" class="custom-file-input" id="imgInpLogoChooser">
                        <label class="custom-file-label" for="imgInpLogoChooser">Choose file</label>
                      </div>
                    </div>
                   


                  <div class="card-footer">
                    <center>
                          <button type="submit" class="btn btn-primary">
                          <i class="fas fa-save"></i> Save</button>
                      </center>
                  </div>
                  </div>
                </form>
              </div>
                <!-- /.card -->


            <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Site Info</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form" method="post" action="<?= base_url() ?>settings-change-info">
                    <div class="card-body">
                    
                      
                      <div class="form-group">
                          <label for="exampleInputEmail1">Site name</label>
                          <input type="text" class="form-control" name="site_name" placeholder="Enter site name" value="<?= webSettings()['site_name'] ?>">
                      </div>

                      <div class="form-group">
                          <label>Keywords</label>
                          <textarea class="form-control" rows="3" name="site_keywords" placeholder="Enter keywords..."><?= webSettings()['site_keywords'] ?></textarea>
                        </div>

                        <div class="form-group">
                          <label>Description</label>
                          <textarea class="form-control" rows="3" name="site_description" placeholder="Enter description..."><?= webSettings()['site_description'] ?></textarea>
                        </div>

                     


                    <div class="card-footer">
                      <center>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save</button>
                        </center>
                    </div>
                    </div>
                  </form>
            </div>
                <!-- /.card -->

            <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Footer address</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form" method="post" action="<?= base_url() ?>settings-change-footer-address" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Address & Contacts</label>
                           
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                 <input type="text" name="site_address" class="form-control" value="<?= webSettings()['site_address'] ?>" placeholder="Address here...">
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                 <input type="text" name="site_contact_phone" class="form-control" value="<?= webSettings()['site_contact_phone'] ?>" placeholder="Phone number...">
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                 <input type="email" name="site_contact_email" class="form-control" value="<?= webSettings()['site_contact_email'] ?>" placeholder="Eg: info@example.com...">
                            </div>


                      </div>
                      <div class="card-footer">
                        <center>
                              <button type="submit" class="btn btn-primary">
                              <i class="fas fa-save"></i> Save</button>
                          </center>
                      </div>
                    </div>
                   </div>
                  </form>
            </div>
                <!-- /.card -->
            
             <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Site system email</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form" method="post" action="<?= base_url() ?>settings-change-site-email" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">E-mail</label>
                           <input type="email" name="email" class="form-control" value="<?= webSettings()['site_email'] ?>" placeholder="Eg: info@example.com...">
                      </div>
                    <div class="card-footer">
                      <center>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save</button>
                        </center>
                    </div>
                    </div>
                </div>
                  </form>
              </div>
                <!-- /.card -->



              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Terms and condition</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form" method="post" action="<?= base_url() ?>settings-change-terms-condition" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Policy</label>
                           <textarea class="textarea text-description" name="terms" placeholder="Place some text here, about this stream..."
                              style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= webSettings()['site_terms'] ?></textarea>
                      </div>
                    <div class="card-footer">
                      <center>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save</button>
                        </center>
                    </div>
                    </div></div>
                  </form>
              </div>


              <div class="card card-warning" style="display: none;">
                  <div class="card-header">
                    <h3 class="card-title">Flutterwave</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form" method="post" action="<?= base_url() ?>settings-change-flutterwave" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                    
                         <div class="form-group">
                          <label class="control-label">Flutterwave public key</label>
                          <input type="text" class="form-control" name="flutterwave_public_key" placeholder="Flutterwave public key"
                                 value="<?= webSettings()['flutterwave_public_key'] ?>">
                      </div>
                      <div class="form-group">
                          <label class="control-label">Flutterwave secret key</label>
                          <input type="text" class="form-control" name="flutterwave_secret_key" placeholder="Flutterwave secret key"
                                 value="<?= webSettings()['flutterwave_secret_key'] ?>">
                      </div>
                      <div class="form-group">
                          <label class="control-label">Flutterwave encryption key</label>
                          <input type="text" class="form-control" name="flutterwave_encryption_key" placeholder="Flutterwave encryption key"
                                 value="<?= webSettings()['flutterwave_encryption_key'] ?>">
                    <div class="card-footer">
                      <center>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save</button>
                        </center>
                    </div>
                    </div> </div></div>
                  </form>
              </div>


          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">


            
               <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Favicon</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                   <form class="form" method="post" action="<?= base_url() ?>settings-change-favicon" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <!-- <label for="customFile">Custom File</label> -->

                        <center>
                          <img 
                          src="<?= base_url() ?>assets/img/<?= webSettings()['favicon'] ?>" 
                          alt="Logo" 
                          class="brand-image image-logo-preview1"
                      style="width: auto;height: 100px;">
                    </center>
                    <br>


                        <div class="custom-file">
                          <input type="file" name="imgInpLogoChooser" class="custom-file-input" id="imgInpLogoChooser1">
                          <label class="custom-file-label" for="imgInpLogoChooser">Choose file</label>
                        </div>
                      </div>
                     


                    <div class="card-footer">
                      <center>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save</button>
                        </center>
                    </div>
                    </div>
                  </form>
             </div>
                <!-- /.card -->


             <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Currency</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form" method="post" action="<?= base_url() ?>settings-change-currency" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Currency</label>
                          <input type="text" class="form-control" name="site_currency" placeholder="Enter site name" value="<?= webSettings()['site_currency'] ?>">
                      </div>
                    <div class="card-footer">
                      <center>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save</button>
                        </center>
                    </div>
                    </div>
                </div>
                  </form>
             </div>
                <!-- /.card -->

              <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Footer about</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form" method="post" action="<?= base_url() ?>settings-change-footer-about" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">About</label>
                           <textarea class="textarea text-description" name="about" placeholder="Place some text here, about this stream..."
                              style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= webSettings()['footer_about'] ?></textarea>
                      </div>
                    <div class="card-footer">
                      <center>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save</button>
                        </center>
                    </div>
                    </div> </div>
                  </form>
              </div>
                <!-- /.card -->

              <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Social Media</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form" method="post" action="<?= base_url() ?>settings-change-social-media" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Facebook</label>
                           <input type="text" name="facebook" class="form-control" value="<?= webSettings()['footer_facebook'] ?>" placeholder="Facebook URL...">
                           <label for="exampleInputEmail1">Twitter</label>
                           <input type="text" name="twitter" class="form-control" value="<?= webSettings()['footer_twitter'] ?>" placeholder="Twitter URL...">
                           <label for="exampleInputEmail1">Youtube</label>
                           <input type="text" name="youtube" class="form-control" value="<?= webSettings()['footer_youtube'] ?>" placeholder="Youtube URL...">
                           <label for="exampleInputEmail1">LinkedIn</label>
                           <input type="text" name="linkedin" class="form-control" value="<?= webSettings()['footer_linkedin'] ?>" placeholder="LinkedIn URL...">
                            <label for="exampleInputEmail1">Instagram</label>
                           <input type="text" name="instagram" class="form-control" value="<?= webSettings()['footer_instagram'] ?>" placeholder="Instagram URL...">
                      </div>
                    <div class="card-footer">
                      <center>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save</button>
                        </center>
                    </div>
                    </div> </div>
                  </form>
              </div>
                <!-- /.card -->

              <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Privacy policy</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form" method="post" action="<?= base_url() ?>settings-change-privacy-policy" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Policy</label>
                           <textarea class="textarea text-description" name="policy" placeholder="Place some text here, about this stream..."
                              style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= webSettings()['site_privacy'] ?></textarea>
                      </div>
                    <div class="card-footer">
                      <center>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save</button>
                        </center>
                    </div>
                    </div> </div>
                  </form>
              </div>
                <!-- /.card -->


              <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Total seats</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form" method="post" action="<?= base_url() ?>settings-change-total-seats" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Seats</label>
                          <input class="form-control" type="number" name="total_seats" value="<?= webSettings()['total_seats'] ?>" required>
                      </div>
                    <div class="card-footer">
                      <center>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save</button>
                        </center>
                    </div>
                    </div> </div>
                  </form>
              </div>

               <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">News articles to show on one page</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form" method="post" action="<?= base_url() ?>settings-change-news-per-page" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">Articles</label>
                          <input class="form-control" type="number" name="news_per_page" value="<?= webSettings()['news_per_page'] ?>" required>
                      </div>
                    <div class="card-footer">
                      <center>
                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save</button>
                        </center>
                    </div>
                    </div> </div>
                  </form>
              </div>


          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript">

    function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('.image-logo-preview').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  } 

    $("#imgInpLogoChooser").change(function() {
      readURL(this);
    });
  function readURL1(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('.image-logo-preview1').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  } 

    $("#imgInpLogoChooser1").change(function() {
      readURL1(this);
    });
  </script>


 <?php $this->load->view('_partials/logged_footer') ?>
