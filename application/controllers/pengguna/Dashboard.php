<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('id_user')) {
            redirect('auth');
        }

        $this->load->model('Buku_model');
        $this->load->model('Ulasan_model');
        $this->load->model('Peminjam_model');
        $this->load->model('Wishlist_model'); // ✅ Tambahkan model wishlist
    }

    public function index() {
        $id_user = $this->session->userdata('id_user');

        $data['total_buku']       = $this->Buku_model->count_all();
        $data['total_peminjaman'] = $this->Peminjam_model->count_by_user($id_user);
        $data['total_ulasan']     = $this->Ulasan_model->count_by_user($id_user);
        $data['total_wishlist']   = count($this->Wishlist_model->get_by_user($id_user)); // ✅ Tambahkan total wishlist

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pengguna/dashboard', $data);
        $this->load->view('template/footer');
    }
}
