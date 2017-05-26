<?php

/**
* 
*/
class Publicar extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('mpublicar');
	}

	public function index()
	{
		$this->load->view('guest/head');
        $this->load->view('guest/nav');
        $this->load->view("vgauchada");
        $this->load->view('guest/footer');
	}

	
	function nueva_gauchada()
	{

    	$this->form_validation->set_rules('titulo', 'Título', 'required|max_length[50]');
    	$this->form_validation->set_rules('descripcion', 'Descripción', 'required|max_length[500]');
    	$this->form_validation->set_rules('datefechamax', 'Fecha máxima', 'required|date()');
    	//$this->form_validation->set_rules('file_name', 'Foto', 'required');
        
    	if($this->form_validation->run() === true)
    	{
        	//Si la validación es correcta, cogemos los datos de la variable POST
        	//y los enviamos al modelo
        	$datos['titulo'] = $this->input->post('titulo');
        	$datos['descripcion'] = $this->input->post('descripcion');
        	$datos['datefechamax'] = $this->input->post('datefechamax');
        	$this->load->model('file');
        	$file_name = $this->file->UploadImage('./public/img/', 'No es posible cargar la imagen.');
        	$datos['file_name'] = $file_name;
            
        	$this->mpublicar->publicar($datos);
            

    	}
        $this->load->view('guest/head');
        $this->load->view('guest/nav');
        $this->load->view("vgauchada");
        $this->load->view('guest/footer');

	}
}




// <?php
// /**
// * 
// */
// class Publicar extends CI_controller
// {
// 	function __construct()
// 	{
// 		parent::__construct();
// 		$this->load->model('mpublicar');
// 	}

// 	public function index()
// 	{
// 		$this->load->view('vgauchada');
// 	}


// 	public function subirImagen()
// 	{
// 		$config['upload_path'] = './imagenes/';
// 		$config['allowed_types'] = 'gif|jpg|png';
// 		$config['max_size'] = '2048';
// 		$config['max_width'] = '.2024';
// 		$config['max_height'] = '2008';

// 		$this->load->library('upload', $config);

// 		if(!$this->upload->do_upload("filefoto"))
// 		{
// 			$data['error'] = $this->upload->display_errors();
// 			$this->upload->view('layout/header');
// 			$this->upload->view('layout/menu');
// 			$this->upload->view('vimagen', $data);
// 			$this->upload->view('layout/footer');
// 		}
// 		else
// 		{
// 			$file_info = $this->upload->data();

// 			//$this->crearMiniatura($file_info['file_name]');
// 			$imagen = $file_info['file_name'];

// 			$this->upload->view('layout/header');
// 			$this->upload->view('layout/menu');
// 			$this->upload->view('vimagen', $data);
// 			$this->upload->view('layout/footer');
// 		}

// 	}

// 	public function botonpublicar()
// 	{
// 		$datos['titulo'] = $this->input->post('txttitulo');
// 		$datos['descripcion'] = $this->input->post('txtdescripcion');
// 		$datos['fechamax'] = $this->input->post('datefechamax');
// 		$datos['foto'] = $this->input->post('filefoto');

// 		$this->mpublicar->publicar($datos);
// 	}

	
// }