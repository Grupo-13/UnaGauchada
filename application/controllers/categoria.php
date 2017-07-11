<?php

/**
* 
*/
class Categoria extends CI_Controller
{
	
	public function index()
	{

		$categorias = $this->mcategorias->getCategorias();

		$data = array(	
			'categorias' => $categorias->result_array(),
		);

		$this->load->view("/guest/head");
		$this->load->view("/guest/nav");
		$this->load->view("/guest/menuAdmin");
		$this->load->view("/guest/vAdminCategorias", $data);
		$this->load->view("/guest/footer");
	}

	public function eliminar($id_g)
	{
		$this->mcategorias->eliminarCategoria($id_g);

		$categorias = $this->mcategorias->getCategorias();
		$data = array(	
			'categorias' => $categorias->result_array(),
		);
		$this->load->view("/guest/head");
		$this->load->view("/guest/nav");
		$this->load->view("/guest/menuAdmin");
		$this->load->view("/guest/vAdminCategorias", $data);
		$this->load->view("/guest/footer");
	}

	public function modificar($id_g)
	{
		$categoria = $this->mcategorias->getCategoria($id_g);
		$data = array(	
			'categoria' => $categoria->row(),
		);
		$this->load->view("/guest/head");
		$this->load->view("/guest/nav");
		$this->load->view("/guest/menuAdmin");
		$this->load->view("/guest/vEditCategoria", $data);
		$this->load->view("/guest/footer");
	}

	public function editar($id_c)
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[50]');
		
		if($this->form_validation->run() === true)
		{

			$datos['id_categoria'] = $id_c;
			$datos['nombre_categoria'] = $this->input->post('nombre');
			
			$this->mcategorias->editar($datos);
			$categorias = $this->mcategorias->getCategorias();
			$data = array(	
				'categorias' => $categorias->result_array(),
			);
			$this->load->view("/guest/head");
			$this->load->view("/guest/nav");
			$this->load->view("/guest/menuAdmin");
			$this->load->view("/guest/vAdminCategorias", $data);
			$this->load->view("/guest/footer");


			

		}else{
			$categoria = $this->mcategorias->getCategoria($id_c);
			$data = array(	
				'categoria' => $categoria->row(),
			);
			$this->load->view("/guest/head");
			$this->load->view("/guest/nav");
			$this->load->view("/guest/menuAdmin");
			$this->load->view("/guest/vEditCategoria", $data);
			$this->load->view("/guest/footer");

		}
	}

	public function agregar()
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[50]|is_unique[categoria.nombre_categoria]');
		if($this->form_validation->run() === true)
		{

			$datos['nombre_categoria'] = $this->input->post('nombre');
			
			$this->mcategorias->agregar($datos);
			$categorias = $this->mcategorias->getCategorias();
			$data = array(	
				'categorias' => $categorias->result_array(),
			);
			$this->load->view("/guest/head");
			$this->load->view("/guest/nav");
			$this->load->view("/guest/menuAdmin");
			$this->load->view("/guest/vAdminCategorias", $data);
			$this->load->view("/guest/footer");


			

		}else{
			$categorias = $this->mcategorias->getCategorias();
			$data = array(	
				'categorias' => $categorias->result_array(),
			);
			$this->load->view("/guest/head");
			$this->load->view("/guest/nav");
			$this->load->view("/guest/menuAdmin");
			$this->load->view("/guest/vAdminCategorias", $data);
			$this->load->view("/guest/footer");

		}
	}
}