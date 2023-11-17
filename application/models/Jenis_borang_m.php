<?php defined('BASEPATH') || exit('No direct script allowed');

class Jenis_borang_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'jenis_borang';
		$this->data['primary_key'] = 'id_jenis';
	}
}

