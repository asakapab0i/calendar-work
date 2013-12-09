<?php

class events_model extends CI_Model 
{

	function getEvents($year, $month){
		$events = array();
		$date = $year.'-'.$month;

		$date2 = date('Y-m', strtotime($date));


		$query = $this->db->select('*')->from('mycal')->like('date_start', $date2); 

		$query = $query->get();
		$query2 = $query->result();
		if ($query->num_rows() > 0) {

			foreach ($query2 as $row) {
				$day = (int)date('j', strtotime($row->date_start));
				$events[$day] = $row->description;
			}

			return $events;

		}else{
			return False;
		}

	}

	

	function getEventList($date){

		$date = date('Y-m-d', strtotime($date));

		$this->db->select('*');
		$this->db->from('mycal');
		$this->db->like('date_start', $date);
		$query = $this->db->get();

		return $query->result();

	}

	function insertEvent($formdata){
		$this->db->insert('mycal', $formdata);
	}

	function updateEvent($formdata){
		$this->db->insert('mycal', $id);
	}

	function getuser($sess_user){

		$this->db->select('*')->from('users')->where('email', $sess_user);

		$query = $this->db->get();

		return $query->result();
	}

	function geteventUsers($sess_user){

		$this->db->select('*')->from('mycal')->where('email', $sess_user);

		$query = $this->db->get();

		return $query->result();
	}


function getRecentEvents($limit=8){

		$this->db->select('*');
		$this->db->from('mycal');
		$this->db->order_by('mycal.dateCreated', 'desc');
		$this->db->limit($limit);
		$query = $this->db->get();

		return $query->result();

	}
function getPost($id){
	$query = $this->db->where('id', $id)->get('mycal');
	return $query->result();
}
public function ajax_edit($id){

	$query = $this->db->where('id', $id)->get('mycal');
	return $query->result();
}
function getInfo($id){
	$query = $this->db->where('id', $id)->get('users');
	return $query->result();
	
}
function getAll($username){
			$query=$this->db->select('*')->from('users')->where('email', $username);

			$query = $this->db->get();

		return $query->result();
}

function changepassword_model($sess_user){

		$this->db->select('*')->from('mycal')->where('password', $sess_user);

		$query = $this->db->get();

		return $query->result();
	}
public function delete_post($id){
		$this->db->where('id',$id);
		
		$result= $this->db->delete('mycal');
		return $result;
	}

public function getallevents(){
	
		$q=$this->db->select('*')
			->from('mycal'); 
		//$this->db->limit($limit);
		//$this->db->order_by('id', 'DESC');//
		$ret['rows']= $q->get()->result();
		
		

		return $ret;

}

public function get_books_search($term,$limit=10){

	$q=$this->db->select('*')
    	->from('mycal')
    	->like('title', $term)
    	->or_like('description', $term)
   		->or_like('email', $term)
   		->or_like('date_start', $term);
   		$this->db->limit($limit);
			$ret['rows']= $q->get()->result();
    	
  		
		$q = $this->db->select('COUNT(*) as count', FALSE)
			->from('mycal');

		$tmp = $q->get()->result();
		
		$ret['total_rows'] = $tmp[0]->count;
		
	



  		$q = $this->db->select('COUNT(*) as count', FALSE)
			->from('mycal')
    		->like('title', $term)
    		->or_like('description', $term)
   			->or_like('email', $term);
   			//->or_like('price', $term);


		$tmp = $q->get()->result();
		
		$ret['num_rows'] = $tmp[0]->count;

    	return $ret;
	}


}