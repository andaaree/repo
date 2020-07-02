<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

public function __construct()
{
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
}

public function search($keywords)
{   
    $this->db->like('product_name',$keywords);
    $this->db->or_like('product_price', $keywords);
    $this->db->or_like('product_description', $keywords);
    $this->db->or_like('category_name', $keywords);
    $this->db->or_like('vendor_name', $keywords);
    $this->db->join('category', 'products.product_category = category.category_id');
    $this->db->join('vendor', 'vendor.vendor_id = products.product_vendor');
    $qry = $this->db->get('products');
    return $qry->result();
}

public function getAllProducts()
    {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('products');
        $this->db->join('category', 'products.product_category = category.category_id');
        $this->db->join('vendor', 'products.product_vendor = vendor.vendor_id');
        $query=$this->db->get();
        return $query->result_array();
    }
public function cekcartid()
{
    $query = $this->db->query("SELECT MAX(cart_id) as cartid from cart");
        $hasil = $query->row();
        return $hasil->cartid;
}
public function getAllCategory()
{
    $this->db->select('*');
    $this->db->from('category');
    $this->db->order_by('category_id', 'asc');
    $qry=$this->db->get();
    return $qry->result_array();
}

public function getProductDetail($id)
{
    $this->db->select('*'); // <-- There is never any reason to write this line!
    $this->db->from('products');
    $this->db->where('products.product_id', $id);
    $this->db->join('category', 'products.product_category = category.category_id');
    $this->db->join('vendor', 'products.product_vendor = vendor.vendor_id');
    $query=$this->db->get();
    return $query->result_array();
}
public function getProductToCart($id)
{
    $this->db->select('*'); // <-- There is never any reason to write this line!
    $this->db->from('products');
    $this->db->where('products.product_id', $id);
    $this->db->join('category', 'products.product_category = category.category_id');
    $this->db->join('vendor', 'products.product_vendor = vendor.vendor_id');
    $query=$this->db->get();
    return $query->row();
}
public function getProductCategory($id)
{
    $this->db->select('*');
    $this->db->where('category.category_id', $id); // <-- There is never any reason to write this line!
    $this->db->from('products');
    $this->db->join('category', 'products.product_category = category.category_id');
    $query=$this->db->get();
    return $query->result_array();
}

public function getProductVendor($id)
{
    $this->db->select('*');
    $this->db->where('vendor.vendor_id', $id); // <-- There is never any reason to write this line!
    $this->db->from('products');
    $this->db->join('vendor', 'products.product_vendor = vendor.vendor_id');
    $query=$this->db->get();
    return $query->result_array();
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

public function getFeaturedProd()
{
    $this->db->select('*');
    $this->db->from('products');
    $this->db->join('log', 'log.jenis = products.product_id');
    $this->db->order_by('tanggal', 'desc');
    $this->db->limit(3);
    $qwe = $this->db->get();
    return $qwe->result_array();
}

public function getLatestProduct()
{
    $query = $this->db->query("SELECT DISTINCT jenis, tanggal,product_name,product_image,product_price FROM log JOIN products WHERE tanggal = (SELECT MAX(tanggal)) AND products.product_id=log.jenis GROUP BY jenis ORDER BY tanggal DESC;");
    return $query->result_array();
}

}
/* End of file M_user.php */
?>