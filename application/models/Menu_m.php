<?php defined('BASEPATH') || exit('No direct script allowed');

class Menu_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'menu';
		$this->data['primary_key'] = 'id_menu';
	}
}

