<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller{

	public function index()
	{
		$this->load->model('employee');
		$res = $this->employee->get();
		print( json_encode($res) );				// printing out the JSON formatted contents from the db
		$this->load->view('home');
	}
}

?>

