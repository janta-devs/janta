<?php
class Employer extends CI_Controller
{
	function __construct()
	{
		parent::__construct('employers');
	}
	function index()
	{
		//$data['controller_name']=strtolower($this->uri->segment(1));
		$this->load->view('employer/profile')
	}
	
}
?>