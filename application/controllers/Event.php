<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function post_event(){
		
		if(empty($_FILES['customFile']['name'])){
        	//no thumbnail
        	$response = array(
        		'status' => 'error',
        		'message' => 'Thumbnail is required!'
        	);
        	echo json_encode($response);
        }else{	
        	$config['upload_path'] = './uploads/img/';
	        $config['allowed_types'] = 'jpg|png|svg|webp|apng|jpeg|jfif|pjpeg|pjp';
	        $new_name = time();
	        $config['file_name'] = $new_name;
	        $this->upload->initialize($config);

	        if ($this->upload->do_upload('customFile')){
	         	$image_metadata = $this->upload->data();
	         	$thumbnail = $image_metadata['file_name'];

	         	$event = array(
	         		'user_id' => $this->session->user[0]['id'],
	         		'title' => $_POST['title'],
	         		'description' => $_POST['description'],
	         		'category' => $_POST['category'],
	         		'date_' => $_POST['date'],
	         		'time_' => $_POST['time'],
	         		'thumbnail' => $thumbnail
	         	);

	         	$this->db->insert('tbl_events', $event);
	         	$event_id = $this->db->insert_id();

	         	$tickets_plans = $_POST['plans'];

	         	
	         	foreach ($tickets_plans as $plan) {
	         		$plan_ = json_decode($plan, true);
	         		$p = array(
	         			'event_id' => $event_id,
	         			'plan_name' => $plan_['alias'],
	         			'price' => $plan_['price'],
	         			'seats' => $plan_['seats']
	         		);

	         		$this->db->insert('tbl_tickets_plans', $p);
	         	}

	         	$response = array(
	         		'status' => 'ok',
	         		'message' => 'Event published',
	         		'event_id' => $event_id 
	         	);
	         	echo json_encode($response);

	        }else{
	        	$response = array(
	        		'status' => 'error',
	        		'message' => $this->upload->display_errors()
	        	);
	        	echo json_encode($response);
	        }
        }
	}
	public function event_delete($event_id){
		$a = $this->event_model->delete_event($event_id);
		redirect($this->agent->referrer(), 'refresh');
	}
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

	public function pay_ticket(){

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('number_of_tickets', 'Number of tickets', 'required|integer|greater_than[0]');

        if (!$this->form_validation->run()){
        	$error = validation_errors();
			$this->session->set_flashdata('alert', 'danger');
        	$this->session->set_flashdata('msg', $error);
			redirect($this->agent->referrer());
		}


        $this->db->where('event_id', $_POST['event_id']);
        $this->db->where('id', $_POST['ticket_plan']);
        $ticket_plan = $this->db->get('tbl_tickets_plans')->result_array();

        if(count($ticket_plan) != 1){
        	$this->session->set_flashdata('alert', 'danger');
        	$this->session->set_flashdata('msg', 'Unkown error try again!!');
			redirect($this->agent->referrer());
        }

		// redirect to fullterwave to pay_ticket
        $amount = $ticket_plan[0]['price'] * $_POST['number_of_tickets'];

		$start = mt_rand();
		$tx_ref = uniqid(srand($start), true);
		$callbackUrl= base_url() . "payment-callback-flutterwave";

		$ticket_no = $this->generateRandomString(10);

		$user_data = array(
			'ticket_no' => $ticket_no,
			'event_id' => $_POST['event_id'],
			'tickets_nbr' => $_POST['number_of_tickets'],
			'ticket_plan_id' => $_POST['ticket_plan'],
			'amount' => $amount,
			'names' => '',
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'tx_ref' => $tx_ref
		);

		$this->db->insert('tbl_tickets', $user_data);

		$request = [
	        'tx_ref' => $tx_ref,
            'amount' => $amount,
            'currency' => webSettings()['site_currency'],
            'payment_options' => 'card',
            'redirect_url' => $callbackUrl,
            'customer' => [
                'email' => $_POST['email'],
                'name' => 'N/A'
            ],
            'meta' => [
                'price' => $amount
            ],
            'customizations' => [
                'title' => webSettings()['site_name'] . ' Payment',
                'description' => webSettings()['site_description'] ,
                'logo' => base_url() . 'assets/img/' . webSettings()['logo']
            ]
        ];

        $this->session->set_userdata('last_url', $this->agent->referrer());

        // die($this->session->last_url);

        $flutterwave_secrety_key = webSettings()['flutterwave_secret_key'];
          //* Ca;; f;iterwave emdpoint
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($request),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $flutterwave_secrety_key,
            'Content-Type: application/json'
             ),
        ));


        $response = curl_exec($curl);

        curl_close($curl);
        
        $res = json_decode($response);
        if($res->status == 'success'){   
            $link = $res->data->link;
            header('Location: '.$link);
        }
        else{
        	$this->session->set_flashdata('msg', 'We can not process your payment!<br>Try again!');
			$this->session->set_flashdata('alert', 'danger');
            redirect($this->agent->referrer());
        }
	}

	public function payment_callback_flutterwave(){

		if($_GET['status'] == 'cancelled'){
            $this->session->set_flashdata('msg', 'Payment canceled!<br>Try again!');
			$this->session->set_flashdata('alert', 'danger');
            redirect($this->session->last_url);
        }else if($_GET['status'] == 'successful'){
        	$txid = $_GET['transaction_id'];

            $flutterwave_secrety_key = webSettings()['flutterwave_secret_key'];
            $curl = curl_init();

            curl_setopt_array($curl, array(
	            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/". $txid ."/verify",
                CURLOPT_RETURNTRANSFER => true,
	            CURLOPT_ENCODING => "",
	            CURLOPT_MAXREDIRS => 10,
	            CURLOPT_TIMEOUT => 0,
	            CURLOPT_FOLLOWLOCATION => true,
	            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	            CURLOPT_CUSTOMREQUEST => "GET",
	            CURLOPT_HTTPHEADER => array(
	                "Content-Type: application/json",
	                "Authorization: Bearer " . $flutterwave_secrety_key 
	            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $response = json_decode($response, TRUE);

            if($response['status'] == 'success'){

            	$tx_ref =  $response['data']['tx_ref'];

				$this->db->set('status', 'PAYED');
				$this->db->where('tx_ref', $tx_ref);
				$this->db->update('tbl_tickets');

				$this->db->where('tx_ref', $tx_ref);
				$tickets = $this->db->get('tbl_tickets')->result_array();

				$this->db->where('event_id', $tickets[0]['event_id']);
				$event = $this->db->get('tbl_tickets')->result_array();

				$email = $tickets[0]['email'];
	    
		       if($email != ''){
		       	   //Email content
			        $htmlContent = '<center><h1>' . webSettings()['site_name'] . '</h1>';
			        $htmlContent .= '<p>';
			        $htmlContent .= 'Hello!, Thank you for using our services. Below, it is your ticket to attend '. $event[0]['title'] .'; do not shar with anyone else.</p>';
			        $ticket = '<span style="color: white;background-color: #92906A;padding: 10px;font-size:25px;"> ' . $access_code . ' </span>';
			        $htmlContent .= $ticket.'<p>Thank you!</p> </center>';

			        $htmlContent .= '<hr/>';
			        $htmlContent .= '<center><p style="font-size: 12px;font-weight: bold;">' . webSettings()['site_name'] . '</p></center>';
			        $htmlContent .= '<center><p style="font-size: 12px;">Address: ' . webSettings()['site_address'] . '</p></center>';
			        $htmlContent .= '<center><p style="font-size: 12px;">Phone: ' . webSettings()['site_contact_phone'] . '</p></center>';
			        $htmlContent .= '<center><p style="font-size: 12px;">E-mail' . webSettings()['site_contact_email'] . '</p></center>';
			                
			       $a = $this->email_model->mailAgent($email, $htmlContent, $subject);
		       }

		       redirect(base_url() . 'show-bought-tickets/' . $tx_ref);

            }else{
            	$this->session->set_flashdata('msg', 'Payment canceled!<br>Try again!');
				$this->session->set_flashdata('alert', 'danger');
	            redirect($this->session->last_url);
            }
        }

	}
	
	
}
