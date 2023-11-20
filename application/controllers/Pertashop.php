<?php if ( !defined('BASEPATH') )
	exit('No direct script access allowed');

class Pertashop extends MY_Controller
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

		if($token->role != 2) {
            redirect('login');
            exit;
		}
		
		$this->data['profile'] = $token;
	}

	public function index()
	{
		$this->data['ba'] = $this->Berita_acara_m->get();
		$this->data['content'] = 'input-spbu';
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
			redirect('pertashop/input-spbu');
			exit;
		}

		if($this->POST('update')){
			$data = [
				'pengukuran_spbu_sebelum' => $this->POST('pengukuran_spbu_sebelum'),
				'pengukuran_spbu_setelah' => $this->POST('pengukuran_spbu_setelah'),
			];

			$this->Berita_acara_m->update($id , $data);
			$this->flashmsg('data telah diupdate', 'success');
			redirect('pertashop/input-spbu');
			exit;
		}
		$this->data['ba'] = $this->Berita_acara_m->get_row(['id' => $id]);
		$this->data['content'] = 'update-kapasitas';
		$this->data['title'] = 'BA Pertashop | ' . $this->title;
		$this->template($this->data);
	}
	
	public function search_ba()
	{
		$q = strtolower($this->GET('q'));
		$data = $this->Berita_acara_m->search($q);
		$html = '';
		foreach ($data as $dt) {
			$ur = base_url('pertashop/update-kapasitas-ba') . "/" . $dt->id;
			$html .= '<li class="feed-item"><a href="' . $ur .'"><p class="mb-0">'.$dt->nomor_surat.'</p><p class="mb-0">'.$dt->nomor_polisi.'</p><p class="mb-0">'.$dt->nama_supir . '/' . $dt->nama_kernet.'</p><p class="mb-0">Tujuan '.$dt->tujuan.' - SPBU / Pertashop ke - '.$dt->urutan_spbu.'</p></a></li>';
		}

		echo $html;
	}
}