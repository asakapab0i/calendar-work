<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

//*************************************************************************************************//
							//Display the Calendar
//*************************************************************************************************//
	
public function index($year=null, $month = null){
	
	$this->load->helper('date');
	if($year == NULL && $month == NULL){

		//get current date month and year
		$year = date('Y');
		$month = date('m');

		//create a string for redirect and execute redirect function
		$link = 'main/index/'.$year.'/'.$month;
		redirect($link);

	}

	//debug
	//echo $year;

	//get all the events
	$this->load->model('events_model');
	$events = $this->events_model->getEvents($year, $month);
	$data['recent'] = $this->events_model->getRecentEvents();

	$sess = $this->session->userdata('logged_in');

	$sess_user = $sess['email'];

	 $data['user_info'] = $this->events_model->getuser($sess_user);
	 //$data['user_events'] = $this->events_model->geteventUsers($sess_user);
	//$admindata = $this->events_model->getAdmin($sess_user);
	
	//var_dump($data);
	$prefs = array (
               'show_next_prev'  => TRUE,
               'next_prev_url'   => base_url() . 'main/index'
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
$this->load->view('header_view',$data);
$this->load->view('calendar_view',$data);

}
//*************************************************************************************************//
							//Display the events
//*************************************************************************************************//

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
				echo '<tr><td>'.date('d/m/Y h:i A', strtotime($row->date_start)).'</td>
				<td>'.date('d/m/Y h:i A', strtotime($row->date_end)).'</td>
				<td>'.$row->email.'</td>
				<td>'.$row->title.'</td>
				<td><a class="btn btn-default" href="'. base_url().'main/view_post/'.$row->id.'">Visit Page</a></td></tr>';
			}

		echo '</tbody>

	</table>';

    }
//*************************************************************************************************//
							//Add events
//*************************************************************************************************//
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



  redirect('main/index');
}
//*************************************************************************************************//
							//View the post events by the users
//*************************************************************************************************//
public function myEvents(){
	$this->load->model('events_model');
	$sess = $this->session->userdata('logged_in');
	$sess_user = $sess['email'];
	$data['user_events'] = $this->events_model->geteventUsers($sess_user);
	$data['user_info'] = $this->events_model->getuser($sess_user);
	$this->load->view('header_view',$data);
	$this->load->view('myEvents_view',$data);
}

//*************************************************************************************************//
							//header only
//*************************************************************************************************//
public function header(){
	$this->load->model('events_model');
	$sess = $this->session->userdata('logged_in');
	$sess_user = $sess['email'];
	$data['user_info'] = $this->events_model->getuser($sess_user);
	$this->load->view('header_view',$data);
}
//*************************************************************************************************//
							//Profile
//*************************************************************************************************//
public function profile(){
	$date = $this->input->post('date');
	$this->load->model('events_model');
	
	$sess = $this->session->userdata('logged_in');
	$sess_user = $sess['email'];
	$data['user_info'] = $this->events_model->getuser($sess_user);
	$data['user_events'] = $this->events_model->geteventUsers($sess_user);

	$this->load->view('header_view',$data);
    $this->load->view('profile_view',$data);

}

//*************************************************************************************************//
							//Visit post
//*************************************************************************************************//
public function view_post($id){
  $this->load->model('events_model');
  $sess = $this->session->userdata('logged_in');
  $sess_user = $sess['email'];
  
  $data['user_info'] = $this->events_model->getuser($sess_user);
  $data['user_post'] = $this->events_model->getPost($id);

  $this->load->view('header_view',$data);
  $this->load->view('post_view',$data);
}



//*************************************************************************************************//
							//View Post events
//*************************************************************************************************//
public function view_events($id){
		$myid = $this->input->post('myid');
		$this->load->model('events_model');
		$data['myid'] = $myid;
		$data['results'] = $this->events_model->ajax_edit($id);
		$this->load->view('ajax_edit_view', $data);
}
//*************************************************************************************************//
							//View Post events
//*************************************************************************************************//
public function edit_events($id){
	
	$title =  $this->input->post('event-title');
 	$start =  $this->input->post('event-start');
 	$starttime =  $this->input->post('event-start-time');
 	$end =  $this->input->post('event-end');
 	$endtime =  $this->input->post('event-end-time');
 	$desc =  $this->input->post('event-description');


 	$sess = $this->session->userdata('logged_in');
 	$username = $sess['email'];


 	$datestart = date('Y-m-d', strtotime($start)) . ' ' .date('H:i:s', strtotime($starttime));
 	$dateend = date('Y-m-d', strtotime($end)) . ' ' .date('H:i:s', strtotime($endtime)); 


 	$formdata = array('email' => $username,
 						'date_start' => $datestart,
 						'date_end' => $dateend,
 						'title' => $title,
 						'description' => $desc );

	$this->db->where('id',$id);
	$this->db->update('mycal',$formdata);



    redirect('main/index');	
}
//*************************************************************************************************//
							// pic view
//*************************************************************************************************//
public function change_pic($id){
	$this->load->view('ajax_changepic_view');
}
//*************************************************************************************************//
							//change picture
//*************************************************************************************************//
public function change_image($id){
$image = $_FILES['userfile'];

	//$imgname = url_title($image['name']);
	//var_dump($image);
	//die();
	//upload file

	  $config['upload_path'] = './assets/images/user_pic/';
      $config['allowed_types'] = 'gif|jpg|png|doc|txt';
      $config['max_size']  = 1024 * 8;
      $config['encrypt_name'] = FALSE;
 
      $this->load->library('upload', $config);
 
      if (!$this->upload->do_upload())
      {
         echo 'oppsss error bad practice';

        
        
      }else{
      	
      	$uploaded = $this->upload->data();
      	     $data = array(
			
			
			'image' => $uploaded['file_name'],
			
		);
	
	
	$this->db->where('id',$id);
	$this->db->update('users',$data);
	//redirect to specific id//
	
	redirect('main/profile');
      	

      }



}



//*************************************************************************************************//
							//Delete Events create by the User
//*************************************************************************************************//
public function delete_events($id){
	$this->load->model('events_model');
	$this->events_model->delete_post($id);
	redirect('main/profile');
}

//*************************************************************************************************//
							//changepassword//
//*************************************************************************************************//
public function changepassword(){

  
  	
  	

	$this->load->library('form_validation');
 	$this->form_validation->set_rules('oldpassword', 'oldpassword', 'trim|required|xss_clean|callback_change');
	$this->form_validation->set_rules('newpassword', 'new password', 'trim|required|');
	$this->form_validation->set_rules('cpassword', 'comfirmpassword', 'trim|required|matches[newpassword]');
  


   if ($this->form_validation->run() == FALSE) {
    
  echo validation_errors();

   } else {
 	$data = array(
        
       	 'password' => md5($this->input->post("newpassword")),
      

        );
   
    $this->db->where('email', $sess_user);
	$this->db->update('users',$data);
	echo"successfully changed";
   }  
	
}


public function display_allevents(){
	$this->load->model('events_model');
	$sess = $this->session->userdata('logged_in');
	$sess_user = $sess['email'];
	
	$results= $this->events_model->getallevents();
	$data['results'] = $results['rows'];

	$data['user_info'] = $this->events_model->getuser($sess_user);
	$this->load->view('header_view',$data);
	$this->load->view('displayEvents_view',$data);
}


public function search_result(){

		$term = $this->input->post('term');
		$this->load->model('events_model');
	
		$results= $this->events_model->get_books_search($term);
		
		$data['result']=$results['rows'];
		$data['num_total']=$results['total_rows'];
		$data['num_results'] = $results['num_rows'];
			$this->load->view('admin/header_view');
		$this->load->view('search_result_view',$data);
	
	}

}