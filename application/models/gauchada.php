<?php

/**
*
*/
class Gauchada extends CI_Model
{
	
	public function getGauchadas()
	{
		
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$today = new DateTime(); 

		$this->db->select('usuario.id_usuario, usuario.nombre, usuario.apellido, gauchada.titulo, 
						gauchada.id_gauchada, gauchada.fecha_publicacion, gauchada.descripcion, gauchada.foto_gauchada, 
						gauchada.fecha_maxima, localidad.nombre_localidad, localidad.id_localidad');
		$this->db->from('usuario');
		$this->db->join('gauchada', 'usuario.id_usuario = gauchada.id_usuario');
		$this->db->join('localidad', 'localidad.id_localidad = gauchada.id_localidad');
		$this->db->where('gauchada.fecha_maxima >=', $today->format('Y-m-d'));
		$this->db->group_by("gauchada.id_gauchada");
		$this->db->order_by('fecha_publicacion', 'DESC');

		return $this->db->get();

	}

	public function getTodasLasGauchadas()
	{
		return $this->db->query("SELECT u.id_usuario, u.nombre, u.apellido, g.titulo, 
										g.id_gauchada, g.fecha_publicacion, g.descripcion, g.foto_gauchada, g.fecha_maxima, 
										l.nombre_localidad, l.id_localidad
								FROM usuario as u
								INNER JOIN gauchada as g on g.id_usuario = u.id_usuario
								INNER JOIN localidad as l on g.id_localidad = l.id_localidad 
								ORDER BY g.fecha_publicacion DESC ");
	}

	public function getPostById($id = '')
	{
		$result = $this->db->query("SELECT * FROM gauchada WHERE id_gauchada = $id LIMIT 1");
		return $result->row();
	}

	public function getPostulados($id = '')
    {
    	$this->db->DISTINCT('postulados.id_postulacion, postulados.elegido, postulados.descripcion, postulados.fecha_postulacion, postulados.id_usuario, postulados.id_gauchada');
		$this->db->from('gauchada');
		$this->db->join('postulados', 'postulados.id_gauchada = gauchada.id_gauchada');
		$this->db->join('usuario', 'usuario.id_usuario = postulados.id_usuario');
		$this->db->where('gauchada.id_gauchada', $id);
		//$this->db->group_by("gauchada.id_gauchada");
		$this->db->order_by('usuario.reputacion', 'DESC');

		return $this->db->get();

        // $result = $this->db->query("SELECT DISTINCT p.id_postulacion, p.elegido, p.descripcion, p.fecha_postulacion, p.id_usuario, p.id_gauchada
        //                              FROM gauchada AS g
        //                             INNER JOIN postulados AS p
        //                             INNER JOIN usuario AS u on u.id_usuario = p.id_usuario
        //                             WHERE $id = p.id_gauchada
        //                             ORDER BY u.reputacion DESC ");
        // return $result;
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
		$user = $this->session->userdata('id');
		$result = $this->db->query("SELECT g.id_usuario
		 							FROM gauchada AS g
									INNER JOIN postulados AS p
									WHERE $user = p.id_usuario
									AND  $id = p.id_gauchada");
		return $result->row();
	}

	public function getMisGauchadas($id = '')
    {
        return $this->db->query("SELECT titulo, fecha_publicacion, id_gauchada, candidato, fecha_maxima
                                    FROM gauchada 
                                    WHERE id_usuario = $id
                                    ORDER BY fecha_publicacion");
    }

    public function despostularse($id_gauchada = '', $id_usuario = '')
    {
        return $this->db->query("DELETE
                                    FROM postulados 
                                    WHERE id_usuario = $id_usuario
                                    AND id_gauchada = $id_gauchada");
    }

	public function adeudoCalificaciones($id = '')
    {    
       date_default_timezone_set('America/Argentina/Buenos_Aires'); 
       $today = new DateTime();


       //$sql = "SELECT id_gauchada FROM calificacion";
       $sql2 = "gauchada.id_gauchada NOT IN (SELECT calificacion.id_gauchada FROM calificacion)";
     

       $this->db->select('gauchada.id_gauchada');
       $this->db->from('gauchada');
       $this->db->where('gauchada.id_usuario', $id);
       $this->db->where('gauchada.fecha_maxima <', $today->format('Y-m-d'));
       $this->db->where($sql2);
       //$this->db->where_not_in('gauchada.id_gauchada', $sql);

       $result = $this->db->get();

       return $result->result_array();
    }

	public function getCandidato($id = '')
   {
       return $this->db->query("SELECT id_gauchada, candidato, fecha_maxima
                                   FROM gauchada
                                   WHERE id_gauchada = $id");
   }

}