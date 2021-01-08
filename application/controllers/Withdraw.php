<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Withdraw extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function service()
	{
		$this->load->model('Withdraw_m','w');
		echo $this->w->send_request_withdraw();
		echo $this->w->check_pending_withdraw();
	
	}
}

/* End of file Withdraw.php */
/* Location: ./application/controllers/Withdraw.php */