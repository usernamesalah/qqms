<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['content'] 	= 'home';
		$this->data['title'] = 'Home | '.$this->title;
        $this->template($this->data);
	}

	public function ba_pertashop()
	{
		$this->data['ba'] = $this->Berita_acara_m->get();
		$this->data['content'] 	= 'pertashop';
		$this->data['title'] = 'BA Pertashop | '.$this->title;
        $this->template($this->data);
	}

	public function tambah_berita_acara()
	{
		$this->data['ba'] = $this->Berita_acara_m->get();
		$this->data['content'] 	= 'tambah-ba';
		$this->data['title'] = 'BA Pertashop | '.$this->title;
        $this->template($this->data);
	}
}