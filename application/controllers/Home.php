<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller{
	public function index()
	{
		
		$this->load->view('employee/home');
	}

	public function register()
	{
		$this->load->model('user_login');
		$data = $this->input->post();
		if( $data['email'] == '' || $data['username'] == '' ){
			print json_encode(['status'=>'error']);
		}
		else if(isset( $data ) && is_array( $data ) && !empty( $data )){
			unset($data['re_password']);
			$user_login = new user_login();
			$user_login->insert( $data );
		}
	}
	public function update(){
		$this->load->model('user_login');
		$user_login = new user_login();
		// example of how the update function ought to be used
		/*
		*@parameters two arrays first one with old user_information
		*@parameters second array with new user_information to be updated
		*	Example
		*/
		// $old_data = ['username'=>'antony', 'password'=>'pass','re_password'=>'pass'];
		// $new_data = ['username'=>'Jadz', 'password'=>'ngayo','re_password'=>'ngayo'];	
		// $user_login->update( $old_data, $new_data );
	}

	public function delete(){
		$this->load->model('user_login');
		$user_login = new user_login();
		$data = ['username'=>'theantonymars@gmail.com'];
		$user_login->delete($data);
	}

}

?>
