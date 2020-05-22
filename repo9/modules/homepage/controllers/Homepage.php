<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }
    
    public function index(){
        // Query Last Month
        $qry=  $this->db->query('SELECT DATE_SUB(CURDATE(),INTERVAL 1 MONTH) as last');
        $hasil = $qry->row();
        // Query total product as offset
        $que = $this->db->query("SELECT COUNT(product_id) as count FROM products");
        $res = $que->row();
        
        $data['title'] = "Freuz E-Shop";
        $data['username'] = $this->session->userdata('username');
        $data['cat'] = $this->m_user->getAllCategory();
        $data['prod'] = $this->m_user->getAllProducts();
        $data['tot'] = $this->m_user->getTotalProductVendor();
        $data['feat'] = $this->m_user->getFeaturedProd();
        $data['lastmonth'] = $hasil->last;
        $data['count'] = $res->count;
        $data['latest'] = $this->m_user->getLatestProduct();
        $this->load->view('template/home_header', $data);
        $this->load->view('template/home_topbar', $data);
        $this->load->view('template/home_menu');
        $this->load->view('template/home_slider');
        $this->load->view('template/home_sidebar',$data);
        $this->load->view('index',$data);
        $this->load->view('template/home_footer');
    }
    public function product($id)
    {
        $data['title'] = "Products Catalog - Freuz E-Shop";
        $data['username'] = $this->session->userdata('username');
        $data['cat'] = $this->m_user->getAllCategory();
        $data['tot'] = $this->m_user->getTotalProductVendor();
        $data['proddet'] = $this->m_user->getProductDetail($id);
        $this->load->view('template/home_header', $data);
        $this->load->view('template/home_topbar', $data);
        $this->load->view('template/home_menu');
        $this->load->view('template/home_sidebar',$data);
        $this->load->view('prodid',$data);
        $this->load->view('template/home_footer');
    }
    public function products()
    {   
        $data['title'] = "Catalog - Freuz E-Shop";
        $data['username'] = $this->session->userdata('username');
        $data['halaman'] = $this->m_user->product_page();
        $data['cat'] = $this->m_user->getAllCategory();
        $data['tot'] = $this->m_user->getTotalProductVendor();
        $this->load->view('template/home_header', $data);
        $this->load->view('template/home_topbar', $data);
        $this->load->view('template/home_menu');
        $this->load->view('template/home_sidebar',$data);
        $this->load->view('prod',$data);
        $this->load->view('template/home_footer');
    }
    
    public function brand($id)
    {
        $data['prodbrand'] = $this->m_user->getProductVendor($id);
        $data['title'] = "Brand Catalog - Freuz E-Shop";
        $data['username'] = $this->session->userdata('username');
        $data['cat'] = $this->m_user->getAllCategory();
        $data['tot'] = $this->m_user->getTotalProductVendor();

        $this->load->view('template/home_header', $data);
        $this->load->view('template/home_topbar', $data);
        $this->load->view('template/home_menu');
        $this->load->view('template/home_sidebar',$data);
        $this->load->view('brand',$data);
        $this->load->view('template/home_footer');
    }
    public function category($id)
    {
        $data['catprod'] = $this->m_user->getProductCategory($id);
        $data['title'] = "Category Catalog - Freuz E-Shop";
        $data['username'] = $this->session->userdata('username');
        $data['cat'] = $this->m_user->getAllCategory();
        $data['tot'] = $this->m_user->getTotalProductVendor();

        $this->load->view('template/home_header', $data);
        $this->load->view('template/home_topbar', $data);
        $this->load->view('template/home_menu');
        $this->load->view('template/home_sidebar',$data);
        $this->load->view('category',$data);
        $this->load->view('template/home_footer');
    }

    public function e404()
    {   
        $data['denied'] = $this->session->flashdata('sukses');
        $this->load->view('template/home_header', $data);
        $this->load->view('404',$data);
    }
}
?>