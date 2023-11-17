<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->data['id_role'] = $this->session->userdata('id_role');
		if (!isset($this->data['id_role']) or $this->data['id_role'] != 1)
		{
			redirect('logout');
			exit;
		}
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
	}

	public function index()
	{
		$this->data['content'] 	= 'admin/test';
		$this->data['title'] = 'Home'.$this->title;
        $this->template($this->data,'admin');
	}

	public function dosen()
	{
		if ($this->POST('tambah')) {
			$this->data['dosen']	= [
				'NIP'				=>	$this->POST('nip'),
				'nama'=>	$this->POST('nama'),
				'jenis_kelamin'=>	$this->POST('jenis_kelamin'),
				'jabatan_fungsional'=>	$this->POST('jabatan_fungsional'),
				'nidn'=>	$this->POST('nidn'),
				'tempat_lahir'=>	$this->POST('tempat_lahir'),
				'tanggal_lahir'=>	$this->POST('tanggal_lahir'),
				'email'=>	$this->POST('email'),
				'telepon'=>	$this->POST('telepon'),
				'alamat'=>	$this->POST('alamat'),
			];
			if (!empty($_FILES['foto']['name'])){
				$this->upload($this->POST('nip'),'dosen', 'foto');
			}
			$this->dosen_m->insert($this->data['dosen']);
			$this->flashmsg('<i class="fa fa-check"></i> Data Dosen Berhasil di Tambahkan', 'success');
			redirect('admin/dosen');
			exit;
		}

		if ($this->POST('add_makul')) {
			$this->data['makul']=[
				'id_dosen'	=> $this->POST('nip'),
				'id_makul'	=> $this->POST('makul')
			];
			if ($this->makul_ajar_m->get_row($this->data['makul'])) {
				$this->flashmsg('<i class="fa fa-close"></i> Data Keahlian sudah ada', 'danger');
				redirect('admin/dosen');
				exit;
			}
			$this->makul_ajar_m->insert($this->data['makul']);
			$this->flashmsg('<i class="fa fa-check"></i> Data Keahlian Berhasil di Tambahkan', 'success');
			redirect('admin/dosen');
			exit;
		}

		if ($this->POST('delete') && $this->POST('NIP')) {
			$this->dosen_m->delete($this->POST('NIP'));
			$this->flashmsg('<i class="fa fa-check"></i> Data Dosen Berhasil di Hapus', 'success');
			redirect('admin/dosen');
			exit;
		}

		if ($this->POST('edit')) {
			$this->data['dosen']	= [
				'NIP'				=>	$this->POST('nip'),
				'nama'=>	$this->POST('nama'),
				'jenis_kelamin'=>	$this->POST('jenis_kelamin'),
				'jabatan_fungsional'=>	$this->POST('jabatan_fungsional'),
				'nidn'=>	$this->POST('nidn'),
				'tempat_lahir'=>	$this->POST('tempat_lahir'),
				'tanggal_lahir'=>	$this->POST('tanggal_lahir'),
				'email'=>	$this->POST('email'),
				'telepon'=>	$this->POST('telepon'),
				'alamat'=>	$this->POST('alamat'),
			];
			if (!empty($_FILES['foto']['name'])){
				$this->upload($this->POST('nip'),'dosen', 'foto');
			}
			$this->dosen_m->update($this->POST('nip'),$this->data['dosen']);
			$this->flashmsg('<i class="fa fa-check"></i> Data Dosen Berhasil di perbaharui', 'success');
			redirect('admin/dosen');
			exit;
		}

		if ($this->POST('NIP') && $this->POST('get')) {
			$this->data['dosen'] = $this->dosen_m->get_row(['NIP' => $this->POST('NIP')]);
            $jenis_kelamin = [];
            $this->data['jenis_kelamin']    = $this->jenis_kelamin_m->get();
            foreach ($this->data['jenis_kelamin'] as $jenis)
                $jenis_kelamin[$jenis->id_jenis_kelamin] = $jenis->nama;
            $this->data['dosen']->dropdown = form_dropdown('jenis_kelamin', $jenis_kelamin, $this->data['dosen']->jenis_kelamin, ['class' => 'form-control']);
            $jabatan = [];
            $this->data['jabatan']    = $this->jabatan_fungsional_m->get();
            foreach ($this->data['jabatan'] as $jenis)
                $jabatan[$jenis->id_jabatan] = $jenis->nama;
            $this->data['dosen']->dropdown_jab = form_dropdown('jabatan_fungsional', $jabatan, $this->data['dosen']->jabatan_fungsional, ['class' => 'form-control']);
            echo json_encode($this->data['dosen']);
            exit;
		}
		$this->data['dosen']	= $this->dosen_m->get();
		$this->data['content'] 	= 'admin/dosen';
		$this->data['title'] = 'Dosen'.$this->title;
        $this->template($this->data,'admin');
	}

	public function profil_jurusan($id_sub)
	{

		if (!isset($id_sub)) {
			redirect('admin');
			exit;
		}
		if ($this->POST('simpan')) {
			$this->sub_menu_m->update($this->POST('id_sub'),['isi' => $this->POST('isi')]);
			$this->flashmsg('<i class="fa fa-check"></i> Data Berhasil di Update', 'success');
			redirect('admin/profil_jurusan/'.$this->POST('id_sub'));
			exit;
		}
		$this->data['profil'] 	= $this->sub_menu_m->get_row(['id_sub_menu' => $id_sub]);
		$this->data['content'] 	= 'admin/sub';
		$this->data['title'] = $this->sub_menu_m->get_row(['id_sub_menu' => $id_sub])->judul.$this->title;
        $this->template($this->data,'admin');
	}

	public function menu($id_menu)
	{
		if ($this->POST('simpan')) {
			$this->menu_m->update($this->POST('id_menu'),['detail_menu' => $this->POST('detail')]);
			$this->flashmsg('<i class="fa fa-check"></i> Data Berhasil di Update', 'success');
			redirect('admin/menu/'.$this->POST('id_menu'));
			exit;
		}
		$this->data['menu'] 	= $this->menu_m->get_row(['id_menu' => $id_menu]);
		$this->data['content'] 	= 'admin/menu';
		$this->data['title'] = ''.$this->title;
        $this->template($this->data,'admin');
	}

	public function mata_kuliah()
	{
		if ($this->POST('tambah')) {
			$this->data['makul'] = [
				'kode_makul'	=> $this->POST('kode'),
				'nama_makul'	=> $this->POST('nama'),
				'semester'	=> $this->POST('semester'),
				'sks'	=> $this->POST('sks'),
				'prasyarat'	=> $this->POST('prasyarat'),
				'deskripsi'	=> $this->POST('deskripsi')
			];
			$this->mata_kuliah_m->insert($this->data['makul']);
			$this->flashmsg('<i class="fa fa-check"></i> Data Berhasil di Tambah', 'success');
			redirect('admin/mata_kuliah');
		}

		if ($this->POST('edit')) {
			$this->data['makul'] = [
				'kode_makul'	=> $this->POST('kode'),
				'nama_makul'	=> $this->POST('nama'),
				'semester'	=> $this->POST('semester'),
				'sks'	=> $this->POST('sks'),
				'prasyarat'	=> $this->POST('prasyarat'),
				'deskripsi'	=> $this->POST('deskripsi')
			];
			$this->mata_kuliah_m->update($this->POST('kode'),$this->data['makul']);
			$this->flashmsg('<i class="fa fa-check"></i> Data Berhasil di Update', 'success');
			redirect('admin/mata_kuliah');
		}
		if ($this->POST('delete') && $this->POST('kode_makul')) {
			$this->mata_kuliah_m->delete($this->POST('kode_makul'));
			$this->flashmsg('<i class="fa fa-check"></i> Data Berhasil di Hapus', 'success');
			redirect('admin/mata_kuliah');
			exit;
		}

		if ($this->POST('get') && $this->POST('kode_makul')) {
			$this->data['makul'] = $this->mata_kuliah_m->get_row(['kode_makul' => $this->POST('kode_makul')]);
			$prasyarat = [];
			$this->data['makuli'] = $this->mata_kuliah_m->get();
			// if (isset($this->data['makul']->prasyarat)) {
				foreach ($this->data['makuli'] as $jenis)
            	    $prasyarat[$jenis->kode_makul] = $jenis->nama_makul;
            	$this->data['makul']->dropdown = form_dropdown('prasyarat', $prasyarat, $this->data['makul']->prasyarat, ['class' => 'form-control']);
			// }
            
            echo json_encode($this->data['makul']);
			exit;
		}

		$this->data['makul'] 	= $this->mata_kuliah_m->get();
		$this->data['content'] 	= 'admin/makul';
		$this->data['title'] = ''.$this->title;
        $this->template($this->data,'admin');
	}

	public function berkas()
	{
		if ($this->POST('upload')) {
			$this->data['berkas']=[
				'judul'	=> $this->POST('judul'),
				'id_jenis'	=> $this->POST('jenis')
			];
			if (empty($_FILES['foto']['name'])){
				$this->flashmsg('<i class="fa fa-close"></i> Berkas Tidak Boleh Kosong', 'danger');
				redirect('admin/berkas');
				exit;
			}
			$this->berkas_m->insert($this->data['berkas']);
			$id = $this->berkas_m->get_row(['judul' => $this->data['berkas']['judul']])->id_berkas;
			// print_r($_FILES['foto']);exit;
			$this->upload_any_type($id,'berkas' ,'foto');
			$this->flashmsg('<i class="fa fa-check"></i> Berkas berhasil di upload', 'success');
			redirect('admin/berkas');
			exit;
		}

		if ($this->POST('delete') && $this->POST('id')) {
			$this->berkas_m->delete($this->POST('id'));
			$this->flashmsg('<i class="fa fa-check"></i> Data Berhasil di Hapus', 'success');
			redirect('admin/berkas');
			exit;
		}
		$this->data['berkas']	= $this->berkas_m->get();
		$this->data['content'] 	= 'admin/berkas';
		$this->data['title'] = 'Berkas Download'.$this->title;
        $this->template($this->data,'admin');
	}

	public function artikel()
	{
		$menu = $this->uri->segment(3);
		$this->data['blog'] = $this->blog_m->get();
		if ($menu == 'tambah')
			$this->data['content'] 	= 'admin/tambah_artikel';
		elseif ($menu == 'detail') {
			$id = $this->input->get('id');
			$this->data['blog'] = $this->blog_m->get_row(['id_blog' => $id]);
			$this->data['content'] 	= 'admin/detail';
		}
		else
			$this->data['content'] 	= 'admin/artikel';

		if ($this->POST('simpan')) {
			$id = $this->blog_m->get_last_row()->id_blog + 1;
			$this->data['artikel'] = [
				'header'	=> $id,
				'judul_blog'	=> $this->POST('judul'),
				'isi'	=> $this->POST('isi'),
				'penerbit'	=> $this->session->userdata('username'),
				'id_kategori'	=> $this->POST('kategori')
			];
			$this->blog_m->insert($this->data['artikel']);
			if (!empty($_FILES['header']['name'])){
				$this->upload($id,'blog', 'header');
			}
			$this->flashmsg('<i class="fa fa-check"></i> Artikel berhasil di Posting', 'success');
			redirect('admin/artikel');
			exit;
		}
		
		$this->data['title'] = 'Artikel'.$this->title;
        $this->template($this->data,'admin');
	}

	public function borang()
	{
		$menu = $this->uri->segment(3);
		$this->data['borang'] = $this->borang_m->get();
		if ($menu == 'tambah')
			$this->data['content'] 	= 'admin/tambah_borang';
		else
			$this->data['content'] 	= 'admin/borang';

		if ($this->POST('simpan')) {
			// print_r($_FILES);exit;
			$this->data['borang']=[
				'judul'	=> $this->POST('judul'),
				'id_jenis'	=> $this->POST('jenis'),
				'detail'	=> $this->POST('detail'),
				'berkas'	=> $_FILES['borang']['name'],
			];
			if (empty($_FILES['borang']['name'])){
				$this->flashmsg('<i class="fa fa-close"></i> Berkas Tidak Boleh Kosong', 'danger');
				redirect('admin/borang/tambah');
				exit;
			}
			$this->borang_m->insert($this->data['borang']);
			// $id = $this->borang_m->get_row(['judul' => $this->data['borang']['judul']])->id_berkas;
			// print_r($_FILES['foto']);exit;
			$this->upload_any_type($this->data['borang']['judul'],'borang' ,'borang');
			$this->flashmsg('<i class="fa fa-check"></i> Berkas berhasil di upload', 'success');
			redirect('admin/borang');
			exit;
		}

		if ($this->POST('delete') && $this->POST('id')) {
			$this->borang_m->delete($this->POST('id'));
			$this->flashmsg('<i class="fa fa-check"></i> Data Berhasil di Hapus', 'success');
			redirect('admin/borang');
			exit;
		}

		if ($this->POST('get') && $this->POST('id')) {
			$this->data['borang'] = $this->borang_m->get_row(['id_borang' => $this->POST('id')]);
            $jenis_borang = [];
            $this->data['jenis_borang']    = $this->jenis_borang_m->get();
            foreach ($this->data['jenis_borang'] as $jenis)
                $jenis_borang[$jenis->id_jenis] = $jenis->nama;
            $this->data['borang']->dropdown = form_dropdown('jenis_borang', $jenis_borang, $this->data['borang']->id_jenis, ['class' => 'form-control']);
            echo json_encode($this->data['borang']);
			exit;
		}
		$this->data['title'] = 'Berkas Borang'.$this->title;
        $this->template($this->data,'admin');
	}

	public function jenis_borang()
	{
		if ($this->POST('simpan')) {
			$this->jenis_borang_m->insert(['nama' => $this->POST('nama')]);
			$this->flashmsg('<i class="fa fa-check"></i> data berhasil di tambah', 'success');
			redirect('admin/jenis-borang');
			exit;
		}

		if ($this->POST('delete') && $this->POST('id')) {
			$this->jenis_borang_m->delete($this->POST('id'));
			$this->flashmsg('<i class="fa fa-check"></i> Data Berhasil di Hapus', 'success');
			redirect('admin/jenis_borang');
			exit;
		}
		$this->data['jenis']	= $this->jenis_borang_m->get();
		$this->data['content'] 	= 'admin/tambah_jenis_br';
		$this->data['title'] = 'Berkas Borang'.$this->title;
        $this->template($this->data,'admin');
	}

	// Pendaftaran Sidang

	public function pendaftaran_sempro(){
		$this->data['content'] 	= 'admin/pendaftaran_sempro';
		$this->data['title'] = 'Pendaftaran Seminar Proposal'.$this->title;
        $this->template($this->data,'admin');
	}

	public function pendaftaran_sidang($id){
		
		if (!isset($id)) {
			redirect('admin');
			exit;
		}
		if ($this->POST('delete') && $this->POST('id')) {
			$this->pendaftaran_sidang_m->delete($this->POST('id'));

			$judul_makalah = $this->pendaftaran_sidang_m->get_row(['id_pendaftaran' => $this->POST('id')])->judul_makalah;
			unlink(realpath(APPPATH . '../assets/pendaftaran_sidang/'.$judul_makalah.'.pdf'));
			$this->berkas_m->delete(['judul' => $judul_makalah]);
			$this->flashmsg('<i class="fa fa-check"></i> Data Pendaftaran Ujian Skripsi Berhasil di Hapus', 'success');
			redirect('admin/pendaftaran_sidang/'. $id);
			exit;
		}

		if ($this->POST('edit')) {
			$this->data['edit_pendaftaran_sidang']	= [
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
			if (!empty($_FILES['file']['name'])){
				$judul_makalah = $this->pendaftaran_sidang_m->get_row(['id_pendaftaran' => $this->POST('id')])->judul_makalah;
				unlink(realpath(APPPATH . '../assets/pendaftaran_sidang/'.$judul_makalah.'.pdf'));

				$this->uploadPDF($this->POST('judul_makalah'),'pendaftaran_sidang', 'file');
				$this->data['berkas_sidang'] = [
					'judul'			=>	$this->POST('judul_makalah'),
					'id_jenis'		=>	3
				];
				$this->berkas_m->update($this->data['berkas_sidang']);
			}
			$this->pendaftaran_sidang_m->update($this->POST('id_pendaftaran'),$this->data['edit_pendaftaran_sidang']);
			$this->flashmsg('<i class="fa fa-check"></i> Data Pendaftaran Ujian Skripsi Berhasil di perbaharui', 'success');
			redirect('admin/pendaftaran_sidang/'. $id);
			exit;
		}

		if ($this->POST('get') && $this->POST('id_pendaftaran'))
		{
			$this->data['detail_sidang'] = $this->pendaftaran_sidang_m->get_row(['id_pendaftaran' => $this->POST('id_pendaftaran')]);
			echo json_encode($this->data['detail_sidang']);
			exit;
		}

		$this->data['sidang']			= $this->pendaftaran_sidang_m->get(['jenis_sidang' => $id]);
		$this->data['dosen']			= $this->dosen_m->get();
		$this->data['jenis_kelamin']	= $this->jenis_kelamin_m->get();
		$this->data['jenis_seminar']	= $this->jenis_seminar_m->get();
		$this->data['columns']			= ['id_pendaftaran', 'nim','nama','angkatan', 'judul_makalah', 'pembimbing_1', 'pembimbing_2', 'penguji_3', 'penguji_2', 'penguji_1', 'hari', 'tanggal', 'waktu', 'tempat', 'jenis_kelamin', 'jenis_sidang'];
		$this->data['content'] 			= 'admin/pendaftaran_sidang';
		$this->data['title'] 			= 'Pendaftaran Sidang'.$this->title;
        $this->template($this->data,'admin');
	}

	public function detail_pendaftaran_sidang(){
		$this->data['id_pendaftaran'] = $this->uri->segment(3);
		if (!isset($this->data['id_pendaftaran']))
		{
			redirect('admin/pendaftaran_sidang');
			exit;
		}

		$this->data['content'] 			= 'admin/detail_pendaftaran_sidang';
		$this->data['title'] 			= 'Detail Pendaftaran Sidang'.$this->title;
		$this->data['detail_sidang']	= $this->pendaftaran_sidang_m->get_row(['id_pendaftaran' => $this->data['id_pendaftaran']]);
        $this->template($this->data,'admin');
	}
}