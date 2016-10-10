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
	public function step_four(){
		$this->load->view('employee/profile_info_form');
	}
	public function employeeData()
	{
		$data = $this->input->post();
		$data['login_id'] = 8;
		$this->load->model('Employee');
		$Employee = new Employee();
		$Employee->insert( $data );
	}
	public function profile()
	{
		$this->load->model('Employee');
		$employee = new Employee();
		$data['user_info'] = $employee->pull_multiple_tables( 8 ); 
		$this->load->view('employee/profile.php', $data);
	}
}

?>