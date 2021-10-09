<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// echo '<pre>';print_r($upcoming_events);die();
	$this->load->view('navigation');

?>




<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="justify-content-center col-md-4 ">
			<div class="row">
				<div class="col-md-12">				
					<img src="<?= base_url() ?>assets/img/_404.png" style="width: 100%;">
				</div>
			</div>
			<br>
			<p class="text-center" style="font-size: 17px;font-weight: bold;">We are unable to find page requested. Back to <a href="<?= base_url() ?>">HOMEPAGE</a></p>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>







<?php $this->load->view('foot'); ?>