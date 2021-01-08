<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Withdraw_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_request()
	{
		return $this->db->where("status"=>"REQUEST")->get("withdraw_req")->result();
	}

}

/* End of file Withdraw_m.php */
/* Location: ./application/models/Withdraw_m.php */