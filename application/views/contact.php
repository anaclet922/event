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
		CONTACT US
	</h2>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			
			<div class="card">
				<div class="card-body">



					<?= validation_errors('<p class="alert alert-danger text-center">', '</p>') ?>

					<form class="form" method="post" action="<?= base_url() ?>page/post_contact">
						<div class="form-group">
							<label>Names</label>
							<input type="text" name="names" class="form-control" placeholder="Names..." required/>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="E-mail..." required>
						</div>
						<div class="form-group">
							<label>Subject</label>
							<input type="text" name="subject" class="form-control" placeholder="Subject..." required/>
						</div>
						<div class="form-group">
							<label>Message</label>
							<textarea placeholder="Your message..." class="form-control" name="message" required></textarea>
						</div>
						<p class="text-center">
							<button class="btn btn-primary" type="submit">Submit</button>
						</p>
					</form>


				</div>
			</div>


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