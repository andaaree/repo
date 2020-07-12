<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->splogin->check(); 
		$this->load->model('m_vendor');
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{
		$data['title'] = "Daftar Merek";
        $data['vnd'] = $this->m_vendor->getAllVendor();
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar',$data);
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('index', $data);
		$this->load->view('dashboard/template/home_footer');
    }

    public function prod()
    {
		$data['title'] = "Daftar Barang / Merek";
        $data['cat'] = $this->m_vendor->getAllVendor();
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
        $data['product'] = $this->m_vendor->getProductVendor($name);
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar',$data);
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('products/index', $data);
		$this->load->view('dashboard/template/home_footer');
	}

	public function add()
	{
		$data['title'] = "Tambah Brand";
		$data['username'] = $this->session->userdata('username');
		// Ambil vendor ID
		$dariDB = $this->m_vendor->cekvid();
		$nourut = substr($dariDB, 2, 4);
		$catidSekarang = $nourut + 1;
		$data['vendor_id'] = $catidSekarang;
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar',$data);
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('add', $data);
		$this->load->view('dashboard/template/home_footer');
	}


	public function edit($id)
	{
		$data['title'] = "Edit Brand";
		$data['edit'] = $this->m_vendor->getVendor($id);
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar',$data);
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('edit', $data);
		$this->load->view('dashboard/template/home_footer');
	}

    public function tambah_vendor()
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
			$this->m_vendor->addCat();
			redirect('vendor');
		}
    }

	public function edit_vendor()
	{
		$this->form_validation->set_rules('catid', 'Vendor ID', 'trim|required');
		$this->form_validation->set_rules('catname', 'Vendor Name', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['errors'] = null;
			$this->load->view('dashboard/template/home_header', $data);
			$this->load->view('dashboard/template/home_sidebar',$data);
			$this->load->view('dashboard/template/home_topbar', $data);
			$this->load->view('add', $data);
			$this->load->view('dashboard/template/home_footer');
		} else {
			$this->m_vendor->editCat();
			redirect('vendor');
		}
	}

    public function delete($id)
    {
		$row = $this->db->query('select product_name from products where product_vendor ="'.$vid.'"');
		$ven = $row->row();
		$vend = $ven->vendor_name;
		if($vend != null){ 
			$this->session->set_flashdata('error', 'Kategori tidak dapat dihapus karena terdapat produk');
		} else {
			$row = $this->db->query('select vendor_name from vendor where vendor_id ="'.$id.'"');
			$vendor = $row->row();
			$nama = $vendor->vendor_name;

			$this->db->where('vendor_id', $id);
			$this->db->delete('vendor');
			
			
			$ip_address = $_SERVER['REMOTE_ADDR'];
			$username = $this->session->userdata('username');
			$keterangan = "Menghapus brand $nama";
			$data = array(
				'username' => $username,
				'ip' => $ip_address,
				'keterangan' => $keterangan,
				'jenis' => $id,
                'tanggal' => date('Y-m-d H:i:s')
			);
			$this->db->insert('log', $data);
		}
		
		redirect('vendor'); 
    }

	

}