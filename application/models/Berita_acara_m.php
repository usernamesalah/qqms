<?php

class Berita_acara_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->data['table_name']	= 'berita_acara';
		$this->data['primary_key']	= 'id';
	}

	public function insert_batch($data)
	{
		foreach($data as $dt) {
			echo json_encode($dt);
			$this->insert($dt);
		}
	}

	public function search($plat)
	{
		$query = $this->db->query('SELECT * FROM ' . $this->data['table_name'] . ' WHERE LOWER(nomor_polisi) LIKE "%' . $plat .'%" AND pengukuran_spbu_sebelum < 1 OR pengukuran_spbu_setelah < 1');
		return $query->result();
	}
}
