<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stripe extends CI_Controller {

	 /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
    }
    
   
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function generateRandomString($length = 6) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $this->db->where('ticket_no', $randomString);
        $r = $this->db->get('tbl_tickets')->result_array();

        if(count($r) > 0){
            return $this->generateRandomString();
        }
        return $randomString;
    }

    public function stripePost(){
    	
        require_once('application/libraries/stripe-php/init.php');    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        $this->db->where('event_id', $_POST['event_id']);
        $this->db->where('id', $_POST['ticket_plan']);
        $ticket_plan = $this->db->get('tbl_tickets_plans')->result_array();
        $amount = $ticket_plan[0]['price'] * $_POST['number_of_tickets'];
        $ticket_no = $this->generateRandomString(10);

        $user_data = array(
            'ticket_no' => $ticket_no,
            'event_id' => $this->input->post('event_id'),
            'tickets_nbr' => $this->input->post('number_of_tickets'),
            'ticket_plan_id' => $this->input->post('ticket_plan'),
            'amount' => $amount,
            'names' => $this->input->post('name-on-card'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone')
        );

        $this->db->insert('tbl_tickets', $user_data);
        $insert_id = $this->db->insert_id();
     
        $stripeResponse = \Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $this->input->post('stripeToken'),
                "description" => "Test payment from Eventer" 
        ]);
            
        
        echo '<pre>';print_r($stripeResponse);
         if ($stripeResponse['amount_refunded'] == 0 && empty($stripeResponse['failure_code']) && $stripeResponse['paid'] == 1 && $stripeResponse['captured'] == 1 && $stripeResponse['status'] == 'succeeded') {
            $this->db->set('tx_ref', $stripeResponse["balance_transaction"]);
            $this->db->set('status', 'PAYED');
            $this->db->where('id', $insert_id);
            $this->db->update('tbl_tickets');
            $this->session->set_flashdata('msg', 'Payment successfully completed!'); 
            $this->session->set_flashdata('success', 'danger');

            $this->session->set_userdata('Ticke_No', $ticket_no);

            redirect('show-bought-tickets/' . $stripeResponse["balance_transaction"]);
        }else{
            $this->session->set_flashdata('msg', 'Card declined, contact card issuer or use other card!'); 
            $this->session->set_flashdata('alert', 'danger');
            redirect($this->agent->referrer());
        }
    }
	
	
}
