<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('User_model');
    }

    public function index() {
        $data['user'] = $this->User_model->get_all();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('user/form');
        $this->load->view('template/footer');
    }

    public function simpan() {
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level')
        ];
        $this->User_model->insert($data);
        $this->session->set_flashdata('success', 'User berhasil ditambahkan.');
        redirect('user');
    }

    public function edit($id) {
        $data['user'] = $this->User_model->get_by_id($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('user/form', $data);
        $this->load->view('template/footer');
    }

    public function update() {
        $data = [
            'id_user' => $this->input->post('id_user'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'username' => $this->input->post('username'),
            'level' => $this->input->post('level')
        ];
        if ($this->input->post('password')) {
            $data['password'] = md5($this->input->post('password'));
        }
        $this->User_model->update($data);
        $this->session->set_flashdata('success', 'User berhasil diperbarui.');
        redirect('user');
    }

    public function hapus($id) {
        $this->User_model->delete($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus.');
        redirect('user');
    }
}
