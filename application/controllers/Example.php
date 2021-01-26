<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Example extends RestController {

	public function __construct()
	{
		parent::__construct();
	}


	public function users_get()
	{
		$users = [
			['id' => 0, 'name' => 'Ilham', 'email' => 'john@example.com'],
			['id' => 1, 'name' => 'Akbar', 'email' => 'jim@example.com'],
		];

		$id = $this->get( 'id' );

		if ( $id === null )
		{
			if ( $users )
			{
				$this->response( $users, 200 );
			}
			else
			{
				$this->response( [
					'status' => false,
					'message' => 'No users were found'
				], 404 );
			}
		}
		else
		{
			if ( array_key_exists( $id, $users ) )
			{
				$this->response( $users[$id], 200 );
			}
			else
			{
				$this->response( [
					'status' => false,
					'message' => 'No such user found'
				], 404 );
			}
		}
	}

}

/* End of file Example.php */
/* Location: ./application/controllers/Example.php */