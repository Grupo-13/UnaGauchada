<?php
/**
* 
*/

//error_reporting(0);
class Mlogin extends CI_Model
{
	
	public function ingresar($mail, $pass)
	{
		$sel = "`usuario.idUsuario`,`usuario.nombre`, `usuario.apellido`";
		$this->db->select($sel);
		$this->db->from('usuario');
		
		$this->db->where('email', $mail);
		$this->db->where('clave', $pass);

		$res = $this->db->get();

		if ($res->num_rows() == 1) {
			$r = $res->row();

			$s_usuario = array(
				's_idUsuario' => $r->idUsuario,
				's_nombre' => $r->nombre." ".$r->apellido
			);
			$this->session->set_userdata($s_usuario);
			// 2 formas de hacer lo mismo
			// $this->session->set_userdata('s_idUsuario', $r->idUsuario);
			// $this->session->set_userdata('s_nombre',  $r->nombre." ".$r->apellido);


			return 1;
		}else{
			return 0;
		}
		
	}
}