<?php defined('BASEPATH') || exit('No direct script allowed');

class Pendaftaran_sidang_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'pendaftaran_sidang';
		$this->data['primary_key'] = 'id_pendaftaran';
	}
}

