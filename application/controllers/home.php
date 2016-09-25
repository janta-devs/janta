<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller{

	public function index()
	{
		
		$this->load->view('home');
	}

	public function getregistrationData()
	{
		$this->load->model('user_login');
		$data = $this->input->post();
		if(isset( $data ) && is_array( $data ) && !empty( $data )){
			$user_login = new user_login();
			$user_login->insert( $data );
		 }
	}
}

?>

