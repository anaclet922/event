<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber extends CI_Controller {

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
	public function post_subscriber(){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login', 'refresh');
		}

		
		$data = array(
			'email' => $_POST['email']
		);

		$this->db->insert('tbl_subscribers', $data);

		$this->session->set_flashdata('alert', 'success');
    	$this->session->set_flashdata('msg', 'Successfully subscribed!!');

		redirect($this->agent->referrer());
	
	}


}
