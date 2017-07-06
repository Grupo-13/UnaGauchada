<?php
/**
* 
*/
class Detalle extends CI_Controller
{
	
	public function post ($id = '')
	{
		$this->load->model('usuario'); 
		$fila = $this->gauchada->getPostById($id);		
		$ciudad =  $this->gauchada->getCiudadGauchada($id);


 		$this->load->model('mcategorias');
 		$this->load->model('mcomentario');

        $result = $this->mcategorias->getCategoriasGauchadas($id);

        $result2 = $this->gauchada->getPostulados($id);
       
		$result3= $this->mcomentario->getComentarios($id);


        if($ciudad != false){
			$data = array('titulo' => $fila->titulo, 'descripcion' => $fila->descripcion, 
			'fecha_maxima' =>$fila->fecha_maxima, 'foto_gauchada' => $fila->foto_gauchada, 
			'id_usuario' => $fila->id_usuario,
			'id_gauchada' =>$fila->id_gauchada, 'consulta' => $result->result_array(),
			'ciudad' => $ciudad->nombre_localidad, 'id_localidad' => $ciudad->id_localidad,
			'cant_postulados' => $result2->num_rows(), 
			'comentarios'=>$result3->result_array()
			);
		}
		else{
			$data = array();
		}

		$this->load->view("/guest/head");
		$this->load->view("/guest/nav");
		$this->load->view("/guest/post", $data);
		$this->load->view("/guest/footer");	
	}


	public function nuevo_comentario($id = '')
	{

    	$this->form_validation->set_rules('pregunta', 'Pregunta', 'required|max_length[140]');
    	/*$this->form_validation->set_rules('descripcion', 'Descripción', 'required|max_length[500]');
    	$this->form_validation->set_rules('datefechamax', 'Fecha máxima', 'required|callback_fecha');
        $this->form_validation->set_rules('creditos', 'Creditos insuficientes.', 'callback_creditos');*/
        
    	if($this->form_validation->run() === true)
    	{
        	//Si la validación es correcta, cogemos los datos de la variable POST
        	//y los enviamos al modelo

    		$fila = $this->gauchada->getPostById($id);
        	$datos['pregunta'] = $this->input->post('pregunta');
        	
        	//datos para notis
        	$datos['autor'] = $this->session->userdata('id');
        	$datos['id_gauchada'] = $id;
        	$datos['destino'] = $fila->id_usuario;
        	$datos['tipo'] = 0;
        	$datos['titulo'] = $fila->titulo;

      

        	$this->load->model('mcomentario');
        	$this->mcomentario->comentar($datos); 

        	$this->load->model('mnotificacion');
        	$this->mnotificacion->nuevaNoti($datos); 
 	
		
		

			$this->load->model('usuario'); 
					
			$ciudad =  $this->gauchada->getCiudadGauchada($id);


			$this->load->view("/guest/head");
			$this->load->view("/guest/nav");
		

	 		$this->load->model('mcategorias');
	 		$this->load->model('mcomentario');


	       
	 		$result3 = $this->gauchada->getPostulados($id);
	        $result = $this->mcategorias->getCategoriasGauchadas($id);
	        $result2= $this->mcomentario->getComentarios($id);

	        if($ciudad != false){
				$data = array('titulo' => $fila->titulo, 'descripcion' => $fila->descripcion, 
				'fecha_maxima' =>$fila->fecha_maxima, 'foto_gauchada' => $fila->foto_gauchada, 
				'id_usuario' => $fila->id_usuario,
				'id_gauchada' =>$fila->id_gauchada, 'consulta' => $result->result_array(),
				'ciudad' => $ciudad->nombre_localidad, 'id_localidad' => $ciudad->id_localidad,
				'cant_postulados' => $result3->num_rows(),'comentarios'=>$result2->result_array());
			}
				
			$this->load->view("/guest/post", $data);

			$this->load->view("/guest/footer");	

	    }

	    else{

	        $this->load->model('usuario'); 
			$fila = $this->gauchada->getPostById($id);		
			$ciudad =  $this->gauchada->getCiudadGauchada($id);


			$this->load->view("/guest/head");
			$this->load->view("/guest/nav");
		

	 		$this->load->model('mcategorias');
	 		$this->load->model('mcomentario');

	       
	 		$result3 = $this->gauchada->getPostulados($id);
	        $result = $this->mcategorias->getCategoriasGauchadas($id);
	        $result2= $this->mcomentario->getComentarios($id);

	        if($ciudad != false){
				$data = array('titulo' => $fila->titulo, 'descripcion' => $fila->descripcion, 
				'fecha_maxima' =>$fila->fecha_maxima, 'foto_gauchada' => $fila->foto_gauchada, 
				'id_usuario' => $fila->id_usuario,
				'id_gauchada' =>$fila->id_gauchada, 'consulta' => $result->result_array(),
				'ciudad' => $ciudad->nombre_localidad, 'id_localidad' => $ciudad->id_localidad,
				'cant_postulados' => $result3->num_rows(),'comentarios'=>$result2->result_array());
			}
				
			$this->load->view("/guest/post", $data);

			$this->load->view("/guest/footer");	
        }

	}

	public function respuesta($id = '')
	{


		$this->form_validation->set_rules('respuesta', 'Respuesta', 'required|max_length[140]');
    	
        
    	if($this->form_validation->run() === true) {

			$datos['respuesta'] = $this->input->post('respuesta');
			$datos['id_comentario'] = $id;

			$query =  $this->db->query("SELECT *
					  FROM comentario
					  WHERE id_comentario = '" . $id . "'");
			$id_g = $query->row();
			$fila = $this->gauchada->getPostById($id_g->id_gauchada);	

			$this->load->model('mcomentario');
			$this->mcomentario->responder($datos);

			$datos['autor'] = $this->session->userdata('id');
        	$datos['id_gauchada'] = $id_g->id_gauchada;
        	$datos['destino'] = $id_g->id_usuario;
        	$datos['tipo'] = 1;
        	$datos['titulo'] = $fila->titulo;

			$this->load->model('mnotificacion');
        	$this->mnotificacion->nuevaNoti($datos);


			$this->load->model('usuario'); 
			$fila = $this->gauchada->getPostById($id_g->id_gauchada);		
			$ciudad =  $this->gauchada->getCiudadGauchada($id_g->id_gauchada);


			$this->load->view("/guest/head");
			$this->load->view("/guest/nav");


			$this->load->model('mcategorias');
			$this->load->model('mcomentario');

		    $result = $this->mcategorias->getCategoriasGauchadas($id_g->id_gauchada);
		    $result2= $this->mcomentario->getComentarios($id_g->id_gauchada);
		    $result3 = $this->gauchada->getPostulados($id_g->id_gauchada);

		    if($ciudad != false){
				$data = array('titulo' => $fila->titulo, 'descripcion' => $fila->descripcion, 
				'fecha_maxima' =>$fila->fecha_maxima, 'foto_gauchada' => $fila->foto_gauchada, 
				'id_usuario' => $fila->id_usuario,
				'id_gauchada' =>$fila->id_gauchada, 'consulta' => $result->result_array(),
				'ciudad' => $ciudad->nombre_localidad, 'id_localidad' => $ciudad->id_localidad,
				'cant_postulados' => $result3->num_rows(), 'comentarios'=>$result2->result_array());
			}
			else{
				$data = array();
			}
			$this->load->view("/guest/post", $data);

			$this->load->view("/guest/footer");	
		}
		 else{
		 	$query =  $this->db->query("SELECT *
					  FROM comentario
					  WHERE id_comentario = '" . $id . "'");
			$id_g = $query->row();
			$fila = $this->gauchada->getPostById($id_g->id_gauchada);	
		
			$ciudad =  $this->gauchada->getCiudadGauchada($id_g->id_gauchada);


			$this->load->view("/guest/head");
			$this->load->view("/guest/nav");
		

	 		$this->load->model('mcategorias');
	 		$this->load->model('mcomentario');

	       
	 		$result3 = $this->gauchada->getPostulados($id_g->id_gauchada);
	        $result = $this->mcategorias->getCategoriasGauchadas($id_g->id_gauchada);
	        $result2= $this->mcomentario->getComentarios($id_g->id_gauchada);

	        if($ciudad != false){
				$data = array('titulo' => $fila->titulo, 'descripcion' => $fila->descripcion, 
				'fecha_maxima' =>$fila->fecha_maxima, 'foto_gauchada' => $fila->foto_gauchada, 
				'id_usuario' => $fila->id_usuario,
				'id_gauchada' =>$fila->id_gauchada, 'consulta' => $result->result_array(),
				'ciudad' => $ciudad->nombre_localidad, 'id_localidad' => $ciudad->id_localidad,
				'cant_postulados' => $result3->num_rows(),'comentarios'=>$result2->result_array());
			}
				
			$this->load->view("/guest/post", $data);

			$this->load->view("/guest/footer");	
        }
	}

	public function postularse($id = '')
	{ 		
		$this->load->view("/guest/head");
		$this->load->view("/guest/nav");

		$data = array('id_gauchada' => $id);

		$this->load->view("/vpostularse" , $data);

		$this->load->view("/guest/footer");

	}


	public function enviarPostulacion($id = '')
	{

		$this->form_validation->set_rules('descripcion', 'Descripción', 'required|max_length[500]');

		if($this->form_validation->run() === true)
		{
			$datos['descripcion'] = $this->input->post('descripcion');	
			$datos['id_gauchada'] = $id;

			$fila = $this->gauchada->getPostById($id);

			$datos['autor'] = $this->session->userdata('id');
        	$datos['destino'] = $fila->id_usuario;
        	$datos['tipo'] = 2;
        	$datos['titulo'] = $fila->titulo;

			$this->load->model('mnotificacion');
        	$this->mnotificacion->nuevaNoti($datos);

			$this->gauchada->enviarPostulacion($datos);
			
		}

		else{

	        $this->load->view("/guest/head");
			$this->load->view("/guest/nav");

			$data = array('id_gauchada' => $id);

			$this->load->view("/vpostularse" , $data);

			$this->load->view("/guest/footer");
        }

	}

	public function postulados($id = '')
    {         
        $this->load->view("/guest/head");
        $this->load->view("/guest/nav");

        $result = $this->gauchada->getPostulados($id);
        
        $data = array('postulados' => $result->result_array());

        $this->load->view("elegir_candidato" , $data);

        $this->load->view("/guest/footer");

    }


}

	
?>

