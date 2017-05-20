<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('mregistro');
	}
	

	public function index()
	{
		$this->load->view('registro');
	}

	public function registrar()
	{
		

		$datos['email'] = $this->input->post('email');
		$datos['clave'] = $this->input->post('clave');
		$datos['nombre'] = $this->input->post('nombre');
		$datos['apellido'] = $this->input->post('apellido');
		$datos['dni'] = $this->input->post('dni');
		$datos['fecNac'] = $this->input->post('fecNac');
		$datos['tel'] = $this->input->post('tel');

		$this->mregistro->registrar($datos);
	}
}
