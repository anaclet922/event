<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// echo'<pre>';print_r($categories);die();

  if($this->session->user[0]['role'] == 'admin'){
    $this->load->view('admin/nav');
  }else{
    $this->load->view('user/nav');
  }
	
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <?php $this->load->view('_partials/_auth_breadcrumb'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
          <div class="row">
            <div class="col-md-1"></div>
              <div class="col-md-6">

                 <div class="card card-danger">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-list-alt mr-1"></i>
                        Events categories
                      </h3>

                      <!-- <button class="float-right btn btn-info">Add new</button> -->
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      


                        <table class="table table-stripped">
                            <thead>                  
                              <tr>
                                <th style="width: 10px">#</th>
                                <th>Category</th>
                                <th>Parent</th>
                                <th style="width: 82px">Action</th>
                              </tr>
                            </thead>
                            <tbody id="categories-table-body">
                               <?php
                                $i = 1;
                                foreach ($categories as $category) {
                              ?>
                              <tr>
                                 <td><?= $i ?></td>
                                 <td><?= $category['category_name'] ?></td>
                                 <td>
                                    <?php
                                        if($category['parent_category'] != NULL){
                                            foreach ($categories as $c) {
                                              if($c['id'] == $category['parent_category']){
                                                 echo $c['category_name'];
                                              }
                                            }
                                        }else{
                                    ?>
                                      <span class="badge bg-info">None</span>
                                    <?php
                                        }
                                    ?>
                                 </td>
                                 <td>
                                    <a href="#" class="text-danger" onclick="confirmDelete(<?= $category['id'] ?>)">
                                       <i class="fas fa-trash"></i>
                                    </a>
                                    <span style="margin-left: 5px;margin-right: 5px;">|</span>
                                    <a href="#" onclick="showUpdateCard(<?= $category['id'] ?>, '<?= $category['category_name'] ?>', '<?= $category['parent_category'] ?>')">
                                       <i class="fas fa-edit"></i>
                                    </a>
                                 </td>
                              </tr>                              
                              <?php
                                $i++;
                                }
                               ?>
                            </tbody>
                          </table>


                    </div><!-- /.card-body -->
                  </div>
              </div>
              <div class="col-md-4 div-form-container">



                 <div class="card card-success" id="new-category-card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-plus-square mr-1"></i>
                        Add new category
                      </h3>
                    </div>

                      <form role="form" id="quickForm" action="">
                          <div class="card-body">

                            <div class="form-group">
                              <label for="exampleInputEmail1">Category</label>
                              <input type="text" name="category" class="form-control" id="category" placeholder="Enter category" />
                            </div>


                            <div class="form-group">
                              <label>Parent category</label>
                              <select class="custom-select" name="parent">
                                <option selected value="">None</option>
                                <?php
                                  foreach ($categories as $category) {
                                ?>
                                <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </div>

                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                  </div>

                  <div class="card card-warning" id="update-categpry-card" style="display: none;">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-edit mr-1"></i>
                        Update category
                      </h3>
                    </div>
                      <form id="quickForm-1" method="post">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Category</label>
                              <input type="text" name="category_1" class="form-control" id="category_1" placeholder="Enter category" value="" />
                            </div>
                            <div class="form-group">
                              <label>Parent category</label>
                              <select class="custom-select" name="parent" id="update-select-parent">
                                <option selected value="">None</option>
                               <?php
                                  foreach ($categories as $category) {
                                ?>
                                <option value="<?= $category["id"] ?>"><?= $category["category_name"] ?></option> 
                                <?php
                                  }
                                ?> 
                             </select>
                            </div>
                          </div>
                          <input type="hidden" value="" name="category_id" id="category_id" /> 
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary float-right" onclick="removeUpdateCard()">Cancel</button>
                         </div>
                        </form>
                  </div>

                  <button onclick="removeUpdateCard()" type="button" class="btn btn-success addnewbtn btn-block" style="display: none;">Add new category</button>

              </div>

            <div class="col-md-1"></div>
          </div> 
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
    $(document).ready(function(){

       $('#quickForm').validate({
          rules: {
            category: {
              required: true,
              minlength: 3
            },
          },
          messages: {
            category: {
              required: "Please enter a category",
            }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
    });


       $('#quickForm-1').validate({
          rules: {
            category_1: {
              required: true,
              minlength: 3
            },
          },
          messages: {
            category_1: {
              required: "Category can not be empty",
            }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
    });


       $('#quickForm').on('submit', function(e){

          e.preventDefault();

           if(!$("#quickForm").valid()){
              return false;
           }
          showLoading();
             $.ajax({
                  url: "<?php echo base_url(); ?>add-new-category",
                  type: 'post',
                  data: $("#quickForm").serialize(),
                  success:function(response){
                      swal.close();
                      location.reload();
                  },
                  error: function(){
                      console.log(response);
                  }
               });
       });


       $('#quickForm-1').on('submit', function(e){

          e.preventDefault();

           if(!$("#quickForm-1").valid()){
              return false;
           }
          showLoading();
             $.ajax({
                  url: "<?php echo base_url(); ?>update-category",
                  type: 'post',
                  data: $("#quickForm-1").serialize(),
                  success:function(response){
                      swal.close();
                      location.reload();
                      // console.log(response);
                  },
                  error: function(){
                      console.log(response);
                  }
               });
       });

       // $('.addnewbtn').click(function);

});


    function showLoading(){
      swal('', {
        icon: "<?= base_url() ?>assets/img/loader.gif",
        closeOnClickOutside: false,
        closeOnEsc: false,
         buttons: false,
      });
    }
    function showSuccess(){
      swal({
        title: "Category added!",
        icon: "success",
        button: "ok",
      });
    }

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
               location.href = '<?= base_url() ?>category-delete/' + id;
            } else {
                swal.close();
            }
          });
    }

    function showUpdateCard(id, category_name, parent_category){
            $('#new-category-card').hide(700);
            $('#update-categpry-card').show(700);
            $("#category_1").val(category_name);
            $('#category_id').val(id);            
            $("#update-select-parent").val(parent_category);
            $('.addnewbtn').show(500);
    }

    function removeUpdateCard(){
      console.log('removed');
      $('#update-categpry-card').hide(700);
      $('#new-category-card').show(700);
      $('.addnewbtn').hide(700);
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
