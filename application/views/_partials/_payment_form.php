<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

?>

<form role="form" action="<?php echo base_url(); ?>stripePost" method="post" class="require-validation row"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                                                    id="payment-form">

    <div class="col-md-12">
        <div class='form-row row'>
            <div class='col-md-12 error form-group d-none'>
                <div class='alert-warning alert text-center text-danger'>
                    <i class="fas fa-exclamation-triangle"></i>
                    Please correct the errors and try again.
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class='form-row row'>
        	<div class="form-group col-md-12">
        	  <label class="control-label">Ticket type:</label>
        	  <select class="custom-select" name="ticket_plan" id="ticket_plan" style="height: auto;">
        	    <?php
        	      foreach ($event['tickets_plan'] as $plan) {
        	    ?>
        	    <option value="<?= $plan['id'] ?>"><?= $plan['plan_name'] . ' @ ' . $plan['price'] . webSettings()['site_currency'] . ' per ticket' ?></option>
        	    <?php
        	      }
        	    ?>
        	  </select>
        	</div>
        </div>

        <div class='form-row row'>
            <div class="form-group col-md-12">
            	<label class="control-label">Number of tickets</label>
            	<div class="input-group">
            	  <div class="input-group-prepend">
            	    <button type="button" class="btn btn-danger" id="minus-tickets-btn"> - </button>
            	  </div>
            	  <!-- /btn-group -->
            	  <input type="text" name="number_of_tickets" class="form-control" value="1" id="number-of-tickets-txt" style="height: auto;" required="true">
            	   <div class="input-group-append">
            	    <button type="button" class="btn btn-danger" id="plus-tickets-btn"> + </button>
            	  </div>
            	</div>
            </div>
        </div>

        <div class='form-row row'>
        	<div class="form-group col-md-12">
        	  <label class="control-label">E-mail:</label>
        	  <input type="text" name="email" class="form-control" placeholder="E-mail address" required="true">
        	</div>
        </div>

        <div class='form-row row'>
        	<div class="form-group col-md-12">
        	  <label class="control-label">Phone<span style="font-size: 13px;">(Optional)</span>:</label>
        	  <input type="text" name="phone" class="form-control" placeholder="Phone number">
        	</div>
        </div>



    </div>
    <div class="col-md-6">


    	<div class='form-row row'>
            <div class='col-md-12 form-group required'>
                <label class='control-label'>Name on Card</label> 
                <input class='form-control' size='4' type='text' name="name-on-card">
            </div>
        </div>
         
        <div class='form-row row'>
            <div class='col-md-12 form-group required'>
                <label class='control-label'>Card Number</label> 
                <input autocomplete='off' class='form-control card-number' size='20'
                    type='text' name="card-number">
            </div>
        </div>
          
        <div class='form-row row'>
            <div class='col-xs-12 col-md-4 form-group cvc required'>
                <label class='control-label'>CVC</label> <input autocomplete='off'
                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                    type='text' name="cvc">
            </div>
            <div class='col-xs-12 col-md-4 form-group expiration required'>
                <label class='control-label'>Expiration Month</label> <input
                    class='form-control card-expiry-month' placeholder='MM' size='2'
                    type='text' name="card-expiry-month">
            </div>
            <div class='col-xs-12 col-md-4 form-group expiration required'>
                <label class='control-label'>Expiration Year</label> <input
                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                    type='text' name="card-expiry-year">
            </div>
        </div>
            
        <input type="hidden" name="event_id" value="<?= $event[0]['id'] ?>">
        

        <div class="form-row row">
            <div class="col-md-12 form-group ">
                <label class='control-label'>&nbsp;&nbsp;</label>
                <button class="btn btn-primary btn-block" type="submit" id="submit-btn-id">Pay Now ($100)</button>
            </div>
        </div>

    </div>
      



</form>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
     
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
     
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
    
  });
      
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>