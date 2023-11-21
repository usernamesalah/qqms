<?php

class Sample_bbm_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->data['table_name']	= 'sample_bbm';
		$this->data['primary_key']	= 'id';
	}

	public $asal = [
		'penyaluran'=> 'Penyaluran Mobil Tangki',
		'after_backloading'=> 'After Loading Kapal (Backloading)',
		'before_disc_domestik'=> 'Before Discharge Kapal (Domestik)',
		'before_disc_import'=> 'Before Discharge Kapal (Import)',
		'master_domestik'=> 'Master Sample Kapal (Domestik)',
		'master_import'=> 'Master Sample Kapal (Import)',
		'tanki'=> 'Tanki Timbun',
	];

	public $masa = [
		'penyaluran'=> 7,
		'after_backloading'=> 14,
		'before_disc_domestik'=> 30 ,
		'before_disc_import'=> 60,
		'master_domestik'=> 90,
		'master_import'=> 90,
		'tanki'=> 7
	];

	public function getOrderedAndClosest($cond = '' , $limit = 0)
	{
		$query = 'SELECT * , DATEDIFF( tanggal_release, NOW() ) as df FROM sample_bbm';
		if($cond != '')
		{
			$query .= ' WHERE ' . $cond;
		}
		$query .=  ' ORDER BY DATEDIFF( tanggal_release, NOW() ) DESC ';

		if($limit > 0){
			$query .= ' LIMIT ' . $limit;
		}

		$q = $this->db->query($query);
		return $q->result();
	}
}
