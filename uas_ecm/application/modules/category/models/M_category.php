<?php

class M_category extends CI_Model{

    public function getAllCategory()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by('category_id', 'asc');
        $qry=$this->db->get();
        return $qry->result_array();
    }

    public function getCategory($id)
    {   
        $this->db->where('category_id', $id);
        return $this->db->get('category')->result_array();
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

    public function editCat()
    {
        $cid = $this->input->post('catid', true);
		$row = $this->db->query('select category_name from category where category_id ="'.$cid.'"');
		$kategori = $row->row();
        $namas = $m_category->category_name;
        $nama_kategori = $this->input->post('catname', true);
        $data = array(
            'category_name' => $nama_kategori
        );
        $this->db->where('category_id', $cid);
        $this->db->update('category', $data);
    }

    public $category_id;
    public $category_name;

    public function cekcid()
    {
        $query = $this->db->query("SELECT MAX(category_id) as catid from category");
        $hasil = $query->row();
        return $hasil->catid;
    }

    public function addCat()
    {
        $id_kategori = $this->input->post('catid', true);
		$nama_kategori = $this->input->post('catname', true);
		$dataa = array(
			'category_id' => $id_kategori,
			'category_name' => $nama_kategori
		);
        $this->db->insert('category', $dataa);

        redirect(base_url('category'));
        
    }

}