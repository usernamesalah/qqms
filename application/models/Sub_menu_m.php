<?php defined('BASEPATH') || exit('No direct script allowed');

class Sub_menu_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'sub_menu';
		$this->data['primary_key'] = 'id_sub_menu';
	}
}

