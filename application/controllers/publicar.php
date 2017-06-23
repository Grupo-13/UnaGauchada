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

	// public function index()
	// {

 
	// 	$this->load->view('guest/head');
 //        $this->load->view('guest/nav');

 //        // $this->load->model('mcategorias');

 //        // $result = $this->mcategorias->getCategorias();

 //        // $data = array(
 //        //     'consulta' => $result->result_array(),
 //        // );
 //        $this->load->view("vgauchada");
 //        $this->load->view('guest/footer');


	// }

	
	public function nueva_gauchada()
	{

    	$this->form_validation->set_rules('titulo', 'Título', 'required|max_length[50]');
    	$this->form_validation->set_rules('descripcion', 'Descripción', 'required|max_length[500]');
    	$this->form_validation->set_rules('datefechamax', 'Fecha máxima', 'required|callback_fecha');
        $this->form_validation->set_rules('creditos', 'Creditos insuficientes.', 'callback_creditos');
        
    	if($this->form_validation->run() === true)
    	{
        	//Si la validación es correcta, cogemos los datos de la variable POST
        	//y los enviamos al modelo



        	$datos['titulo'] = $this->input->post('titulo');
        	$datos['descripcion'] = $this->input->post('descripcion');
        	$datos['datefechamax'] = $this->input->post('datefechamax');
            $datos['categoria'] = $this->input->post('categoria');
            $datos['id_localidad'] = $this->input->post('locali');


            if ('file_name' != null) {
        	   $this->load->model('file');
        	   $file_name = $this->file->UploadImage('./public/img/', 'No es posible cargar la imagen.');
        	   $datos['file_name'] = $file_name; }
            
        	$this->mpublicar->publicar($datos);
            

    	}else{
            $this->load->view('guest/head');
            $this->load->view('guest/nav');

            $this->load->model('mcategorias');

            $result = $this->mcategorias->getCategorias();
            $this->load->model('localidad');
            $result2 = $this->localidad->getLocalidades();

            $data = array(
                'consulta' => $result->result_array(),
                'consulta2' => $result2->result_array(),
            );

            $this->load->view("vgauchada", $data);
            $this->load->view('guest/footer');
        }
	}

    function creditos($creditos)
    {
        $this->load->model('usuario');
        $fila = $this->usuario->getUsuario($this->session->userdata('email'));
        if ($fila) {
            if($fila->creditos == 0){
                $this->form_validation->set_message("creditos","No posee créditos suficientes para publicar una gauchada.");
                    return false;
            }
            else{
                return true;
            }
        }
        
    }
    function fecha($datefechamax)
    {
        $nuevafecha = new DateTime($datefechamax);
        
        $hoy = new DateTime(date('Y-m-d'));
        if ($nuevafecha < $hoy ) {
            
            $this->form_validation->set_message("fecha", "La fecha límite no puede ser anterior al día de hoy.");
            return false;

        }else{
                return true;
        }
        
    }

    public function modificarGauchada($id = '')
    {

        $this->load->view('guest/head');
        $this->load->view('guest/nav');

        $this->load->model('mcategorias');

        $categorias = $this->mcategorias->getCategorias();
        
        $categ = $this->mcategorias->getCategoriasGauchadas($id);

        $this->load->model('localidad');
        
        $localidades = $this->localidad->getLocalidades();
        
        $this->load->model('usuario'); 
        $fila = $this->gauchada->getPostById($id);      
        $ciudad =  $this->gauchada->getCiudadGauchada($id);
        $result2 = $this->gauchada->getPostulados($id);


        $data = array(
            'cant_postulados' => $result2->num_rows(),
            'id_gauchada' => $id,
            'titulo' => $fila->titulo,
            'categorias' => $categorias->result_array(),
            'localidades' => $localidades->result_array(),
            'descripcion' => $fila->descripcion,
            'fecha_maxima' =>$fila->fecha_maxima,
            'foto' => $fila->foto,
            'categ' => $categ->result_array(),
            'ciudad' => $ciudad->nombre_localidad,
            'id_localidad' => $ciudad->id_localidad,
            'id_usuario' => $fila->id_usuario,


        );

        $this->load->view("vmodificarGauchada", $data);
        $this->load->view('guest/footer');
       
    }

    public function modificar($id = '')
    {

        $this->form_validation->set_rules('titulo', 'Título', 'required|max_length[50]');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required|max_length[500]');
        $this->form_validation->set_rules('datefechamax', 'Fecha máxima', 'required|callback_fecha');
 
        
        if($this->form_validation->run() === true)
        {
            //Si la validación es correcta, cogemos los datos de la variable POST
            //y los enviamos al modelo



            $datos['titulo'] = $this->input->post('titulo');
            $datos['descripcion'] = $this->input->post('descripcion');
            $datos['datefechamax'] = $this->input->post('datefechamax');
            $datos['categoria'] = $this->input->post('categoria');
            $datos['id_localidad'] = 30;
            $datos['id_gauchada'] = $this->input->post('id_gau');

            if ('file_name' != null) {
               $this->load->model('file');
               $file_name = $this->file->UploadImage('./public/img/', 'No es posible cargar la imagen.');
               $datos['file_name'] = $file_name; }
            

            $this->mpublicar->modificar($datos);
            

        }else{
            $this->load->view('guest/head');
            $this->load->view('guest/nav');

            $this->load->model('mcategorias');

            $categorias = $this->mcategorias->getCategorias();
            
            $categ = $this->mcategorias->getCategoriasGauchadas($id);

            $this->load->model('localidad');
            
            $localidades = $this->localidad->getLocalidades();
            
            $this->load->model('usuario'); 
            $fila = $this->gauchada->getPostById($id);      
            $ciudad =  $this->gauchada->getCiudadGauchada($id);
            $result2 = $this->gauchada->getPostulados($id);



            $data = array(
                'cant_postulados' => $result2->num_rows(),
                'id_gauchada' => $id,
                'titulo' => $fila->titulo,
                'categorias' => $categorias->result_array(),
                'localidades' => $localidades->result_array(),
                'descripcion' => $fila->descripcion,
                'fecha_maxima' =>$fila->fecha_maxima,
                'foto' => $fila->foto,
                'categ' => $categ->result_array(),
                'ciudad' => $ciudad,
                'id_usuario' => $fila->id_usuario,


            );

            $this->load->view("vmodificarGauchada", $data);
            $this->load->view('guest/footer');

            }
    }


    public function despublicar($id = '')
    {   

        $this->load->view("/guest/head");
        $this->load->view("/guest/nav");     

        $data = array('id_gauchada' => $id );
 
        $this->load->view("vconfirmacionDespublicar", $data);
        $this->load->view("/guest/footer");

    }

    public function aceptarEliminacion($id = '')
    {
        $this->load->model('usuario'); 
        $fila = $this->gauchada->getPostById($id);      


        $id_usuario = $fila->id_usuario;
    
        $result = $this->gauchada->getPostulados($id);

        if($result->num_rows() == 0)
        {
            $this->db->query("UPDATE Usuario
                              SET creditos = creditos + 1
                              WHERE $id_usuario = id_usuario");

            $this->mpublicar->eliminarGauchadaSinPostulados($id);
        }

        else{
            $this->mpublicar->eliminarGauchadaConPostulados($id);
        }

    }

}

?>
