<?php
/**
* 
*/
class Detalle extends CI_Controller
{
	
	public function post ($id = '')
	{
		$this->load->model('usuario'); 
		$fila = $this->gauchada->getPostById($id);		
	
		$ciudad =  $this->usuario->getCiudad($fila->id_usuario);


		$this->load->view("/guest/head");
		$this->load->view("/guest/nav");
	

 		$this->load->model('mcategorias');

        $result = $this->mcategorias->getCategoriasGauchadas($id);
        $result2 = $this->gauchada->getPostulados($id);



        if($ciudad != false){
			$data = array('titulo' => $fila->titulo, 'descripcion' => $fila->descripcion, 
			'fecha_maxima' =>$fila->fecha_maxima, 'foto' => $fila->foto, 
			'id_gauchada' =>$fila->id_gauchada, 'consulta' => $result->result_array(),
			'ciudad' => $ciudad->nombre_localidad, 'cant_postulados' => $result2->num_rows());
		}
		else{
			$data = array();
		}
		$this->load->view("/guest/post", $data);

		$this->load->view("/guest/footer");

	}

	public function postularse($id = '')
	{ 		
		$this->load->view("/guest/head");
		$this->load->view("/guest/nav");

		$data = array('id_gauchada' => $id);

		$this->load->view("/vpostularse" , $data);

		$this->load->view("/guest/footer");

	}

	public function enviarPostulacion($id = '')
	{

		$this->form_validation->set_rules('descripcion', 'Descripción', 'required|max_length[500]');

		if($this->form_validation->run() === true)
		{
			$datos['descripcion'] = $this->input->post('descripcion');	
			$datos['id_gauchada'] = $id;

			$this->gauchada->enviarPostulacion($datos);
			
		}


	}

}