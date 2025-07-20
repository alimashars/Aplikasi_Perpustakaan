<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('id_user')) {
            redirect('auth');
        }
        $this->load->model('Buku_model');
        $this->load->model('Ulasan_model');
    }

    // Halaman daftar buku yang bisa diulas
    public function index() {
        $data['buku'] = $this->Buku_model->get_all_with_kategori();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ulasan/index', $data);
        $this->load->view('template/footer');
    }

    // Halaman form ulasan
    public function beri($id_buku) {
        $data['buku'] = $this->Buku_model->get_by_id($id_buku);

        if (!$data['buku']) {
            show_404(); // validasi kalau buku tidak ditemukan
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ulasan/form_ulasan', $data);
        $this->load->view('template/footer');
    }

    // Proses simpan ulasan
    public function simpan() {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'id_buku' => $this->input->post('id_buku'),
            'ulasan'  => $this->input->post('ulasan', TRUE),
            'rating'  => $this->input->post('rating')
        ];

        $this->Ulasan_model->insert($data);

        // Flash message
        $this->session->set_flashdata('success', 'Ulasan Anda berhasil dikirim.');

        redirect('ulasan');
    }
}
