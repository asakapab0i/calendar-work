<?php 

class admin_model extends CI_Model {

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


function getRecentEvents($limit=8){

		$this->db->select('*');
		$this->db->from('mycal');
		$this->db->order_by('mycal.dateCreated', 'desc');
		$this->db->limit($limit);
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


	public function getallusers(){

		$this->db->select('*')->from('users');

		$query = $this->db->get();

		return $query->result();
	}


public function reg($data){
	$this->db->insert('users', $data);
}

public function delete_user($id){
		$this->db->where('id',$id);
		
		$result= $this->db->delete('users');
		return $result;
	}

public function ajax_edit_user($id){

	$query = $this->db->where('id', $id)->get('users');
	return $query->result();
}

public function get_date_range($datestart, $dateend){

	
	$start = date('Y-m-d H:i:s', strtotime($datestart));
	$end = date('Y-m-d H:i:s', strtotime($dateend));


	$query = $this->db->query("SELECT *
FROM mycal
WHERE NOT (date_start > '$start'
           OR date_end < '$end')");

	if ($query->num_rows() == 0) {
		return TRUE;
	}else{
		return FALSE;
	}

}


}