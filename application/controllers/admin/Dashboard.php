<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Hanya bisa diakses oleh admin
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }

        // Load semua model yang dibutuhkan
        $this->load->model('Buku_model');
        $this->load->model('Peminjam_model');
        $this->load->model('Ulasan_model');
        $this->load->model('User_model');
        $this->load->model('Kategori_model');
        $this->load->model('Wishlist_model');
    }

    public function index() {
        $data['total_buku'] = $this->Buku_model->count_all();
        $data['total_kategori'] = $this->Kategori_model->count_all(); // ✅ kategori buku
        $data['total_peminjam'] = $this->Peminjam_model->count_all();
        $data['total_ulasan'] = $this->Ulasan_model->count_all();
        $data['total_user'] = $this->User_model->count_all();
        $data['total_wishlist'] = $this->Wishlist_model->count_all(); // ✅ wishlist pengguna

        // Load ke view dashboard admin
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer');
    }
}
