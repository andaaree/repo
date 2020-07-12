<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$valid = $this->form_validation;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$valid->set_rules('username','Username','required');
		$valid->set_rules('password','Password','required');
		$data['cat'] = $this->m_login->getAllCategory();
		$data['title'] = "Login - Freuz Mart";
		$data['username'] = $this->session->userdata('username');
		if ($valid->run() == FALSE) {
			$data['errors'] = $this->session->set_flashdata('<p> Anda belum mendaftar', '</p>');
		}else {
			$data['role'] = $this->session->userdata('role');
			$this->splogin->login($username,$password);
		}
		$this->load->view('homepage/template/home_header', $data);
        $this->load->view('homepage/template/home_topbar', $data);
		$this->load->view('homepage/template/home_menu');
		$this->load->view('index',$data);
        $this->load->view('homepage/template/home_footer',$data);
	}
	// public function admin()
	// {
	// 	$valid = $this->form_validation;
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');
	// 	$valid->set_rules('username','Username','required');
	// 	$valid->set_rules('password','Password','required');

	// 	if($valid->run()) {
	// 		$this->splogin->loginadmin($username,$password);
	// 	}
		
	// 	//End fungsi login
	// 	$this->load->view('loginv');
	// }
	function logout()
	{ $this->splogin->logout();
	}
}
