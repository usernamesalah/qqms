<?php defined('BASEPATH') || exit('No direct script allowed');

class Jenis_seminar_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'jenis_seminar';
		$this->data['primary_key'] = 'id_jenis';
	}
}

