<?php defined('BASEPATH') || exit('No direct script allowed');

class Slider_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'slider';
		$this->data['primary_key'] = 'id_slider';
	}
}

