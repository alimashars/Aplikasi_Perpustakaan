<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('level')) {
            redirect('auth');
        }
        $this->load->model('Buku_model');
        $this->load->model('Kategori_model');
    }

    public function index() {
        $data['buku'] = $this->Buku_model->get_all_with_kategori();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('buku/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        if ($this->session->userdata('level') != 'admin') redirect('buku');
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('buku/form', $data);
        $this->load->view('template/footer');
    }

    public function simpan() {
        if ($this->session->userdata('level') != 'admin') redirect('buku');

        $this->Buku_model->insert($this->input->post());

        // ✅ Flashdata untuk notifikasi
        $this->session->set_flashdata('success', 'Data buku berhasil disimpan.');
        redirect('buku');
    }

    public function edit($id) {
        if ($this->session->userdata('level') != 'admin') redirect('buku');
        $data['kategori'] = $this->Kategori_model->get_all();
        $data['buku'] = $this->Buku_model->get_by_id($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('buku/form', $data);
        $this->load->view('template/footer');
    }

    public function update() {
        if ($this->session->userdata('level') != 'admin') redirect('buku');

        $this->Buku_model->update($this->input->post());

        // ✅ Flashdata update sukses
        $this->session->set_flashdata('success', 'Data buku berhasil diperbarui.');
        redirect('buku');
    }

    public function hapus($id) {
        if ($this->session->userdata('level') != 'admin') redirect('buku');

        $this->Buku_model->delete($id);

        // ✅ Flashdata hapus sukses
        $this->session->set_flashdata('success', 'Data buku berhasil dihapus.');
        redirect('buku');
    }

    public function detail($id_buku) {
        $this->load->model('Ulasan_model');
        $data['buku'] = $this->Buku_model->get_by_id($id_buku);
        $data['ulasan'] = $this->Ulasan_model->get_by_buku($id_buku);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('buku/detail', $data);
        $this->load->view('template/footer');
    }
}
