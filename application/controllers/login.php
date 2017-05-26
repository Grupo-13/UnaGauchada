<?php

/**
**Falta: 
**Error clave
**
**
**
**
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('iniciarsesion');
	}

	// public function index()
	// {
	// 	$email 		= $this->input->post('email');
	// 	$password 	= $this->input->post('clave');

	// 	$this->load->model('usuario');
	// 	$fila = $this->usuario->getUsuario($email);

	// 	if ($fila != null) {
	// 		if ($fila->clave == $password) {
	// 			$data = array(
	// 				'email' => $email,
	// 				'id' => $fila->id_usuario,
	// 				'login' => true
	// 			);

	// 			$this->session->set_userdata($data);
	// 			header("Location: " . base_url());
	// 		}else{
	// 			//clave incorrecta
	// 			header("Location: " . base_url());
	// 		}
	// 	}else{
	// 		//email incorrecto
	// 		header("Location: " . base_url());
	// 	}
	// }

	public function ingresar()
	{
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_existe');
		$this->form_validation->set_rules('clave', 'Clave', 'required|callback_claveerronea');


		if($this->form_validation->run() === true){
			$datos['email'] = $this->input->post('email');
			$datos['clave'] = $this->input->post('clave');

			$this->iniciarsesion->iniciar($datos);
		}

		$this->load->view('guest/head');
		$this->load->view('guest/nav');
		$this->load->view("login");
		$this->load->view('guest/footer');
	}

	function existe($email)
	{
		$this->load->model('usuario');

		if(!$this->usuario->getUsuario($email) ){
			$this->form_validation->set_message("existe", "El %s no se encuentra registrado");
			return false;
		}
		else{
			return true;
		}
	}	


	function claveerronea($clave)
	{
		$this->load->model('usuario');
		$fila = $this->usuario->getUsuario($_POST['email']);
		if ($fila) {
			if($fila->clave != $clave){
				$this->form_validation->set_message("claveerronea", "%s incorrecta");
				return false;
			}
			else{
				return true;
			}
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header("Location: " . base_url());
	}


}