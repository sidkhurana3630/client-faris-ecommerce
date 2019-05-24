<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Author : Ilham Muhammad.
 * Email  : ilhamhmmd@outlook.com
 * Copyrights 2019
 * Proudly Created for PI Gunadarma
 */

class Welcome extends MX_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
