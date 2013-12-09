<?php 

class User_model extends CI_Model {

//check in data users//
public function can_log_in(){
		
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5 ($this->input->post('password')));	
		$query=$this->db->get('users');
		
		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
			
		}	
	}


public function check_super_admin($email, $password){

	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('email', $email);
	$this->db->where('password', md5($password));	
	$this->db->where('type','admin');
	$query = $this->db->get();

	if($query->num_rows() == 1){
		return TRUE;
	}else{
		return FALSE;
	}
}





}