<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function insert($table, $data) {
        $this->db->insert($table, $data);
    }

    public function update($table, $data, $cond) {        
        $this->db->update($table, $data, $cond);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }
    
    public function get_user($table, $email) {
        return $this->db->get_where($table, ['user_email' => $email])->row_array();
    }

    public function get_order($table, $email) {
        return $this->db->get_where($table, ['order_email' => $email])->result_array();
    }

    public function get_kode_order($table, $email) {
        return $this->db->get_where($table, ['order_status' => $email])->result_array();
    }

    public function get_all($table) {
        return $this->db->get($table)->result_array();
    }
    
    public function get_produk_where($cond, $where)
	{
        $this->db
            ->select('pd.*, kategori_nama, pengguna')
            ->from('tbl_produk pd')
			->join('tbl_kategori kt', 'kt.kategori_id = pd.produk_kategori_id')
			->join('tbl_pengguna pgn', 'pgn.pengguna_id = pd.produk_pengguna_id')
			->where($cond, $where);
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function get_produk_woman()
	{
        $this->db
            ->select('pd.*, kategori_nama, pengguna')
            ->from('tbl_produk pd')
			->join('tbl_kategori kt', 'kt.kategori_id = pd.produk_kategori_id')
			->join('tbl_pengguna pgn', 'pgn.pengguna_id = pd.produk_pengguna_id')
			->where('produk_pengguna_id', '2');
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function get_produk_men()
	{
        $this->db
            ->select('pd.*, kategori_nama, pengguna')
            ->from('tbl_produk pd')
			->join('tbl_kategori kt', 'kt.kategori_id = pd.produk_kategori_id')
			->join('tbl_pengguna pgn', 'pgn.pengguna_id = pd.produk_pengguna_id')
			->where('produk_pengguna_id', '1');
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function get_produk_all()
	{
        $this->db
            ->select('pd.*, kategori_nama, pengguna')
            ->from('tbl_produk pd')
			->join('tbl_kategori kt', 'kt.kategori_id = pd.produk_kategori_id')
			->join('tbl_pengguna pgn', 'pgn.pengguna_id = pd.produk_pengguna_id');			
        
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function tambah_pelanggan($data)
    {
        $this->db->insert('tbl_pelanggan', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }
 
    public function tambah_order($data)
    {
        $this->db->insert('tbl_order', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }
 
    public function tambah_detail_order($data)
    {
        $this->db->insert('tbl_order_detail', $data);
    }

    public function get_order_join($cond, $where)
	{
        $this->db
            ->select('or.*, od.*')
            ->from('tbl_order or')
			->join('tbl_order_detail od', 'od.order_id = or.order_id')
			->where($cond, $where);
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
}