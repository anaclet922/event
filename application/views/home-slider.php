<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	?>

      <div class="container-fluid" style="padding: 0;">


      	<div id="demo" class="carousel slide" data-ride="carousel" style="" data-interval="3000">
			  <!-- Indicators -->
			 <!--  <ul class="carousel-indicators">
			    <li data-target="#demo" data-slide-to="0" class="active"></li>
			    <?php for ($i=1; $i < count($upcoming_events); $i++) { ?>
			    	<li data-target="#demo" data-slide-to="<?php echo $i; ?>"></li>
			    <?php } ?>
			    
			  </ul> -->
			  <!-- The slideshow -->
			  <div class="carousel-inner">


			  

			 <?php 
			 $i = 0;
			 foreach($upcoming_events as $event) { ?>
			    <div class="carousel-item <?php if($i == 0) echo 'active'; ?> my-campus-slide-item" style="background-image: url('<?php echo base_url(); ?>uploads/img/<?php echo $event['thumbnail']; ?>');">
			      
				      	<div class="carousel-caption" style="background: rgba(40, 41, 35, 0.8);width: 100w;">
				      			<div class="row">
				      				<div class="col">
						      				
						      			<img src="<?= base_url() ?>uploads/img/<?= $event['thumbnail'] ?>" class="image-thumbnail-slide img-thumbnail">
						      		</div>
						      		<div class="col">

						      			<div class="row">
						      				<div class="col">
											   <?php
											   		$date = $event['date_'];
											   		list($year, $month, $day) = explode('-', $date);
											   ?>
											   <table class="slide-descriptions-table">
											   		<tr><td style="text-transform: uppercase;"><b><?= date('F', strtotime($date)) ?></b></td></tr>
											   		<tr><td style="font-size: 40px;"><b><?= $day ?></b></td></tr>
											   		<tr><td><?= $year ?></td></tr>
											   </table>
											</div>
						      			</div>
						      			<br>
						      			<div class="row">
						      				<div class="col" style="text-align: left;font-size: 30px;text-transform: uppercase;">
									   			<?php echo $event['title']; ?><br>
									   			<span style="font-size: 14px;color: #E0A800;font-weight: bold;">Tickets from <?= webSettings()['site_currency'] ?> <?= $event['event_tickets_plan'][0]['price'] ?></span>
									   		</div>
						      			</div>
				      				</div>
		      					</div>
		      					<div class="row">
		      						<div class="col-md-12">
		      							<br><br>
		      							<a href="<?= base_url() ?>event-item/<?= $event['id'] ?>" class="btn btn-danger" style="font-size: 20px;text-transform: uppercase;">Book now</a>
		      						</div>
		      					</div>
				      	</div>
			    </div>
			<?php
				$i++;break; } ?>
			    <!---items end --->



			  </div>
			  <!-- Left and right controls -->
			 <!--  <a class="carousel-control-prev" href="#demo" style="" data-slide="prev">
			    <span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#demo" style="" data-slide="next">
			    <span class="carousel-control-next-icon"></span>
			  </a> -->
		</div><!---- slide end-->


      </div>

<style type="text/css">
	.my-campus-slide-item{
	    background-repeat: no-repeat;
	    background-size: cover;
	}
	.my-campus-slide-item{
	   height: 83vh;
	} 
 	.image-thumbnail-slide{
 		width: 30vw;
 	}
 	.carousel-caption{
 		position: static;
 		padding-top: 20vh;
 		height: 100%;
 	}
 	.slide-descriptions-table {
 		background-color: #D81B60;
 		border-radius: .25rem;
 	}
 	.slide-descriptions-table tr td{
 		padding-left: 17px;
 	    padding-right: 17px;
 	}
</style>