<?php

/**
* 
*/
class Mcomentario extends CI_Model
{
	
	public function getComentarios($id = ''){
		
		return $this->db->query("SELECT c.id_comentario, c.pregunta, c.id_usuario, c.respuesta, c.id_gauchada, c.fecha_comentario
								FROM comentario as c
								INNER JOIN gauchada as g on g.id_gauchada = c.id_gauchada
								WHERE g.id_gauchada = '" . $id . "'");		 
	}

	public function comentar($datos)
	{
		$campos = array(
			'pregunta' => $datos['pregunta'],
			'id_gauchada' => $datos['id_gauchada'],
			'id_usuario' => $this->session->userdata('id')
		
		);

		$this->db->insert('comentario', $campos);
	}

	public function responder($datos)
	{
		$campos = array(
			'respuesta' => $datos['respuesta'],
			'id_comentario' => $datos['id_comentario']
			);

	/*	$sql = "UPDATE Comentario SET respuesta = ? WHERE id_comentario = '". $campos['id_comentario'] ."'";
		$this->db->query($sql, $campos['respuesta']);

		$this->db->query ("UPDATE Comentario 
						   SET respuesta = '". $campos['respuesta'] ."' 
						   WHERE id_comentario = '". $campos['id_comentario'] ."'");*/


		$data = array('respuesta' => $datos['respuesta']);
		$this->db->where('id_comentario', $datos['id_comentario']);
		$this->db->update('comentario', $data);
	}
}
?>