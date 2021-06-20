<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        $this->load->library('form_validation');
        
    }

    public function index()
    {
        $data['title'] = 'Anggota';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();


        $data['total_anggota'] = $this->db->get('user')->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $data['anggota'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('anggota/index', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'name' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'nama_penyumbang' => $this->input->post('password'),
                'nominal' => $this->input->post('role')

            ];
            $this->db->insert('pemasukan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Tambah Pemasukan Berhasil!
          </div>');
            redirect('anggota');
        }
    }

    public function tambahAnggota()
    {
        $data['title'] = "Penambahan Anggota";
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['anggota'] = $this->db->get('user')->result_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username yang ada masukkan telah digunakan!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        $role_name = null;
          if($_POST['role'] == 1){
          $role_name = "Admin";
         }else if ($_POST['role'] == 2){
        $role_name = "Pengurus";
         } else if ($_POST['role'] == 3) {
          $role_name = "Bendahara";
         } else {
        $role_name = "Salah";
         }

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pembuatan akun gagal, silahkan cek lagi form anda!</div>');
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('anggota/index', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash(($this->input->post('password1')), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role'),
                'role_name' => $role_name,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Akun berhasil dibuat!</div>');
            redirect('anggota');
        }
    }

    public function updateAnggota()
    {   
        $data['title'] = "Edit Anggota";
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['anggota'] = $this->db->get('user')->result_array();

        $id = $this->input->post('id');

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        
        $role_name = null;
          if($_POST['role'] == 1){
          $role_name = "Admin";
         }else if ($_POST['role'] == 2){
        $role_name = "Pengurus";
         } else if ($_POST['role'] == 3) {
          $role_name = "Bendahara";
         } else {
        $role_name = "Salah";
         }
         


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Akun Gagal!</div>');
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('anggota/index', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'name' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash(($this->input->post('password')), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role'),
                'role_name' => $role_name,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->where('id', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Edit Anggota Berhasil</div>');
            redirect('anggota');
        }
    }

    public function deleteAnggota()
    {
        $id = $this->input->get('id');

        $user =  $this->db->get_where('user', ['id' => $id])->row_array();

        $this->db->delete('user', array('id' => $id));


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Akun Anggota Berhasil!
          </div>');
        redirect('anggota/index');
    }
}
