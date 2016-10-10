<?php
class MY_Model extends CI_Model
{
	const DB_TABLE = "abstract";		// the name of the table being worked on			
	const DB_TABLE_PK = "abstract";		// the value of the primary key e.g. 1, 100 depending on user's number in DB
	const DB_PK_NAME = "abstract";		// this is the field name of the primary key (unique to each table)

	public function insert( $data )
	{
		if( $this->check($this::DB_TABLE, $data ) == FALSE )
		{
			$this->db->insert($this::DB_TABLE, $data);
			$this->{$this::DB_TABLE_PK} = $this->db->insert_id();	// setting new value of primary key for user just registered
			print json_encode(['status'=>'registered']);
		}
		else
		{
			print json_encode(['exists'=>TRUE]);
		}
	}
	public function update($initial_data, $new_data)
	{
		$this->db->where('login_id', $initial_data['login_id']);
		return ( ($this->db->update($this::DB_TABLE, $new_data) === True ) ) ? true: false;
		
	}
	public function populate( $row ){
		foreach ($row as $key => $value)
		{
			$this->$key = $value;
		}
	}
	public function load( $id )
	{
		$query = $this->db->get_where($this::DB_TABLE, [$this->{$this::DB_PK_NAME} => $id]);
		$this->populate($query->row());
	}
	/*
	*@Function Delete
	*@Param Data to be deleted
	*@This Model will have the user's Primary key at all times from the session table
	*/
	public function delete( $data )
	{
		$this->db->delete($this::DB_TABLE, [$this::DB_PK_NAME => $this::DB_TABLE_PK]);
		unset( $this->{$this::DB_TABLE_PK});
	}
	public function save()
	{
		if(isset($this->{$this::DB_TABLE_PK}))
		{
			$this->update();
		}
		else{
			$this->insert();
		}
	}
	// Getting an array with an optional limit and offset

	public function get($limit = 0, $offset = 0)
	{
		if( isset($limit) )
		{
			$query = $this->db->get($this::DB_TABLE, $limit, $offset);
		}
		else
		{
			$query = $this->db->get($this::DB_TABLE);
		}
		$return_val = [];	
		$class = get_class( $this );
		foreach ($query->result() as $row ) 
		{
			$model = new $class;
			$model->populate($row);
			@$return_val[$row->{$this::DB_TABLE_PK}] = $model;
		}
		return $return_val;
	}
	public function check( $table, $data )
	{
		$this->db->get_where( $this::DB_TABLE , $data);
		$num_of_affected_rows = $this->db->affected_rows();
		return ($num_of_affected_rows === 1) ? TRUE : FALSE;
	}

	public function pull_multiple_tables( $id )
	{
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->join('employee','user_login.login_id = employee.login_id', 'left');
		$this->db->where('user_login.login_id = '.$id);
		return $result = $this->db->get();
	}
}

?>
