<?php if ( !defined('BASEPATH') )
	exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['content'] = 'home';
		$this->data['title'] = 'Home | ' . $this->title;
		$this->template($this->data);
	}

	public function berita_acara()
	{
		$this->data['ba'] = $this->Berita_acara_m->get();
		$this->data['content'] = 'pertashop';
		$this->data['title'] = 'BA Pertashop | ' . $this->title;
		$this->template($this->data);
	}

	public function tambah_berita_acara()
	{
		if ( $this->POST('create') )
		{
			$ba = $this->Berita_acara_m->get_last_row();
			if ( !isset($ba) )
			{
				$n = 0;
			}
			else
			{
				$n = $ba->id;
			}

			$no = str_pad($n + 1, 5, 0, STR_PAD_LEFT);
			$data = [
			 'nomor_surat' => $no . "/PND54D000/BA/" . date("Y"),
			 'nama_supir' => $this->POST('nama_supir'),
			 'nama_kernet' => $this->POST('nama_kernet'),
			 'nomor_polisi' => $this->POST('nomor_polisi'),
			 'nomor_shipment' => $this->POST('nomor_shipment'),
			 'jam_gate_out' => $this->POST('jam_gate_out'),
			 'kapasitas_mt' => $this->POST('kapasitas_mt'),
			 'tujuan' => $this->POST('tujuan'),
			 'nomor_lo' => $this->POST('nomor_lo'),
			 'produk' => $this->POST('produk'),
			 'volume_lo' => $this->POST('volume_lo'),
			 'hasil_t2_tbbm' => $this->POST('hasil_t2_tbbm'),
			];

			$this->Berita_acara_m->insert($data);
			$this->flashmsg('Berhasil membuat berita acara', 'success');
			redirect('admin/berita_acara');
			exit;
		}
		$this->data['ba'] = $this->Berita_acara_m->get();
		$this->data['content'] = 'tambah-ba';
		$this->data['title'] = 'BA Pertashop | ' . $this->title;
		$this->template($this->data);
	}
	public function input_spbu()
	{
		$this->data['ba'] = $this->Berita_acara_m->get();
		$this->data['content'] = 'input-spbu';
		$this->data['title'] = 'BA Pertashop | ' . $this->title;
		$this->template($this->data);
	}

	public function update_kapasitas_ba($id)
	{
		if(!isset($id)) {
			$this->flashmsg('ID tidak ditemukan', 'danger');
			redirect('admin/input-spbu');
			exit;
		}

		if($this->POST('update')){
			$this->Berita_acara_m->update($id , ['hasil_t2_diterima' => $this->POST('hasil_t2_diterima')]);
			$this->flashmsg('data telah diupdate', 'success');
			redirect('admin/input-spbu');
			exit;
		}
		$this->data['ba'] = $this->Berita_acara_m->get_row(['id' => $id]);
		$this->data['content'] = 'update-kapasitas';
		$this->data['title'] = 'BA Pertashop | ' . $this->title;
		$this->template($this->data);
	}
	
	public function search_ba()
	{
		$q = $this->GET('q');
		$data = $this->Berita_acara_m->getDataLike(['nomor_polisi' => $q]);
		$html = '';
		foreach ($data as $dt) {
			$ur = base_url('admin/update-kapasitas-ba') . "/" . $dt->id;
			$html .= '<li class="feed-item"><a href="' . $ur .'"><p class="mb-0">'.$dt->nomor_surat.'</p><p class="mb-0">'.$dt->nomor_polisi.'</p><p class="mb-0">'.$dt->nama_supir . '/' . $dt->nama_kernet.'</p><p class="mb-0">Tujuan '.$dt->tujuan.'</p></a></li>';
		}

		echo $html;
	}
}