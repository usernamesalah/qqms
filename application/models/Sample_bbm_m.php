<?php

class Sample_bbm_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->data['table_name']	= 'sample_bbm';
		$this->data['primary_key']	= 'id';
	}
}
