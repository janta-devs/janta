<?php
class My_Model extends CI_Model{
	const DB_TABLE = "abstract";
	public $DB_TABLE_PK = 0;

	public function insert( $data ){
		if( $this->check($this::DB_TABLE, $data ) == FALSE )
		{
			$this->db->insert($this::DB_TABLE, $data);
			$this->{$this->DB_TABLE_PK} = $this->db->insert_id();
			print json_encode(['status'=>'registered']);
		}
		else
		{
			print json_encode(['exists'=>TRUE, 'data'=>$data]);
		}
	}
	public function update($data, $table_pk){
		$this->DB_TABLE_PK = $table_pk;
		$this->db->set($this::DB_TABLE, $data, $this->DB_TABLE_PK);

	}
	public function populate( $row ){
		foreach ($row as $key => $value) {
			$this->$key = $value;
		}
	}
	public function load( $id ){
		$query = $this->db->get_where($this::DB_TABLE, [$DB_TABLE_PK => $id]);
		$this->populate($query->row());
	}
	public function delete(){
		$this->db->delete($this::DB_TABLE, [$DB_TABLE_PK => $this->{$this->DB_TABLE_PK}]);
		unset( $this->{$this->DB_TABLE_PK});
	}
	public function save(){
		if(isset($this->{$this->DB_TABLE_PK})){
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
			$return_val[$row->{$this->DB_TABLE_PK}] = $model;
		}
		return $return_val;
	}
	public function check( $table, $data )
	{
		$this->db->get_where( $table , $data);
		$num_of_affected_rows = $this->db->affected_rows();
		($num_of_affected_rows === 1) ? TRUE : FALSE;
	}
}

?>