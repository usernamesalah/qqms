<?php defined('BASEPATH') || exit('No direct script allowed');

class Berkas_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'berkas';
		$this->data['primary_key'] = 'id_berkas';
	}
}

