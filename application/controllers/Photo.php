<?php

class Photo extends CI_Controller{
	public function upload(){
		$this->load->helper('upload_helper');
		$this->load->model('Employee');

		$employee = new Employee();
		@$path = upload_file();
		$data1 = ['login_id' => 16 ];
		$data2 = ['profile_photo'=> $path];
	
		$employee->update( $data1, $data2 );
	}
	public function getProfilePic(){
		$this->load->model('Employee');
		$employee = new Employee();
		foreach ($employee->get() as $key => $value) {
			$data = $value;
		}
		print json_encode( ['placeholder' => $data->profile_photo] );
	}
}


?>