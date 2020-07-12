<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
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

/* End of file M_login.php */

?>