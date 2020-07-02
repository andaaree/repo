<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('username') != null ) {
            if ($this->session->userdata('status') != "active") {
            redirect(base_url('register/verif'));
            }
        }
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
    public function search(){
        
        $data['title'] = "Products Catalog - Freuz E-Shop";
        $data['username'] = $this->session->userdata('username');
        $keywords = $this->input->post('keyword');

        $prod = $this->m_user->search($keywords);
        
        $data['cat'] = $this->m_user->getAllCategory();
        $data['tot'] = $this->m_user->getTotalProductVendor();
        $data['pagination'] = 1;
        $res = $this->load->view('src',array('prod' => $prod));
        $callback = array('res' => $res,);
        echo json_encode($callback);

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
        $data['title'] = "Catalog - Freuz E-Shop";
        $data['username'] = $this->session->userdata('username');
        $data['cat'] = $this->m_user->getAllCategory();
        $data['tot'] = $this->m_user->getTotalProductVendor();
        $this->load->view('homepage/template/home_header', $data);
        $this->load->view('homepage/template/home_topbar', $data);
        $this->load->view('homepage/template/home_menu');
        $this->load->view('homepage/template/home_sidebar', $data);
        $this->load->view('prod',$data);
        $this->load->view('homepage/template/home_footer');
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
    public function addToCart($pid)
    {
        $dariDB = $this->m_user->cekcartid();
		$nourut = substr($dariDB, 2, 4);
		$cartidSekarang = $nourut + 1;
        $data['cart_id'] = $cartidSekarang;
        $prod = $this->m_user->getProductToCart($pid);
        $uid = $this->session->userdata('id');
        $data = array(
            'cart_id'      => "C".sprintf("%04s",$data['cart_id']),
            'users_id'     => $uid,
            'product_id'   => $prod->product_id,
            'quantity' => 1,
        );
        $this->db->insert('cart',$data);
        redirect('homepage/products');
    }
    public function e404()
    {   
        $data['title'] = "Error 400000004";
        $data['denied'] = $this->session->flashdata('sukses');
        $this->load->view('template/home_header', $data);
        $this->load->view('404',$data);
    }
}
?>