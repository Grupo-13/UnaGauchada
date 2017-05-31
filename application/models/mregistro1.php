<?php

/**
* 
*/
class MRegistro1 extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function registrar($datos)
	{
		$campos = array(
			'email' => $datos['email'],
			'clave' => $datos['clave'],
			'nombre' => $datos['nombre'],
			'apellido' => $datos['apellido'],
			'dni' => $datos['dni'],
			'fecha_nacimiento' => $datos['fecNac'],
			'id_localidad' => $datos['id_localidad'],
			'telefono' => $datos['tel']
		);

		$this->db->insert('usuario', $campos);

		$this->load->view('guest/head');
		$this->load->view('guest/nav');
		$this->load->view('registroexitoso', $campos);
		$this->load->view('guest/footer');

	}
}