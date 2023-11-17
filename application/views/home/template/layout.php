<?php

	$this->load->view('home/template/header', array('title' => $title));
	$this->load->view('home/template/navbar');

	if($content == 'home/home')
		$this->load->view('home/template/slider');

	$this->load->view($content);
	$this->load->view('home/template/footer');
?>
