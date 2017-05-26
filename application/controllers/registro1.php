<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
**Falta: 
**Fecha de nacimiento y su error
**
**
**
**
*/


class Registro1 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('mregistro1');
	}
	


	function nuevo_usuario()
	{
    	
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuario.email]');
    	$this->form_validation->set_rules('clave', 'Clave', 'required|min_length[6]|matches[clave2]');
    	$this->form_validation->set_rules('clave2', 'Clave2', 'required|min_length[6]');
    	$this->form_validation->set_rules('nombre', 'Nombre', 'required');
    	$this->form_validation->set_rules('apellido', 'Apellido', 'required');
    	$this->form_validation->set_rules('dni', 'DNI', 'required|integer|max_length[8]');
    	$this->form_validation->set_rules('tel', 'Telefono', 'required|integer');

    	if($this->form_validation->run() === true){
	        $datos['email'] = $this->input->post('email');
			$datos['clave'] = $this->input->post('clave');
			$datos['nombre'] = $this->input->post('nombre');
			$datos['apellido'] = $this->input->post('apellido');
			$datos['dni'] = $this->input->post('dni');
			$datos['tel'] = $this->input->post('tel');

			$this->mregistro1->registrar($datos);
    	}

    	$this->load->view('guest/head');
		$this->load->view('guest/nav');
    	$this->load->view("registro1");
    	$this->load->view('guest/footer');
	}
}
