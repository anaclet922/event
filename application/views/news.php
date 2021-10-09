<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// echo '<pre>';print_r($upcoming_events);die();
	$this->load->view('navigation');


?>



<div class="container-fluid" style="margin-top: 20px;">
	<h2 class="text-center" style="margin: 40px;">
		<?= strtoupper($title) ?>
	</h2>

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			
			<div class="row">
				
				<?php foreach ($news as $new) { ?>
				<div class="col-md-4" style="padding: 10px">
					<div class="card shadow-lg">
						<div class="card-body" style="background-image: url('<?= base_url('uploads/news/' . $new['thumbnail']) ?>');background-size: cover;height: 200px;width: 100%;cursor: pointer;" onclick="location.href='<?= base_url('article/' . $new['slug']) ?>'">
							
						</div>
						<div class="card-footer">
							<a href="<?= base_url('article/' . $new['slug']) ?>"><h5><?= $new['title'] ?></h5></a>
							
							<p style="font-size: 13px; color: #5A5A5A;">
								<i class="fas fa-clock"></i>
								<?= time_elapsed_string($new['created_at']) ?>
							</p>
						</div>
					</div>
				</div>
				<?php } ?>




			</div>


			<div class="row">
				<div class="col-md-12 justify-content-right pagination-news" style="padding-top: 10px;padding-bottom: 10px;text-align: center;">
					<?php echo $links; ?>
				</div>
			</div>

		</div>
		<div class="col-md-1"></div>
	</div>
</div>
<hr>

<script type="text/javascript">
	
</script>

<style type="text/css">
	
</style>



<?php $this->load->view('foot'); ?>