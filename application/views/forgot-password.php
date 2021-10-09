<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="../../index2.html"><b>Admin</b>LTE</a> -->
    <a href="<?= base_url() ?>">
    	<img src="<?= base_url() ?>assets/img/<?= webSettings()['logo'] ?>" style="max-height: 75px;">
    </a>
  </div>
   <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="" method="post" id="forgot-form-id">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?= base_url() ?>login">Login</a>
      </p>
      <p class="mb-0">
        <a href="<?= base_url() ?>register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
<!-- /.login-box -->



<script type="text/javascript">
    
    $(document).ready(function(){

       $('#forgot-form-id').validate({
          rules: {
             email: {
              required: true,
              minlength: 3
            }
          },
          messages: {
            email: {
              required: "Please enter your email",
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

  });


</script>
