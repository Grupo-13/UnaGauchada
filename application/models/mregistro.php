<?php

/**
* 
*/
class MRegistro extends CI_Model
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
			'fecNac' => $datos['fecNac'],
			'tel' => $datos['tel']
		);

		$this->db->insert('usuario', $campos);
	}
}