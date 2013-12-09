<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


public function index()
{
 
  $this->load->view('login/login_view');
}

public function login_validation(){

			
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('email','email',
			'required|trim|xss_clean|callback_validate_credentials');
			$this->form_validation->set_rules('password','Password','required|md5|trim');

			if($this->form_validation->run()){
				$data = array (
						
						'email' => $this->input->post('email'),
						'password' => md5($this->input->post("password")),
						
						
						'logged_in' => true
					);
				// helper libraries(is_logged_in)//
				$this->session->set_userdata('logged_in',$data);
				
				//once login check for admin or user//
				
				$this->load->model('user_model');
				if($this->user_model->check_super_admin($email,$password)){

				//redirects to admin page
					
					redirect('admin');

				}else{

				// redirects to regular page
					redirect('main');
				}





			}else{
				$this->load->view('login/login_view');
			}
		}

		//check the user ? pass : error//
		public function validate_credentials(){
			$this->load->model('user_model');
			
			if($this->user_model->can_log_in()){
			return true;
			}else{
				$this->form_validation->set_message('validate_credentials', 'Incorrect
				email or password.');	
			
				return false;	
			}
		}	

	public function logout(){
	$this->session->sess_destroy();
	redirect('login/index');
	}




}
