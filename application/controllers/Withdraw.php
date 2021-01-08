<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Withdraw extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Withdraw_m','w');
		var_dump($this->w->get_request());
	}

}

/* End of file Withdraw.php */
/* Location: ./application/controllers/Withdraw.php */