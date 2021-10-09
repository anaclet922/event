<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<footer>
	<div class="container-fluid" style="padding: 20px;margin-bottom: 10px;background: rgba(203, 203, 203, .5);">
		<div class="row foot-content">
			<div class="col-md-4">
				<h2 style="font-weight: bold;"><?= webSettings()['site_name'] ?></h2>
				<p style="text-align: justify;">
					<?= isset(webSettings()['footer_about']) == TRUE ? webSettings()['footer_about'] : '' ?>
				</p>
				<!-- <br> -->
				<h5 style="font-weight: bold;text-transform: uppercase;">Social media</h5>
				<ul class="social-link-ul">
					<?php if(isset(webSettings()['footer_facebook']) && webSettings()['footer_facebook'] != ''){ ?>
					<li><a href="<?= webSettings()['footer_facebook'] ?>"><img src="<?= base_url() ?>assets/img/facebook.png"></a></li>
					<?php } if(isset(webSettings()['footer_instagram']) && webSettings()['footer_instagram'] != ''){ ?>
					<li><a href="<?= webSettings()['footer_instagram'] ?>"><img src="<?= base_url() ?>assets/img/instagram.png"></a></li>
					<?php } if(isset(webSettings()['footer_twitter']) && webSettings()['footer_twitter'] != ''){ ?>
					<li><a href="<?= webSettings()['footer_twitter'] ?>"><img src="<?= base_url() ?>assets/img/twitter.png"></a></li>
					<?php } if(isset(webSettings()['footer_youtube']) && webSettings()['footer_youtube'] != ''){ ?>
					<li><a href="<?= webSettings()['footer_youtube'] ?>"><img src="<?= base_url() ?>assets/img/youtube.png"></a></li>
					<?php } if(isset(webSettings()['footer_linkedin']) && webSettings()['footer_linkedin'] != ''){ ?>	
					<li><a href="<?= webSettings()['footer_linkedin'] ?>"><img src="<?= base_url() ?>assets/img/linkedin.png"></a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-md-4">
				<h5 style="font-weight: bold;text-transform: uppercase;">Contact & address</h5>
				<table class="address-table">
					<?php if(isset(webSettings()['site_address']) && webSettings()['site_address'] != ''){ ?>
					<tr>
						<td><i class="fas fa-map-marker"></i> </td><td><?= webSettings()['site_address'] ?></td>
					</tr>
					<?php } if(isset(webSettings()['site_contact_phone']) && webSettings()['site_contact_phone'] != ''){ ?>
					<tr>
						<td><i class="fas fa-phone-alt"></i> </td><td><?= webSettings()['site_contact_phone'] ?></td>
					</tr>
					<?php } if(isset(webSettings()['site_contact_email']) && webSettings()['site_contact_email'] != ''){ ?>
					<tr>
						<td><i class="fas fa-envelope"></i> </td><td><?= webSettings()['site_contact_email'] ?></td>
					</tr>
				    <?php } ?>
				</table>
				<h5 style="font-weight: bold;text-transform: uppercase;"></h5>
				<table>
					
					<tr>
						<td></td>
						<td>
							<h5 style="font-weight: bold;text-transform: uppercase;margin-top: 20px;">Newsletter</h5>
							 <form class="form-inline bg-danger" method="post" action="<?= base_url('post-subscriber') ?>">
							    <div class="input-group input-group-md">
							      <input class="form-control form-control-navbar" type="email" name="email" placeholder="Enter email" style="border-radius: 0" required>
							      <div class="input-group-append">
							        <button class="btn btn-navbar text-white" type="submit">
							          Submit
							        </button>
							      </div>
							    </div>
							  </form>



						</td>
					</tr>
				</table> 
			</div>
			<div class="col-md-4">
				<h5 style="font-weight: bold;text-transform: uppercase;">Quick links</h5>
				<table class="address-table quick-links">
					<tr>
						<td><a href="<?= base_url() ?>">Home</a></td>
					</tr>
					<?php if(pageVis()['about'] == 1){ ?>
					<tr>
						<td><a href="<?= base_url() ?>page/view/about">About us</a></td>
					</tr>
					<?php }if(pageVis()['contact'] == 1){ ?>
					<tr>
						<td><a href="<?= base_url() ?>page/contact">Contact us</a></td>
					</tr>
					<?php }if(pageVis()['privacy'] == 1){ ?>
					<tr>
						<td><a href="<?= base_url() ?>page/view/privacy">Privacy policy</a></td>
					</tr>
					<?php }if(pageVis()['terms'] == 1){ ?>
					<tr>
						<td><a href="<?= base_url() ?>page/view/terms">Terms and condition</a></td>
					</tr>
					<?php } ?>
					
				</table>
			</div>
		</div>
	</div>
	<div class="container-fluid" style="padding: 20px;">
		<div class="row">
			<div class="col-md-12 text-center">
				&copy; Copyright 2021 by <a href="https://anaclet.online" target="_blank" style="text-transform: uppercase;color: #D81B60;font-weight: bold;">Anaclet Ahishakiye</a>. All Rights Reserved.
				<br>
				<img src="<?= base_url() ?>assets/img/<?= webSettings()['logo'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 50px;">
			</div>
		</div>
	</div>
</footer>




<a href="#top" class="scrollup" style="display: inline;"><i class="fas fa-arrow-up"></i></a>


<style type="text/css">
	.social-link-ul li{
		list-style-type: none;
		display: inline-block;
	}
	.social-link-ul li a img{
		width: 40px;
	}
	.address-table tr td{
		padding: 7px;
	}

	.scrollup {
		display: none;
		position: fixed;
		bottom: 20px;
		right: 15px;
		color: #fff!important;
		z-index: 999999
	}

	.scrollup i {
		width: 40px;
		height: 40px;
		line-height: 40px;
		display: block;
		text-align: center;
		background-color: #D81B60;
		border-radius: .1875rem;
		z-index: 999999
	}
	.foot-content .col-md-4{
		padding: 35px;
	}
	.quick-links tr td a{
		color: #212529;
	}
</style>

<script type="text/javascript">
	$("a[href='#top']").click(function() {
	  $("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});
</script>