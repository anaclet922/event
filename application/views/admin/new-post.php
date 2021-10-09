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


              <form class="form" method="post" action="<?= base_url('news/post_news') ?>" enctype="multipart/form-data">
                <div class="card card-danger" id="new-category-card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-newspaper"></i>
                        News
                      </h3>
                      <button type="submit" class="float-right pull-right btn btn-secondary" style="margin-left: 15px;margin-right: 15px">Publish</button>
                      <a href="<?= base_url('news-cp') ?>" class="float-right pull-right btn btn-outline-secondary" style="margin-left: 15px;margin-right: 15px">Cancel</a>
                    </div>

                    <div class="card-body">

                         <div class="form-group">
                           <label>Title</label>
                           <input type="text" name="title" class="form-control" required>
                         </div>

                         <div class="form-group">
                           <label>Content</label>
                           <textarea id="editor-main" class="form-control" name="body"></textarea>
                         </div>

                         <div class="form-group">
                           <label>Thumbnail</label>
                           <div class="input-images"></div>
                         </div>

                    </div>
                </div>
              </form>




            </div>
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <script type="text/javascript">
  $(document).ready(function(){
      
      $('.input-images').imageUploader({
        extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
        mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
        maxSize: undefined,
        maxFiles: 1,
        imagesInputName: 'image',
          label: 'Drag & Drop image here or click to browse.',
      });


       CKEDITOR.replace( 'editor-main' );  

  });
</script>



 <?php $this->load->view('_partials/logged_footer') ?>
