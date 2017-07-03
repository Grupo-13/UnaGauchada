<?php

/**
* 
*/
class Mnotificacion extends CI_Model
{
	
	public function nuevaNoti($datos)
	{
		$campos = array(
			'id_autor' => $datos['autor'],
			'id_objetivo' => $datos['id_gauchada'],
			'id_destino' => $datos['destino'],
			'tipo' => $datos['tipo'],
			'titulo' => $datos['titulo']
		
		);

		$this->db->insert('notificaciones', $campos);
	}
}