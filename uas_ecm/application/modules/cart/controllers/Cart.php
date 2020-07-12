<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('username') != null ) {
            if ($this->session->userdata('status') != "active") {
            redirect(base_url('register/verif'));
            }
        }
        $this->load->model('m_cart');
    }
    
    public function index()
    {   
        
        $data['title'] = "Category Catalog - Freuz E-Shop";
        $data['username'] = $this->session->userdata('username');
        $data['cat'] = $this->m_cart->getAllCategory();
        $data['cart'] = $this->m_cart->showcart();

        $this->load->view('homepage/template/home_header', $data);
        $this->load->view('homepage/template/home_topbar', $data);
        $this->load->view('homepage/template/home_menu');
        $this->load->view('index',$data);
        $this->load->view('homepage/template/home_footer');
    }
    public function minus($id)
    {
        $data = array(
            'rowid' => 'yourid',
            'qty'   => 3
        );
        $this->db->update($data);
    }

    public function add($id)
    {
        
        $data = array(
            'id'      => 'sku_123ABC',
            'qty'     => 1,
            'price'   => '19.56',
            'name'    => 'T-Shirt'
        );
        $this->db->insert($data);
    }
}

/* End of file Cart.php */

?>