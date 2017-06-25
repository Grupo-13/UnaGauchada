<?php

/**
* 
*/
class Home extends CI_Controller
{
	
	public function index()
	{
		
		$this->load->model('usuario'); 
		$this->load->model('mcategorias');
		$this->load->model('localidad');
		$this->load->model('mbuscar');

		$categorias = $this->mcategorias->getCategorias();
		$localidades = $this->localidad->getLocalidades();

		
		$this->load->view('guest/head');
		$this->load->view('guest/nav');
		$this->load->view('guest/header');

		$this->load->model('gauchada');

		$result = $this->gauchada->getGauchadas();


		$data = array(
			'consulta' => $result->result_array(),
			'categorias' => $categorias->result_array(),
			'localidades' => $localidades->result_array(),
		);



		$this->load->view('guest/content', $data);

		$this->load->view('guest/footer');


	}

	public function buscar()
	{
			$this->load->model('mbuscar');

        	$datos['titulo'] = $this->input->post('titulo');
            $datos['categoria'] = $this->input->post('categoria');
            $datos['id_localidad'] = $this->input->post('locali');
          
        	$this->mbuscar->buscar($datos);       

    }


}