<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['content'] 	= 'home';
		$this->data['title'] = 'Home | '.$this->title;
        $this->template($this->data);
	}

	public function ba_pertashop()
	{
		$this->data['ba'] = $this->Berita_acara_m->get();
		$this->data['content'] 	= 'pertashop';
		$this->data['title'] = 'BA Pertashop | '.$this->title;
        $this->template($this->data);
	}

	public function tambah_berita_acara()
	{
		if($this->POST('create')) {
			$id = $this->
			$data = [
				'nomor_surat' => $this->POST('nomor_surat'),
				'nama_supir' =>$this->POST('nama_supir'),
				'nama_kernet' =>$this->POST('nama_kernet'),
				'nomor_polisi' =>$this->POST('nomor_polisi'),
				'nomor_shipment' =>$this->POST('nomor_shipment'),
				'jam_gate_out' =>$this->POST('jam_gate_out'),
				'kapasitas_mt' =>$this->POST('kapasitas_mt'),
				'tujuan' =>$this->POST('tujuan'),
				'nomor_lo' =>$this->POST('nomor_lo'),
				'produk' =>$this->POST('produk'),
				'volume_lo' =>$this->POST('volume_lo'),
				'hasil_t2_tbbm' =>$this->POST('hasil_t2_tbbm'),
			];
		}
		$this->data['ba'] = $this->Berita_acara_m->get();
		$this->data['content'] 	= 'tambah-ba';
		$this->data['title'] = 'BA Pertashop | '.$this->title;
        $this->template($this->data);
	}
}