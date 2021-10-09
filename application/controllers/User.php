<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

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

		if(!$this->session->user){
			redirect('user/login');
		}else{
			redirect('account-home');
		}
		
	}

	public function home(){

		if(!$this->session->user){
			redirect('user/login');
		}

		$seo_data = array(
			'title' => 'Dashboard',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('user/home');
		$this->load->view('_partials/_footer');
	}
	public function login(){
		$seo_data = array(
			'title' => 'Login',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$this->load->view('_partials/_auth_header', $seo_data);
		$this->load->view('login');
		$this->load->view('_partials/_auth_footer');
	}
	public function register(){
		$seo_data = array(
			'title' => 'Register',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$this->load->view('_partials/_auth_header', $seo_data);
		$this->load->view('register');
		$this->load->view('_partials/_auth_footer');
	}
	public function forgot_password(){
		$seo_data = array(
			'title' => 'Forgot password',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$this->load->view('_partials/_auth_header', $seo_data);
		$this->load->view('forgot-password');
		$this->load->view('_partials/_auth_footer');
	}
	public function post_login(){

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
			redirect('user/login');
		}


		$data = array(
			'email' => $_POST['email'],
			'password' => strtolower(hash("sha512", $_POST['password']))
		);

		$r = $this->user_model->login($data);
		if(count($r) > 0){
			$this->session->set_userdata('user', $r); 

			if($r[0]['role'] == 'admin'){
				redirect('admin');
			}

			redirect('user');
		}else{
			 $this->session->set_flashdata('msg', 'Incorrect e-mail or password!!');
          $this->session->set_flashdata('alert', 'danger');
			redirect('user/login');
		}
	}
	public function post_register(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Retype Password', 'required|matches[password]');
		$this->form_validation->set_rules('full_name', 'Full name', 'required');

		if ($this->form_validation->run() == FALSE){
			redirect($this->agent->referrer());
		}

	
		$data = array(
			'full_name' => $_POST['full_name'],
			'email' => $_POST['email'],
			'password' => strtolower(hash("sha512", $_POST['password'])),
			'role' => 'user',
			'status' => 1
		);

		$r = $this->user_model->register($data);
		echo'<pre>';print_r($r);die();
		if(count($r) > 0){
			$this->session->set_userdata('user', $r); 
			redirect('user');
		}else{
			$this->session->set_flashdata('msg', 'Unkown problem, try again!');
            $this->session->set_flashdata('alert', 'danger');
			redirect($this->agent->referrer());
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
	public function change_user_password(){
		// print_r($_POST);die();
		if(!$this->session->user){
        	redirect('user/login');
        }


		$this->form_validation->set_rules('old_password', 'Old Password', 'required|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|min_length[5]|matches[password]');

        if (!$this->form_validation->run()){
        	$error = validation_errors();
			$this->session->set_flashdata('alert', 'danger');
        	$this->session->set_flashdata('msg', $error);
			redirect($this->agent->referrer());
		}

		$old_password = strtolower(hash("sha512", $_POST['old_password']));

		if($old_password != $this->session->user[0]['password']){
			$this->session->set_flashdata('msg', 'Old password is incorrect!');
			$this->session->set_flashdata('alert', 'danger');
			redirect($this->agent->referrer());
		}

		$password = strtolower(hash("sha512", $_POST['password']));

		$this->db->set('password', $password);
		$this->db->where('id', $this->session->user[0]['id']);
		$this->db->update('tbl_users');

		$this->db->where('id', $this->session->user[0]['id']);
		$result = $this->db->get('tbl_users')->result_array();
		$this->session->set_userdata('user', $result);

		$this->session->set_flashdata('msg', 'Password changed!');
		$this->session->set_flashdata('alert', 'success');

		redirect($this->agent->referrer());
	}
	public function change_user_profile(){

		if(!$this->session->user){
        	redirect('user/login');
        }

       
		$config['upload_path'] = './uploads/profiles/';
        $config['allowed_types'] = 'jpg|png';
        $new_name = time();
        $config['file_name'] = $new_name;
        $this->upload->initialize($config);

         if ($this->upload->do_upload('customFile')){

         	$image_metadata = $this->upload->data();

            $this->db->set('profile_pic', $image_metadata['file_name']);
            $this->db->where('id', $this->session->user[0]['id']);
			$this->db->update('tbl_users');

            $this->db->where('id', $this->session->user[0]['id']);
			$result = $this->db->get('tbl_users')->result_array();
			$this->session->set_userdata('user', $result);

            $this->session->set_flashdata('msg', 'Profile updated!!');
            $this->session->set_flashdata('alert', 'success');
         }else{
         	$this->session->set_flashdata('msg', $this->upload->display_errors());
			$this->session->set_flashdata('alert', 'danger');
         }
         redirect($this->agent->referrer());
	}
	public function change_user_info(){
		if(!$this->session->user){
        	redirect('user/login');
        }

        $this->form_validation->set_rules('full_name', 'Full name', 'required|min_length[3]');
		$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]');

		if($_POST['email'] != $this->session->user[0]['email']){			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_users.email]', array('is_unique' => 'This email is already registred!!'));
		}


        if (!$this->form_validation->run()){
        	$error = validation_errors();
			$this->session->set_flashdata('alert', 'danger');
        	$this->session->set_flashdata('msg', $error);
			redirect($this->agent->referrer());
		}

		$this->db->set('full_name', $_POST['full_name']);
		$this->db->set('email', $_POST['email']);
		$this->db->set('phone', $_POST['phone']);
		$this->db->set('address', $_POST['address']);
		$this->db->where('id', $this->session->user[0]['id']);
		$this->db->update('tbl_users');

		$this->db->where('id', $this->session->user[0]['id']);
		$user = $this->db->get('tbl_users')->result_array();

		$this->session->set_userdata('user', $user);

		$this->session->set_flashdata('alert', 'success');
        $this->session->set_flashdata('msg', 'Profile updated!');

        redirect($this->agent->referrer());
	}
	public function generateRandomString($length = 6) {
	    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	
	public function forgot(){

		$email = $_POST['email'];

		$this->db->where('email', $email);
		$r = $this->db->get('tbl_users')->result();

		if(count($r) == 1){
			$password = $this->generateRandomString(6);
			$new_p = hash("sha512", $password);

			$this->db->set('password', $new_p);
			$this->db->where('email', $email);
			$this->db->update('tbl_users');

			//mail a codes
			$subject = 'New Password';

			//$email = $_POST['email'];
       	   //Email content
	        $htmlContent = '<center><h2>' . webSettings()['site_name'] . '</h2>';
	        $htmlContent .= '<p>';
	        $htmlContent .= 'Hello!, Your new password is <br/>' . $password . '</p>';
	       
	        $htmlContent .= '<p>Thank you!</p> </center>';
	                
	       $a = $this->email_model->mailAgent($email, $htmlContent, $subject);
	       $this->session->set_flashdata('msg', 'Check email inbox for new password!!');
			$this->session->set_flashdata('alert', 'success');
	       
		}else{
			$this->session->set_flashdata('msg', 'No account associated with this email!!');
			$this->session->set_flashdata('alert', 'danger');
		}
		redirect($this->agent->referrer());
	}


	###########################################################
	###########################################################
	############### EVENTS CATEGORIES##########################


	public function manage_categories(){

		if(!$this->session->user){
			redirect('user/login');
		}

		$seo_data = array(
			'title' => 'Categories',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);
		$data['categories'] = $this->category_model->getCategories();

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('user/categories', $data);
		$this->load->view('_partials/_footer');
	}


	###########################################################
	###########################################################
	############### EVENTS ##########################


	public function new_event(){

		if(!$this->session->user){
			redirect('user/login');
		}

		$seo_data = array(
			'title' => 'New event',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);
		$data['categories'] = $this->category_model->getCategories();

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('user/new-event', $data);
		$this->load->view('_partials/_footer');
	}

	public function preview_event($event_id){

		if(!$this->session->user){
			redirect('user/login');
		}

		$event = $this->event_model->getEvent($event_id);
		$tickets_plans = $this->event_model->getEventTicketsPlans($event_id);

		$seo_data = array(
			'title' => 'Preview event',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);
		$data['event'] = $event;
		$data['tickets_plans'] = $tickets_plans;

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('user/preview-event', $data);
		$this->load->view('_partials/_footer');
	}

	public function edit_event($event_id){
		if(!$this->session->user){
			redirect('user/login');
		}

		$event = $this->event_model->getEvent($event_id);
		$tickets_plans = $this->event_model->getEventTicketsPlans($event_id);

		$seo_data = array(
			'title' => 'Edit event',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);
		$data['event'] = $event;
		$data['tickets_plans'] = $tickets_plans;

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('user/edit-event', $data);
		$this->load->view('_partials/_footer');
	}

	public function manage_events(){
		if(!$this->session->user){
			redirect('user/login');
		}

		$events = $this->event_model->getEvents($this->session->user[0]['id']);
		
		$events_with_tickets = array();

		foreach ($events as $event) {
			$tickets_plans = $this->event_model->getEventTicketsPlans($event['id']);
			$event['tickets_plans'] = $tickets_plans;
			array_push($events_with_tickets, $event);
		}

		$seo_data = array(
			'title' => 'Manage events',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);
		$data['events'] = $events_with_tickets;
		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('user/manage-events', $data);
		$this->load->view('_partials/_footer');
	}
	public function my_profile(){
		if(!$this->session->user){
			redirect('user/login');
		}

		$profile = $this->user_model->getUserbyId($this->session->user[0]['id']);

		$seo_data = array(
			'title' => 'My profile',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);
		
		$data['profile'] = $profile;

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('user/my-profile', $data);
		$this->load->view('_partials/_footer');
	}

	public function users(){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$seo_data = array(
			'title' => 'Users',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);


		$data['users'] = $this->db->get('tbl_users')->result_array();

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('admin/users', $data);
		$this->load->view('_partials/_footer');
	}
	// public function generateRandomString($length = 10) {
	//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	//     $charactersLength = strlen($characters);
	//     $randomString = '';
	//     for ($i = 0; $i < $length; $i++) {
	//         $randomString .= $characters[rand(0, $charactersLength - 1)];
	//     }
	//     return $randomString;
	// }
	public function add_new_user(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}

		$this->form_validation->set_rules('full_name', 'Names', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[tbl_users.email]');

		if($this->form_validation->run() == FALSE){
			// echo validation_errors();die();
			$this->session->set_flashdata('msg', validation_errors());
		 	redirect($this->agent->referrer());
		}

		$unhashed_p = $this->generateRandomString(8);
		$password = strtolower(hash("sha512", $unhashed_p));

		$user = array(
			'full_name' => $_POST['full_name'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'address' => $_POST['address'],
			'password' => $password,
			'role' => $_POST['role']
		);

		$this->db->insert('tbl_users', $user);


		//send password to email
		$email = $_POST['email'];
		$subject = 'New password for your <b>' . webSettings()['site_name'] . '</b> account.';
		$message = '<center>';
		$message .= 'Hello ' . $_POST['full_name'] . '<br/>';
		$message .= 'Here is new password for your account: ' . $unhashed_p;
		$message .= '</center>';
		$e = $this->email_model->mailAgent($email,$message, $subject);

		$this->session->set_flashdata('msg', 'New user added!');
		redirect($this->agent->referrer());
	}

	public function delete_user($id){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}

		$this->db->where('id', $id);
		$this->db->delete('tbl_users');

		$this->session->set_flashdata('msg', 'User deleted!');
		redirect($this->agent->referrer());

	}
	public function update_user(){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}

		$this->form_validation->set_rules('full_name', 'Names', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');

		if($this->form_validation->run() == FALSE){
			// echo validation_errors();die();
			$this->session->set_flashdata('msg', validation_errors());
		 	redirect($this->agent->referrer());
		}

		$checkE = $this->db->where('email', $_POST['email'])->get('tbl_users')->result_array();

		if(count($checkE)){
			if($checkE[0]['id'] != $_POST['id']){
				redirect($this->agent->referrer());
			}
		}

		$unhashed_p = $this->generateRandomString(8);

		if(isset($_POST['reset_password'])){
			$password = strtolower(hash("sha512", $unhashed_p));
			$this->db->set('password', $password);
		}

		$this->db->set('full_name', $_POST['full_name']);
		$this->db->set('email', $_POST['email']);
		$this->db->set('phone', $_POST['phone']);
		$this->db->set('role', $_POST['role']);
		$this->db->where('id', $_POST['id']);
		$this->db->update('tbl_users');

		if(isset($_POST['reset_password'])){
			//send email of new password
			$email = $_POST['email'];
			$subject = 'New password for your <b>' . webSettings()['site_name'] . '</b> account.';
			$message = '<center>';
			$message .= 'Hello ' . $_POST['full_name'] . '<br/>';
			$message .= 'Here is new password for your account: ' . $unhashed_p;
			$message .= '</center>';
			$e = $this->email_model->mailAgent($email,$message, $subject);
		}

		redirect($this->agent->referrer());
	}
}
