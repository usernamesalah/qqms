<?php defined('BASEPATH') || exit('No direct script allowed');

class Komentar_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'komentar';
		$this->data['primary_key'] = 'id_komentar';
	}
}

