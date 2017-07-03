<?php

/**
* 
*/
class Perfil extends CI_Controller
{
	public function usuario($id = '')
    {
        $fila = $this->usuario->getUsuarioById($id);

        $ciudad = $this->usuario->getCiudadUsuario($id);
        $postulaciones = $this->usuario->getGauchadasPostulado($id);
        $gauchadas = $this->gauchada->getMisGauchadas($id);


        $data = array('email' => $fila->email, 'nombre' => $fila->nombre, 
            'ciudad' => $ciudad->nombre_localidad, 'creditos' => $fila->creditos,
            'reputacion' => $fila->reputacion, 'fecha_nacimiento' => $fila->fecha_nacimiento,
            'apellido' =>$fila->apellido, 'foto' => $fila->foto, 'id_usuario' => $fila->id_usuario,
            'consulta' => $postulaciones->result_array(), 'gauchadas' =>$gauchadas->result_array());

        $this->load->view("/guest/head");
        $this->load->view("/guest/nav");
        $this->load->view("/guest/perfil", $data);

        $this->load->view("/guest/footer");

    }

	public function editarPerfil($id = '')
	{

		$this->load->view('guest/head');
		$this->load->view('guest/nav');

		$this->load->model('localidad');
		$localidades = $this->localidad->getLocalidades();
		 
		$fila = $this->usuario->getUsuarioById($id);


		$data = array(
			'dni' => $fila->dni,
			'nombre' => $fila->nombre,
			'apellido' => $fila->apellido,
			'fecnac' => $fila->fecha_nacimiento,
			'foto' => $fila->foto,
			'id_localidad' => $fila->id_localidad,
			'telefono' =>$fila->telefono,
			'id_usuario' =>$id,
			'localidades' =>$localidades->result_array(),


		);

		$this->load->view("vEditarPerfil", $data);
		$this->load->view('guest/footer');
	   
	}

	public function editar($id = '')
	{

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|alpha|max_length[50]');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required|alpha|max_length[50]');
		$this->form_validation->set_rules('dni', 'DNI', 'required|integer|max_length[8]');
		$this->form_validation->set_rules('fecnac', 'fecha de nacimiento', 'required|callback_edad');
		$this->form_validation->set_rules('telefono', 'telefono', 'required|integer');
 
		
		if($this->form_validation->run() === true)
		{
			//Si la validación es correcta, cogemos los datos de la variable POST
			//y los enviamos al modelo



			$datos['nombre'] = $this->input->post('nombre');
			$datos['apellido'] = $this->input->post('apellido');
			$datos['dni'] = $this->input->post('dni');
			$datos['fecnac'] = $this->input->post('fecnac');
			$datos['telefono'] = $this->input->post('telefono');
			$datos['id_usuario'] = $id;
			
			$datos['id_localidad'] = $this->input->post('localidades');
			

			if ('file_name' != null) {
				$this->load->model('file');
				$file_name = $this->file->UploadImage('./public/img/', 'No es posible cargar la imagen.');
				$datos['file_name'] = $file_name; }
			

			$this->usuario->editar($datos);
			

		}else{
			$this->load->view('guest/head');
			$this->load->view('guest/nav');

			$this->load->model('localidad');
			$localidades = $this->localidad->getLocalidades();
			 
			$fila = $this->usuario->getUsuarioById($id);


			$data = array(
				'dni' => $fila->dni,
				'nombre' => $fila->nombre,
				'apellido' => $fila->apellido,
				'fecnac' => $fila->fecha_nacimiento,
				'foto' => $fila->foto,
				'id_localidad' => $fila->id_localidad,
				'telefono' =>$fila->telefono,
				'id_usuario' =>$id,
				'localidades' =>$localidades->result_array(),


			);

			$this->load->view("vEditarPerfil", $data);
			$this->load->view('guest/footer');

		}
	}

	function edad($fecNac)
	{
		$nuevafecha = new DateTime($fecNac);
		$nuevafecha->add(new DateInterval('P18Y'));
		$hoy = new DateTime(date('Y-m-d'));
		if ($nuevafecha > $hoy ) {
			
			$this->form_validation->set_message("edad", "Debe ser mayor de 18 años.");
			return false;

		}else{
				return true;
		}
		
	}

	public function despostularse($id_gauchada = '')
	{

		$fila = $this->gauchada->getPostById($id_gauchada);

		$datos['autor'] = $this->session->userdata('id');
    	$datos['id_gauchada'] = $id_gauchada;
    	$datos['destino'] = $fila->id_usuario;
    	$datos['tipo'] = 6;
    	$datos['titulo'] = $fila->titulo;

    	$this->load->model('mnotificacion');
        $this->mnotificacion->nuevaNoti($datos); 

		$this->gauchada->despostularse($id_gauchada, $datos['autor']);

		$this->load->view('guest/head');
		$this->load->view('guest/nav');

		$this->load->view('vDespostulado');

		$this->load->view('guest/footer');
	}
}