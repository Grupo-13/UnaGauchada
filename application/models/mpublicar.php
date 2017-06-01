<?php 

/**
* 
*/
class mpublicar extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}

	public function publicar($datos)
	{

		$campos = array(

		  		'fecha_maxima' => $datos['datefechamax'],
		  		'id_usuario' => $this->session->userdata('id'), //Id del usuario que esta logueado.
				'titulo' => $datos['titulo'],
				'foto' => $datos['file_name'],
				'descripcion' => $datos['descripcion']

				
			);
			// $id_usuario = $data->id_usuario;

		 	$result2 = $this->db->query("SELECT creditos 
		 								FROM usuario 
		 								WHERE id_usuario = '". $campos['id_usuario'] ."'");
		 	$data2 = $result2->row();

		 	// Con el id de la gauchada tengo que ver que ese id se encuentre en la tabla calificacion
		 	//si no es así significa que la calificación no fue realizada. 

		 	 //$result3 = $this->db->query("SELECT g.id_gauchada, g.id_usuario 
		 	 	//					 FROM gauchada as g
		 		//					 LEFT JOIN calificacion as c on c.id_gauchada = g.id_gauchada 
		 	 	//					 WHERE g.id_usuario = '". $campos['id_usuario'] ."'");

		 			//				  --$this->db->where_not_in()IN (SELECT c.id_gauchada
		 	// 						 						FROM calificacion as c )"
		 	// 						// AND g.fecha_maxima > current(date)
		 			//				 );	

		 	 if (($campos['id_usuario'] > 0) and ($data2->creditos > 0)) //and ($result3 === null))
		 	 {
		 	 
		  		$insert = $this->db->insert('gauchada', $campos);
		  		$insert_id = $this->db->insert_id();
		  		if ($insert)
		  		{
		  			//Update creditos de usuario. -1.
		  			$this->db->query("UPDATE Usuario
		  						  SET creditos = creditos - 1
		  						  WHERE id_usuario = '". $campos['id_usuario'] ."'");

		  			
		  			
		  		if($datos['categoria'] != array()){
		  			foreach ($datos['categoria'] as $key => $value) 
		  			{
		  				
		  				$categ= array(
		  					'id_gauchada' => $insert_id,
		  					'id_categoria' => $value);

		  				$this->db->insert('pertenece', $categ);
		  			}
				}
				else{
					$categ= array(
		  					'id_gauchada' => $insert_id,
		  					'id_categoria' => 8);

		  				$this->db->insert('pertenece', $categ);
				}

		  			header("Location: " . base_url() . 'detalle/post/'. $insert_id);

		  		}

		  	}
		  	else{
		  		if($data2->creditos === 0)
		  		{

		  			echo "Sus créditos son insuficientes."; 
		  		}

		  		// if ($result3 != null)
		  		//{
		   	//		echo 'Tiene calificaciones pendientes.';
		  	//	}
		 	 

		  		
		  	}
		
	}
}