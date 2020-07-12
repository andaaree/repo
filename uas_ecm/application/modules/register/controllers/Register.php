<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_account'); //call model
    }

    public function index(){
        $dariDB = $this->m_account->cekuid();
        $nourut = substr($dariDB, 4, 4);
        $uidSekarang = $nourut + 1;
        $data['users_id'] = $uidSekarang;
        $data['username'] = "";
        $data['title'] = "Register - Freuz Mart";
        $data['cat'] = $this->m_account->getAllCategory();
        $this->form_validation->set_rules('username', 'USERNAME','required');
        $this->form_validation->set_rules('email','EMAIL','required|valid_email');
        $this->form_validation->set_rules('password','PASSWORD','required');
        $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');
        
        if($this->form_validation->run() == FALSE) {
            $this->load->view('homepage/template/home_header', $data);
            $this->load->view('homepage/template/home_topbar', $data);
            $this->load->view('homepage/template/home_menu');
            $this->load->view('registerv',$data);
            $this->load->view('homepage/template/home_footer',$data);
        }else{
           $this->regis();
        }
    }

    public function verif()
    {
            $data['username'] = $this->session->userdata('username');
            $data['title'] = "Email Verification - Freuz Mart";
            $userID = $this->session->userdata('id');
            $data['cat'] = $this->m_account->getAllCategory();
            $key = $this->input->post('key');
            $done = $this->input->post('submit');
            $this->form_validation->set_rules('key', 'Token','required');
            if ($this->form_validation->run() == FALSE) {


                $this->load->view('homepage/template/home_header', $data);
                $this->load->view('homepage/template/home_topbar', $data);
                $this->load->view('homepage/template/home_menu');
                $this->load->view('verif',$data);
                $this->load->view('homepage/template/home_footer',$data);
            }else {
                $hasil = $this->m_account->verifToken($key);
                foreach ($hasil as $h) {
                    $token = $h['token'];
                }
                if ($token == $key) {
                    $stat =[
                        'status' => 'active'
                    ];
                    $this->m_account->updateStat($userID,$stat);
                    $this->session->unset_userdata('username');
                    $update = $this->m_account->updateStat($userID,$stat);
                    if ($update === true) {
                        $this->m_account->delTk($key);
                    }
                    redirect(base_url('login'));
                    
                }else {
                $this->session->set_flashdata('sukses', 'Token key tidak valid, silahkan coba lagi');
                $this->load->view('homepage/template/home_header', $data);
                $this->load->view('homepage/template/home_topbar', $data);
                $this->load->view('homepage/template/home_menu');
                $this->load->view('verif',$data);
                $this->load->view('homepage/template/home_footer',$data);
                }
            }
    }

    public function deleteAkun($user)
    {
        $stat = [
            'status' => 'disabled'
        ];
        $this->db->update('users', $stat);
        $this->db->where('users.username', $user);
    }
    
    public function resend()
    {
        $data['username'] = $this->session->userdata('username');
        $key = rand(1000,5000);
        $email = $this->m_account->cekmail($data['username']);
        foreach ($email as $e) {
            $usermail = $e;
        }
        $kirim = $this->m_account->sendMail($key,$usermail);

        if ($kirim === true){
            redirect(base_url('register/verif'));
        }
    }
    private function regis()
    {
            $cfg['users_id'] = $this->input->post('usid');
            $cfg['email'] = $this->input->post('email');
            $cfg['username'] = $this->input->post('username');
            $cfg['password'] = md5($this->input->post('password'));
            $cfg['role'] = "1";
            $cfg['status'] = "inactive";
            $data['title'] = "Register - F-MART";
            $data['username'] = "";

            $temp['token'] = $this->input->post('token');
            $temp['users_id'] = $this->input->post('usid');

            $usermail = $this->input->post('email');
            $kunci = $this->input->post('token');
            $data['cat'] = $this->m_account->getAllCategory();
            $data['exist'] = $this->m_account->getAllUsers();

            foreach ($data['exist'] as $e) {
            if ($e['username'] == $cfg['username']) {
                $this->session->set_flashdata('sukses', 'Username Already Exist! Please use another name');
                redirect(base_url('register'));
            }elseif ($e['email'] == $cfg['email']) {
                $this->session->set_flashdata('sukses', 'Email Already Exist! Please use another email');
                redirect(base_url('register'));
            }
            }
                $this->session->set_userdata('username', $cfg['username']);
                $this->m_account->daftar($cfg);
                $this->m_account->sendMail($kunci,$usermail);

                $mailsukses = $this->m_account->sendMail($kunci,$usermail);
                
                if ($mailsukses === true) {
                    
                    $this->m_account->token($temp);

                    $pesan['message'] = "Pendaftaran berhasil, Silahkan aktivasi email melalui link dibawah ini :";
                    $this->load->view('homepage/template/home_header', $data);
                    $this->load->view('homepage/template/home_topbar', $data);
                    $this->load->view('homepage/template/home_menu');
                    $this->load->view('suksesv',$pesan);
                    $this->load->view('homepage/template/home_footer',$data);
                }
                else {
                    $data['title'] = "Email Verification - Freuz Mart";
                    $data['username'] = "";
                    $data['cat'] = $this->m_account->getAllCategory();
                    $pesan['message'] = $this->email->print_debugger();
                    $this->load->view('homepage/template/home_header', $data);
                    $this->load->view('homepage/template/home_topbar', $data);
                    $this->load->view('homepage/template/home_menu');
                    $this->load->view('suksesv',$pesan);
                    $this->load->view('homepage/template/home_footer',$data);
                    die;
                }
    }
}
?>