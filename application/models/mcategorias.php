<?php

class Mcategorias extends CI_Model
{	
	public function getCategorias()
	{
		return  $this->db->query("SELECT * FROM categoria
									order by nombre_categoria");
	}
	public function getCategoriasGauchadas($id)
	{
		return  $this->db->query("SELECT c.nombre_categoria, c.id_categoria
								  FROM categoria as c 
								  Inner join pertenece as p on p.id_categoria = c.id_categoria
								  WHERE p.id_gauchada=$id");
	}

	public function getCategoria($id)
	{	
		return  $this->db->query("SELECT * FROM categoria
								  WHERE id_categoria = $id");
	}

	public function eliminarCategoria($id)
	{
		
		$this->db->query("DELETE FROM categoria
						  WHERE id_categoria = $id");
	}

	public function editar($datos)
	{
		$this->db->where('id_categoria', $datos['id_categoria']);
		$this->db->update('categoria', $datos);
	}

	public function agregar($datos)
	{
		$this->db->insert('categoria', $datos);
	}

}

