<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
	public function sys_settings(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}

		$seo_data = array(
			'title' => 'System settings',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('admin/setting');
		$this->load->view('_partials/_footer');
	}

	public function settings_change_logo(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}

		$config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|svg|webp|apng|jpeg|jfif|pjpeg|pjp|gif';
        $new_name = time();
        $config['file_name'] = $new_name;
        $this->upload->initialize($config);

         if ($this->upload->do_upload('imgInpLogoChooser')){
                $image_metadata = $this->upload->data();

                $this->db->set('value', $image_metadata['file_name']);
                $this->db->where('config_key', 'logo');
                $this->db->update('tbl_config');

                $this->session->set_flashdata('msg', 'Website logo changed!!');
                $this->session->set_flashdata('alert', 'success');
         }else{
         	// print_r($this->upload->display_errors());
			$this->session->set_flashdata('msg', $this->upload->display_errors());
			$this->session->set_flashdata('alert', 'danger');
         }
         
         redirect($this->agent->referrer());
	}
	public function settings_change_favicon(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}

		$config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|svg';
        $new_name = time();
        $config['file_name'] = $new_name;
        $this->upload->initialize($config);

         if ($this->upload->do_upload('imgInpLogoChooser')){
                $image_metadata = $this->upload->data();

                $this->db->set('value', $image_metadata['file_name']);
                $this->db->where('config_key', 'favicon');
                $this->db->update('tbl_config');

                $this->session->set_flashdata('msg', 'Website favicon changed!!');
                $this->session->set_flashdata('alert', 'success');
         }else{
         	// print_r($this->upload->display_errors());
			$this->session->set_flashdata('msg', $this->upload->display_errors());
			$this->session->set_flashdata('alert', 'danger');
         }
         
         redirect($this->agent->referrer());
	}

	public function settings_change_info(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$this->db->set('value', $_POST['site_name']);
        $this->db->where('config_key', 'site_name');
        $this->db->update('tbl_config');

        $this->db->set('value', $_POST['site_description']);
        $this->db->where('config_key', 'site_description');
        $this->db->update('tbl_config');
        
        $this->db->set('value', $_POST['site_keywords']);
        $this->db->where('config_key', 'site_keywords');
        $this->db->update('tbl_config');
        
		 $this->session->set_flashdata('msg', 'Website info changed!!');
	     $this->session->set_flashdata('alert', 'success');

		redirect($this->agent->referrer());
	}

	public function settings_change_footer_address(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$this->db->set('value', $_POST['site_address']);
		$this->db->where('config_key', 'site_address');
		$this->db->update('tbl_config');

		$this->db->set('value', $_POST['site_contact_phone']);
		$this->db->where('config_key', 'site_contact_phone');
		$this->db->update('tbl_config');

		$this->db->set('value', $_POST['site_contact_email']);
		$this->db->where('config_key', 'site_contact_email');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer());
	}

	public function settings_change_site_email(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$this->db->set('value', $_POST['email']);
		$this->db->where('config_key', 'site_email');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer());
	}

	public function settings_change_terms_condition(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$this->db->set('value', $_POST['terms']);
		$this->db->where('config_key', 'site_terms');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer());
	}

	public function settings_change_flutterwave(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$this->db->set('value', $_POST['flutterwave_public_key']);
		$this->db->where('config_key', 'flutterwave_public_key');
		$this->db->update('tbl_config');

		$this->db->set('value', $_POST['flutterwave_encryption_key']);
		$this->db->where('config_key', 'flutterwave_encryption_key');
		$this->db->update('tbl_config');

		$this->db->set('value', $_POST['flutterwave_secret_key']);
		$this->db->where('config_key', 'flutterwave_secret_key');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer());
	}

	public function settings_change_currency(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$this->db->set('value', $_POST['site_currency']);
        $this->db->where('config_key', 'site_currency');
        $this->db->update('tbl_config');

        $this->session->set_flashdata('msg', 'Website currency changed!!');
	    $this->session->set_flashdata('alert', 'success');

		redirect($this->agent->referrer());
	}

	public function settings_change_footer_about(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$this->db->set('value', $_POST['about']);
		$this->db->where('config_key', 'footer_about');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer());
	}

	public function settings_change_social_media(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$this->db->set('value', $_POST['facebook']);
		$this->db->where('config_key', 'footer_facebook');
		$this->db->update('tbl_config');

		$this->db->set('value', $_POST['twitter']);
		$this->db->where('config_key', 'footer_twitter');
		$this->db->update('tbl_config');

		$this->db->set('value', $_POST['youtube']);
		$this->db->where('config_key', 'footer_youtube');
		$this->db->update('tbl_config');

		$this->db->set('value', $_POST['linkedin']);
		$this->db->where('config_key', 'footer_linkedin');
		$this->db->update('tbl_config');

		$this->db->set('value', $_POST['instagram']);
		$this->db->where('config_key', 'footer_instagram');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer());
	}

	public function settings_change_privacy_policy(){

		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$this->db->set('value', $_POST['policy']);
		$this->db->where('config_key', 'site_privacy');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer());
	}

	public function settings_change_total_seats(){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$this->db->set('value', $_POST['total_seats']);
		$this->db->where('config_key', 'total_seats');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer());
	}
	public function settings_change_news_per_page(){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login');
		}
		$this->db->set('value', $_POST['news_per_page']);
		$this->db->where('config_key', 'news_per_page');
		$this->db->update('tbl_config');

		redirect($this->agent->referrer());	
	}
}
