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
								INNER JOIN localidad as l on g.id_localidad = l.id_localidad
								ORDER BY g.fecha_publicacion DESC ");
	}

	public function getPostById($id = '')
	{
		$result = $this->db->query("SELECT * FROM gauchada WHERE id_gauchada = '" . $id . "' LIMIT 1");
		return $result->row();
	}

	public function getPostulados($id = '')
	{
		$result = $this->db->query("SELECT DISTINCT p.id_postulacion, p.elegido, p.descripcion, p.fecha_postulacion
		 							FROM gauchada AS g
									INNER JOIN postulados AS p
									WHERE p.id_gauchada = '" . $id . "'");
		return $result;
	}


	public function enviarPostulacion($datos)
	{

		$campos = array(
				'id_gauchada' => $datos['id_gauchada'],
 		  		'id_usuario' => $this->session->userdata('id'), //Id del usuario que esta logueado.
				'descripcion' => $datos['descripcion']
				
			);

		 	 if ($campos['id_usuario'] > 0)
		 	 {
		 	 
		  		$insert = $this->db->insert('postulados', $campos);
		  		$insert_id = $this->db->insert_id();
		  		if ($insert)
		  		{
		  			
		  			$this->load->view("/guest/head");
					$this->load->view("/guest/nav");

					$this->load->view("postulacionAceptada");

					$this->load->view("/guest/footer");

		  		}

			}
	}

	public function getCiudadGauchada($id)
	{
		if($id > 0 ){
		$result = $this->db->query("SELECT l.nombre_localidad, l.id_localidad
									FROM gauchada as g
									inner join localidad as l on l.id_localidad = g.id_localidad
		 							WHERE g.id_gauchada = $id");

			if ($result->num_rows() > 0) {
				return $result->row();
			}
		}
		return false;

	}
	public function estoyPostulado($id = '')
	{
		$result = $this->db->query("SELECT g.id_usuario
		 							FROM gauchada AS g
									INNER JOIN postulados AS p
									WHERE p.id_usuario = '" . $this->session->userdata('id') . "' " .
									"AND  p.id_gauchada = '". $id . "'");
		return $result->row();
	}
<<<<<<< HEAD

=======
>>>>>>> origin/master
}