<?php

class M_vendor extends CI_Model{

    public function getAllVendor()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->order_by('vendor_id', 'asc');
        $qry=$this->db->get();
        return $qry->result_array();
    }

    public function getVendor($id)
    {   
        $this->db->where('vendor_id', $id);
        return $this->db->get('Vendor')->result_array();
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

    public function editCat()
    {
        $cid = $this->input->post('catid', true);
		$row = $this->db->query('select vendor_name from vendor where vendor_id ="'.$cid.'"');
		$kategori = $row->row();
        $namas = $m_Vendor->Vendor_name;
        $nama_kategori = $this->input->post('catname', true);
        $data = array(
            'Vendor_name' => $nama_kategori
        );
        $this->db->where('vendor_id', $cid);
        $this->db->update('vendor', $data);
    }

    public $Vendor_id;
    public $Vendor_name;

    public function cekvid()
    {
        $query = $this->db->query("SELECT MAX(vendor_id) as catid from vendor");
        $hasil = $query->row();
        return $hasil->catid;
    }

    public function addCat()
    {
        $id_kategori = $this->input->post('catid', true);
		$nama_kategori = $this->input->post('catname', true);
		$dataa = array(
			'vendor_id' => $id_kategori,
			'vendor_name' => $nama_kategori
		);
        $this->db->insert('vendor', $dataa);

        redirect(base_url('vendor'));
        
    }

}