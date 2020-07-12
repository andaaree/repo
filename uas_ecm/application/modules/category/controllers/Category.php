<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->splogin->check(); 
		$this->load->model('m_category');
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{
		$data['title'] = "Daftar Kategori";
		$data['cat'] = $this->m_category->getAllCategory();
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar',$data);
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('index', $data);
		$this->load->view('dashboard/template/home_footer');
    }

    public function prod()
    {
		$data['title'] = "Daftar Barang";
        $data['cat'] = $this->m_category->getAllCategory();
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar',$data);
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('prod', $data);
		$this->load->view('dashboard/template/home_footer');
	}
	
	public function list($name)
	{
		$data['title'] = "Daftar Produk";
        $data['product'] = $this->m_category->getProductCategory($name);
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar',$data);
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('products/index', $data);
		$this->load->view('dashboard/template/home_footer');
	}

	public function add()
	{
		$data['title'] = "Tambah Kategori";
		$data['username'] = $this->session->userdata('username');
		// Ambil Category ID
		$dariDB = $this->m_category->cekcid();
		$nourut = substr($dariDB, 2, 4);
		$catidSekarang = $nourut + 1;
		$data['category_id'] = $catidSekarang;
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar',$data);
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('add', $data);
		$this->load->view('dashboard/template/home_footer');
	}


	public function edit($id)
	{
		$data['title'] = "Edit Kategori";
		$data['edit'] = $this->m_category->getCategory($id);
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar',$data);
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('edit', $data);
		$this->load->view('dashboard/template/home_footer');
	}

    public function tambah_category()
    {
		$this->form_validation->set_rules('catid', 'ID', 'trim|required');
		$this->form_validation->set_rules('catname', 'Nama', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['errors'] = null;
			$this->load->view('dashboard/template/home_header', $data);
			$this->load->view('dashboard/template/home_sidebar',$data);
			$this->load->view('dashboard/template/home_topbar', $data);
			$this->load->view('add', $data);
			$this->load->view('dashboard/template/home_footer');
		} else {
			$this->m_category->addCat();
			redirect('category');
		}
    }

	public function edit_category()
	{
		$this->form_validation->set_rules('catid', 'Category ID', 'trim|required');
		$this->form_validation->set_rules('catname', 'Category Name', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['errors'] = null;
			$this->load->view('dashboard/template/home_header', $data);
			$this->load->view('dashboard/template/home_sidebar',$data);
			$this->load->view('dashboard/template/home_topbar', $data);
			$this->load->view('add', $data);
			$this->load->view('dashboard/template/home_footer');
		} else {
			$this->m_category->editCat();
			redirect('category');
		}
	}

    public function delete($id)
    {
		$row = $this->db->query('select product_name from products where product_category ="'.$id.'"');
		$kategori = $row->row();
		$namaa = $kategori->product_category;
		if($namaa != null){ 
			$this->session->set_flashdata('error', 'Kategori tidak dapat dihapus karena terdapat produk');
		} else {
			$row = $this->db->query('select category_name from category where category_id ="'.$id.'"');
			$kategori = $row->row();
			$nama = $kategori->category_name;

			$this->db->where('category_id', $id);
			$this->db->delete('category');
			
			$ip_address = $_SERVER['REMOTE_ADDR'];
			$username = $this->session->userdata('username');
			$keterangan = "Menghapus kategori $nama";
			$data = array(
				'username' => $username,
				'ip' => $ip_address,
				'keterangan' => $keterangan,
				'jenis' => $id,
                'tanggal' => date('Y-m-d H:i:s')
			);
			$this->db->insert('log', $data);
		}
		
		redirect('category');
    }

	

}