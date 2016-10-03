<?php

class User_login extends My_Model{
	const DB_TABLE = "user_login";
	const DB_TABLE_PK = 2;			// this value will be set from the session data collected in the session table
	const DB_PK_NAME = "login_id";

	/* Determine whether a given user exists */
	function_exists($logi_id)
	{
		$this->db->from('user_login');
		$this->db->where('user_login.login_id', $login_id);
		$query = $this->db->get();

		return ($query->num_rows()==1);
	}
	/*Gets all the user*/
	function get_all()
	{
		$this->db->from('user_login');
		$this->db->order_by("login_id", "asc");

		return $this->db->get();
	}
	/*
		Gets information about a user as an array
	*/
	function get_info($login_id)
	{
		$query = $this->db->get_where('user_login', array('login_id' => $login_id), 1);
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//create an object that has empty propoerties
			$fields = $this->db->lis_fields('user_login');
			$user_obj = new stdClass;

			foreach ($fields as $field) {
				$user_obj->$field='';
			}
			return $user_obj;
		}
	}
	/*GEt users with specific ids*/
	function gwt_multiple_info($login_ids)
	{
		$this->db->from('user_login');
		$this->where_in('login_id', $login_ids);
		$this->db->order_by("login_id", "asc");
		return $this->db->get();
	}
	/*Inserts a new user or updates an existing one*/
	function save(&$user_data, $login_id=false)
	{
		if(!login_id or !$this->exists($login_id))
		{
			if($this->db->instert('User_login', $user_data))
			{
				$user_data['login_id']=$this->db->insert_id();
				return true;
			}
			return false;
		}
		$this->db->where('login_id', $login_id);
		return $this->db->update('user_login', $user_data);
	}
	/*Deletes a single user (does not really do anything)*/
	function delete ($login_id)
	{
		return true;
	}
	/*deletes multiple users (does not really do anything)*/
	function delete_list($login_ids)
	{
		return true;
	}
}


?>