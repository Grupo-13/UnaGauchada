<?php
/**
* 
*/
class Comprarcredito extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mcompra');
	}
	public function index (){
		$this->load->view('comprarcredito');
	}
	public function comprar(){
		$parametro['nroTarjeta'] = $this->input->post('txtNroTarjeta');
		$parametro['codigo'] = $this->input->post('txtCodigo');
		$parametro['fecVencimiento'] = $this->input->post('txtFecVencimiento');
		$parametro['cantidad'] = $this->input->post('txtCantidad');

		$this->mcompra->comprar($parametro);
	}
}