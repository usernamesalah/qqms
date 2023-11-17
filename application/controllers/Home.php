<?php

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_m');
		$this->load->model('user_m');
		$this->load->model('berkas_m');
		$this->load->model('menu_m');
		$this->load->model('dosen_m');
		$this->load->model('jabatan_fungsional_m');
		$this->load->model('jenis_berkas_m');
		$this->load->model('jenis_kelamin_m');
		$this->load->model('jenis_seminar_m');
		$this->load->model('kategori_m');
		$this->load->model('komentar_m');
		$this->load->model('makul_ajar_m');
		$this->load->model('mata_kuliah_m');
		$this->load->model('menu_m');
		$this->load->model('pendaftaran_sidang_m');
		$this->load->model('role_m');
		$this->load->model('slider_m');
		$this->load->model('sub_menu_m');
		$this->load->model('borang_m');
		$this->load->model('jenis_borang_m');
		$this->load->library('tanggal'); 
	}

	// public function test()
	// {
		
	// 	echo $this->tanggal->now() . '<br>';
	// 	echo $this->tanggal->now(true) . '<br>';
	// 	echo $this->tanggal->now(true, true) . '<br>';

	// 	echo '<br>';

	// 	echo $this->tanggal->convert_date('2016-08-08') . '<br>';
	// 	echo $this->tanggal->convert_date('2016-08-08 12:12:12', true) . '<br>';
	// }

	public function index()
	{
		$this->data['blog']			= $this->blog_m->get_by_order_any_limit('id_blog','DESC', 5);
		$this->data['data_slider']	= $this->slider_m->get();
		$this->data['content'] 		= 'carousel_slider';
		$this->data['title'] 		= 'Agribisnis Unsri';
        $this->template($this->data,'depan');
	}

	public function menu($id)
	{
		if (!isset($id)) {
			redirect('home');
			exit;
		}
		$this->data['menu'] = $this->menu_m->get_row(['id_menu' => $id]);
		$this->data['content'] 	= 'menu';
		$this->data['cumb'] 	= $this->data['menu']->nama;
		$this->data['title'] = $this->data['menu']->nama . $this->title;
        $this->template($this->data,'menu');
	}

	public function sub_menu($id)
	{
		if (!isset($id)) {
			redirect('home');
			exit;
		}
		if ($id == 9 || $id == 10) {
			$this->data['makul'] = $this->mata_kuliah_m->get();
		}
		elseif ($id == 11) {
			$this->data['dosen'] = $this->dosen_m->get();
		}
		$this->data['menu'] = $this->sub_menu_m->get_row(['id_sub_menu' => $id]);
		$this->data['content'] 	= 'menu';
		$this->data['cumb'] 	= $this->data['menu']->judul;
		$this->data['title'] = $this->data['menu']->judul . $this->title;
        $this->template($this->data,'menu');
	}

	public function berkas($id)
	{
		if (!isset($id)) {
			redirect('home');
			exit;
		}
		$this->data['berkas'] = $this->berkas_m->get(['id_berkas' => $id]);
		$this->data['content'] 	= 'Berkas';
		$this->data['cumb'] 	= 'Berkas ' . $this->jenis_berkas_m->get_row(['id_jenis' => $id])->nama;
		$this->data['title'] = 'Berkas ' . $this->jenis_berkas_m->get_row(['id_jenis' => $id])->nama . $this->title;
        $this->template($this->data,'menu');
	}

	public function borang($id)
	{
		if (!isset($id)) {
			redirect('home');
			exit;
		}
		$this->data['borang'] = $this->borang_m->get(['id_jenis' => $id]);
		$this->data['content'] 	= 'borang';
		$this->data['cumb'] 	= 'Borang ' . $this->jenis_borang_m->get_row(['id_jenis' => $id])->nama;
		$this->data['title'] = 'Borang ' . $this->jenis_borang_m->get_row(['id_jenis' => $id])->nama . $this->title;
        $this->template($this->data,'menu');
	}

	public function artikel()
	{
		$id = $this->uri->segment(3);
		if (isset($id)) {
			$this->data['blog'] = $this->blog_m->get_row(['id_blog' => $id]);
			$this->data['content'] 	= 'artikel';
		}
		else{
			$this->data['blog'] = $this->blog_m->get();
			$this->data['content'] 	= 'blog';
		}
		if ($this->POST('kirim')) {
			$this->data['entry'] = [
				'email' => $this->POST('email'),
				'nama' => $this->POST('nama'),
				'isi' => $this->POST('komentar'),
				'id_blog' => $this->POST('id'),
				'date' => date("Y-m-d"),
			];
			$this->komentar_m->insert($this->data['entry']);
			$this->flashmsg('<i class="fa fa-check"></i> Komentar Berhasil Dikirim', 'success');
			redirect('home/artikel/' . $this->POST('id'));
			exit;
		}
		$this->data['cumb'] 	= 'Artikel ';
		$this->data['title'] = 'Artikel ' . $this->title;
        $this->template($this->data,'menu');
	}

	public function pendaftaran_sidang()
	{
		if ($this->POST('tambah')) 
		{
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
			
			// $id_pendaftaran = $this->pendaftaran_sidang_m->get_row(['judul_makalah' => $this->POST('judul_makalah')])->id_pendaftaran;

			if (!empty($_FILES['file']['name']))
			{
				$this->uploadPDF($this->POST('judul_makalah'),'pendaftaran_sidang', 'file');
				$this->data['berkas_sidang'] = [
					'judul'			=>	$this->POST('judul_makalah'),
					'id_jenis'		=>	3
				];
				$this->berkas_m->insert($this->data['berkas_sidang']);
			}

			$this->flashmsg('<i class="fa fa-check"></i> Data Pendaftaran Ujian Skripsi Berhasil di Tambahkan', 'success');
			redirect('admin/pendaftaran-sidang');
			exit;
		}
		$this->data['cumb'] 	= 'Pendaftaran Sidang ';
		$this->data['sidang']			= $this->pendaftaran_sidang_m->get();
		$this->data['dosen']			= $this->dosen_m->get();
		$this->data['jenis_kelamin']	= $this->jenis_kelamin_m->get();
		$this->data['jenis_seminar']	= $this->jenis_seminar_m->get();
		$this->data['content'] 			= 'pendaftaran_sidang';
		$this->data['title'] 			= 'Pendaftaran Sidang'.$this->title;
        $this->template($this->data,'menu');
	}
}
