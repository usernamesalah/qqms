<?php if ( !defined('BASEPATH') )
	exit('No direct script access allowed');

class Admin extends MY_Controller
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

		if ( $token->role != 0 )
		{
			redirect('login');
			exit;
		}

		$this->data['profile'] = $token;
		$this->admin = $token;

	}

	public function index()
	{
		$this->data['ba_acc'] = $this->Berita_acara_m->get(['status' => 0]);
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

	public function detail_berita_acara($id)
	{
		if ( !isset($id) )
		{
			$this->flashmsg('ID tidak ditemukan', 'danger');
			redirect('admin/berita-acara');
			exit;
		}
		$this->data['ba'] = $this->Berita_acara_m->get_row(['id' => $id]);
		$this->data['ba']->created_at = $this->tanggal->convert_date($this->data['ba']->created_at);
		$this->data['content'] = 'detail_berita_acara';
		$this->data['title'] = 'Detail Berita Acara | ' . $this->title;
		$this->template($this->data);
	}

	public function approve_berita_acara($id)
	{
		if ( !isset($id) )
		{
			$this->flashmsg('ID tidak ditemukan', 'danger');
			redirect('admin/berita-acara');
			exit;
		}
		$this->Berita_acara_m->update($id, ['status' => 1]);
		$this->flashmsg('Berhasil approve berita acara', 'success');

		redirect('admin/berita-acara');
		exit;
	}
	public function user()
	{
		if ( $this->POST('create') )
		{
			if ( $this->POST('email') == "" )
			{
				$this->flashmsg('Email tidak boleh kosong', 'danger');
				redirect('admin/user');
				exit;
			}

			$data = [
			 'name' => $this->POST('name'),
			 'email' => $this->POST('email'),
			 'role' => $this->POST('role'),
			 'password' => password_hash('123456', PASSWORD_BCRYPT)
			];

			$this->User_m->insert($data);
			$this->flashmsg('User ' . $this->POST('email') . ' telah dibuat dengan password <b> 123456 </b>', 'success');
			redirect('admin/user');
			exit;
		}
		$this->data['users'] = $this->User_m->get();
		$this->data['content'] = 'user';
		$this->data['title'] = 'Data User | ' . $this->title;
		$this->template($this->data);
	}

	public function delete_user($id)
	{
		if ( !isset($id) )
		{
			$this->flashmsg('User tidak ditemukan', 'danger');
			redirect('admin/user');
			exit;
		}

		$this->User_m->delete($id);
		$this->flashmsg('User berhasil dihapus', 'success');
		redirect('admin/user');
		exit;
	}

	public function reset_password_user($id)
	{
		if ( !isset($id) )
		{
			$this->flashmsg('User tidak ditemukan', 'danger');
			redirect('admin/user');
			exit;
		}

		$this->User_m->update($id, [
		 'password' => password_hash('123456', PASSWORD_BCRYPT)
		]);
		$this->flashmsg('User telah direset dengan password <b> 123456 </b>', 'success');
		redirect('admin/user');
		exit;
	}


	public function sample_bbm()
	{
		$this->data['sample'] = $this->Sample_bbm_m->getOrderedAndClosest();
		$this->data['content'] = 'sample_bbm';
		$this->data['title'] = 'Data stock sample bbm | ' . $this->title;

		$this->template($this->data);
	}

	public function tambah_sample_bbm()
	{
		if ( $this->POST('tambah') )
		{
			$this->form_validation->set_rules('tanggal_masuk', 'tanggal', 'required');
			$this->form_validation->set_rules('asal', 'asal', 'required');
			$this->form_validation->set_rules('jenis', 'jenis', 'required');
			if ( $this->form_validation->run() == FALSE )
			{
				$this->flashmsg($this->form_validation->error_string(), 'danger');
				redirect('admin/sample-bbm/tambah');
				exit;
			}
			
			$lama = $this->Sample_bbm_m->masa[$this->POST("asal")] . " days";
			$dt = date_create($this->POST('tanggal_masuk'));
			date_add($dt, date_interval_create_from_date_string($lama));
			$tgl_release = date_format($dt, "Y-m-d");

			$data = [
			 'asal' => $this->POST('asal'),
			 'jenis' => $this->POST('jenis'),
			 'quantity' => $this->POST('quantity'),
			 'tanggal_masuk' => $this->POST('tanggal_masuk'),
			 'tanggal_release' => $tgl_release,
			 'status' => 'waiting'
			];
			
			$this->Sample_bbm_m->insert($data);
			$this->flashmsg('Berhasil menambah sample bbm', 'success');
			redirect('admin/sample-bbm');
			exit;
		}
		$this->data['asal'] = $this->Sample_bbm_m->asal;
		$this->data['content'] = 'tambah_sample_bbm';
		$this->data['title'] = 'Data stock sample bbm | ' . $this->title;

		$this->template($this->data);
	}

	public function release_sample_bbm($id)
	{
		if ( !isset($id) )
		{
			$this->flashmsg('Sample tidak ditemukan', 'danger');
			redirect('admin/sample-bbm');
			exit;
		}

		$this->Sample_bbm_m->update($id, [
		 'status' => 'release'
		]);
		$this->flashmsg('Berhasil update status menjadi release', 'success');
		redirect('admin/sample-bbm');
		exit;
	}

	public function delete_sample_bbm($id)
	{
		if ( !isset($id) )
		{
			$this->flashmsg('Sample tidak ditemukan', 'danger');
			redirect('admin/sample-bbm');
			exit;
		}

		$this->Sample_bbm_m->delete($id);
		$this->flashmsg('Berhasil delete sample bbm', 'success');
		redirect('admin/sample-bbm');
		exit;
	}
}