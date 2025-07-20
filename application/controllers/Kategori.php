<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('Kategori_model');
    }

    public function index() {
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kategori/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kategori/form');
        $this->load->view('template/footer');
    }

    public function simpan() {
        $nama = $this->input->post('nama_kategori');
        $this->Kategori_model->insert($nama);
        $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan.');
        redirect('kategori');
    }

    public function edit($id) {
        $data['kategori'] = $this->Kategori_model->get_by_id($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kategori/form', $data);
        $this->load->view('template/footer');
    }

    public function update() {
        $id = $this->input->post('id_kategori');
        $nama = $this->input->post('nama_kategori');
        $this->Kategori_model->update($id, $nama);
        $this->session->set_flashdata('success', 'Kategori berhasil diperbarui.');
        redirect('kategori');
    }

    public function hapus($id) {
        $this->Kategori_model->delete($id);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
        redirect('kategori');
    }
}
