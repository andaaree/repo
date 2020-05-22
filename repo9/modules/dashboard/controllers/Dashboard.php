<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->splogin->check();
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{	
		$data['title'] = "Dashboard - Admin";
        $data['username'] = $this->session->userdata('username');
		$this->load->view('template/home_header', $data);
		$this->load->view('template/home_topbar', $data);
		$this->load->view('template/home_sidebar',$data);
		$this->load->view('dashboardv');
		$this->load->view('template/home_footer');
	}
	
}
?>