<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('user'); //load MODEL
		$this->load->model('mschedule'); //load MODEL
		$this->load->model('mlocation'); //load MODEL
		$this->load->model('mvehicle'); //load MODEL
		$this->load->helper('text'); //for content limiter
		$this->load->library('form_validation'); //load form validate rules
		$this->load->library('image_lib'); //load image library
		
		//mail config settings
		$this->load->library('email'); //load email library
		//$config['protocol'] = 'sendmail';
		//$config['mailpath'] = '/usr/sbin/sendmail';
		//$config['charset'] = 'iso-8859-1';
		//$config['wordwrap'] = TRUE;
		
		//$this->email->initialize($config);
    }
	
	public function index() {
		if($this->session->userdata('logged_in')==FALSE){ 
			redirect(base_url().'login/', 'location');
		}
		
		//check for update
		$get_id = $this->input->get('edit');
		if($get_id != ''){
			$gq = $this->mschedule->query_schedule_id($get_id);
			foreach($gq as $item){
				$data['e_id'] = $item->id;
				$data['e_user_id'] = $item->user_id;
				$data['e_vehicle_id'] = $item->vehicle_id;
				$data['e_source_id'] = $item->source_id;
				$data['e_destination_id'] = $item->destination_id;	
				$data['e_day'] = $item->day;
				$data['e_depart_time'] = $item->depart_time;
				$data['e_duration'] = $item->duration;
				$data['e_arrive_time'] = $item->arrive_time;
				$data['e_status'] = $item->status;
			}
		}
		
		//check record delete
		$del_id = $this->input->get('del');
		if($del_id != ''){
			if($this->mschedule->delete_schedule($del_id) > 0){
				$data['err_msg'] = '<div class="alert alert-info"><h5>Deleted</h5></div>';
			} else {
				$data['err_msg'] = '<div class="alert alert-info"><h5>There is problem this time. Try later</h5></div>';
			}
		}
		
		//check if ready for post
		if($_POST){
			$sch_id = $_POST['sch_id'];
			$user_id = $_POST['user_id'];
			$vehicle_id = $_POST['vehicle_id'];
			$source_id = $_POST['source_id'];
			$destination_id = $_POST['destination_id'];
			$day = $_POST['day'];
			$depart_time = $_POST['depart_time'];
			$duration = $_POST['duration'];
			$timestamp = strtotime($depart_time) + ($duration*60*60);
			$arrive_time = date('H:i', $timestamp);
			
			//check for update
			if($sch_id != ''){
				$upd_data = array(
					'user_id' => $user_id,
					'vehicle_id' => $vehicle_id,
					'source_id' => $source_id,
					'destination_id' => $destination_id,
					'day' => $day,
					'depart_time' => $depart_time,
					'duration' => $duration,
					'arrive_time' => $arrive_time
				);
				
				if($this->mschedule->update_schedule($sch_id, $upd_data) > 0){
					$data['err_msg'] = '<div class="alert alert-info"><h5>Successfully</h5></div>';
				} else {
					$data['err_msg'] = '<div class="alert alert-info"><h5>No Changes Made</h5></div>';
				}
			} else {
				$reg_data = array(
					'user_id' => $user_id,
					'vehicle_id' => $vehicle_id,
					'source_id' => $source_id,
					'destination_id' => $destination_id,
					'day' => $day,
					'depart_time' => $depart_time,
					'duration' => $duration,
					'arrive_time' => $arrive_time,
					'arrive' => 0,
					'status' => 0
				);
				
				if($this->mschedule->reg_insert($reg_data) > 0){
					$data['err_msg'] = '<div class="alert alert-info"><h5>Successfully</h5></div>';
				} else {
					$data['err_msg'] = '<div class="alert alert-info"><h5>There is problem this time. Try later</h5></div>';
				}
			}
		}
		
		//query uploads
		$log_id = $this->session->userdata('log_user_id');
		if($this->session->userdata('itc_user_role') == 'Admin'){
			$data['allup'] = $this->mschedule->query_schedule();
		} else {
			$data['allup'] = $this->mschedule->query_schedule_user($log_id);
		}
		
		$data['allveh'] = $this->mvehicle->query_vehicle();
		$data['allloc'] = $this->mlocation->query_location();
		$data['alluser'] = $this->user->query_user();
		
		$data['log_username'] = $this->session->userdata('log_username');
	  
	  	$data['title'] = 'Schedule | ABC';
		$data['page_act'] = 'schedule';

	  	$this->load->view('designs/header', $data);
		$this->load->view('designs/leftmenu', $data);
	  	$this->load->view('schedule', $data);
	  	$this->load->view('designs/footer', $data);
	}
	
	public function track() {
		$log_id = $this->session->userdata('log_user_id');
		$track_id = $this->input->get('id');
		$track_arrive = $this->input->get('arrive');
		
		if($track_id){
			//update track
			$now = date('j M Y H:ma');
			
			$upd_data = array(
				'status' => 1,
				'reg_date' => $now
			);
			
			if($this->mschedule->update_schedule($track_id, $upd_data) > 0){
			}
			
			redirect(base_url('schedule/'), 'refresh');
		}
		
		if($track_arrive){
			//update track
			$now = date('j M Y H:ma');
			
			$upd_data = array(
				'arrive' => 1,
				'arrive_date' => $now
			);
			
			if($this->mschedule->update_schedule($track_arrive, $upd_data) > 0){
			}
			
			redirect(base_url('schedule/'), 'refresh');
		}	
	}
}