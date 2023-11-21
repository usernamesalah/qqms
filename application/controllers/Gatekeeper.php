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

		if ( $token->role != 1 )
		{
			redirect('login');
			exit;
		}

		$this->data['profile'] = $token;
	}

	public function index()
	{
		redirect('gatekeeper/berita-acara');
			exit;
	}

	public function berita_acara()
	{
		$ba= $this->Berita_acara_m->get();
		foreach ($ba as $value) {
			if(isset($this->data['ba'][$value->nomor_surat])) {
				$this->data['ba'][$value->nomor_surat]['spbu_2'] = [
					'tujuan' =>$value->tujuan,
					'produk' =>$value->produk,
					'nomor_lo' =>$value->nomor_lo,
					'pengukuran_spbu_sebelum' => $value->pengukuran_spbu_sebelum
				];
			} else {
				$this->data['ba'][$value->nomor_surat] = [
					'nomor_surat' =>$value->nomor_surat,
					'nama_supir' => $value->nama_supir,
					'nama_kernet' => $value->nama_kernet,
					'nomor_polisi' => $value->nomor_polisi,
					'jam_gate_out' =>$value->jam_gate_out,
					'kapasitas_mt' => $value->kapasitas_mt,
					'spbu_1' => [
					'tujuan' =>$value->tujuan,
					'produk' =>$value->produk,
					'status' =>$value->status,
					'nomor_lo' =>$value->nomor_lo,
						'pengukuran_spbu_sebelum' => $value->pengukuran_spbu_sebelum,
						'pengukuran_spbu_setelah' => $value->pengukuran_spbu_setelah
					]
				];

			}
		}
		$this->data['content'] = 'pertashop';
		$this->data['title'] = 'BA Pertashop | ' . $this->title;
		$this->template($this->data);
	}

	public function tambah_berita_acara()
	{
		if ( $this->POST('create') )
		{
			$ba = $this->Berita_acara_m->get_last_row();

			$n = ( !isset($ba) ) ? 0 : $ba->id;
			$no = str_pad($n + 1, 5, 0, STR_PAD_LEFT);

			$dataCore = [
			 'nomor_surat' => $no . "/PND54D000/BA/" . date("Y"),
			 'nama_supir' => $this->POST('nama_supir'),
			 'nama_kernet' => $this->POST('nama_kernet'),
			 'nomor_polisi' => str_replace(' ', '', $this->POST('nomor_polisi')),
			 'jam_gate_out' => $this->POST('jam_gate_out'),
			 'kapasitas_mt' => $this->POST('kapasitas_mt')
			];

			$spbu1 = [
			 'tujuan' => $this->POST('tujuan'),
			 'nomor_lo' => $this->POST('nomor_lo'),
			 'produk' => $this->POST('produk'),
			 'volume_lo' => $this->POST('volume_lo'),
			 'pengukuran_tbbm' => $this->POST('hasil_t2_tbbm'),
			 'urutan_spbu' => 1
			];

			$spbu2 = [
			 'tujuan' => $this->POST('tujuan_2'),
			 'nomor_lo' => $this->POST('nomor_lo_2'),
			 'produk' => $this->POST('produk_2'),
			 'volume_lo' => $this->POST('volume_lo_2'),
			 'urutan_spbu' => 2
			];
			
			$s1 = array_merge($dataCore, $spbu1);
			$s2 = array_merge($dataCore, $spbu2);
			$dt = [$s1 , $s2];
			
			$this->Berita_acara_m->insert_batch($dt);
			$this->flashmsg('Berhasil membuat berita acara', 'success');
			redirect('gatekeeper/berita_acara');
			exit;
		}
		$this->data['content'] = 'tambah-ba';
		$this->data['title'] = 'BA Pertashop | ' . $this->title;
		$this->template($this->data);
	}

	public function detail_berita_acara($id)
	{
		if ( !isset($id) )
		{
			$this->flashmsg('ID tidak ditemukan', 'danger');
			redirect('gatekeeper/berita-acara');
			exit;
		}
		$id = str_replace('_' , "/", $id);
		$ba = $this->Berita_acara_m->get(['nomor_surat' => strtoupper($id)]);
		foreach($ba as $value){
			if($value->urutan_spbu == 1) {
				$this->data['ba'] = [
					'nomor_surat' =>$value->nomor_surat,
					'nama_supir' => $value->nama_supir,
					'nama_kernet' => $value->nama_kernet,
					'nomor_polisi' => $value->nomor_polisi,
					'jam_gate_out' =>$value->jam_gate_out,
					'kapasitas_mt' => $value->kapasitas_mt,
					'pengukuran_tbbm' => $value->pengukuran_tbbm,
					'created_at' => $this->tanggal->convert_date($value->created_at),
					'spbu_1' => [
						'tujuan' =>$value->tujuan,
						'produk' =>$value->produk,
						'volume_lo' =>$value->volume_lo,
						'nomor_lo' =>$value->nomor_lo,
							'pengukuran_spbu_sebelum' => $value->pengukuran_spbu_sebelum,
							'pengukuran_spbu_setelah' => $value->pengukuran_spbu_setelah
					]
				];
			} else {
				$this->data['ba']['spbu_2'] = [
					'tujuan' =>$value->tujuan,
					'produk' =>$value->produk,
					'nomor_lo' =>$value->nomor_lo,
					'volume_lo' =>$value->volume_lo,
					'pengukuran_spbu_sebelum' => $value->pengukuran_spbu_sebelum
				];
			}
		}

		// echo json_encode($this->data);exit;
		$this->data['content'] = 'detail_berita_acara';
		$this->data['title'] = 'Detail Berita Acara | ' . $this->title;
		$this->template($this->data);
	}
	public function change_password()
	{
		if ( $this->POST('simpan') )
		{
			if ( $this->POST('password') == "" )
			{
				$this->flashmsg('password tidak boleh kosong', 'danger');
				redirect('gatekeeper');
				exit;
			}
			if ( $this->POST('confirm_password') == "" )
			{
				$this->flashmsg('confirm password tidak boleh kosong', 'danger');
				redirect('gatekeeper');
				exit;
			}
			if ( $this->POST('password') != $this->POST('confirm_password') )
			{
				$this->flashmsg(' password tidak sama ', 'danger');
				redirect('gatekeeper');
				exit;
			}
			$this->User_m->update_where(['email' => $this->data['profile']->email], ['password' => password_hash($this->POST('password'), PASSWORD_BCRYPT)]);
			$this->flashmsg('Success update password ', 'success');
			redirect('gatekeeper');
			exit;
		}
		exit;
	}
}