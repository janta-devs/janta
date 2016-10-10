<?php
class User_login extends CI_Model
{
	const DB_TABLE = "user_login";
	const DB_TABLE_PK = 2;			// this value will be set from the session data collected in the session table
	const DB_PK_NAME = "login_id";

	public $status;
	public $role;

	function __construct(){
		//this calls the Model constructor
		parent::__construct();
		$this->status = $this->config->item('status');
		$this->roles = $this->config->item('roles');
	}

	public function insertUser($d)
	{
			$string = array(
				'industry'=>$d['industry'],
				'specialization'=>$d['specialization'],
				'email'=>$d['email_add'],
				'role'=>$this->roles[0],
				'status'=>$this->status[0]
				);
			$q = $this->db->insert_string('user_login', $string);
			$this->db->query($q);
			return $this->db->insert_id();
	}

	public function isDuplicate($email)
	{
		$this->db->get_where('user_login', array('email' => $email), 1);
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;
	}

	public function insertToken($login_id)
	{
		$token = substr(sha1(rand()), 0, 30);
		$date = date('Y-m-d');

		$string = array(
			'token' => $token,
			'login_id' => $login_id,
			'created' => $date
			);
		$query = $this->db->insert_string('tokens', $string);
		$this->db->query($query);
		return $token . $login_id;
	}

	public function isTokenValid($token)
	{
		$tkn = substr($token,0,30);
		$uid = substr($token,30);

		$q = $this->db->get_where('tokens', array(
				'tokens.token' => $tkn,
				'tokens.login_id' => $uid
			), 1);
		if($this->db->affected_rows() > 0){
			$row = $q->row();

			$created = $row->created;
			$createdTS = strtotime($created);
			$today = date('Y-m-d');
			$todayTS = strtotime($today);

			if($createdTS != $todayTS){
				return false;
			}

			$user_info = $this->getUserInfo($row->login_id);
			return $user_info;
		} else {
			return false;
		}
	}
	public function getUserInfo($login_id)
	{
		$q = $this->db->get_where('user_login', array('login_id' => $login_id), 1);
		if($this->db->affected_rows() > 0){
			$row = $q->row();
			return $row;
		} else {
			error_log('no user found getUserInfo('.$id.')');
			return false;
		}
	}

	public function updateUserInfo($post)
	{
		$data = array(
			'password' => $post['password'],
			'last_login' => date('Y-m-d h:i:s A'),
			'status' => $this->status[1]
			);
		$this->db->where('login_id', $post['login_id']);
		$this->db->update('user_login', $data);
		$success = $this->db->affected_rows();

		if(!$sucess){
			error_log('Unable to updateUserInfo('.$post['login_id'].')');
			return false;
		}
		$user_info = $this->getUserInfo($post['login_id']);
		return $user_info;
	}

	public function checkLogin($post)
	{
		$this->load->library('password');
		$this->db->select('*');
		$this->db->where('email', $post['email']);
		$query = $this->db->get('user_login');
		$userInfo = $query->row();

		if(!$this->password->validate_password($post['password'], $userInfo->password)){
			error_log('Unsuccessful login attempt('.$post['email'].')');
			return false;
		}
		$this->updateLoginTime($userInfo->id);

		unset($userInfo->password);
		return $userInfo;
	}
	public function updateLoginTime($id)
	{
		$this->db->where('login_id', $id);
		$this->db->update('user_login', array('last_login' => date('Y-m-d h:i:s A')));
		return;
	}

	public function getUserInfoByEmail($email)
	{
		$q = $this->db->get_where('user_login', array('email' => $email), 1);

		if($this->db->affected_rows() > 0){
			$row = $q->row();
			return $row;
		} else {
			error_log('no user found getUserInfo('.$email.')');
			return false;
		}
	}

	public function updatePassword($post)
	{
		$this->db->where('login_id', $post['login_id']);
		$this->db->update('user_login', array('password' => $post['password']));
		$success = $this->db->affected_rows();

		if(!$success){
			error_log('unable to updatePassword('.$post['login_id'].')');
			return false;
		}
		return true;
	}


	/*
	//Determine whether a given user exists/
	function exists($login_id)
	{
		$this->db->from('user_login');
		$this->db->where('user_login.login_id', $login_id);
		$query = $this->db->get();
		return ($query->num_rows()==1);
	}
	//Gets all the user
	function get_all()
	{
		$this->db->from('user_login');
		$this->db->order_by("login_id", "asc");

		return $this->db->get();
	}
	//
		Gets information about a user as an array
		function get_info($login_id)
	{
		$query = $this->db->get_where('user_login', array('login_id' => $login_id), 1);
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//create an object that has empty properties
			$fields = $this->db->list_fields('user_login');
			$user_obj = new stdClass;

			foreach ($fields as $field) {
				$user_obj->$field='';
			}
			return $user_obj;
		}
	}
	//GEt users with specific ids
	function get_multiple_info($login_ids)
	{
		$this->db->from('user_login');
		$this->where_in('login_id', $login_ids);
		$this->db->order_by("login_id", "asc");
		return $this->db->get();
	}
	/*Inserts a new user or updates an existing one
	function save(&$user_data, &$employer_data, $employer_id=false, $login_id=false)
	{
		if(!$login_id or !$this->exists($login_id))
		{
			if($this->db->insert('User_login', $user_data))
			{
				$user_data['login_id']=$this->db->insert_id();
				return true;
			}
			return false;
		}
		$this->db->where('login_id', $login_id);
		return $this->db->update('user_login', $user_data);
	}
	/*Deletes a single user (does not really do anything)*
	function delete ($login_id)
	{
		return true;
	}
	/*deletes multiple users (does not really do anything)
	function delete_list($login_ids)
	{
		return true;
	}*/
}
?>