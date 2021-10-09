<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class User_model extends CI_Model
{
	public function get_user($data){
		$this->db->where('id', $data['id']);
		$result = $this->db->get('tbl_users')->result();
		return $result;
	}
	public function login($data){
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
    	$this->db->where('status', 1);
		$result = $this->db->get('tbl_users')->result_array();
		return $result;
	}
	public function getUserbyId($id){
		$this->db->where('id', $id);
		$result = $this->db->get('tbl_users')->result_array();
		return $result;
	}
	public function register($data){

		$this->db->insert('tbl_users', $data);
		// $insert_id = $this->db->insert_id();

		$user = array(
			'email' => $data['email'],
			'password' => $data['password']
		);

		return $this->login($user);
	}


   
}

