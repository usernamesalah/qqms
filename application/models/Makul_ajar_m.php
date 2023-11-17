<?php defined('BASEPATH') || exit('No direct script allowed');

class Makul_ajar_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'makul_ajar';
		$this->data['primary_key'] = 'id_makul_ajar';
	}
}

