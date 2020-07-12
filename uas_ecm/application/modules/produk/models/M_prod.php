<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_prod extends CI_Model {

    public function getAllCategory()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by('category_id', 'asc');
        $qry=$this->db->get();
        return $qry->result_array();
    }
    public function getTotalProductVendor()
    {
        $this->db->select('vendor_id,vendor_name, COUNT(product_name) as total');
        $this->db->from('products');
        $this->db->join('vendor', 'product_vendor=vendor_id');
        $this->db->group_by('vendor_name');
        $qry = $this->db->get();
        return $qry->result_array();
    }
}

/* End of file Model produk.php */

?>