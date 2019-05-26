<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Author : Ilham Muhammad.
 * Email  : ilhamhmmd@outlook.com
 * Copyrights 2019
 * Proudly Created for PI Gunadarma
 */

class M_user extends CI_Model {

    public function insert($table, $data) {
        $this->db->insert($table, $data);
    }
    
    public function get_user($table, $email) {
        return $this->db->get_where($table, ['user_email' => $email])->row_array();
    }
}