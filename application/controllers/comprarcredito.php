<?php 


class Comprarcredito extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mcompra');
	}

	public function index ()
	{
		$this->load->view('guest/head');
		$this->load->view('guest/nav');
		$this->load->view("comprarcredito");
    	$this->load->view('guest/footer');
	}
	
	function comprar()
	{	
		$this->form_validation->set_rules('nrotarjeta', 'Número de tarjeta', 'required|integer|exact_length[16]');
    	$this->form_validation->set_rules('codigo', 'Código', 'required|integer|exact_length[4]');
    	$this->form_validation->set_rules('fecVencimiento', 'Fecha de vencimiento', 'required|date_format()|callback_fechaVto');
    	$this->form_validation->set_rules('creditos', 'Créditos', 'required|integer|less_than[1000]');


    	if($this->form_validation->run() === true)
    	{
	       	$parametro['nroTarjeta'] = $this->input->post('txtNroTarjeta');
			$parametro['codigo'] = $this->input->post('txtCodigo');
			$parametro['fecVencimiento'] = $this->input->post('txtFecVencimiento');
			$parametro['cantidad'] = $this->input->post('creditos');

			$this->mcompra->comprar($parametro);
    	} else {

 		 $this->load->view('guest/head');
		 $this->load->view('guest/nav');
		 //$data= $this->input->post('creditos');
		 //$this->load->view('compra_realizada');
		 $this->load->view("comprarcredito");
  		 $this->load->view('guest/footer');
  		}
	} 

	function fechaVto($fecVencimiento)
    {
        $nuevafecha = new DateTime($fecVencimiento);
        
        $hoy = new DateTime(date('Y-m-d'));
        if ($nuevafecha <= $hoy ) {
            
            $this->form_validation->set_message("fechaVto", "No se pudo efectuar la compra, su tarjeta está vencida.");
            return false;

        }else{
                return true;
        }
        
    }
}