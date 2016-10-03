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
	public function employeeData()
	{
		$data = $this->input->post();
		$data['login_id'] = 15;
		$this->load->model('Employee');
		$Employee = new Employee();
		$Employee->insert( $data );
	}
	public function profile()
	{
		$this->load->model('Employee');
		$employee = new Employee();
		$data['user_info'] = $employee->get();

		// print_r( $data );

		// $data2 = $employee->pull_multiple_tables(['user_login','employee'], 'user_login.login_id', 'employee.login_id');
		// print_r( $data2 );
		$this->load->view('employee/profile.php', $data);
	}
}

?>