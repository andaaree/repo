<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Splogin{
    var $CI = NULL;
    /**
     * Class constructor
     * @return void
     */
    public function __construct(){
        $this->CI =& get_instance();
    }
    /**
     * cek username dan password pada table users, jika ada set session berdasar data user daritable users.
    * @param string username dari input form
    * @param string password dari input form
    */
    
    public function login($username,$password)
    {
        $query = $this->CI->db->get_where('users',array('username'=>$username,'password' => md5($password)));
        if($query->num_rows() == 1) {
            $row = $this->CI->db->query('SELECT users_id,role,status FROM users where username = "'.$username.'"');
            $rl = $row->row();
            $id = $rl->users_id;
            $level = $rl->role;
            $stat = $rl->status;
            if($stat == "active"){
                if ($level == 0) {
                //set session user 
                $this->CI->session->set_userdata('id', $id);
                $this->CI->session->set_userdata('username', $username);
                $this->CI->session->set_userdata('id_login', uniqid(rand()));
                $this->CI->session->set_userdata('role',$level);
                //redirect ke halaman dashboard 
                redirect(base_url('dashboard'));
                }
                elseif ($level !=0 && $level == 1) {
                //set session user 
                $this->CI->session->set_userdata('id', $id);
                $this->CI->session->set_userdata('username', $username);
                $this->CI->session->set_userdata('id_login', uniqid(rand()));
                $this->CI->session->set_userdata('role',$level);
                //redirect ke halaman awal 
                redirect(base_url('homepage'));
                }
                else{
                    $this->CI->session->set_flashdata('sukses','Account anda belum terdaftar.. ');
                    //redirect ke halaman login
                    redirect(base_url('login'));
                }
            }elseif ($stat == "disabled") {
                $this->CI->session->set_flashdata('sukses', 'Account Anda sudah nonaktif');
                redirect(base_url('login'));
            }elseif  ($stat == "inactive") {
                $this->CI->session->set_flashdata('sukses', 'Account Anda belum terverifikasi');
                redirect(base_url('register/verif'));
            }else {
                $this->CI->session->set_flashdata('sukses', 'Account anda belum terdaftar');
                redirect(base_url('login'));
            }
        }else {
            $this->CI->session->set_flashdata('sukses','Username atau password anda salah.. ');
            //redirect ke halaman login
            redirect(base_url('login'));
        }
            return false;
    }
    // public function loginadmin($username, $password) {
    //     //cek username dan password
    //     if ($this->CI->session->userdata('username') == null) {
           
        
    //     $query = $this->CI->db->get_where('users',array('username'=>$username,'password' => md5($password)));
    //     if($query->num_rows() == 1) {
    //         //ambil data user berdasar username 
    //         $row = $this->CI->db->query('SELECT users_id,role FROM users where username = "'.$username.'"');
    //         $admin = $row->row();
    //         $id = $admin->users_id;
    //         $level = $admin->role;
            
    //         if ($level != 0) {
    //         $this->CI->session->set_flashdata('sukses','Anda tidak mempunyai hak akses..');
    //         //redirect ke halaman login
    //         redirect(base_url('login/admin'));
    //         }
    //         else{
    //         //set session user 
    //         $this->CI->session->set_userdata('id', $id);
    //         $this->CI->session->set_userdata('username', $username);
    //         $this->CI->session->set_userdata('id_login', uniqid(rand()));
    //         $this->CI->session->set_userdata('role',$level);
        
    //         //redirect ke halaman dashboard 
    //         redirect(base_url('dashboard'));    
    //         }
    //     }
    //         else{
    //         //jika tidak ada, set notifikasi dalam flashdata.
            
    //         $this->CI->session->set_flashdata('sukses','Username atau password anda salah, silakan coba lagi.. ');
    //         //redirect ke halaman login
    //         redirect(base_url('login/admin'));
    //     }
    //         return false;
    //     }else {
            
    //         redirect(base_url('dashboard'));
            
    //     }
    // }
    public function check()
    {
        if ($this->CI->session->userdata('username') == (null || '') ) {
            $this->CI->session->set_flashdata('sukses', 'Anda belum login');
            redirect(base_url('login'));
        }elseif (($this->CI->session->userdata('role') != 0) || ($this->CI->session->userdata('role') != 2)) {
            $this->CI->session->set_flashdata('sukses', 'Access Denied');
            redirect(base_url('homepage/e404'));
        }
    }
    //Clearing SESSION
    public function logout(){
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('id_login');
        $this->CI->session->unset_userdata('id');
        $this->CI->session->unset_userdata('role');
        // $this->CI->session->set_flashdata('sukses','You are successfully logged out');
        //REDIRECTING to login page
        redirect(base_url(''));
    }
}
?>