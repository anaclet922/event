<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function index(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login', 'refresh');
		}else{
			redirect('admin-home', 'refresh');
		}
		
	}

	public function home(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login', 'refresh');
		}

		$seo_data = array(
			'title' => 'Dashboard',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$events = $this->db->get('tbl_events')->result_array();
		$users = $this->db->get('tbl_users')->result_array();

		$this->db->select_sum('amount');
		$this->db->where('status', 'PAYED');
		$amount = $this->db->get('tbl_tickets')->result_array();

		$tickets = $this->db->where('status', 'PAYED')->get('tbl_tickets')->result_array();

		// echo '<pre>';print_r($amount);die();

		$data['events'] = count($events);
		$data['users'] = count($users);
		$data['earned'] = $amount[0]['amount'];
		$data['tickets'] = count($tickets);

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('admin/home', $data);
		$this->load->view('_partials/_footer');
	}
	
	
}
