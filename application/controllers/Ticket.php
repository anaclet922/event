<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

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
	public function tickets(){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login', 'refresh');
		}

		// $data['events'] = $this->getAllEvents();
		$r = array();

		$tickets = $this->db->order_by('id', 'DESC')->get('tbl_tickets')->result_array();

		foreach ($tickets as $ticket) {
			$event = $this->db->where('id', $ticket['event_id'])->get('tbl_events')->result_array();

			$event_plans = $this->db->where('event_id', $event[0]['id'])->get('tbl_tickets_plans')->result_array();

			$event['tickets_plan'] = $event_plans;

			$ticket['event'] = $event;

			array_push($r, $ticket);
		}

		$data['tickets'] = $r;

		$seo_data = array(
			'title' => 'Tickets',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('admin/tickets', $data);
		$this->load->view('_partials/_footer');
	}

	public function getAllEvents(){

		$events = $this->db->get('tbl_events')->result_array();

		$response = array();

		foreach ($events as $event) {
			$event_plans = $this->db->where('event_id', $event['id'])->get('tbl_tickets_plans')->result_array();

			$event['tickets_plan'] = $event_plans;

			array_push($response, $event);
		}

		return $response;
	}
	public function getEventsRevenue(){

		$events = $this->db->order_by('created_at', 'DESC')->get('tbl_events')->result_array();

		$response = array();
		$total_made = 0;

		foreach ($events as $event) {
			$event_tickets = $this->db
									->where('event_id', $event['id'])
									->where('status', 'PAYED')
									->get('tbl_tickets')->result_array();

				$tickets = 0;
				$sale = 0;

				foreach ($event_tickets as $ticket) {
					$tickets += 1;
					$sale += $ticket['amount'];
				}

			$event['tickets'] = $tickets;
			$event['sale'] = $sale;

			array_push($response, $event);
		}

		return $response;
	}
	public function revenue(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login', 'refresh');
		}

		$seo_data = array(
			'title' => 'Revenue',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);


		$data['events_revenue'] = $this->getEventsRevenue();

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('admin/revenue', $data);
		$this->load->view('_partials/_footer');

	}

	public function re_send_ticket($ticket_id){
		// echo 'send email to client';
		$ticket = $this->db->where('id', $ticket_id)->get('tbl_tickets')->result_array();

		if(!count($ticket)){
			redirect($this->agent->referrer());
		}

		$event = $this->db->where('id', $ticket[0]['ticket_id'])->get('tbl_events')->result_array();

		$subject = 'Ticket(s) for ' . $event[0]['title'];
		$email = $ticket[0]['email'];
		$message = '';

		//get image of qr code of ticket no
		include('./phpqrcode/qrlib.php');
		$filename = './qr_codes/' . $ticket[0]['ticket_no'] . '.png';

		$ecc = 'L';
		$pixel_Size = 50;
		$frame_Size = 50;

		$qr_text = '{"ticket_no" :"' . $ticket[0]['ticket_no'] . '"}';
		  
		// Generates QR Code and Stores it in directory given
		QRcode::png($qr_text, $filename, $ecc, $pixel_Size, $frame_size);

		$link = base_url() . 'qr_codes/' . $ticket[0]['ticket_no'] . '.png';

		$message .= 'Hello ' . $ticket[0]['names'] . '!<br/>';
		$message .= '<center>';
		$message .= '<img src="' . $link . '" style="width: 100px; heght: 100px;"/>';	
		$message .= '<h6>' . $event[0]['title'] . '</h6>';	
		$message .= '</center>';

		$t = $this->email_model->mailAgent($email,$message, $subject);

		$this->session->set_flashdata('msg', 'Email sent!');

		redirect($this->agent->referrer());
	}
	
}
