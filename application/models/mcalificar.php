<?php

class Mcalificar extends CI_Model
{

	public function calificarUsuario($datos = '')
	{ 	
		$campos = array(
			'calificacion' =>$datos['calificacion'],
			'id_gauchada' => $datos['id_gauchada'],
			'descripcion' =>$datos['descripcion']
		);
	


        $result = $this->mcalificar->getPostulacion($campos['id_gauchada']);
        $r = $result->row();

		$this->db->insert('calificacion', $campos);

		$this->load->view('guest/head');
		$this->load->view('guest/nav');
		$this->load->view('calificacion_exitosa');
		$this->load->view('guest/footer');
	}
          
	public function getPostulacion($id ='')
	{
		return $this->db->query("SELECT id_postulacion, id_usuario
								FROM postulados
								WHERE id_gauchada = $id
								AND elegido = '1' ");
	}


}