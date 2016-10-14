<?php

class Employee_registration extends CI_Controller{
	public function personal_details(){
		$this->load->view('employee/profile_info_form');
	}
	public function employeeData()
	{
		$data = $this->input->post();
		$session_data = $this->session->userdata();
		$data['login_id'] = $session_data['login_id'];
		$this->load->model('Employee');
		$Employee = new Employee();
		$Employee->insert( $data );
	}
	public function profile()
	{
		$this->load->model('Employee');
		$employee = new Employee();
		$session_data = $this->session->userdata();
		$data['user_info'] = $employee->pull_multiple_tables( $session_data['login_id'] ); 
		// $this->load->view('employee/profile.php', $data);
	}
}

?>