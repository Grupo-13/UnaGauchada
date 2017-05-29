<?php
/**
* 
*/
class Mcompra extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function comprar($parametro){
		$campos = array(
			'id_usuario'=> $this->session->userdata('id'),
			'monto' =>$parametro['cantidad']*50,
			'cantidad'=>$parametro['cantidad']
		);
		$this->db->insert('compra', $campos);
	
		$this->db->query ("UPDATE Usuario SET creditos = creditos + $parametro[cantidad] WHERE id_usuario = '". $campos['id_usuario'] ."'");

		$data = $this->db->query ("SELECT creditos FROM usuario WHERE id_usuario = '". $campos['id_usuario'] ."'");
		$data2 = $data->row();
		$campos['creditos'] = $data2->creditos;
		//$data2['monto']=$parametro['cantidad']*50;
		// header("Location: " . base_url() . 'comprarcredito/compra_realizada'. $data2->creditos);
	
		$this->load->view('compra_realizada', $campos);
	}

}