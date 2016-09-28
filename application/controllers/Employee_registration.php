<?php

class Employee_registration extends CI_Controller{
	public function step_two()
	{
		$this->load->view('registration_page');
	}
	public function step_three()
	{
		$this->load->view('choice_page');
	}
	public function employeeData(){
		$data = $this->input->post();
		$data['login_id'] = 6;
		$this->load->model('Employee');
		$Employee = new Employee();
		$Employee->insert( $data );
	}
}

?>