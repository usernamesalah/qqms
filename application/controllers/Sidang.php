<?php 
defined('BASEPATH') OR die('No direct access script allowed.');

class Sidang extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function pendaftaran()
	{
		$this->load->model('pendaftaran_sidang_m');
		if ($this->POST('daftar'))
		{
			$this->data['entry'] = [
				'nim'				=> $this->POST('nim'),
				'angkatan'			=> $this->POST('angkatan'),
				'judul_makalah'		=> $this->POST('judul_makalah'),
				'pembimbing_1'		=> $this->POST('pembimbing_1'),
				'pembimbing_2'		=> $this->POST('pembimbing_2'),
				'penguji_1'			=> $this->POST('penguji_1'),
				'penguji_2'			=> $this->POST('penguji_2'),
				'penguji_3'			=> $this->POST('penguji_3'),
				'waktu'				=> $this->POST('waktu'),
				'tempat'			=> $this->POST('tempat'),
				'nama'				=> $this->POST('nama'),
				'jenis_kelamin'		=> $this->POST('jenis_kelamin'),
				'jenis_sidang'		=> $this->POST('jenis_sidang')
			];

			$this->pendaftaran_sidang_m->insert($this->data['entry']);
			redirect('sidang/pendaftaran');
			exit;
		}

		$this->data['title']	= 'Pendaftaran Sidang' . $this->title;
		$this->data['content']	= 'pendaftaran_sidang';
		$this->template($this->data, '/');
	}

	public function pendaftaran_sidang(){
		$this->load->model('pendaftaran_sidang_m');
		$this->load->model('dosen_m');
		$this->load->model('jenis_kelamin_m');
		$this->load->model('jenis_seminar_m');

		if ($this->POST('tambah')) {
			$this->data['pendaftaran_sidang']	= [
				'nama'				=>	$this->POST('nama'),
				'nim'				=>	$this->POST('nim'),
				'jenis_kelamin'		=>	$this->POST('jenis_kelamin'),
				'angkatan'			=>	$this->POST('angkatan'),
				'judul_makalah'		=>	$this->POST('judul_makalah'),
				'pembimbing_1'		=>	$this->POST('pembimbing1'),
				'pembimbing_2'		=>	$this->POST('pembimbing2'),
				'penguji_1'			=>	$this->POST('penguji1'),
				'penguji_2'			=>	$this->POST('penguji2'),
				'penguji_3'			=>	$this->POST('penguji3'),
				'hari'				=>	$this->POST('hari'),
				'tanggal'			=>	$this->POST('tanggal'),
				'waktu'				=>	$this->POST('waktu'),
				'tempat'			=>	$this->POST('tempat'),
				'jenis_sidang' 		=>  $this->POST('jenis_sidang')
			];

			$this->pendaftaran_sidang_m->insert($this->data['pendaftaran_sidang']);

			if (!empty($_FILES['file']['name'])){
				$this->uploadPDF($this->POST('judul_makalah'),'pendaftaran_sidang', 'file');
				$this->data['berkas_sidang'] = [
					'judul'			=>	$this->POST('judul_makalah'),
					'id_jenis'		=>	3
				];
				$this->berkas_m->insert($this->data['berkas_sidang']);
			}

			$this->flashmsg('<i class="fa fa-check"></i> Data Pendaftaran Ujian Skripsi Berhasil di Tambahkan', 'success');
			redirect('sidang/pendaftaran_sidang');
			exit;
		}

		$this->data['sidang']			= $this->pendaftaran_sidang_m->get();
		$this->data['dosen']			= $this->dosen_m->get();
		$this->data['jenis_kelamin']	= $this->jenis_kelamin_m->get();
		$this->data['jenis_seminar']	= $this->jenis_seminar_m->get();
		$this->data['content'] 			= 'pendaftaran_sidang';
		$this->data['title'] 			= 'Pendaftaran Sidang'.$this->title;
        $this->template($this->data, 'depan');
	}
}
