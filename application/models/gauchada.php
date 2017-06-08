<?php

/**
* 
*/
class Gauchada extends CI_Model
{
	
	public function getGauchadas()
	{
		
		return $this->db->query("SELECT u.id_usuario, u.nombre, u.apellido, g.id_gauchada, g.titulo, 
										g.id_gauchada, g.fecha_publicacion, g.descripcion, g.foto, g.fecha_maxima, 
										l.nombre_localidad, l.id_localidad
								FROM usuario as u
								INNER JOIN gauchada as g on g.id_usuario = u.id_usuario
								INNER JOIN localidad as l on u.id_localidad = l.id_localidad
								ORDER BY g.fecha_publicacion DESC ");
	}

	public function getPostById($id = '')
	{
		$result = $this->db->query("SELECT * FROM gauchada WHERE id_gauchada = '" . $id . "' LIMIT 1");
		return $result->row();
	}

}