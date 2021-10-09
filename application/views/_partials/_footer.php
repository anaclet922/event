<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
</div>
<!-- ./wrapper -->
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>

<?php if($this->uri->segment(1) == 'admin-home' || $this->uri->segment(1) == 'account-home'){ ?>
  <script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<?php } ?>

<script type="text/javascript">

    $(document).ready(function(){


      $('.textarea').summernote();
      
      <?php if($this->session->flashdata('alert') == 'success'){ ?>
      toastr.success('<?= $this->session->flashdata('msg') ?>');
        <?php } else if($this->session->flashdata('alert') == 'danger'){ ?>
        toastr.error('<?= $this->session->flashdata('msg') ?>');
    <?php } ?>


     //Date picker
        $('#datepicker').datetimepicker({
             format: 'Y-MM-DD'
        });
        //time picker
        $('#timepicker').datetimepicker({
          format: 'LT'
        });

        

    });

    // document.addEventListener('contextmenu', event => event.preventDefault());


</script>
</body>
</html>
