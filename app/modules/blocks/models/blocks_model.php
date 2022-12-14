<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blocks_model extends MY_Model {

	public $tb_tickets;
	public $tb_ticket_message;

	public function __construct(){
		parent::__construct();
		$this->tb_tickets    = TICKETS;
		$this->tb_ticket_message    = TICKET_MESSAGES;
	}

	function getList($limit=-1, $page=-1){
		if($limit == -1){
			$this->db->select('count(*) as sum');
		}else{
			$this->db->select('*');
		}
		
		$this->db->from(INSTAGRAM_ACCOUNT_TB);

		if($limit != -1) {
			$this->db->limit($limit,$page);
		}

		$this->db->where("uid = '".session("uid")."'");

		$this->db->order_by('created','desc');
		$query = $this->db->get();

		if($query->result()){
			if($limit == -1){
				return $query->row()->sum;
			}else{
				$result =  $query->result();
				return $result;
			}
		}else{
			return false;
		}
	}

	function get_ticket_new(){
		$this->db->where('status', 'new');
		$num_rows = $this->db->count_all_results($tb_tickets);
		pr($num_rows, 1);
	}

}
