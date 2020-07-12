<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model {

public function getAllCategory()
{
    $this->db->select('*');
    $this->db->from('category');
    $this->db->order_by('category_id', 'asc');
    $qry=$this->db->get();
    return $qry->result_array();
}
public function getCartId($id)
{
    $this->db->where('cart_id', $id);
    $result = $this->db->get('cart');
    if ($result->num_rows() > 0) {
        return $result;
    }else {
        return array();
    }
    
}

public function showcart()
{
    $this->db->select('*');
    $this->db->join('products', 'cart.product_id = products.product_id');
    $result = $this->db->get('cart');
    return $result->result_array();
}

}

/* End of file M_cart.php */

?>