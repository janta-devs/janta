<?php
class Employers extends CI_Controller
{
	function __construct()
	{
		parent::__construct('employers');
	}
	function index()
	{
		$data['controller_name']=strtolower($this->uri->segment(1));
		$this->load->view('employer/profile');
	}
	public function registration()
	{
		$this->load->view('employer/registration');
	}
	/*Returns employers table data rows; this will be invoked by AJAX*/
	function search()
	{
		$search=$this->input->post('search');
		$data_rows=get_employer_manage_table_data_rows($this->Employer->search($search),$this);
		echo $data_rows;
	}
	//this funciton will offer search suggestions based on what a user is searching for
	function suggest()
	{
		$suggestions = $this->Employer->get_search_suggestions($this->input->post('q'), $this->input->post('limit'));
		echo implode("\n", $suggestions);
	}
	/*this funcition intended to load the employer profile edit form*/
	function profile_edit($employer_id=-1)
	{
		$data['user_info']=$this->Employer->get_info($employer_id);
		$this->load->view("employer/registration", $data);
	}
	//inserts or updates employer information
	function save($employer_id = -1)
	{
		$employer_data = array (
			'employer_type'=>$this->input->post('employer_type'),
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'company_name'=>$this->input->post('company_name'),
			'id_passport'=>$this->input->post('id_passport'),
			'email'=>$this->input->post('email'),			
			'phone_number'=>$this->input->post('phone_number'),
			'address1'=>$this->input->post('address1'),
			'address2'=>$this->input->post('address2'),
			'country'=>$this->input->post('country'),
			'county'=>$this->input->post('county'),
			'city'=>$this->input->post('city'),
			'suburb'=>$this->input->post('suburb'),
			'image_id'=>$this->input->post('image_id')
			);
		if ($this->Employer->save($user_data,$employer_data,$employer_id))
		{
			//for new employer
			if($employer_id==-1)
			{
				echo json_encode(array('success'=>true, 'message'=>$this->lang->line('employer_successful_adding').''.
					$employer_data['company_name'], 'login_id'=>$employer_data['login_id']));
			}
		}
	}
}
?>