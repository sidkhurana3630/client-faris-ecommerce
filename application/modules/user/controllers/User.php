<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Author : Ilham Muhammad.
 * Email  : ilhamhmmd@outlook.com
 * Copyrights 2019
 * Proudly Created for PI Gunadarma
 */

class User extends MX_Controller {
	public function __construct() {
        parent::__construct();        
        $this->load->model('m_user');
    }

	public function index()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->m_user->get_user('users', $email);
		echo "Selamat datang ". $data['user']['user_name'];
	}
}
