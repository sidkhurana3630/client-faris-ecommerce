<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function insert($table, $data) {
        $this->db->insert($table, $data);
    }

    public function update($table, $data, $cond) {        
        $this->db->update($table, $data, $cond);        
    }
    
    public function get_user($table, $email) {
        return $this->db->get_where($table, ['user_email' => $email])->row_array();
    }

    public function get_all($table) {
        return $this->db->get($table)->result_array();
    }

    public function get_count($table, $cond) {
        $query =  $this->db->get_where($table, $cond)->num_rows();

        return $query;
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
	
    public function get_produk_where($id)
	{
        $this->db
            ->select('pd.*, kategori_nama, pengguna')
            ->from('tbl_produk pd')
			->join('tbl_kategori kt', 'kt.kategori_id = pd.produk_kategori_id')
			->join('tbl_pengguna pgn', 'pgn.pengguna_id = pd.produk_pengguna_id')
			->where('produk_id', $id);
        
        $query = $this->db->get();
        
        return $query->row_array();
	}
	public function get_produk_kategori($kategori)
	{
		if ($kategori > 0) {
			$this->db->where('kategori', $kategori);
		}
		$query = $this->db->get('tbl_produk');
		return $query->result_array();
	}

	public function get_kategori_all()
	{
		$query = $this->db->get('tbl_kategori');
		return $query->result_array();
	}

	public  function get_produk_id($id)
	{
		$this->db->select('tbl_produk.*,nama_kategori');
		$this->db->from('tbl_produk');
		$this->db->join('tbl_kategori', 'kategori=tbl_kategori.id', 'left');
		$this->db->where('id_produk', $id);
		return $this->db->get();
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
		$this->db->insert('tbl_detail_order', $data);
	}

	public function delete($table, $where) {
		$this->db->delete($table, $where);
	}
    
}