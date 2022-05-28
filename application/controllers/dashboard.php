<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('user'); //load MODEL
		$this->load->model('mvehicle'); //load MODEL
		$this->load->model('mlocation'); //load MODEL
		$this->load->model('mschedule'); //load MODEL
		$this->load->library('form_validation'); //load form validate rules
		
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
		
		$data['title'] = 'Dashboard | ABC';
		$data['page_act'] = 'dashboard';

	  	$this->load->view('designs/header', $data);
		$this->load->view('designs/leftmenu', $data);
	  	$this->load->view('dashboard', $data);
	  	$this->load->view('designs/footer', $data);
	}
}