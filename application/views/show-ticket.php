<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// echo '<pre>';print_r($event);die();
	$this->load->view('navigation');

?>

<script type="text/javascript" src="<?= base_url() ?>assets/plugins/html2canvas/html2canvas.min.js"></script>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6" style="padding: 20px;padding-top: 45px;">
			
			<div class="alert alert-success text-center">
	              <h5 style="color: #D81B60"><i class="icon fas fa-check"></i> Success!</h5>
	              Thank you for buying ticket. Below is a copy of your ticket; Download it. And also a copy of your ticket sent to E-mail provided.
            </div>

			<div id="ticket-div" style="width: 100%;background: url('<?= base_url() ?>uploads/img/<?= $event[0]['thumbnail'] ?>');background-size: cover;height: 40vh;background-position: 20% 30%;">
				<div class="row"  style="height: 100%;width: 100%;;">
					<div class="col-md-6 col-sm-6 col-xs-6" style="background: rgba(0, 0, 0, .7);height: 100%;width: 100%;">
						
						 <?php
					   		$date = $event[0]['date_'];
					   		list($year, $month, $day) = explode('-', $date);
					   ?>
					   <center>
						  <table class="slide-descriptions-table">
						   		<tr><td style="text-transform: uppercase;"><b><?= date('F', strtotime($date)) ?></b></td></tr>
						   		<tr><td style="font-size: 25px;"><b><?= $day ?></b></td></tr>
						   		<tr><td><?= $year ?></td></tr>
						   </table>
						 </center>
						   <h1 class="text-center" style="color: #E5F1FB;"><?= $event[0]['title'] ?></h1>

						   <p class="text-center text-white"><b>VIP ticket</b></p>

						   <p class="text-center text-white">Seats Booked: <b><?= $ticket[0]['tickets_nbr'] ?></b></p>

					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 d-flex h-100" style="height: 100%;width: 100%;">
						<div class="justify-content-center align-self-center w-100">
							<div>
								<div id="qrcode" class="d-flex justify-content-center">
									<img src="<?= $qr ?>" style="height: 95%;" class="img-thumbnail"/>
								</div>
							</div>
						</div>
					</div>
	
				</div>				
			</div>


			<hr>
			<a class="btn btn-danger btn-block" href="<?= base_url('qr_codes/' . $ticket[0]['qr']) ?>" download><i class="fas fa-download"></i> Download ticket</a>
			
		</div>
		<div class="col-md-3"></div>
	</div>
</div>

<style type="text/css">
	.slide-descriptions-table{
		/*height: 100%;*/
		margin: 5px;
 		/*background-color: #D81B60;*/
 		border-radius: .25rem;
	}
	.slide-descriptions-table tr td{
 		padding-left: 10px;
 	    padding-right: 10px;
 	    color: white;
 	    text-align: center;
 	}
</style>


<?php $this->load->view('foot'); ?>


<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/qrcode/qrcode.min.js"></script>

<script type="text/javascript">
	// var qrcode = new QRCode("qrcode", {
	//     text: "http://jindo.dev.naver.com/collie",
	//     width: 128,
	//     height: 128,
	//     colorDark : "#000000",
	//     colorLight : "#ffffff",
	//     correctLevel : QRCode.CorrectLevel.H
	// });

	function saveTicket(){
		var div = document.getElementById('ticket-div');
		printToFile(div);
	}

	//Creating dynamic link that automatically click
function downloadURI(uri, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    link.click();
    //after creating link you should delete dynamic link
    //clearDynamicLink(link); 
}

//Your modified code.
function printToFile(div) {
    html2canvas(div, {
        onrendered: function (canvas) {
            var myImage = canvas.toDataURL("image/png");
            //create your own dialog with warning before saving file
            //beforeDownloadReadMessage();
            //Then download file
            downloadURI("data:" + myImage, "yourImage.png");
        }
    });
}
</script>