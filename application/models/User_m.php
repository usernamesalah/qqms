<?php

class User_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->data['table_name']	= 'users';
		$this->data['primary_key']	= 'id';
	}
}
