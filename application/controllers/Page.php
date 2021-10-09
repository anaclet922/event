<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Page extends CI_Controller {

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
			redirect('user/login');
		}
		$seo_data = array(
			'title' => 'Pages',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$pages = $this->db->get('tbl_pages')->result_array();

		$data['pages'] = $pages;

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('admin/pages', $data);
		$this->load->view('_partials/_footer');		
	}

	public function view($slug){
		$page = 'About us';
		if($slug == 'terms'){
			$page = 'Terms and conditions';
		}else if($slug == 'privacy'){
			$page = 'Privacy policy';
		}

		$seo_data = array(
			'title' => $page,
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$content = $this->db->where('page_slug', $slug)->where('visibility', 1)->get('tbl_pages')->result_array();

		$data['page'] = $content;
		$data['title'] = $page;

		if(!count($content)){
			redirect('home/index');
		}

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('page', $data);
		$this->load->view('_partials/_footer');	
	}

	public function contact(){
		$seo_data = array(
			'title' => 'Contact us',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('contact');
		$this->load->view('_partials/_footer');
	}

	public function post_contact(){
		//tbl_messages
		$this->form_validation->set_rules('names', 'Email', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required|min_length[10]');

		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('alert', 'danger');
    	    $this->session->set_flashdata('msg', validation_errors());
			redirect($this->agent->referrer());
		}

		$data = array(
			'names' => $_POST['names'],
			'email' => $_POST['email'],
			'message' => $_POST['message'],
			'subject' => $_POST['subject']
		);

		$this->db->insert('tbl_messages', $data);

		$this->session->set_flashdata('alert', 'success');
    	$this->session->set_flashdata('msg', 'Message sent!');
		redirect($this->agent->referrer());
	}

	public function change_page_visibility($id){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			$this->session->set_flashdata('alert', 'danger');
    	    $this->session->set_flashdata('msg', 'Accessing this page required logged in user!!');
			redirect('user/login');
		}

		$page = $this->db->where('id', $id)->get('tbl_pages')->result_array();

		if($page[0]['visibility'] == 1){
			$this->db->set('visibility', 0);
			$this->db->where('id', $id);
			$this->db->update('tbl_pages');
		}else{
			$this->db->set('visibility', 1);
			$this->db->where('id', $id);
			$this->db->update('tbl_pages');
		}

		$this->session->set_flashdata('alert', 'success');
    	$this->session->set_flashdata('msg', 'Page updated successfully!!');
		redirect($this->agent->referrer());
	}




}
