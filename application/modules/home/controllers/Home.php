<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	public function __construct() {
        parent::__construct();        
        $this->load->model('m_home');
    }

	public function index()
	{
		$data['all_produk'] = $this->m_home->get_produk_all();		
		$data['title'] 	= "Toko";

		$this->load->view('template/home_header', $data);		
		$this->load->view('v_home', $data);		
		$this->load->view('template/home_footer');		
	}

	public function shop()
	{
		$email = $this->session->userdata('email');

		$data['all_produk'] = $this->m_home->get_produk_all();
		$data['user'] 	= $this->m_home->get_user('users', $email);
		$data['jenkel'] 	= $this->m_home->get_all('jenis_kelamin');
		$data['title'] 	= "Toko";

		$this->load->view('template/home_header', $data);
		$this->load->view('v_shop', $data);
		$this->load->view('template/home_footer');
	}
	
	public function about()
	{
		$email = $this->session->userdata('email');

		$data['all_produk'] = $this->m_home->get_produk_all();
		$data['user'] 	= $this->m_home->get_user('users', $email);
		$data['jenkel'] 	= $this->m_home->get_all('jenis_kelamin');
		$data['title'] 	= "Toko";

		$this->load->view('template/home_header', $data);
		$this->load->view('v_about', $data);
		$this->load->view('template/home_footer');
	}

	public function contact()
	{
		$email = $this->session->userdata('email');

		$data['all_produk'] = $this->m_home->get_produk_all();
		$data['user'] 	= $this->m_home->get_user('users', $email);
		$data['jenkel'] 	= $this->m_home->get_all('jenis_kelamin');
		$data['title'] 	= "Toko";

		$this->load->view('template/home_header', $data);
		$this->load->view('v_contact', $data);
		$this->load->view('template/home_footer');
	}
	

	public function women() {
		$email = $this->session->userdata('email');

		$data['all_produk'] = $this->m_home->get_produk_woman();
		$data['user'] 		= $this->m_home->get_user('users', $email);
		$data['jenkel'] 	= $this->m_home->get_all('jenis_kelamin');
		$data['title'] 		= "Women";

		$this->load->view('template/home_header', $data);
		$this->load->view('v_women', $data);
		$this->load->view('template/home_footer');
	}
	
	public function men() {
		$email = $this->session->userdata('email');

		$data['all_produk'] = $this->m_home->get_produk_men();
		$data['user'] 		= $this->m_home->get_user('users', $email);
		$data['jenkel'] 	= $this->m_home->get_all('jenis_kelamin');
		$data['title'] 		= "Men";

		$this->load->view('template/home_header', $data);
		$this->load->view('v_men', $data);
		$this->load->view('template/home_footer');
	}
	public function men_women() {
		$email = $this->session->userdata('email');

		$data['all_produk'] = $this->m_home->get_produk_unisex();
		$data['user'] 		= $this->m_home->get_user('users', $email);
		$data['jenkel'] 	= $this->m_home->get_all('jenis_kelamin');
		$data['title'] 		= "Men";

		$this->load->view('template/home_header', $data);
		$this->load->view('v_menwomen', $data);
		$this->load->view('template/home_footer');
	}

}
