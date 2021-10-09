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
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?= base_url() ?>user/post_login" method="post" id="login-form-id">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     <!--  <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?= base_url() ?>forgot-password">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?= base_url() ?>register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<script type="text/javascript">
    
    $(document).ready(function(){

       $('#login-form-id').validate({
          rules: {
             email: {
              required: true,
              minlength: 3
            },
            password:{
              required: true,
              minlength: 8
            }
          },
          messages: {
            email: {
              required: "Please enter your email",
            },
            password: {
              required: "Password required",
              minlength: "Too short"
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
