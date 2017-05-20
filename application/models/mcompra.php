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
		'nroTarjeta'=>$parametro['nroTarjeta'],
		'codigo'=>$parametro['codigo'],
		'fecVencimiento'=>$parametro['fecVencimiento'],
		'cantidad'=>$parametro['cantidad']
		);
		$this->db->insert($campos);
	}

}