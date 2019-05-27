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

    public function get_all($table) {
        return $this->db->get($table)->result_array();
    }
    
}