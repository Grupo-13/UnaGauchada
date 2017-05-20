<?php

/**
* 
*/
class Home extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('guest/head');
		$this->load->view('guest/nav');
		$this->load->view('guest/header');
		$this->load->view('guest/content');
		$this->load->view('guest/footer');
	}
}