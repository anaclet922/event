<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
	public function add_new_category(){
		$a = $this->category_model->add_new_category($_POST);
		$response = array();
		if($a){
			$response['status'] = 'ok'; 
			$response['category'] = $this->category_model->getCategory($a);
		}else{
			$response['status'] = 'fail';
		}
		echo json_encode($response);		
	}
	public function category_delete($id){
		$a = $this->category_model->category_delete($id);
		redirect($this->agent->referrer(), 'refresh');
	}
	public function update_category(){
		echo json_encode($_POST);
		$a = $this->category_model->update_category($_POST);
		$response = array();
		if($a){
			$response['status'] = 'ok'; 
			$response['category'] = $this->category_model->getCategory($a);
		}else{
			$response['status'] = 'fail';
		}
		echo json_encode($response);
	}
	
	
}
