<?php

/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('mlogin');
	}

	public function index()
	{
		$data['msj']='';
		$this->load->view('login', $data);
	}

	public function ingresar()
	{
		$mail = $this->input->post('email');
		$pass = $this->input->post('clave');

		$res = $this->mlogin->ingresar($mail, $pass);

		if ($res == 1) {
			$this->load->view('updpersona');
		}else{
			$data['msj']="Usuario o clave erronea";
			$this->load->view('login', $data);
		}
	}
}