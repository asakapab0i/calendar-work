<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	
	public function index($year=null, $month = null){
	
	$this->load->helper('date');
	if($year == NULL && $month == NULL){

		//get current date month and year
		$year = date('Y');
		$month = date('m');

		//create a string for redirect and execute redirect function
		$link = 'admin/index/'.$year.'/'.$month;
		redirect($link);

	}

	//debug
	//echo $year;

	//get all the events
	$this->load->model('admin_model');
	$events = $this->admin_model->getEvents($year, $month);
	$data['recent'] = $this->admin_model->getRecentEvents();

	$sess = $this->session->userdata('logged_in');

	$sess_user = $sess['email'];

	 $data['user_info'] = $this->admin_model->getuser($sess_user);
	 //$data['user_events'] = $this->events_model->geteventUsers($sess_user);
	//$admindata = $this->events_model->getAdmin($sess_user);
	
	//var_dump($data);
	$prefs = array (
               'show_next_prev'  => TRUE,
               'next_prev_url'   => base_url() . 'admin/index'
       );
  	$prefs['template'] = '

   {table_open}<table class="table table-bordered" border="" cellpadding="" cellspacing="0">{/table_open}
			{heading_row_start}<tr>{/heading_row_start}
			{heading_previous_cell}<th><a class="btn" href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="{colspan}"><center></h1>{heading}</h1></center></th>{/heading_title_cell}
			{heading_next_cell}<th><a class="btn pull-right" href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
			{heading_row_end}</tr>{/heading_row_end}
			{week_row_start}<tr>{/week_row_start}
			{week_day_cell}<td>{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}
			{cal_row_start}<tr>{/cal_row_start}
			{cal_cell_start}<td>{/cal_cell_start}
			{cal_cell_content} <a data-id="'.$year. '-' . $month . '-{day}'.'"  class="btn btn-success btn-expand event-calendar" href="{content}">{day}</a>{/cal_cell_content}
			{cal_cell_content_today} <a data-id="'.$year. '-' . $month . '-{day}'.'"  class="btn btn-success btn-expand event-calendar" href="{content}">{day}</a>{/cal_cell_content_today}
			{cal_cell_no_content}{day}{/cal_cell_no_content}
			{cal_cell_no_content_today}<div class="btn btn-info btn-expand">{day}</div>{/cal_cell_no_content_today}
			{cal_cell_blank}&nbsp;{/cal_cell_blank}
			{cal_cell_end}</td>{/cal_cell_end}
			{cal_row_end}</tr>{/cal_row_end}
			{table_close}</table>{/table_close}
';

$this->load->library('calendar',$prefs);
$data['result'] = $this->calendar->generate($year,$month, $events);
$this->load->view('admin/admin_header_view',$data);
$this->load->view('admin/admin_calendar_view',$data);

}





	public function profile(){
	$this->load->model('admin_model');
	$sess = $this->session->userdata('logged_in');
	$sess_user = $sess['email'];
	$data['user_events'] = $this->admin_model->geteventUsers($sess_user);

	$data['user_info'] = $this->admin_model->getuser($sess_user);
	$this->load->view('admin/admin_header_view',$data);
	$this->load->view('admin/admin_profile_view',$data);
	}

	

public function addEvent(){
 	
 	$title =  $this->input->post('event-title');
 	$start =  $this->input->post('event-start');
 	$starttime =  $this->input->post('event-start-time');
 	$end =  $this->input->post('event-end');
 	$endtime =  $this->input->post('event-end-time');
 	$desc =  $this->input->post('event-description');


 	$sess = $this->session->userdata('logged_in');
 	$username = $sess['email'];
 	//$data['user_info'] = $this->events_model->getuser1($sess);
 	//$pic = $sess['image'];
 	//var_dump($data);

 	$datestart = date('Y-m-d', strtotime($start)) . ' ' .date('H:i:s', strtotime($starttime));
 	$dateend = date('Y-m-d', strtotime($end)) . ' ' .date('H:i:s', strtotime($endtime)); 


 	$formdata = array('email' => $username,
 						//'image' => $pic,
 						'date_start' => $datestart,
 						'date_end' => $dateend,
 						'title' => $title,
 						'description' => $desc );



 	$this->load->model('events_model');
    $eventdata = $this->events_model->insertEvent($formdata);



  redirect('admin/profile');
}


public function delete_events($id){
	$this->load->model('admin_model');
	$this->admin_model->delete_post($id);
	redirect('admin/profile');
}


public function viewEvent(){
      $date = $this->input->post('date');

      $this->load->model('events_model');
      $eventdata = $this->events_model->getEventList($date);

      echo '<table class="table">
		<thead>
			<tr>
				<th>Start Time</th>
				<th>End Time</th>
				<th>User</th>
				<th>Event Title</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>';



			foreach ($eventdata as $row) {
				echo '<tr><td>'.date('H:i:s', strtotime($row->date_start)).'</td>
				<td>'.date('H:i:s', strtotime($row->date_end)).'</td>
				<td>'.$row->email.'</td>
				<td>'.$row->title.'</td>
				<td><a class="btn btn-default" href="'. base_url().'main/view_post/'.$row->id.'">Visit Page</a></td></tr>';
			}

		echo '</tbody>

	</table>';

    }

public function edit_events($id){
	
	$title =  $this->input->post('event-title');
 	$start =  $this->input->post('event-start');
 	$starttime =  $this->input->post('event-start-time');
 	$end =  $this->input->post('event-end');
 	$endtime =  $this->input->post('event-end-time');
 	$desc =  $this->input->post('event-description');
 	$email =  $this->input->post('email');

 	


 	$datestart = date('Y-m-d', strtotime($start)) . ' ' .date('H:i:s', strtotime($starttime));
 	$dateend = date('Y-m-d', strtotime($end)) . ' ' .date('H:i:s', strtotime($endtime)); 


 	$formdata = array('email' => $email,
 						'date_start' => $datestart,
 						'date_end' => $dateend,
 						'title' => $title,
 						'description' => $desc );

	$this->db->where('id',$id);
	$this->db->update('mycal',$formdata);



    redirect('admin/profile');	
}

public function view_events($id){
		$myid = $this->input->post('myid');
		$this->load->model('events_model');
		$data['myid'] = $myid;
		$data['results'] = $this->events_model->ajax_edit($id);
		$this->load->view('admin/ajax_edit_view', $data);
}

public function display_allevents(){
	
	$this->load->library('pagination');
		$config['base_url']="http://localhost/calendar/admin/display_allevents";
		$config['use_page_numbers'] = False;
		$config['per_page']=2;
		//$config['num_links']=5;
		$config['total_rows']=$this->db->get('mycal')->num_rows();

		$this->pagination->initialize($config);
		$data['query']=$this->db->get('mycal',$config['per_page'],$this->uri->segment(3));

			
	$this->load->model('admin_model');
	$sess = $this->session->userdata('logged_in');
	$sess_user = $sess['email'];
	
	$results= $this->admin_model->getallevents();
	$data['results'] = $results['rows'];

	$data['user_info'] = $this->admin_model->getuser($sess_user);
	$this->load->view('admin/admin_header_view',$data);
	$this->load->view('admin/admin_displayEvents_view',$data);
}
public function admin_search_result(){

		$term = $this->input->post('term');
		$this->load->model('admin_model');
	
		$results= $this->admin_model->get_books_search($term);
		
		$data['result']=$results['rows'];
		$data['num_total']=$results['total_rows'];
		$data['num_results'] = $results['num_rows'];
		
		$this->load->view('admin/header_view');
		$this->load->view('admin/search_result_view',$data);
	
	}



public function search_view_events($id){
		$myid = $this->input->post('myid');
		$this->load->model('events_model');
		$data['myid'] = $myid;
		$data['results'] = $this->events_model->ajax_edit($id);
		$this->load->view('admin/ajax_search_edit_view', $data);
}


public function manage(){
	$this->load->model('admin_model');
	$sess = $this->session->userdata('logged_in');
	$sess_user = $sess['email'];
	$data['all_users'] = $this->admin_model->getallusers();

	$data['user_info'] = $this->admin_model->getuser($sess_user);
	$this->load->view('admin/admin_header_view',$data);
	$this->load->view('admin/manage_view',$data);

}



public function adduser(){

 	$this->load->library('form_validation');
 	$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required|is_unique[users.email]');
  	 $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[16]');
	$this->form_validation->set_rules('cpassword', 'comfirmpassword', 'trim|required|matches[password]');
  
	$this->form_validation->set_message('is_unique',"The email is already taken");

   if ($this->form_validation->run() == FALSE) {
    
  echo validation_errors();

   } else {
 	
	
 		$data = array(
			
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'image' => 'default-profile-picture.png',
			'type' => 'user',
		);
		
	
	
	$this->load->model('admin_model');
    $result = $this->admin_model->reg($data);
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    			window.alert('add success')
   				 window.location.href='http://localhost/calendar/admin/manage';
   				 </SCRIPT>");
			
				return false;	
   }  
	
}



public function delete_user($id){
	$this->load->model('admin_model');
	$this->admin_model->delete_user($id);
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    			window.alert('successfully delete')
   				 window.location.href='http://localhost/calendar/admin/manage';
   				 </SCRIPT>");
			
				return false;	
}

public function edit_user($id){
	$myid = $this->input->post('myid');
	$this->load->model('admin_model');
	$data['myid'] = $myid;
	$data['user_id'] = $this->admin_model->ajax_edit_user($id);
	$this->load->view('admin/ajax_edit_user_view', $data);	
}



public function update_user($id){
	
	$email =  $this->input->post('email');
 	//$password =  $this->input->post('password');
 	$type =  $this->input->post('type');

 	
 	$formdata = array('email' => $email,
 					//'password' => md5($this->input->post('password')),
 					'type' => $type,
 					);	

	$this->db->where('id',$id);
	$this->db->update('users',$formdata);
	redirect('admin/manage');
}








}

