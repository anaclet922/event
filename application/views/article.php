<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// echo '<pre>';print_r($upcoming_events);die();
$this->load->view('navigation');


?>



<div class="container-fluid" style="margin-top: 20px;">
	<h2 class="text-center" style="margin: 20px;">
		<?= $title ?>
	</h2>

	<p class="text-center" style="font-size: 13px">
		<i class="fa fa-clock"></i> <?= time_elapsed_string($article[0]['created_at']) ?> | <i class="fas fa-eye"></i> <span id="views-span"><?= $article[0]['views'] ?></span>
	</p>


	<div class="row justify-content-center">
		<div class="col-md-7">
			
			<div class="card shadow-lg">
				<div class="card-body">
					

					<div class="row justify-content-center">
						<div class="col-md-12">
							<img src="<?= base_url('uploads/news/' . $article[0]['thumbnail']) ?>" class="img-thumbnail"/>
						</div>
					</div>

					

					<?= $article[0]['body'] ?>



				</div>
			</div>




			

		</div>
	</div>
</div>
<hr>

<script type="text/javascript">
	$(document).ready(function(){



		$.ajax({
		    url: '<?= base_url('news/add_view/' . $article[0]['id']) ?>',
		    type: 'get',
			processData: false,
			contentType: false,
	        success:function(data){
	        	console.log(data); 
	        	var response = JSON.parse(data);  
	        	if(response.status == 200){
	        		$('#views-span').html(response.views);
	        	}          
	        },
	        error: function(data){
	            console.log(data);
	        }
	     });


	});
</script>

<style type="text/css">

</style>



<?php $this->load->view('foot'); ?>