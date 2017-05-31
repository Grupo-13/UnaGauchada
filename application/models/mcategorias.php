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

}

