<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Author : Ilham Muhammad.
 * Email  : ilhamhmmd@outlook.com
 * Copyrights 2019
 * Proudly Created for PI Gunadarma
 */

class Home extends MX_Controller {
	public function __construct() {
        parent::__construct();        
        $this->load->model('m_user');
    }

	public function index()
	{
		$email = $this->session->userdata('email');
		
		$data['user'] 	= $this->m_user->get_user('users', $email);
		$data['title'] 	= "Toko";
		
		$this->load->view('v_home', $data);
	}
}
