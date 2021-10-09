<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function get_gickets(){
		$response = array(
			'status' => 200,
		);
		$data = array();
		if($_GET['last'] == 'none'){
			$data = $this->db->get('tbl_tickets')->result_array();
		}else{
			$last = $this->db->where('ticket_no', $_GET['last'])->get('tbl_tickets')->result_array();
			$data = $this->db->where('id >', $last[0]['id'])->get('tbl_tickets')->result_array();
		}

		$response['tickets'] = $data;

		echo json_encode($response);
	}

	public function check_ticket_valid(){
		$response = array(
			'status' => 200,
		);
		
		$ticket = $this->db->where('ticket_no', $_GET['ticket_no'])->get('tbl_tickets')->result_array();
		
		if(count($ticket) == 1){
			$used = $ticket[0]['used'];
			if($used == 0){
				$response['valid'] = 'yes';
				$this->db->set('used', 1);
				$this->db->where('id', $ticket[0]['id']);
				$this->db->update('tbl_tickets');

				$event = $this->db->where('id', $ticket[0]['event_id'])->get('tbl_events')->result_array();

				if(count($event) > 0){
					$response['event'] = $event[0]['title'];
				}else{
					$response['event'] = "N/A";
				}
			}else{
				$response['valid'] = 'no';
				$event = $this->db->where('id', $ticket[0]['event_id'])->get('tbl_events')->result_array();

				if(count($event) > 0){
					$response['event'] = $event[0]['title'];
				}else{
					$response['event'] = "N/A";
				}
			}
		}



		echo json_encode($response);
	}
	
}


