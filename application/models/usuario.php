<?php

/**
* 
*/
class Usuario extends CI_Model
{
	
	public function getUsuario($email)
	{
		$result = $this->db->query("SELECT * FROM usuario WHERE email = '" . $email . "' LIMIT 1");

		if ($result->num_rows() > 0) {
			return $result->row();
		}else{
			return false;
		}
	}

	public function validarClave($clave)
	{
		$result = $this->db->query("SELECT * FROM usuario WHERE email = '" . $email . "' LIMIT 1");

		if ($result->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function getCiudad($id)
	{
		$result = $this->db->query("SELECT l.nombre_localidad 
									FROM usuario as u
									inner join localidad as l on l.id_localidad = u.id_localidad
		 							WHERE $id = u.id_usuario");

		if ($result->num_rows() > 0) {
			return $result->row();
		}else{
			return false;
		}
	}

	public function getCreditos($id)
	{
		$result = $this->db->query("SELECT creditos
									FROM usuario
		 							WHERE $id = id_usuario");

		if ($result->num_rows() > 0) {
			return $result->row();
		}else{
			return false;
		}
	}


}