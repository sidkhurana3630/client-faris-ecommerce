<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');

		if ($this->session->userdata('status') != 'admin') {
			redirect('auth');
		}
	}

	public function index()
	{
		$email = $this->session->userdata('email');

		$data = [
			'title' => "CAMOC - Admin",
			'user' 	=> $this->m_admin->get_user('users', $email),
			'jum_member' => $this->m_admin->get_count('users', ['user_role_id' => 2, 'user_is_active' => 1]),
			'jum_barang' => $this->m_admin->get_count('tbl_produk', NULL),
			'all_produk' => $this->m_admin->get_produk_all()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('template/admin_sidebar', $data);
		$this->load->view('v_admin', $data);
		$this->load->view('template/admin_footer');
	}

	public function tambah()
	{
		$email = $this->session->userdata('email');

		$data = [
			'title' => "CAMOC - Admin",
			'user' 	=> $this->m_admin->get_user('users', $email),
			'pengguna' => $this->m_admin->get_all('tbl_pengguna'),
			'kategori' => $this->m_admin->get_all('tbl_kategori'),
			'jum_member' => $this->m_admin->get_count('users', ['user_role_id' => 2, 'user_is_active' => 1]),
			'jum_barang' => $this->m_admin->get_count('tbl_produk', NULL),
			'all_produk' => $this->m_admin->get_produk_all()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('template/admin_sidebar', $data);
		$this->load->view('v_tambah', $data);
		$this->load->view('template/admin_footer');
	}

	public function edit($id = null) {		
		$email = $this->session->userdata('email');

		$data = [
			'title' => "CAMOC - Admin",
			'user' 	=> $this->m_admin->get_user('users', $email),
			'size' => $this->m_admin->get_all('tbl_size'),
			'pengguna' => $this->m_admin->get_all('tbl_pengguna'),
			'kategori' => $this->m_admin->get_all('tbl_kategori'),
			'jum_member' => $this->m_admin->get_count('users', ['user_role_id' => 2, 'user_is_active' => 1]),
			'jum_barang' => $this->m_admin->get_count('tbl_produk', NULL),
		];

		if (!isset($id)) {
			$data['all_produk'] = $this->m_admin->get_produk_all();
			$this->load->view('template/admin_header', $data);
			$this->load->view('template/admin_sidebar', $data);
			$this->load->view('v_edit', $data);
			$this->load->view('template/admin_footer');
		} else {
			$id = $this->uri->segment(3);
			$data['all_produk'] = $this->m_admin->get_produk_where($id);
			$this->load->view('template/admin_header', $data);
			$this->load->view('template/admin_sidebar', $data);
			$this->load->view('f_edit', $data);
			$this->load->view('template/admin_footer');
		}
	}

	private function _upload_foto1()
	{
		$config1['upload_path']          = './assets/uploads/produk/';
		$config1['allowed_types']        = 'jpeg|jpg|png';
		$config1['file_name']            = 'foto_1_' . time(); //get judul file
		// $config1['overwrite']			= true;
		$config1['max_size']             = 5024; // 1MB
		// $config['encrypt_name']         = TRUE; //enkripsi file name upload
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config1);
		if ($this->upload->do_upload("foto1")) { //upload file
			return $this->upload->data('file_name'); //ambil file name yang diupload		
		} else {
			return "produk.jpg";
		}
	}

	private function _upload_foto2()
	{
		$config2['upload_path']          = './assets/uploads/produk/';
		$config2['allowed_types']        = 'jpeg|jpg|png';
		$config2['file_name']            = 'foto_2_' . time(); //get judul file
		// $config2['overwrite']			= true;
		$config2['max_size']             = 5024; // 1MB
		// $config['encrypt_name']         = TRUE; //enkripsi file name upload
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config2);
		if ($this->upload->do_upload("foto2")) { //upload file
			return $this->upload->data('file_name'); //ambil file name yang diupload		
		} else {
			return "produk.jpg";
		}
	}

	private function _upload_foto3()
	{
		$config3['upload_path']          = './assets/uploads/produk/';
		$config3['allowed_types']        = 'jpeg|jpg|png';
		$config3['file_name']            = 'foto_3_' . time(); //get judul file
		// $config3['overwrite']			= true;
		$config3['max_size']             = 5024; // 1MB
		// $config['encrypt_name']         = TRUE; //enkripsi file name upload
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config3);
		if ($this->upload->do_upload("foto3")) { //upload file
			return $this->upload->data('file_name'); //ambil file name yang diupload		
		} else {
			return "produk.jpg";
		}
	}

	public function tambah_barang()
	{
		//save data barang user ke db
		$data = [
			'produk_nama'     => htmlspecialchars($this->input->post('nm_produk', true)),
			'produk_deskripsi' 	=> htmlspecialchars($this->input->post("deskripsi", true)),
			'produk_size' 	=> htmlspecialchars($this->input->post("size", true)),
			'produk_harga' 	=> htmlspecialchars($this->input->post("harga", true)),
			'produk_kategori_id' 	=> htmlspecialchars($this->input->post("kategori_brg", true)),
			'produk_pengguna_id'    => htmlspecialchars($this->input->post('kategori_pengguna', true)),
			'produk_created' => $this->session->userdata('nama'),
			'produk_ctime'    => time()

		];

		if (!empty($_FILES['foto1']['name'])) {
			$data['produk_gambar1'] = $this->_upload_foto1();
		}

		if (!empty($_FILES['foto2']['name'])) {
			$data['produk_gambar2'] = $this->_upload_foto2();
		}

		if (!empty($_FILES['foto3']['name'])) {
			$data['produk_gambar3'] = $this->_upload_foto3();
		}

		$this->m_admin->insert("tbl_produk", $data);

		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible">
	            	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            		Produk berhasil ditambah
        		</div>'
		);
		redirect('admin/barang');
	}

	public function update_barang()
	{
		//save data barang user ke db
		$id['produk_id'] = $this->input->post('id');
		$data = [
			'produk_nama'     => htmlspecialchars($this->input->post('nm_produk', true)),
			'produk_deskripsi' 	=> htmlspecialchars($this->input->post("deskripsi", true)),
			'produk_size' 	=> htmlspecialchars($this->input->post("size", true)),
			'produk_harga' 	=> htmlspecialchars($this->input->post("harga", true)),
			'produk_kategori_id' 	=> htmlspecialchars($this->input->post("kategori_brg", true)),
			'produk_pengguna_id'    => htmlspecialchars($this->input->post('kategori_pengguna', true)),
			'produk_created' => $this->session->userdata('nama'),
			'produk_ctime'    => time()

		];

		if (!empty($_FILES['foto1']['name'])) {
			$data['produk_gambar1'] = $this->_upload_foto1();
		}

		if (!empty($_FILES['foto2']['name'])) {
			$data['produk_gambar2'] = $this->_upload_foto2();
		}

		if (!empty($_FILES['foto3']['name'])) {
			$data['produk_gambar3'] = $this->_upload_foto3();
		}

		$this->m_admin->update("tbl_produk", $data, $id);

		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Produk berhasil diupdate
			</div>'
		);
		redirect('admin/edit');
	}

	public function hapus($id = null) {
		$id = $this->uri->segment(3);

		$this->m_admin->delete("tbl_produk", array('produk_id' => $id));

		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Produk berhasil dihapus
			</div>'
		);
		redirect('admin/edit');
	}
}
