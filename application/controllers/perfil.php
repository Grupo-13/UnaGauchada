<?php

/**
* 
*/
class Perfil extends CI_Controller
{
	public function usuario($id = '')
	{
		$fila = $this->usuario->getUsuarioById($id);
		$this->load->view("/guest/head");
		$this->load->view("/guest/nav");

		$data = array('email' => $fila->email, 'nombre' => $fila->nombre, 
		'apellido' =>$fila->apellido, 'foto' => $fila->foto, 'id_usuario' => $fila->id_usuario);

		$this->load->view("/guest/perfil", $data);

		$this->load->view("/guest/footer");

	}
}