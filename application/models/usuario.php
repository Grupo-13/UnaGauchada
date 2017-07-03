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

	public function getUsuarioById($id)
	{
		$result = $this->db->query("SELECT * FROM usuario WHERE id_usuario = '" . $id . "' LIMIT 1");

		if ($result->num_rows() > 0) {
			return $result->row();
		}else{
			return false;
		}
	}

	public function getNombreUsuario($id)
	{
		$result = $this->db->query("SELECT nombre, apellido, foto
									FROM usuario WHERE id_usuario = '" . $id . "'");

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

	public function getCiudadUsuario($id)
	{
		if($id > 0 ){
		$result = $this->db->query("SELECT l.nombre_localidad, l.id_localidad
									FROM usuario as u
									inner join localidad as l on l.id_localidad = u.id_localidad
									WHERE u.id_usuario = $id");

			if ($result->num_rows() > 0) {
				return $result->row();
			}
		}
		return false;
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

	public function editar($datos)
	{
		$campos = array(

			'nombre' => $datos['nombre'],
			'apellido' => $datos['apellido'],
			'dni' => $datos['dni'],
			'id_localidad' => $datos['id_localidad'],
			'fecha_nacimiento' => $datos['fecnac'],
			'telefono' => $datos['telefono'],
		);
		if($datos['file_name'] != NULL)
		{
			$campos['foto'] = $datos['file_name'];
		}


		$id_usuario = $datos['id_usuario'];

		$this->db->where('id_usuario', $id_usuario);
		$this->db->update('usuario', $campos);    
			
							  

		 header("Location: " . base_url() . 'perfil/usuario/'. $id_usuario);

	 }

	 public function getGauchadasPostulado($id = '')
	{
		//Devuelve las gauchadas en las que un usuario está postulado, mediante el id del usuario
		return $this->db->query("SELECT id_gauchada, id_postulacion, descripcion, fecha_postulacion, elegido
								FROM postulados     
								WHERE id_usuario = $id
								ORDER BY fecha_postulacion");

	}

	public function getLogro ($repu ='')
    {
        return $this->db->query("SELECT nombre_logro, inicio_rango, fin_rango
                                  FROM logro
                                  WHERE inicio_rango <= $repu
                                  AND fin_rango >= $repu ");
    }

    public function getCalificacion ($id = '')
    {
     
		/*$gauchada = $this->mcalificar->getPostulacion($id);
		$g = $gauchada->result_row();*/

		return $this->db->query ("SELECT * FROM calificacion
		                         WHERE id_gauchada = $id");
    }

	public function getNotisNoVistas($id = '')
	{
		return $this->db->query("SELECT * 
								FROM notificaciones
								WHERE id_destino = $id AND vista = '0'
								ORDER BY fecha DESC" );
	}

	public function getNotis($id = '')
	{
		return $this->db->query("SELECT * 
								FROM notificaciones
								WHERE id_destino = $id
								ORDER BY fecha DESC" );
	}

	public function notiVista($id = '')
	{
		$campos = array(
			'vista' => 1,
		);

		$this->db->where('id_notificacion', $id);
		$this->db->update('notificaciones', $campos);
	}

	public function notiLeida($id)
	{
		$campos = array(
			'leida' => 1,
		);


		$this->db->where('id_notificacion', $id);
		$this->db->update('notificaciones', $campos);



		
	}



}