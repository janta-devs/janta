<?php
class My_Model extends CI_Model{
	const DB_TABLE = "abstract";
	const DB_TABLE_PK = "abastract";

	private function insert(){
		$this->db->insert($this::DB_TABLE, $this);
		$this->{$this::DB_TABLE_PK} = $this->db->insert_id();
	}
	private function update(){
		$this->db->set($this::DB_TABLE, $this, $this->DB_TABLE_PK);

	}
	public function populate( $row ){
		foreach ($row as $key => $value) {
			$this->$key = $value;
		}
	}
	public function load( $id ){
		$query = $this->db->get_where($this::DB_TABLE, [$this::DB_TABLE_PK => $id]);
		$this->populate($query->row());
	}
	public function delete(){
		$this->db->delete($this::DB_TABLE, [$this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK}]);
		unset( $this->{$this::DB_TABLE_PK});
	}
	public function save(){
		if(isset($this->{$this::DB_TABLE_PK})){
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
			$return_val[$row->{$this::DB_TABLE_PK}] = $model;
		}
		return $return_val;
	}
}

?>