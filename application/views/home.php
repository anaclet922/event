<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// echo '<pre>';print_r($upcoming_events);die();
	$this->load->view('navigation');


	$this->load->view('home-slider');

?>

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/owlcarousel/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/owlcarousel/dist/assets/owl.theme.default.min.css">
<script src="<?= base_url() ?>assets/plugins/owlcarousel/dist/owl.carousel.min.js"></script>




<div class="container-fluid" style="margin-top: 20px;">
	<h2 class="text-center" style="margin: 40px;">
		UPCOMING EVENTS
	</h2>

	<div class="row">
		<div class="col-md-12">
			


			<!-- Set up your HTML -->
			<div class="owl-carousel">


				<?php foreach ($upcoming_events as $event) { ?>

					<div class="div-owl-item" style="background-image: url('<?= base_url() ?>uploads/img/<?= $event['thumbnail'] ?>');">
						<!-- <img src="" class="img-thumbnail"> -->

	  					<div class="top-left-date">
	  						<?php
						   		$date = $event['date_'];
						   		list($year, $month, $day) = explode('-', $date);
						   ?>
						   <table class="slide-descriptions-table" style="border-radius: 0 0 .25rem .25rem">
						   		<tr><td style="text-transform: uppercase;"><b><?= date('F', strtotime($date)) ?></b></td></tr>
						   		<tr><td style="font-size: 40px;"><b><?= $day ?></b></td></tr>
						   		<tr><td><?= $year ?></td></tr>
						   </table>
	  					</div>  					
	  					<div class="bottom-left-title">
	  						<?= $event['title'] ?>
	  					</div>  					
	  					<div class="bottom-right-link">
	  						<a href="<?= base_url() ?>event-item/<?= $event['id'] ?>" class="btn btn-danger" style="border-radius: .25rem 0 0 0;">Book</a>
	  					</div>
					</div>	


				<?php	} ?>


			</div>





		</div>
	</div>
</div>
<hr>

<script type="text/javascript">
	$(document).ready(function(){
	  $(".owl-carousel").owlCarousel({
	  		loop:false,
    		margin:10,
    		autoplay: true,
    		center: true,
    		responsive: {
    			0:{
    				items: 1
    			},
    			600: {
    				items: 3
    			},
    			1000: {
    				items: 4
    			}
    		}
	  });
	});
</script>

<style type="text/css">
	.div-owl-item{
		position: relative;
	    text-align: center;
	    color: white;
	    height: 185px;
	    width: 100%;
	    background-size: cover;
	    border-top: 5px solid #D81B60;
	    border-bottom: 5px solid #D81B60;
	}
	.top-left-date{
		position: absolute;
  		top: 0px;
  		left: 16px;
	}
	.bottom-left-title {
	  position: absolute;
	  bottom: 0px;
	  left: 16px;
	  /*background-color: #D81B60;*/
	  text-transform: uppercase;
	  padding: 10px;
	  font-weight: bold;
	  color: #E0A800;
	}
	.bottom-right-link {
	  position: absolute;
	  bottom: 0px;
	  right: 0px;
	  text-transform: uppercase;
	}
</style>



<?php $this->load->view('foot'); ?>