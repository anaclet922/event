<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

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

		$seo_data = array(
			'title' => 'Latest news',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$config = array();
        $config["base_url"] = base_url('news');
        $config["total_rows"] = $this->get_count();
        $config["per_page"] = webSettings()['news_per_page'];
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();
        $data['news'] = $this->get_news($config["per_page"], $page);

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('news', $data);
		$this->load->view('_partials/_footer');	
	}

	public function get_news($limit, $start) {
	 	$this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tbl_news');
        return $query->result_array();
    }
    public function get_count() {
        return count($this->db->get('tbl_news')->result());
    }
	public function slug($string, $spaceRepl = "_"){
	    $string = str_replace("&", "and", $string);

	    $string = preg_replace("/[^a-zA-Z0-9 _-]/", "", $string);

	    $string = strtolower($string);

	    $string = preg_replace("/[ ]+/", " ", $string);

	    $string = str_replace(" ", $spaceRepl, $string);

	    $check = $this->db->where('slug', $string)->get('tbl_news')->result_array();

	    if(count($check)){
	    	$string .= '_' . time();
	    }

	    return $string;
	}
	public function news_cp(){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login', 'refresh');
		}


		$seo_data = array(
			'title' => 'News',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);
		$data['news'] = $this->db->order_by('id', 'DESC')->get('tbl_news')->result_array();

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('admin/news', $data);
		$this->load->view('_partials/_footer');
	}

	public function new_post(){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login', 'refresh');
		}


		$seo_data = array(
			'title' => 'New Post',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);
		$data['news'] = $this->db->order_by('id', 'DESC')->get('tbl_news')->result_array();

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('admin/new-post', $data);
		$this->load->view('_partials/_footer');	
	}

	public function post_news(){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login', 'refresh');
		}

		if(trim($_FILES['image']['name'][0]) == ''){
			// die($_FILES['image']['name'][0]);
	    	$this->session->set_flashdata('alert', 'danger');
    	    $this->session->set_flashdata('msg', 'No Image selected!!');
	    	redirect($this->agent->referrer());
	    }


	    $config['upload_path'] = "./uploads/news/";
        $config['allowed_types'] = 'jpg|png|jpeg|svg|gif';

        $new_name = time() . '-' . $_FILES["image"]['name'][0];
        $config['file_name'] = $new_name;

        $this->upload->initialize($config);

        $_FILES['image']['name']= $_FILES['image']['name'][0];
        $_FILES['image']['type']= $_FILES['image']['type'][0];
        $_FILES['image']['tmp_name']= $_FILES['image']['tmp_name'][0];
        $_FILES['image']['error']= $_FILES['image']['error'][0];
        $_FILES['image']['size']= $_FILES['image']['size'][0];   

        if (!$this->upload->do_upload('image')) {
        	$error = $this->upload->display_errors('<p class="alert alert-danger text-center">', '</p>');
        	$this->session->set_flashdata('alert', 'danger');
    	    $this->session->set_flashdata('msg', $error);
        	redirect($this->agent->referrer());
        	// echo $this->upload->display_errors();
        }else{
        	$data = array('image_metadata' => $this->upload->data());
        	$filename = $data['image_metadata']['file_name'];
        	$d = array(
        		'title' => $_POST['title'],
        		'body' => $_POST['body'],
        		'thumbnail' => $filename,
        		'user_id' => $this->session->user[0]['id'],
        		'slug' => $this->slug($_POST['title'])
        	);

        	$this->db->insert('tbl_news', $d);

        	$insert_id = $this->db->insert_id();

        	$this->session->set_flashdata('alert', 'success');
    	    $this->session->set_flashdata('msg', 'Successfully added!!');  
        	redirect('news/update-news/' . $insert_id);
        }

	}

	public function update_news($id){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login', 'refresh');
		}

		$new = $this->db->where('id', $id)->get('tbl_news')->result_array();

		if(!isset($new[0]['id'])){
			redirect($this->agent->referrer());
		}

		$seo_data = array(
			'title' => 'New Post',
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$data['news'] = $this->db->order_by('id', 'DESC')->get('tbl_news')->result_array();

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('admin/update-post', $data);
		$this->load->view('_partials/_footer');	
	}
	public function post_update_news($id){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login', 'refresh');
		}

	    $new = $this->db->where('id', $id)->get('tbl_news')->result_array();

		if(!isset($new[0]['id'])){
			redirect($this->agent->referrer());
		}

		if($_FILES['image']['name'][0] != ''){
			$config['upload_path'] = "./uploads/news/";
	        $config['allowed_types'] = 'jpg|png|jpeg|svg|gif';

	        $new_name = time() . '-' . $_FILES["image"]['name'][0];
	        $config['file_name'] = $new_name;

	        $this->upload->initialize($config);

	        $_FILES['image']['name']= $_FILES['image']['name'][0];
	        $_FILES['image']['type']= $_FILES['image']['type'][0];
	        $_FILES['image']['tmp_name']= $_FILES['image']['tmp_name'][0];
	        $_FILES['image']['error']= $_FILES['image']['error'][0];
	        $_FILES['image']['size']= $_FILES['image']['size'][0];   

	        if (!$this->upload->do_upload('image')) {
	        	$error = $this->upload->display_errors('<p class="alert alert-danger text-center">', '</p>');
	        	$this->session->set_flashdata('alert', 'danger');
	    	    $this->session->set_flashdata('msg', $error);
	        	redirect($this->agent->referrer());
	        }else{
	        	$data = array('image_metadata' => $this->upload->data());
	        	$filename = $data['image_metadata']['file_name'];

	        	$this->db->set('title', $_POST['title']);
		    	$this->db->set('body', $_POST['body']);
		    	$this->db->set('thumbnail', $filename);
	        	$this->db->where('id', $id);
	        	$this->db->update('tbl_news'); 


	        	$this->session->set_flashdata('alert', 'success');
	        	$this->session->set_flashdata('msg', 'Successfully updated!!');
	        	redirect($this->agent->referrer());
	        }
		}else{
			$this->db->set('title', $_POST['title']);
	    	$this->db->set('body', $_POST['body']);
        	$this->db->where('id', $id);
        	$this->db->update('tbl_news'); 
        	$this->session->set_flashdata('alert', 'success');
        	$this->session->set_flashdata('msg', 'Successfully updated!!');
        	redirect($this->agent->referrer());	
		}

	}

	public function delete_news($id){
		if(!$this->session->user || $this->session->user[0]['role'] != 'admin'){
			redirect('user/login', 'refresh');
		}

	    $new = $this->db->where('id', $id)->get('tbl_news')->result_array();

		if(!isset($new[0]['id'])){
			redirect($this->agent->referrer());
		}

		$this->db->where('id', $id);
		$this->db->delete('tbl_news');

		$this->session->set_flashdata('alert', 'success');
    	$this->session->set_flashdata('msg', 'Successfully deleted!!');
    	redirect($this->agent->referrer());	
	}

	public function view($slug){
		// echo $slug;
		$article = $this->db->where('slug', $slug)->get('tbl_news')->result_array();

		if(!isset($article[0]['id'])){
			redirect('home/_404');
		}

		$seo_data = array(
			'title' => $article[0]['title'],
			'description' => webSettings()['site_description'],
			'keywords' => webSettings()['site_keywords']
		);

		$data['article'] = $article;

		$this->load->view('_partials/_header', $seo_data);
		$this->load->view('article', $data);
		$this->load->view('_partials/_footer');	
	}

	public function add_view($id){

		$response = array();

	    $new = $this->db->where('id', $id)->get('tbl_news')->result_array();

		if(!isset($new[0]['id'])){
			$response['status'] = '404';
			$response['message'] = 'Invalid article';
		}

		$this->db->set('views', 'views+1', FALSE);
		$this->db->where('id', $id);
		$i = $this->db->update('tbl_news');

		if($i){
			$views = $this->db->where('id', $id)->get('tbl_news')->result_array()[0]['views'];
			$response['status'] = '200';
			$response['message'] = 'Updated';
			$response['views'] = $views;
		}

		echo json_encode($response);
	}

}
