<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Category_model extends CI_Model{


    public function add_new_category($data){
      if($data['parent'] == ''){
         $data['parent'] = NULL;
      }
        $data_ = array(
          'category_name' => $data['category'],
          'parent_category' => $data['parent']
        );
        $this->db->insert('tbl_categories', $data_);
        $_id = $this->db->insert_id();
        return $_id;
    }

    public function getCategory($id){
      $this->db->where('id', $id);
      $a = $this->db->get('tbl_categories');
      return $a->result_array();
    }
    public function getCategories(){
      $a = $this->db->get('tbl_categories');
      return $a->result_array();
    }
    public function category_delete($id){
      $this->db->where('id', $id);
      $r = $this->db->delete('tbl_categories');
      return true;
    }
    public function update_category($data){
       if($data['parent'] == ''){
         $data['parent'] = NULL;
      }
       $this->db->set('category_name', $data['category_1']);
       $this->db->set('parent_category', $data['parent']);
       $this->db->where('id', $data['category_id']);
       $this->db->update('tbl_categories');
       return $data['category_id'];
    }
}