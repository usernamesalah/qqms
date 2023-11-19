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

		$this->load->library("ci_jwt");
        $this->data['token'] = $this->session->userdata('token');

        if (isset($this->data['token'])) {
            $role = $this->ci_jwt->decode($this->data['token']);
			switch ($role)
			{
				case 1:
					redirect('gatekeeper');
					break;
					
				case 2:
					redirect('pertashop');
					break;
					
				default:
					redirect('admin');
					break;
			}

			exit;
		}
	}

	public function index()
	{
		if ($this->POST('login')) {
			$email = $this->POST('email');
			if (!isset($email)) {
				$this->flashmsg('email tidak boleh kosong', 'danger');
				redirect('login');
				exit;
			}

			$password = $this->POST('password');
			if (!isset($password)) {
				$this->flashmsg('password tidak boleh kosong', 'danger');
				redirect('login');
				exit;
			}

			$this->data['user'] = $this->User_m->get_row(['email' => $email]);
			if (!isset($this->data['user'])) {
				$this->flashmsg('email yang anda masukkan salah', 'danger');
				redirect('login');
				exit;
			}

			if (!password_verify($password , $this->data['user']->password)) {
				$this->flashmsg('password yang anda masukkan salah', 'danger');
				redirect('login');
				exit;
			}

			$token = $this->ci_jwt->encode([
				'email' => $this->data['user']->email,
				'role' =>$this->data['user']->role
			]);

			$this->session->set_userdata(['token' => $token]);

			switch ($this->data['user']->role)
			{
				case 1:
					redirect('gatekeeper');
					break;
					
				case 2:
					redirect('pertashop');
					break;
					
				default:
					redirect('admin');
					break;
			}
			exit;
		}

		$this->load->view('login');
	}
}
