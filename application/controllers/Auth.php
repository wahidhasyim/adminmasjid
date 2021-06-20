<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'login Page';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {

            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        "username" => $user['username'],
                        "role_id" => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) { // Admin
                        redirect('admin');
                    } else if ($user['role_id'] == 3) { // Bendahara
                        redirect('admin');
                    } else if ($user['role_id'] == 2) { // pengurus
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!
                      </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            This username has not been activated!
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username has not registered!
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logout!
      </div>');
        redirect('auth');
    }
}
