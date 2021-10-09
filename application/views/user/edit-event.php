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
    
    <?php //$this->load->view('_partials/_auth_breadcrumb'); ?>

<form id="id-update-event-form" action="" method="post"  enctype="multipart/form-data">

    <?php $this->load->view('user/action-bar'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
              
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="card card-danger" id="new-category-card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-calendar-plus mr-1"></i>
                        Add new event
                      </h3>
                    </div>

                          <div class="card-body">

                            <div class="form-group">
                              <label>Title:</label>
                              <input type="text" name="title" class="form-control" id="title" placeholder="Enter category" onkeyup="updateTopBar()" value="<?= $event[0]['title'] ?>" />
                            </div>


                            <div class="form-group">
                              <label>Description<span style="font-size: 12px;">(Optional)</span>:</label>
                              <textarea class="form-control textarea" name="description" placeholder="Enter event descrtiption"><?= $event[0]['description'] ?></textarea>
                            </div>


                            <div class="form-group">
                              <label>Category:</label>
                              <select class="custom-select" name="category">
                                <option value="">Select category</option>
                                <?php
                                  foreach ($categories as $category) {
                                ?>
                                <option value="<?= $category['id'] ?>" <?= $event[0]['category'] == $category['id'] ? 'selected="true"' : '' ?>><?= $category['category_name'] ?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </div>

                              <!-- time Picker -->
                              <div class="bootstrap-timepicker">
                                <div class="form-group">
                                  <label>Date:</label>

                                  <div class="input-group date" id="datepicker" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datepicker" name="date" placeholder="Pick date" value="<?= $event[0]['date_'] ?>" />
                                    <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    </div>
                                  <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                              </div>

                               <!-- time Picker -->
                              <div class="bootstrap-timepicker">
                                <div class="form-group">
                                  <label>Time:</label>

                                  <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" name="time" placeholder="Pick time" value="<?= $event[0]['time_'] ?>" />
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                    </div>
                                  <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                              </div>

                          </div>
                  </div>
            </div>
            <div class="col-md-5">
                <div class="card card-warning" id="new-category-card">
                     <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-coins mr-1"></i>
                          Tickets setttings
                        </h3>
                    </div>
                          <div class="card-body">

                            <input type="hidden" name="plan_nbr" id="plan_nbr" value="0">
                            

                            <div id="ticket-plans-div">
                                <p class="alert text-center text-danger" style="background: rgba(250, 189, 7, .5);">
                                  <i class="fas fa-exclamation-triangle"></i>
                                  <br>
                                  No plan added!
                                </p>
                            </div>

                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-add-plan">
                               <i class="fas fa-plus"></i>
                               Add plan
                            </button>

                            <hr>

                            <h4>Thumbnail</h4>
                            <div>
                               <img src="<?= base_url() ?>uploads/img/<?= $event[0]['thumbnail'] ?>" id="image-preview" class="w-100" style="">
                            </div>
                            <div class="form-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>

                          </div>
                          <!-- /.card-body -->
                         <!--  <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button class="float-right btn btn-secondary" type="button">Cancel</button>
                          </div> -->
                  </div>
            </div>
            
            <div class="col-md-1"></div>
          </div>       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


</form>


  </div>
  <script type="text/javascript">
    $(document).ready(function(){


       $('#id-new-event-form').validate({
          rules: {
            title: {
              required: true,
              minlength: 3
            },
             date: {
              required: true,
              minlength: 3
            },
             time: {
              required: true,
              minlength: 3
            }
          },
          messages: {
            title: {
              required: "Please enter a title",
            },
            date: {
              required: "Please choose date",
            },
            time: {
              required: "Please choose time",
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


        $('#new-ticket-plan-form').validate({
          rules: {
            alias: {
              required: true,
              minlength: 3
            },
            price: {
              required: true,
              digits:true,
              minlength: 1
            },
          },
          messages: {
            alias: {
              required: "Please enter a plan name (Alias)",
            },
            price: {
              required: "Please enter a plan price",
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
              error: function(response){
                  console.log(response);
              }
           });
       });


       $("#new-ticket-plan-form").on('submit', function(e){
            e.preventDefault();
            var alias = $("#alias").val();
            var price = $('#price').val();
            var seats = $('#seats').val();

            if(seats == ''){
               seats = <?= webSettings()['total_seats'] ?>;
            }else if(seats > ($('#id-total-seats').val() - $('#id-taken-seats').val())){
                if(($('#id-total-seats').val() - $('#id-taken-seats').val()) <= 0){                  
                  document.getElementById('modal-close-btn').click();
                  $('#new-ticket-plan-form').trigger("reset"); 
                  showErrorDialog('No seats available!');
                }else{
                  document.getElementById('modal-close-btn').click();
                  $('#new-ticket-plan-form').trigger("reset"); 
                  showErrorDialog('Seats must be less or equal to ' + ($('#id-total-seats').val() - $('#id-taken-seats').val()));
                }
               
               return false;
            }

            var t = new Date().getTime();
            var json_plan = '{"alias": "'+ alias +'","price": "'+price+'","seats": "'+seats+'"}';
            var input = '<textarea style="display: none;" name="plans[]">'+json_plan+'</textarea>';
            var plan_html = '<div class="info-box bg-warning" id="planbox-' + t + '">' +
                                '<span class="info-box-icon"><i class="fas fa-chair"></i></span>' +
                                '<div class="info-box-content">' +
                                  '<span class="info-box-text">' +
                                    '<b>' + alias + '</b> for <b>' + price + ' <?= webSettings()['site_currency'] ?></b>' +
                                    '<span class="float-right text-danger" style="cursor: pointer;" onclick="removePlan(\'' + t + '\')">' +
                                        '<i class="fas fa-times-circle"></i>' +
                                    '</span>' +
                                  '</span>' +
                                  '<span class="info-box-number">' +
                                    'Seats: <span id="seats-'+ t +'">' + seats + '</span>' +
                                  '</span>' +
                                '</div>' + input +
                              '</div>'; 
            
            if($('#plan_nbr').val() == 0){
              $('#ticket-plans-div').html(plan_html);
            }else{
              $('#ticket-plans-div').append(plan_html);
            }
            $('#plan_nbr').val($('#plan_nbr').val() + 1); 
            document.getElementById('modal-close-btn').click();
            $('#new-ticket-plan-form').trigger("reset");  
            $('#id-taken-seats').val($('#id-taken-seats').val() + seats); 
            $('#id-available-seats').html($('#id-total-seats').val() - $('#id-taken-seats').val());
            if($('#id-total-seats').val() - $('#id-taken-seats').val() < 0){
              $('#id-available-seats').html('0');
            }       
       });


       $('#id-new-event-form').on('submit', function(e){
          e.preventDefault();

          if(!$("#id-new-event-form").valid()){
              return false;
           }
          if($("#plan_nbr").val() == 0){
            showErrorDialog('Event must have at least one Ticket Plan');
            return false;
          }
          showLoading();          
          var d = new FormData($('#id-new-event-form')[0]);
          $.ajax({
              url: "<?php echo base_url(); ?>post-event",
              type: 'post',
              data: d,
              processData: false,
              contentType: false,
              success:function(response){
                  // console.log(response);
                  response = JSON.parse(response);
                  if(response.status == 'error'){
                     showErrorDialog(response.message);
                  }else{
                     showSuccess();
                     setTimeout(function() { location.href="<?= base_url() ?>preview-event/" + response.event_id; }, 2000);
                  }
                  // location.reload();
              },
              error: function(response){
                  console.log(response);
              }
          });


       });

});

  function removePlan(my_id){
    swal({
        title: "Are you sure to delete?",
        text: " ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $('#plan_nbr').val($('#plan_nbr').val() - 1); 
            $('#id-taken-seats').val($('#id-taken-seats').val() - $('#seats-' + my_id).html());
            $('#id-available-seats').html($('#id-total-seats').val() - $('#id-taken-seats').val());
            $('#planbox-' + my_id).remove();
        }
      });
  }


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
        title: "Event published!!",
        icon: "success",
        button: "ok",
      });
    }

    function showErrorDialog(message){
      swal({
          title: message,
          text: ' ',
          icon: "warning",
          button: 'Close',
          dangerMode: true,
        });
    }

    function updateTopBar(){
       $("#event-title-top-bar").html($("#title").val());
    }

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



  <div class="modal fade" id="modal-add-plan">
      <form method="post" id="new-ticket-plan-form" action="">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h4 class="modal-title">New ticket plan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                  <label>Ticket alias:</label>
                  <input type="text" name="alias" class="form-control" id="alias" placeholder="E.g.: VIP" required />
                </div>

                <div class="form-group">
                  <label>Ticket Price:</label>
                  <input type="number" name="price" class="form-control" id="price" placeholder="E.g.: 2500" required />
                </div>

                <div class="form-group">
                  <label>Number of seats <span style="font-size: 12px;">(Leave empty for all available seats)</span>:</label>
                  <input type="number" name="seats" class="form-control" id="seats" placeholder="E.g.: 100"/>
                </div>

                <div class="form-group">
                  <label class="text-danger">
                      Total availabe seats: <span id="id-available-seats"><?= webSettings()['total_seats'] ?></span>
                  </label>
                </div>

                  
                  <input type="hidden" id="id-total-seats" value="<?= webSettings()['total_seats'] ?>">
                  <input type="hidden" id="id-taken-seats" value="0">


            </div>
            <div class="modal-footer justify-content-between  bg-warning">
              <button type="button" class="btn btn-outline-dark" id="modal-close-btn" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-dark">Add</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </form>
</div>
      <!-- /.modal -->

 <?php $this->load->view('_partials/logged_footer') ?>
