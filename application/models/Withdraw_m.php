<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Withdraw_m extends CI_Model {
	protected $header;
	public function __construct()
	{
		parent::__construct();
		$this->header = array(
			"Authorization: Basic SHl6aW9ZN0xQNlpvTzduVFlLYkc4TzRJU2t5V25YMUp2QUVWQWh0V0tadW1vb0N6cXA0MTo=", 
			"Content-Type: application/x-www-form-urlencoded"
		);
	}

	public function send_request_withdraw()
	{
		$pending = $this->db->where(array("status"=>"REQUEST"))->get("withdraw_req")->result();
		foreach ($pending as $p) {
			$data = array(
				"bank_code"=>"014",
				"account_number"=>"123456",
				"amount"=>"100000",
				"remark"=>"Ilham Akbar",
			);
			$result = $this->send_post("POST", $data, "https://nextar.flip.id/disburse");
			if($result['status']){
				$response = json_decode($result['data']);
				$n = array(
					"status"=>$response->status,
					"timestamp"=>$response->timestamp,
					"beneficiary_name"=>$response->beneficiary_name,
					"receipt"=>$response->receipt,
					"time_served"=>$response->time_served,
					"fee"=>$response->fee,
					"serialid"=>$response->id,
				);
				$this->db->update("withdraw_req", $n, array("id"=>$p->id));
			}else{
				$this->db->insert('log_error', array("log_error"=>$result['data'], "timestamp"=>date("Y/m/d H:i:s")));
			}
		}
		return "Berhasil Kirim Request Withdraw";
	}

	public function check_pending_withdraw()
	{
		$pending = $this->db->where(array("status"=>"PENDING"))->get("withdraw_req")->result();
		foreach ($pending as $p) {
			$result = $this->send_post("GET", array(), "https://nextar.flip.id/disburse/".$p->serialid);
			if($result['status']){
				$response = json_decode($result['data']);
				$n = array(
					"status"=>$response->status,
					"receipt"=>$response->receipt,
					"time_served"=>$response->time_served,
				);
				$this->db->update("withdraw_req", $n, array("id"=>$p->id));
				if($response->status=="SUCCESS"){
					//API NOTIFIKASI KE MOBILE
				}
			}else{
				$this->db->insert('log_error', array("log_error"=>$result['data'], "timestamp"=>date("Y/m/d H:i:s")));
			}
		}
		return "<br>Berhasil Check Pending Withdraw";
	}

	public function send_post($methode, $data, $url)
	{
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $methode,
			CURLOPT_POSTFIELDS => http_build_query($data, '', '&'),
			CURLOPT_HTTPHEADER => $this->header,
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
			return array("status"=>false, "data"=>$err);
		}else{
			return array("status"=>true, "data"=>$response);			
		}
	}

}

/* End of file Withdraw_m.php */
/* Location: ./application/models/Withdraw_m.php */