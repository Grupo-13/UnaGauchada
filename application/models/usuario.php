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

}