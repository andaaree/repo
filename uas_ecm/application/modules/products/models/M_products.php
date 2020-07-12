<?php

class M_products extends CI_Model{

    public function getAllProducts()
    {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('products');
        $this->db->join('category', 'products.product_category = category.category_id');
        $this->db->join('vendor', 'products.product_vendor = vendor.vendor_id');
        $query=$this->db->get();
        return $query->result_array();
    }
    public function getAllVendor()
    {
        return $this->db->get('vendor')->result_array();
    }
    public function getProducts($pid)
    {   
        $this->db->where('product_id', $pid);
        return $this->db->get('products')->result_array();
    }
    
    public function getAllCategory()
    {
        return $this->db->get('category')->result_array();
    }

    public function cekpid()
    {
        $query = $this->db->query("SELECT MAX(product_id) as prodid from products");
        $hasil = $query->row();
        return $hasil->prodid;
    }
    public function prodpage()
    {
        $this->load->library('pagination');
        $query = "SELECT * FROM products JOIN category,vendor WHERE category_id=product_category AND vendor_id=product_vendor ";
        $config['base_url'] = base_url('products/');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 4;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '<span class="page-link">First</span>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '<span class="page-link">Last</span>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item"> <a class="page-link"';
        $config['next_tag_close'] = '</a></li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item disabled"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item"> <a class="page-link"';
        $config['num_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];    
        $data['pagination'] = $this->pagination->create_links();
        $data['prod'] = $this->db->query($query)->result();
        return $data;
    }
    public function addProd()
    {
        $id_produk = $this->input->post('prodid');
        $nama_produk = $this->input->post('prodname', true);
        $jml_produk = $this->input->post('prodqty', true);
        $vendor = $this->input->post('vend',true);
        $harga_produk = $this->input->post('prodprice', true);
        $kategori_produk = $this->input->post('prodcat', true);
        $deskripsi_produk = $this->input->post('proddesc', true);
        
        $config = array(
            'upload_path' => "./assets/img/products/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'file_name' => $this->session->userdata('username')."-".$id_produk.".png"
        );
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
		$this->upload->do_upload('upload_image');
        $data['result'] = print_r($this->upload->data(), true);
        $data['files']  = print_r($_FILES, true);
        $data['post']   = print_r($_POST, true);
        $data['errors'] = $this->upload->display_errors('<p>', '</p>');
        switch ($_FILES['upload_image']['error']) {
            case UPLOAD_ERR_OK:
            break;
            case UPLOAD_ERR_NO_FILE:
                $config['file_name'] = "default.png";
            case UPLOAD_ERR_INI_SIZE:
            break;
            case UPLOAD_ERR_FORM_SIZE:
                $this->session->set_flashdata('error', $this->upload->display_errors('<p>', '</p>'));
                redirect('products');
            default:
            $this->session->set_flashdata('error', $this->upload->display_errors('<p>', '</p>'));  
            redirect('products');
        }  
            $keDB = array(
                'product_id' => $id_produk,
                'product_name' => $nama_produk,
                'product_qty' => $jml_produk,
                'product_image' => $config['file_name'],
                'product_vendor' => $vendor,
                'product_category' => $kategori_produk,
                'product_price' => $harga_produk,
                'product_description' => $deskripsi_produk
            );
            $this->db->insert('products', $keDB);
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $username = $this->session->userdata('username');
            $keterangan = "Menambahkan produk $nama_produk";
            $data = array(
                'username' => $username,
                'ip' => $ip_address,
                'keterangan' => $keterangan,
                'jenis' => $id_produk,
                'tanggal' => date('Y-m-d H:i:s')
            );
            $this->db->insert('log', $data);

            redirect(base_url('products'));
    }
    public function editProd()
    {
        $id_produk = $this->input->post('prodid');
        $nama_produk = $this->input->post('prodname', true);
        $jml_produk = $this->input->post('prodqty', true);
        $vendor = $this->input->post('vend',true);
        $harga_produk = $this->input->post('prodprice', true);
        $kategori_produk = $this->input->post('prodcat', true);
        $deskripsi_produk = $this->input->post('proddesc', true);

        $config = array(
            'upload_path' => "./assets/img/products/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'file_name' => $this->session->userdata('username')."-".$id_produk.".png"
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('upload_image');

        $data['result'] = print_r($this->upload->data(), true);
        $data['files']  = print_r($_FILES, true);
        $data['post']   = print_r($_POST, true);
        switch ($_FILES['upload_image']['error']) {
            case UPLOAD_ERR_OK:


                $keDB = array(
                    'product_id' => $id_produk,
                    'product_name' => $nama_produk,
                    'product_qty' => $jml_produk,
                    'product_image' => $config['file_name'],
                    'product_vendor' => $vendor,
                    'product_category' => $kategori_produk,
                    'product_price' => $harga_produk,
                    'product_description' => $deskripsi_produk
                );

            case UPLOAD_ERR_NO_FILE:
                $keDB = array(
                    'product_id' => $id_produk,
                    'product_name' => $nama_produk,
                    'product_qty' => $jml_produk,
                    'product_vendor' => $vendor,
                    'product_category' => $kategori_produk,
                    'product_price' => $harga_produk,
                    'product_description' => $deskripsi_produk
                );
            case UPLOAD_ERR_INI_SIZE:
            break;
            case UPLOAD_ERR_FORM_SIZE:
                $this->session->set_flashdata('error', $this->upload->display_errors('<p>', '</p>'));
                redirect('products');
            default:
            $data['username'] = $this->session->userdata('username');
            $data['errors'] = $this->upload->display_errors('<p>', '</p>');
            $this->session->set_flashdata('error', $this->upload->display_errors('<p>', '</p>'));
                $this->load->view('dashboard/template/home_header', $data);
                $this->load->view('dashboard/template/home_sidebar');
                $this->load->view('dashboard/template/home_topbar');
                $this->load->view('add', $data);
                $this->load->view('dashboard/template/home_footer');
        }
        
        $this->db->where('product_id', $id_produk);
        $this->db->update('products', $keDB);
        
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Mengubah produk $nama_produk";
        $data = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan,
            'jenis' => $id_produk,
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log', $data);  

        redirect('products');
    }
}