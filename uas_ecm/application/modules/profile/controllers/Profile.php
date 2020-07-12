<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->splogin->check();
    }
    public function index()
    {
        $data['title'] = "Profile";
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('dashboard/template/home_sidebar',$data);
		$this->load->view('profilev',$data);
		$this->load->view('dashboard/template/home_footer');
    }
}
?>