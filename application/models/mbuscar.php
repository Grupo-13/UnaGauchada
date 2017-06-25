<?php 

/**
* 
*/
class Mbuscar extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}


	public function buscar($datos)
	{
		$campos = array(

				'titulo' => $datos['titulo'],
				'id_localidad' => $datos['id_localidad'],
				'categoria' =>$datos['categoria']				
			);

		$this->db->select('*');
		$this->db->from('gauchada');
		$this->db->join('usuario', 'usuario.id_usuario = gauchada.id_usuario');
		$this->db->join('localidad', 'localidad.id_localidad = gauchada.id_localidad');

		// Opcion los 3 campos llenos.
		if(($campos['titulo'] != NULL) && ($campos['id_localidad'] != NULL) && ($campos['categoria'] != array()))
		{	
			$string = '';
			$this->db->join('pertenece', 'pertenece.id_gauchada = gauchada.id_gauchada');
			$this->db->like('titulo', $campos['titulo']);
			$this->db->where('gauchada.id_localidad', $campos['id_localidad']);
			foreach ($campos['categoria'] as $key => $value) 
			{
				$string = $string . "id_categoria = $value OR ";
			}
			$string = substr($string, 0, -3);
			$this->db->where($string);

		}

		//Campo categorias vacio, los otros dos llenos
		elseif (($campos['titulo'] != NULL) && ($campos['id_localidad'] != NULL) && ($campos['categoria'] == array()))
		{
			$this->db->like('titulo', $campos['titulo']);
			$this->db->where('gauchada.id_localidad', $campos['id_localidad']);
		}
			
		//Campo localidad vacio, los otros dos llenos
		elseif (($campos['titulo'] != NULL) && ($campos['id_localidad'] == NULL) && ($campos['categoria'] != array()))
		{
			$this->db->join('pertenece', 'pertenece.id_gauchada = gauchada.id_gauchada');
			$this->db->like('titulo', $campos['titulo']);		
			foreach ($campos['categoria'] as $key => $value) 
			{
				$this->db->or_where('id_categoria', $value);
			}
		}

		//Campo titulo vacio, los otros dos llenos
		elseif (($campos['titulo'] == NULL) && ($campos['id_localidad'] != NULL) && ($campos['categoria'] != array()))
		{
			$this->db->join('pertenece', 'pertenece.id_gauchada = gauchada.id_gauchada');
			$this->db->where('gauchada.id_localidad', $campos['id_localidad']);
			foreach ($campos['categoria'] as $key => $value) 
			{
				$this->db->or_where('id_categoria', $value);
			}
		}

		//Campo titulo lleno, los otros dos vacíos
		elseif (($campos['titulo'] != NULL) && ($campos['id_localidad'] == NULL) && ($campos['categoria'] == array()))
		{
			$this->db->like('titulo', $campos['titulo']);
		}

		//Campo localidad lleno, los otros dos vacíos
		elseif (($campos['titulo'] == NULL) && ($campos['id_localidad'] != NULL) && ($campos['categoria'] == array()))
		{
			$this->db->where('gauchada.id_localidad', $campos['id_localidad']);
		}

		//Campo categorias lleno, los otros dos vacíos
		elseif (($campos['titulo'] == NULL) && ($campos['id_localidad'] == NULL) && ($campos['categoria'] != array()))
		{
			$this->db->join('pertenece', 'pertenece.id_gauchada = gauchada.id_gauchada');
			foreach ($campos['categoria'] as $key => $value) {
				$this->db->or_where('id_categoria', $value);
			}
		}

		//Cuando los 3 campos son vacíos no se necesita where.

		$this->db->group_by("gauchada.id_gauchada");
		$this->db->order_by('fecha_publicacion', 'DESC');
		$query = $this->db->get();


		//Con la consulta ya realizada, llamo nuevamente al content

		if($query->num_rows() > 0)
		{
			$this->load->model('usuario'); 
			$this->load->model('mcategorias');
			$this->load->model('localidad');
			$this->load->model('mbuscar');

			$categorias = $this->mcategorias->getCategorias();
			$localidades = $this->localidad->getLocalidades();


			$data = array(
				'consulta' => $query->result_array(),
				'categorias' => $categorias->result_array(),
				'localidades' => $localidades->result_array(),
			);

			$this->load->view('guest/head');
			$this->load->view('guest/nav');
			$this->load->view('guest/header');
			$this->load->view('guest/content', $data);
			$this->load->view('guest/footer');
		}
		else
		{
			$this->load->view('guest/head');
			$this->load->view('guest/nav');
			$this->load->view('guest/sinCoincidencias');

			$this->load->view('guest/footer');
		}

	}

}