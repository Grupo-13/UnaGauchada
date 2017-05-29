<?php

/**
* 
*/
class Localidad extends CI_Model
{
	
	public function getLocalidades()
	{
		
		return $this->db->query("SELECT l.id_localidad, l.nombre_localidad
								FROM localidad as l");
	}

}