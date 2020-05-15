<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_account extends CI_Model{
    function daftar($cfg){
        $this->db->insert('users', $cfg);
    }
    function getAllUsers()
    {
        $this->db->select('*');
        $this->db->from('users');
        $qry = $this->db->get();
        return $qry->result_array();
    }
    function verifToken($key)
    {
        $this->db->select('token');
        $this->db->from('token');
        $this->db->where('token', $key);
        $qry = $this->db->get();
        return $qry->result_array();
    }
    function delTk($key)
    {
        $this->db->delete('token');
        $this->db->where('token', $key);
    }
    function token($temp)
    {
        $this->db->insert('token', $temp);
        
    }
    function updateStat($user,$data)
    {
        $this->db->update('users', $data);
        $this->db->where('users.users_id', $user);
    }

    function sendMail($kunci,$usermail)
    {
        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'yaelah001@gmail.com',
            'smtp_pass' => 'yaelahgitu',
            'smtp_port' => '465',
            'newline' => "\r\n"
            ];
    
            $msg = "
            Please verify your email
            <br><br>
            Please input this number <b>".$kunci."</b> to the verification page.
            <br><br>
            Thanks,<br>
            F-MART Administrator.
            ";
        
            $this->load->library('email',$config);
            $this->email->from($config['smtp_user'], 'Admin F-MART');
            $this->email->to($usermail);
            
            $this->email->subject('Email Verification');
            $this->email->message($msg);
            $this->email->send();
    }

    function cekuid()
    {
        $query = $this->db->query("SELECT MAX(users_id) as usid FROM users WHERE users_id LIKE 'U%'");
        $hasil = $query->row();
        return $hasil->usid;
    }
    public function getAllCategory()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by('category_id', 'asc');
        $qry=$this->db->get();
        return $qry->result_array();
    }
}
?>