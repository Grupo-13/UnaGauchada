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

		$this->load->model('gauchada');

		$result = $this->gauchada->getGauchadas();


		$data = array(
			'consulta' => $result->result_array(),
		);



		$this->load->view('guest/content', $data);

		$this->load->view('guest/footer');


	}
}