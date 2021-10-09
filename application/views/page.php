<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// echo '<pre>';print_r($upcoming_events);die();
	$this->load->view('navigation');


	//$this->load->view('home-slider');

?>

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/owlcarousel/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/owlcarousel/dist/assets/owl.theme.default.min.css">
<script src="<?= base_url() ?>assets/plugins/owlcarousel/dist/owl.carousel.min.js"></script>




<div class="container-fluid" style="margin-top: 20px;">
	<h2 class="text-center" style="margin: 40px;">
		<?= strtoupper($title) ?>
	</h2>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			

			<?= $page[0]['content'] ?>


		</div>
		<div class="col-md-2"></div>
	</div>
</div>
<hr>

<script type="text/javascript">
	
</script>

<style type="text/css">
	
</style>



<?php $this->load->view('foot'); ?>