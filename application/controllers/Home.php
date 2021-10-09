<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function _404(){
		$seo_data = array(
			'title' => 'Page not found',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('_404');
		$this->load->view('_partials/_footer');
	}
	public function index()
	{

		$seo_data = array(
			'title' => 'Home',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$data['upcoming_events'] = $this->event_model->get_upcoming_events();


		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('home', $data);
		$this->load->view('_partials/_footer');
	}

	public function event_item($event_id){

		$event = $this->event_model->getEvent($event_id);

		if(count($event) <= 0){
			redirect('_404', 'refresh');
		}

		$seo_data = array(
			'title' => $event[0]['title'],
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$event['tickets_plan'] = $this->event_model->getEventTicketsPlans($event_id);
		// print_r($event);die();
		$data['event'] = $event;

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('event-item', $data);
		$this->load->view('_partials/_footer');
	}
	public function show_bought_tickets($txt_ref){
		// echo 'show tickets of ' . $txt_ref;
		$this->db->where('tx_ref', $txt_ref);
		$ticket = $this->db->get('tbl_tickets')->result_array();

		$event = $this->event_model->getEvent($ticket[0]['event_id']);

		if(count($event) <= 0){
			redirect('_404', 'refresh');
		}

		if($this->session->Ticke_No != $ticket[0]['ticket_no']){
			redirect('_404', 'refresh');
		}

		$seo_data = array(
			'title' => $event[0]['title'],
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		//get image of qr code of ticket no
		include('./phpqrcode/qrlib.php');
		$filename = './qr_codes/' . $ticket[0]['ticket_no'] . '.png';

		// $ecc = 'L';
		$errorCorrectionLevel = 'H';  //Fault tolerance level
        $matrixPointSize = 6;

		$qr_text = '{"ticket_no" :"' . $ticket[0]['ticket_no'] . '"}';
		  
		// Generates QR Code and Stores it in directory given
		// QRcode::png($qr_text, $filename, $ecc, $pixel_Size, $frame_Size);		
        QRcode::png($qr_text,$filename , $errorCorrectionLevel, $matrixPointSize, 2);

		$this->addLogoToQR($filename, $ticket[0]['ticket_no']);

		$link = base_url() . 'qr_codes/' . $ticket[0]['ticket_no'] . '.png';

        $this->db->set('qr', $ticket[0]['ticket_no'] . '.png');
        $this->db->where('tx_ref', $txt_ref);
        $this->db->update('tbl_tickets');

		$data['event'] = $event;
		$data['ticket'] = $ticket; 
		$data['qr'] = $link;

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('show-ticket', $data);
		$this->load->view('_partials/_footer');

	}

	public function addLogoToQR($filename, $ticket_no){
		$mylogo = './assets/img/' . webSettings()['logo'];
		$QR = imagecreatefromstring(file_get_contents($filename)); 
		$logo = imagecreatefromstring(file_get_contents($mylogo)); 

		$QR_width = imagesx($QR); 
		$QR_height = imagesy($QR); 
		$logo_width = imagesx($logo); 
		$logo_height = imagesy($logo); 
		$logo_qr_width = $QR_width / 5; 
		$scale = $logo_width / $logo_qr_width; 
		$logo_qr_height = $logo_height / $scale; 
		$from_width = ($QR_width - $logo_qr_width) / 2; 
		imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);  
		imagepng($QR, './qr_codes/' . $ticket_no . '.png'); 
	}
}
