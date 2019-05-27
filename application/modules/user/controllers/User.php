<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');


		if ($this->session->userdata('status') != 'user') {
			redirect('auth');
		}
	}

	public function index()
	{
		$email = $this->session->userdata('email');

		$data['user'] 	= $this->m_user->get_user('users', $email);
		$data['title'] 	= "Toko";

		$this->load->view('template/store_header', $data);
		$this->load->view('v_user', $data);
		$this->load->view('template/store_footer');
	}

	public function account()
	{
		$email = $this->session->userdata('email');

		$data['user'] 		= $this->m_user->get_user('users', $email);
		$data['jenkel'] 	= $this->m_user->get_all('jenis_kelamin');
		$data['title'] 		= "Toko";

		$this->load->view('template/store_header', $data);
		$this->load->view('v_account', $data);
		$this->load->view('template/store_footer');
	}

	private function _upload_foto()
	{
		$config['upload_path']          = './assets/uploads/profile/';
		$config['allowed_types']        = 'jpg|png';
		$config['file_name']            = 'foto_' . time(); //get judul file
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['encrypt_name']         = TRUE; //enkripsi file name upload
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("foto")) { //upload file
			return $this->upload->data('file_name'); //ambil file name yang diupload		
		} else {
			return "profile.png";
		}
	}

	public function update_user()
	{
		$rules = array(
			array(
				'field' => 'nm_lengkap',
				'label' => 'Nama Lengkap',
				'rules' => 'trim'
			),
			array(
				'field' => 'alamat',
				'label' => 'Alamat Lengkap',
				'rules' => 'trim'
			),
			array(
				'field' => 'jenkel',
				'label' => 'Jenis Kelamin',
				'rules' => 'trim'
			),
			array(
				'field' => 'notelp',
				'label' => 'No. Telp / HP',
				'rules' => 'trim'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|min_length[6]'
			)
		);

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					' . validation_errors() . '
				</div>'
			);
			redirect('user/account');
		} else {

			//save data registration user ke db
			$id['user_id'] = $this->input->post('id', true);

			$data = [
				'user_name'     => htmlspecialchars($this->input->post('nm_lengkap', true)),
				'user_address' 	=> htmlspecialchars($this->input->post("alamat", true)),
				'user_jenkel' 	=> htmlspecialchars($this->input->post("jenkel", true)),
				'user_notelp' 	=> htmlspecialchars($this->input->post("notelp", true)),
				'user_email'    => htmlspecialchars($this->input->post('email', true)),
				'user_mtime'    => time()
			];

			if (!empty($this->input->post('password', true))) {
				$data['user_password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			}

			if (!empty($_FILES['foto']['name'])) {
				$data['user_image'] = $this->_upload_foto();
			}

			$this->m_user->update("users", $data, $id);

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible">
	            	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            		Akun berhasil di update
        		</div>'
			);
			redirect('user/account');
		}
	}


	public function upload_foto()
	{

		$email = $this->session->userdata('email');
		$d['user'] 		= $this->m_user->get_user('users', $email);

		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path']      = './assets/uploads/profile/';
			$config['allowed_types']    = 'jpg|png';
			// $config['encrypt_name']	    = true;
			$config['file_ext_tolower']	= true;
			$config['max_size']	        = '2048';
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload()) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('user/account');
			} else {
				//Image Resizing
				$data_upload = 'foto_' . $this->input->post('nm_lengkap'); //get judul file
				$file_name = $data_upload["file_name"];
				$this->load->library('image_lib');
				$config_resize['image_library'] = 'gd2';
				$config_resize['create_thumb'] = FALSE;
				$config_resize['maintain_ratio'] = FALSE;
				$config_resize['new_image'] = './assets/uploads/profile';
				$config_resize['quality'] = "100%";
				$config_resize['source_image'] = './assets/uploads/profile/' . $file_name;
				$config_resize['width'] = 300;
				$config_resize['height'] = 300;
				$this->image_lib->initialize($config_resize);
				if (!$this->image_lib->resize()) {
					$error = $this->image_lib->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('user/account');
				} else {
					$result = $this->upload->data();
					/* kirim ke file server via FTP  */
					$source = './assets/uploads/profile/' . $result['file_name'];
					$this->ftp->connect($this->ftp_config);
					$destination = '/profile/' . $result['file_name'];
					$file_server_upload = $this->ftp->upload($source, "." . $destination, 'auto', 0644);
					$this->ftp->close();
					@unlink($source);
					if ($file_server_upload == FALSE) {
						$this->session->set_flashdata('error', 'Gagal upload ke file server!');
						redirect('user/account');
					} else {
						$data['user_image'] = $result['file_name'];
						// cek file lama
						if (!empty($d['user']['user_image'])) {
							//delete
							$this->ftp->connect($this->ftp_config);
							$delete_old_file = $this->ftp->delete_file('./profile/' . $d['user']['user_image']);
							$this->ftp->close();
							if ($delete_old_file == FALSE) {
								$this->session->set_flashdata('error', 'Gagal hapus file lama di file server!');
								redirect('user/account');
							}
						}
					}
				}
			}
		}
	}

	public function tampil_cart()
	{
		$data['kategori'] = $this->m_admin->get_kategori_all();
		$this->load->view('themes/header', $data);
		$this->load->view('shopping/tampil_cart', $data);
		$this->load->view('themes/footer');
	}

	public function check_out()
	{
		$data['kategori'] = $this->m_admin->get_kategori_all();
		$this->load->view('themes/header', $data);
		$this->load->view('shopping/check_out', $data);
		$this->load->view('themes/footer');
	}

	public function detail_produk()
	{
		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['kategori'] = $this->m_admin->get_kategori_all();
		$data['detail'] = $this->m_admin->get_produk_id($id)->row_array();
		$this->load->view('themes/header', $data);
		$this->load->view('shopping/detail_produk', $data);
		$this->load->view('themes/footer');
	}

	function tambahin()
	{
		$data_produk = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('nama'),
			'price' => $this->input->post('harga'),
			'gambar' => $this->input->post('gambar'),
			'qty' => $this->input->post('qty')
		);
		$this->cart->insert($data_produk);
		redirect('shopping');
	}

	function hapus($rowid)
	{
		if ($rowid == "all") {
			$this->cart->destroy();
		} else {
			$data = array(
				'rowid' => $rowid,
				'qty' => 0
			);
			$this->cart->update($data);
		}
		redirect('shopping/tampil_cart');
	}

	function ubah_cart()
	{
		$cart_info = $_POST['cart'];
		foreach ($cart_info as $id => $cart) {
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$gambar = $cart['gambar'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array(
				'rowid' => $rowid,
				'price' => $price,
				'gambar' => $gambar,
				'amount' => $amount,
				'qty' => $qty
			);
			$this->cart->update($data);
		}
		redirect('shopping/tampil_cart');
	}

	public function proses_order()
	{
		//-------------------------Input data pelanggan--------------------------
		$data_pelanggan = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp')
		);
		$id_pelanggan = $this->m_admin->tambah_pelanggan($data_pelanggan);
		//-------------------------Input data order------------------------------
		$data_order = array(
			'tanggal' => date('Y-m-d'),
			'pelanggan' => $id_pelanggan
		);
		$id_order = $this->m_admin->tambah_order($data_order);
		//-------------------------Input data detail order-----------------------
		if ($cart = $this->cart->contents()) {
			foreach ($cart as $item) {
				$data_detail = array(
					'order_id' => $id_order,
					'produk' => $item['id'],
					'qty' => $item['qty'],
					'harga' => $item['price']
				);
				$proses = $this->m_admin->tambah_detail_order($data_detail);
			}
		}
		//-------------------------Hapus shopping cart--------------------------
		$this->cart->destroy();
		$data['kategori'] = $this->m_admin->get_kategori_all();
		$this->load->view('themes/header', $data);
		$this->load->view('shopping/sukses', $data);
		$this->load->view('themes/footer');
	}
}
