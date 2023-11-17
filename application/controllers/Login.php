<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Login extends MY_Controller
{

	private $data = [];

	public function __construct()
	{
		parent::__construct();
		$username = $this->session->userdata('username');
		if (isset($username))
		{
			$this->data['id_role'] = $this->session->userdata('id_role');
			switch ($this->data['id_role'])
			{
				case 1:
					redirect('admin');
					break;
			}

			exit;
		}
		$this->load->model('User_m');
	}

	public function index()
	{
		if ($this->POST('login-submit'))
		{
			if (!$this->User_m->required_input(['username','password'])) 
			{
				$this->flashmsg('Data harus lengkap','warning');
				redirect('login');
				exit;
			}
			
			$this->data = [
			'username'	=> $this->POST('username'),
			'password'	=> md5($this->POST('password'))
			];

			$result = $this->User_m->login($this->data);
			if (!isset($result)) 
			{
				$this->flashmsg('Username atau password salah','danger');
			}
			redirect('login');
			exit;
		}
		$this->load->view('login');
	}
}
