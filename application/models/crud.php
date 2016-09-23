<?php

class Crud extends CI_Model{
	public function __constructor()
	{
		parent::__constructor();		//loading the core CI Model constructor
	}
	public function getData()
	{
		$query  = $this->db->get('employee');
		return $query->result();
	}
}


?>