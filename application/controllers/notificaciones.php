<?php

/**
* 
*/
class Notificaciones extends CI_Controller
{
	
	public function index ()
	{
		//$this->load->view('guest/head');
		//$this->load->view('guest/nav');

		$notis = $this->usuario->getNotis($this->session->userdata('id'));
		$data = array(
					'notis' => $notis->result_array(),
				);
		$this->load->view("notificaciones", $data);
    	//$this->load->view('guest/footer');
	}

	public function notiLeida($id, $id_gauchada)
	{

		$this->usuario->notiLeida($id);
		header("Location: " . base_url() . 'detalle/post/' . $id_gauchada);
	}
}