<?php if ( !defined('BASEPATH') )
	exit('No direct script access allowed');

class Gatekeeper extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ci_jwt');
        $access_token = $this->session->userdata('token');
        if ( !isset($access_token) )
        {
            redirect('login');
            exit;
        }

        $token = $this->ci_jwt->decode($access_token);
        if ( !isset($token->email) )
        {
            redirect('login');
            exit;
        }

		if($token->role != 1) {
            redirect('login');
            exit;
		}
		
		$this->data['profile'] = $token;
	}

	public function index()
	{
		$this->data['ba'] = $this->Berita_acara_m->get();
		$this->data['content'] = 'pertashop';
		$this->data['title'] = 'BA Pertashop | ' . $this->title;
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
}