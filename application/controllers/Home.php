<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
	public $status;
	public $roles;
	function __construct(){
		parent::__construct();
		$this->load->model('User_login', 'user_login', TRUE);
		$this->form_validation->set_error_delimiters('<div class="error">', '<div>');
		$this->status = $this->config->item('status');
		$this->roles  = $this->config->item('role');
	}
	public function index()
	{
		if(empty($this->session->userdata['email'])){
			redirect(site_url().'/home/login');
		}	
		/*homepage*/
		$data = $this->session->userdata;
		$this->load->view('employee/home', $data);
	}

	public function register()
	{
		/*Validating requested input for registration step 1*/
		$this->form_validation->set_rules('email_add', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('industry', 'Industry', 'required');
		$this->form_validation->set_rules('specialization', 'Specialization', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('employee/home');
		} else {
			if($this->user_login->isDuplicate($this->input->post('email_add'))){
				$this->session->set_flashdata('flash_message', 'User email already exists');
				redirect(site_url().'/home/login');
			}else{
				$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
				$id = $this->user_login->insertUser($clean);
				$token = $this->user_login->insertToken($id);

				$qstring = $this->base64url_encode($token);

				$url = site_url() . '/home/complete/token/' . $qstring;
				$link = '<a href="' . $url .'">' . $url . '</a>';

				$message = '';
				$message .= '<strong>You have successfully signed up with janta</strong><br>';
				$message .= '<strong>Please follow this link to complete registration:</strong> <br>' . $link;
				echo $message; //send this via email
				exit;
			};
		}
	}

	protected function _islocal(){
		return strpos($_SERVER['HTTP_POST'], 'local');
	}
	public function complete()
	{
		$token = base64_decode($this->uri->segment(4));
		$cleanToken = $this->security->xss_clean($token);

		$user_info = $this->user_login->isTokenValid($cleanToken); //either false or an array();

		if(!$user_info){
			$this->session->set_flashdata('flash_message', 'Token is invalid or expired');
			redirect(site_url().'/home/login');
		}
		$data = array(
			//'industry'=>$user_info->industry,
			//'specialization'=>$user_info->specialization,
			'email'=>$user_info->email,
			'login_id'=>$user_info->login_id,
			'token'=>$this->base64url_encode($token)
			);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password');

		if($this->form_validation->run() == FALSE){
			$this->load->view('employer/registration', $data);
		} else {
			$this->load->library('passwprd');
			$post = $this->input->post(NULL, TRUE);

			$cleanPost = $this->security->xss_clean($post);

			$hashed = $this->password->create_hash($cleanPost['password']);
			$cleanPost['password'] = $hashed;
			unset($cleanPost['passconf']);
			$userInfo = $this->user_login->updateUserInfo($cleanPost);

			if(!$userInfo){
				$this->session->set_flashdata('flash messgae', 'There was a problem updating your record');
				redirect(site_url(). '/home/login');
			}

			unset($userInfo->password);

			foreach($userInfo as $key=>$val){
				$this->session->set_userdata($key, $val);
			}
			redirect(site_url(). '/home/');
		}
	}
	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('employee/home');
		} else {
			$post = $this->input->post();
			$clean = $this->security->xss_clean($post);

			$userInfo = $this->user_login->checkLogin($clean);

			if(!$userInfo){
				$this->session->set_flashdata('flash_message', 'The login was unsuccessful');
				redirect(site_url(). '/home/login');
			}
			foreach($userInfo as $key=>$val){
				$this->session->set_userdata($key, $val);
			}
			redirect(site_url(). '/home/');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url().'/home/login/');
	}
	public function forgot()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if($this->form_validation->run() == FALSE){
			$this->load->view('forgot');
		} else {
			$email = $this->input->post('email');
			$clean = $this->security->xss_clean($email);
			$userInfo = $this->user_login->getUserInfoByEmail($clean);

			if(!$userInfo){
				$this->session->set_flashdata('flash_message', 'We can\'t find your email address');
				redirect(site_url().'/home/login');
			}

			if($userInfo->status != $this->status[1]){
				//if user status is not approved
				$this->session->set_flashdata('flash_message', 'Your account is not in approved status');
				redirect(site_url().'/home/login');
			}
			//build token
			$token = $this->user_login->insertToken($userInfo->login_id);
			$qstring = $this->base64url_encode($token);
			$url = site_url() . '/home/reset_password/token/' . $qstring;
			$link = '<a href="' . $url . '">' . $url . '</a>';

			$message = '';
			$message .= '<strong>A password reset has been requested for this email account</strong><br>';
			$message .= '<strong>Please click:</strong> ' . $link;

			echo $message; //send this via email
			exit;
		}
	}

	public function reset_password()
	{
		$token = $this->base64url_encode($this->uri->segment(4));

		$cleanToken = $this->security->xss_clean($token);

		$user_info = $this->user_login->isTokenValid($cleanToken); //either false or array();

		if($user_info){
			$this->session->set_flashdata('flash_message', 'Token is invalid of expired');
			redirect(site_url().'/home/login');
		}
		$data = array(
			'userName'=> $user_info->username,
			'email'=>$user_info->email,
			'token'=>$this->base64url_encode($token)
			);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Passwrod Confirmation', 'required|matches[password]');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('reset_password', $data);
		} else {

			$this->load->library('password');
			$post = $this->input->post(NULL, TRUE);
			$cleanPost = $this->security->xss_clean($post);

			$hashed = $this->password->create_hash($cleanPost['password']);
			$cleanPost['password'] = $hashed;
			$cleanPost['login_id'] = $user_info->login_id;
			unset($cleanPost['passconf']);
			if(!$this->user_login->updatePassword($cleanPost)){
				$this->session->set_flashdata('flash_message', 'There was a problem changing your password');
			} else {
				$this->session->set_flashdata('flash_message', 'Your password has been successfully changed. You may now login');
			}
			redirect(site_url().'/home/login');
		}
	}
    public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 
		public function base64url_decode($data)	{
			return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
		}

		/*}
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
		/
		// $old_data = ['username'=>'antony', 'password'=>'pass','re_password'=>'pass'];
		// $new_data = ['username'=>'Jadz', 'password'=>'ngayo','re_password'=>'ngayo'];	
		// $user_login->update( $old_data, $new_data );
	}

	public function delete(){
		$this->load->model('user_login');
		$user_login = new user_login();
		$data = ['username'=>'theantonymars@gmail.com'];
		$user_login->delete($data);
	}*/

}

?>
