<?php
/**
* 
*/
class Calificarusuario extends CI_Controller
{
	public function calificacion ($id_g = '')
    {
        $this->load->model('mcalificar');

        if ($_POST['action'] == 'Positivo') {
           $datos = array( 
                'calificacion' => '1',
                'id_gauchada' => $id_g, 
                'descripcion' =>$_POST['descripcion']
            );

           $consulta = $this->gauchada->getCandidato($id_g);
           $id_u = $consulta->row();
           $id_usuario = $id_u->candidato ;
           $this->db->query("UPDATE Usuario
                            SET reputacion = reputacion + 1
                            WHERE $id_usuario = id_usuario");

           $this->mcalificar->calificarUsuario($datos);
        }
        else if ($_POST['action'] == 'Neutral') {
           $datos = array( 
                'calificacion' => '2',
                'id_gauchada' => $id_g, 
                'descripcion' => $_POST['descripcion']
            );
           $this->mcalificar->calificarUsuario($datos);
        }  else if ($_POST['action'] == 'Negativo') {
           $datos = array( 
                'calificacion' => '3',
                'id_gauchada' => $id_g, 
                'descripcion' => $_POST['descripcion']
            );



           $consulta = $this->gauchada->getCandidato($id_g);
           $id_u = $consulta->row();
           $id_usuario = $id_u->candidato ;

           $this->db->query("UPDATE Usuario
                            SET reputacion = reputacion - 2
                            WHERE $id_usuario = id_usuario");
           $this->mcalificar->calificarUsuario($datos);
        }


        //datos para notis

          $fila = $this->gauchada->getPostById($id_g);
          $datos['autor'] = $this->session->userdata('id');
          $datos['id_gauchada'] = $id_g;
          $datos['destino'] = $id_usuario;
          $datos['tipo'] = 7;
          $datos['titulo'] = $fila->titulo;
          $this->load->model('mnotificacion');
          $this->mnotificacion->nuevaNoti($datos); 

    }


	 public function elegido($data){  	/* Cuando se presiona el botón elegir se pone la postulacion del usuario elegido en 1(fue elegido) y las demás 
    	postulaciones con el mismo id_gauchada en 2 (es decir, no fue elegido)
    	Se guarda en la gauchada el id_usuario que fue elegido en el campo candidato  y se habilita la vista para calificarlo */

        $this->load->model('usuario');
        $dato = $this->usuario->getCalificacion($data['id_gauchada']);                          
        if ($dato->num_rows() > 0) {
            $this->load->view("/guest/head");
            $this->load->view("/guest/nav");
            $this->load->view("/calificacion_hecha");
            $this->load->view("/guest/footer"); 
        } else {

          
           	 	$campos1 = array('elegido' => '2');            
            	$this->db->where('id_gauchada', $data['id_gauchada']);
              $this->db->update('postulados', $campos1);

              $campos2 = array('elegido' => '1');   
            	$this->db->where('id_usuario', $data['id_usuario']);
            	$this->db->where('id_gauchada', $data['id_gauchada']);
              $this->db->update('postulados', $campos2);

              //notificaciones
              $this->load->model('mnotificacion');
              $fila = $this->gauchada->getPostById($data['id_gauchada']);
              $datos['autor'] = $this->session->userdata('id');
              $datos['id_gauchada'] = $data['id_gauchada'];
              
              $datos['titulo'] = $fila->titulo;
              $datos['tipo'] = 5;
              $result = $this->gauchada->getPostulados($data['id_gauchada']);
              foreach ($result->result_array() as $key) {
                if ($key['id_usuario'] != $data['id_usuario']) {
                  $datos['destino'] = $key['id_usuario'];
                  $this->mnotificacion->nuevaNoti($datos);
                }
                
              }
              

              $datos['tipo'] = 4;
              $datos['destino'] = $data['id_usuario'];
              
              $this->mnotificacion->nuevaNoti($datos);

              $campos3 = array('candidato' =>  $data['id_usuario']);            
            	$this->db->where('id_gauchada', $data['id_gauchada']);
              $this->db->update('gauchada', $campos3);


              $data2 = $this->usuario->getUsuarioById($data['id_usuario']);

              $datos = array(
      				'usuario' => $data2,
      				'gauchada' => $fila,
                     );


              $this->load->view('guest/head');
          		$this->load->view('guest/nav');
          		$this->load->view('calificar_usuario', $datos);
          		$this->load->view('guest/footer');
            
        }
    }

    public function responderCalif($id = '', $id_g =''){
        
       /* $resp = $_POST['resp'];
        $this->db->query("UPDATE calificacion                          
                          SET $resp = respuesta
                          WHERE $id = id_calificacion "); */   
        $data = array('respuesta'=>$_POST['respu']); 
        $this->db->where('id_calificacion', $id);
        $this->db->update('calificacion', $data);

        //datos para notis

          $fila = $this->gauchada->getPostById($id_g);
          $datos['autor'] = $this->session->userdata('id');
          $datos['id_gauchada'] = $id_g;
          $datos['destino'] = $fila->id_usuario;
          $datos['tipo'] = 8;
          $datos['titulo'] = $fila->titulo;
          $this->load->model('mnotificacion');
          $this->mnotificacion->nuevaNoti($datos); 

        header("Location: " . base_url() . 'perfil/usuario/' . $this->session->userdata('id'));
    }
    
}