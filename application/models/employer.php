<?php
class Employer extends User_login
{
/*
Determines if a given user; logged in user is an employee*/
	function exists($login_id)
	{
		$this->db->from('employer');
		$this->db->join('user_login', 'user_login.login_id=employer.login_id');
		$this->db->where('employer.login_id', $login_id);
		$query = $this->db->get();


		return ($query->num_rows()=1);
	}
/*
Returns all the employers
*/
	function get_all()
	{
		$this->db->from('employer');
		$this->db->join('user_login', 'employer.login_id=user_login.login_id');
		$this->db>where('account_status', 1);
		$this->db->order_by("employer_id", "asc");

		return $this->db->get();
	}
/*
Gets information about a particular employer
*/
	function get_info($employer_id)
	{
		$this->db->from("employer");
		$this->db->join('user_login', 'user_login.login_id=employer.login_id');
		$this->db->where('employer.login_id', $employer_id);
		$query = $this->db->get();

		if($query->num_rows()==1)
		{
		return $query->row();
		}
		else
		{
		//GEt empty base parent object, as $employer_id is NOT an emplyer
		$user_obj = parent::get_info(-1);

		//get all the fields fro the employer table
		$fields=$this->db->list_fields('employer');

		//append those fields to the base parent oject, we have an oject that is completely empty
		foreach ($user_obj as $field) {
		 	$user_obj->$field='';
			} 
		 return $user_obj;
		}
	}
	/*Loads info about multiple employers*/
		function get_multiple_info($employers_ids)
		{
			$this->db->from('employer');
			$this->db->join('user_login', 'user_login.login_id=employer.login_id');
			$this->db->where_in('employer.login_id', $employers_ids);
			$this->db->order_by("employer_id", "asc");
			return $this->db->get();
		}
		/*For inserting or updating an employer*/
		function save(&$user_data, &$employer_data, $employer_id=false)
		{
			$success=false;
			//these queries are to be ran as a transaction, we want to ensure we either do all or nothing
			$this->db->trans_start();

			if(parent::save($user_data, $employer_id))
			{
				if(!$employer_id or !$this->exists($employer_id))
				{
					$employer_data['employer_id']=$user_data['login_id'];
					$success=$this->db->insert('employer', $employer_data);
				}
				else
				{
					$this->db->where('login_id', $employer_id);
					$success = $this->db->update('employer', $employer_data);
				}
			}
			$this->db->trans_complete();
			return $success;
		}
		/*Deletes one employer*/
		function delete($employer_id)
		{
			$this->db->where('login_id', $employer_id);
			return $this->db->update('employer', array('deleted => 1'));

		}
		/*Deletes multiple employers - a list of employers*/
		function delete_list($employer_ids)
		{
			$this->db->where_in('login_id', $employer_ids);
			return $this->db->update('employer', array('delete => 1'));
		}
		/*for enabling search suggestions for finding corporate employers and individual employers respectively*/
		function get_search_suggestions($search, $limit=25)
		{
			$suggestions = array();
			$this->db->from('employer');
			$this->db->join('user_login', 'employer.login_id=user_login.login_id');
			$this->db->where('account_status', 1);
			$this->db->like('company_name', "asc");
			$by_company_name = $this->db->get();
			foreach($by_company_name->result() as $row)
			{
				$suggestions[]=$row->company_name;
			}
			$this->db->from('employer');
			$this->db->join('user_login', 'employer.login_id=user_login.login_id');
			$this->db->where("(first_name LIKE '%".$this->db->escape_like_str($search)."%' or last_name LIKE '%".$this->db->escape_like_str($search)."%' or surname LIKE '%".$this->db->escape_like_str($search)."%' or CONCAT(`first_name`,'',`last_name`,'',`surname`) LIKE '%".$this->db->escape_like_str($search)."%') and account_status=1");
			$this->db->order_by("last_name", "asc");
			$by_name = $this->db->get();
			foreach ($by_name->result as $row) 
			{
				$suggestions[]=$row->first_name.' '.$row->last_name;
			}
			$this->db->from('employer');
			$this->db->join('user_login', 'employer.login_id=user_login.login_id');
			$this->db->where('account_status', 1);
			$this->db->like("email", $search);
			$this->db->order_by("email", "asc");
			$by_email = $this->db->get();
			foreach ($by_email->result() as $row) {
				$suggestions[]=$row->email;
			}

			$this->db->from('employer');
			$this->db->join('user_login', 'employer.login_id=user_login.login_id');
			$this->db->where('account_status', 1);
			$this->db->like("estate_locality", $search);
			$this->db->order_by("estate_locality", "asc");
			$by_estate_locality = $this->db->get();
			foreach ($by_estate_locality->result() as $row) {
				$suggestions[]=$row->estate_locality;
			}
			//only return suggestion upto the set limit
			if(count($suggestions > $limit))
			{
				$suggestions = array_slice($suggestions, 0, $limit);
			}
			return $suggestions;
		}
		// carry out a search on employers
		function search($search)
	{
		$this->db->from('employer');
		$this->db->join('user_login','employer.login_id=user_login.login_id');
		$this->db->where("(first_name LIKE '%".$this->db->escape_like_str($search)."%' or 
		last_name LIKE '%".$this->db->escape_like_str($search)."%' or 
		company_name LIKE '%".$this->db->escape_like_str($search)."%' or 
		email LIKE '%".$this->db->escape_like_str($search)."%' or 
		estate_locality LIKE '%".$this->db->escape_like_str($search)."%' or 
		city_town LIKE '%".$this->db->escape_like_str($search)."%' or 
		CONCAT(`first_name`,' ',`last_name`) LIKE '%".$this->db->escape_like_str($search)."%') and account_status=1");		
		$this->db->order_by("last_name", "asc");
		
		return $this->db->get();	
	}

}

?>