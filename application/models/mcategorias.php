<?php

class Mcategorias extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}

	public function getCategorias()
	{
		return  $this->db->query("SELECT * FROM categoria
									order by nombre_categoria");
	}
	public function getCategoriasGauchadas($id)
	{
		return  $this->db->query("SELECT c.nombre_categoria 
								  FROM categoria as c 
								  Inner join pertenece as p on p.id_categoria = c.id_categoria
								  WHERE p.id_gauchada=$id");
	}

}

