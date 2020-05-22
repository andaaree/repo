<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

public function __construct()
{
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    
}

public function product_page()
{   
    
    $query = "SELECT * FROM products";
    
    $this->load->library('pagination');
    $config['base_url'] = base_url('homepage/products').'';
    $config['total_rows'] = $this->db->query($query)->num_rows();
    $config['per_page'] = 6;
    $config['uri_segment'] = 3;
    $config['num_links'] = 3;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = '<span class="page-link">First</span>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = '<span class="page-link">Last</span>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    // End style pagination
    $this->pagination->initialize($config);
    
    $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    $query .= " LIMIT ".$page.", ".$config['per_page'];
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
    $data['prod'] = $this->db->query($query)->result();
    return $data;
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