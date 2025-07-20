<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index() {
        // Jika sudah login, redirect langsung ke dashboard sesuai level
        if ($this->session->userdata('level')) {
            redirect('splash'); // Ganti jadi splash
        }

        $this->load->view('auth/login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->cek_login($username, $password);

        if ($user) {
            $this->session->set_userdata([
                'id_user'       => $user->id_user,
                'username'      => $user->username,
                'nama_lengkap'  => $user->nama_lengkap,
                'level'         => $user->level
            ]);

            // Tambahkan flashdata jika ingin tampil pesan di splash (opsional)
            $this->session->set_flashdata('login_success', true);

            // ✅ Redirect ke splash (otomatis akan mengarahkan ke dashboard)
            redirect('splash');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function register() {
        $this->load->view('auth/register');
    }

    public function register_action() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required|in_list[admin,pengguna]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/register');
        } else {
            $data = [
                'username'      => $this->input->post('username'),
                'password'      => md5($this->input->post('password')),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'level'         => $this->input->post('level')
            ];

            $this->User_model->insert($data);

            $this->session->set_flashdata('success', 'Pendaftaran berhasil. Silakan login.');
            redirect('auth');
        }
    }
}
