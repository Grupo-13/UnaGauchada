<?php

/**
* 
*/
class Iniciarsesion extends CI_Model
{
	public function iniciar()
	{
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('clave');

		$this->load->model('usuario');
		$fila = $this->usuario->getUsuario($email);

		if ($fila != null) {
			if ($fila->clave == $password) {
				$data = array(
					'email' => $email,
					'id' => $fila->id_usuario,
					'login' => true
				);

				$this->session->set_userdata($data);
				header("Location: " . base_url());
			}else{
				//clave incorrecta
				header("Location: " . base_url());
			}
		}else{
			//email incorrecto
			header("Location: " . base_url());
		}
	}

	
}