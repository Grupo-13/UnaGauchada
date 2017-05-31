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
    	
    	$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[usuario.email]');
    	$this->form_validation->set_rules('clave', 'clave', 'required|min_length[6]|matches[clave2]');
    	$this->form_validation->set_rules('clave2', 'clave2', 'required|min_length[6]');
    	$this->form_validation->set_rules('nombre', 'nombre', 'required');
    	$this->form_validation->set_rules('apellido', 'apellido', 'required');
    	$this->form_validation->set_rules('fecNac', 'fecha de nacimiento', 'required|callback_edad');
    	$this->form_validation->set_rules('dni', 'DNI', 'required|integer|max_length[8]');
    	$this->form_validation->set_rules('tel', 'telefono', 'required|integer');

    	if($this->form_validation->run() === true){
	        $datos['email'] = $this->input->post('email');
			$datos['clave'] = $this->input->post('clave');
			$datos['nombre'] = $this->input->post('nombre');
			$datos['apellido'] = $this->input->post('apellido');
			$datos['fecNac'] = $this->input->post('fecNac'); 
			$datos['id_localidad'] = $this->input->post('locali');
			$datos['dni'] = $this->input->post('dni');
			$datos['tel'] = $this->input->post('tel');

			$this->mregistro1->registrar($datos);
    	}else{
    		$this->load->view('guest/head');
			$this->load->view('guest/nav');

			$this->load->model('localidad');
			$result = $this->localidad->getLocalidades();
			$data = array(
				'consulta' => $result->result_array(),
			);

    		$this->load->view("registro1", $data);
    	 
    		$this->load->view('guest/footer');	
    	}

    	
	}

	function edad($fecNac)
	{
		$nuevafecha = new DateTime($fecNac);
		$nuevafecha->add(new DateInterval('P18Y'));
		$hoy = new DateTime(date('Y-m-d'));
		if ($nuevafecha > $hoy ) {
			
			$this->form_validation->set_message("edad", "Debe ser mayor de 18 años");
			return false;

		}else{
				return true;
		}
		
	}
}
