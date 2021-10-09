<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// echo '<pre>';print_r($event);die();
	$this->load->view('navigation');

?>


<div class="container-fluid" style="background-image: url('<?= base_url() ?>uploads/img/<?= $event[0]['thumbnail'] ?>');height: 83vh;">
	<div class="row" style="background: rgba(40, 41, 35, 0.8);height: 100%;">
		<div class="col-md-12" style="padding: 40px;padding-bottom: 60px;">
			
			<!-- <hr style="border: .5px solid #D81B60;width: 40%;opacity: .5"/> -->
			<div class="row  d-flex h-100">
				<div class="col-md-1"></div>
				<div class="col-md-5  align-self-center">
					<h1 class="text-center" style="color: #E5E5E5"><?= $event[0]['title'] ?></h1>
					<center>
						<img src="<?= base_url() ?>uploads/img/<?= $event[0]['thumbnail'] ?>" class="img-thumbnail w-75" style="max-height: 230px;">
					</center>
					<br>
				</div>
				<div class="col-md-5 align-self-center">
					
					
                    <table class="event-info-item table" style="">
                        <tr>
                            <td class="no-top-border"><i class="fas fa-calendar"></i> DATE:</td><td class="no-top-border"><?= date('F d, Y', strtotime($event[0]['date_'])) ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-clock"></i> TIME:</td><td><?= $event[0]['time_'] ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-chair"></i> TICKETS LEFT:</td><td><?= 125 ?></td>
                        </tr>
                    </table>
					
				</div>
				<div class="col-md-1"></div>
			</div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="javascript:void(0)" id="payment-section-stripe-btn">Book seat now<br><i class="fas fa-chevron-down"></i></a>
                </div>
            </div>
		</div>
	</div>

</div>
	

<div class="container">
    <div class="" id="payment-section-stripe">
        <?php $this->load->view('_partials/_payment_form'); ?>
    </div>
</div>


<style type="text/css">
	.event-info-item tr td{
		color: #E5E5E5;
		font-size: 20px;
		padding: 10px;
	}
	.event-info-item tr td i{
		font-size: 20px;
		/*margin: 10px;*/
	}
	#number-of-tickets-txt{
		text-align: center;
	}
	#number-of-tickets-txt, #minus-tickets-btn, #plus-tickets-btn, #ticket_plan{
		font-size: 17px;
	}
	.payment-method-list li{
		list-style-type: none;
		display: inline-block;
	}
	.payment-method-list li img{
		width: 45px;
	}
	.no-top-border{
		border-top: none !important;
	}
	#payment-section-stripe{
		padding: 30px;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){

		$('#minus-tickets-btn').click(function(){
			$('#number-of-tickets-txt').val($("#number-of-tickets-txt").val() - 1);
		});

		$('#plus-tickets-btn').click(function(){
			$('#number-of-tickets-txt').val(parseInt($("#number-of-tickets-txt").val()) + 1);
		});

	});

    $("#payment-section-stripe-btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#payment-section-stripe").offset().top
        }, 2000);
    });
</script>

<?php $this->load->view('foot'); ?>