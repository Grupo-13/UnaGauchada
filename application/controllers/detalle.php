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

        if($ciudad != false){
			$data = array('titulo' => $fila->titulo, 'descripcion' => $fila->descripcion, 
			'fecha_maxima' =>$fila->fecha_maxima, 'foto' => $fila->foto, 
			'id_gauchada' =>$fila->id_gauchada, 'consulta' => $result->result_array(),
			'ciudad' => $ciudad->nombre_localidad);
		}
		else{
			$data = array();
		}
		$this->load->view("/guest/post", $data);

		$this->load->view("/guest/footer");

	}
}