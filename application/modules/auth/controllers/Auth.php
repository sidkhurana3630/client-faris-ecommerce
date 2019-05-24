<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Bismillah
 * Author : Ilham Muhammad.
 * Email  : ilhamhmmd@outlook.com
 * Copyrights 2019
 * Proudly Created for PI Gunadarma with Love
 */

class Auth extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_auth');
    }

    public function index() {
        $data = array(
            'title' => 'Toko - Login'
        );

        $this->load->view('template/auth_header', $data);
        $this->load->view('login');
        $this->load->view('template/auth_footer');
    }

    public function registration() {
        $data = array(
            'title' => 'Toko - Registration'
        );
        $this->load->view('template/auth_header', $data);
        $this->load->view('registration');
        $this->load->view('template/auth_footer');
    }

    public function save_registration() {
        $rules = array(
            array(
                'field' => 'nama_lengkap',
                'label' => 'Nama Lengkap',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'email',
                'label' => 'Alamat Email',
                'rules' => 'required|trim|valid_email|is_unique[users.user_email]'
            ),
            array(
                'field' => 'password1',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[6]'
            ),
            array(
                'field' => 'password2',
                'label' => 'Konfirmasi Password',
                'rules' => 'required|trim|min_length[6]|matches[password1]',                
            )
        );
        $this->form_validation->set_rules($rules);

        if($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['message'] = strip_tags(validation_errors("- "));
        } else {
            $output['message'] = 'Registrasi Berhasil';
            //save data registration user ke db
            $data = [
                'user_name'     => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'user_email'    => htmlspecialchars($this->input->post('email', true)),
                'user_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'user_role_id'  => "2"
            ];

            $this->m_auth->insert('users', $data);
        }

        echo json_encode($output);
    }

    private function _login() {
        
    }

    public function do_login() {
        $rules = array(            
            array(
                'field' => 'email',
                'label' => 'Alamat Email',
                'rules' => 'required|trim|valid_email'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim'
            )
        );
        $this->form_validation->set_rules($rules);

        if($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['message'] = strip_tags(validation_errors("- "));
        } else {
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');
            
            $user = $this->m_auth->get_user('users', $email);
    
            if($user) {
                // jika user aktif
                if($user['user_is_active'] == 1) {
                    // cek password
                    if(password_verify($password, $user['user_password'])) {
                        $data = [
                            'name' => $user['user_name'],
                            'email' => $user['user_email'],
                            'role_id' => $user['user_role_id']
                        ];
                        $this->session->set_userdata($data);
                        $output['success'] = true;
                        $output['message'] = 'Logged in......';
                        $output['login'] = 'user';
                    } else {
                        $output['success'] = false;
                        $output['message'] = "Alamat Email atau Password salah";
                    }
                } else {
                    $output['success'] = false;
                    $output['message'] = "Alamat email belum diaktivasi, silahkan cek email / spam";
                }
            } else {
                $output['success'] = false;
                $output['message'] = "Alamat email belum terdaftar, silahkan buat akun";
            }
        }

        echo json_encode($output);
    }

    public function logout() {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            You have been logged out!
        </div>');
        redirect('auth');
    }
}
