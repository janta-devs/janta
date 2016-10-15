<?php

class Employee_registration extends CI_Controller{
	public function personal_details(){
		$this->load->view('employee/profile_info_form');
	}
	public function employeeData()
	{
		$data = $this->input->post();

		$this->load->library('password');

		$session_data = $this->session->userdata();

		unset( $data['re_password']);

		$data = $this->security->xss_clean($data);

		@$data['password'] = $this->password->create_hash($data['password']);

		$this->load->model('Employee');
		$this->load->model('User_login');

		$User_login = new User_login();
		$Employee = new Employee();


		if( $Employee->check('employee', ['login_id'=>$session_data['login_id']]) )
		{
			($Employee->update( $session_data['login_id'], $data ) == true ) ? 
			print json_encode(['status'=>'true']) : print json_encode(['status'=>'false']);
			$User_login->update($session_data['login_id'], ['password'=>$data['password']] );
		}
		else
		{
			$data['login_id'] = $session_data['login_id'];
			$Employee->insert( $data );
		}
		
	}
	public function profile()
	{
		$this->load->model('Employee');
		$employee = new Employee();
		$session_data = $this->session->userdata();
		$data['user_info'] = $employee->pull_multiple_tables( $session_data['login_id'] ); 
		$this->load->view('employee/profile.php', $data);
	}
}

?>