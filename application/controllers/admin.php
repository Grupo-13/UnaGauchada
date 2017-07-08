<?php

/**
* 
*/
class Admin extends CI_Controller
{
	
	public function index()
	{
		$this->load->view("/guest/head");
		$this->load->view("/guest/nav");
		$this->load->view("/guest/menuAdmin");
		$this->load->view("/guest/vAdmin");
		$this->load->view("/guest/footer");
	}
}