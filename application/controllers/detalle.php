<?php
/**
* 
*/
class Detalle extends CI_Controller
{
	
	public function post ($id = '')
	{
		$fila = $this->gauchada->getPostById($id);


		$this->load->view("/guest/head");
		$this->load->view("/guest/nav");
	

		$data = array('titulo' => $fila->titulo, 'descripcion' => $fila->descripcion, 'foto' => $fila->foto);
		
		$this->load->view("/guest/post", $data);

		$this->load->view("/guest/footer");

	}
}