<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Event_model extends CI_Model{


    public function getEvent($id){                
        $this->db->where('id', $id);
        $event = $this->db->get('tbl_events');
        return $event->result_array();
    }
    public function getEventTicketsPlans($event_id){
      $this->db->where('event_id', $event_id);
      $this->db->order_by('price', 'ASC');
      $tickets = $this->db->get('tbl_tickets_plans');
      return $tickets->result_array();
    }
    public function getEvents($user_id){
         $this->db->where('user_id', $user_id);
        $event = $this->db->get('tbl_events');
        return $event->result_array();
    }
    public function delete_event($event_id){
      $this->db->where('id', $event_id);
      $this->db->delete('tbl_events');

      $this->db->where('event_id', $event_id);
      $this->db->delete('tbl_tickets_plans');

      return true;
    }

    public function get_upcoming_events(){
      $today = date('Y-m-d');

      $this->db->where('date_ >=', $today);
      $this->db->order_by('date_', 'ASC');
      $this->db->limit(10, 0);
      $events = $this->db->get('tbl_events')->result_array();

      $response = array();

      foreach ($events as $event) {
         $this->db->where('event_id', $event['id']);
         $this->db->order_by('price', 'ASC');
         $tickets = $this->db->get('tbl_tickets_plans')->result_array();

         $event['event_tickets_plan'] = $tickets;

         array_push($response, $event);
      }

      return $response;
    }

} 