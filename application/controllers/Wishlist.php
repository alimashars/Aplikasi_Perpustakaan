<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('level')) {
            redirect('auth');
        }

        $this->load->model('Wishlist_model');
        $this->load->model('Buku_model'); // Digunakan saat form edit
    }

    public function index() {
        $level = $this->session->userdata('level');

        if ($level == 'admin') {
            $data['wishlist'] = $this->Wishlist_model->get_all_with_user();
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('admin/wishlist/index', $data);
            $this->load->view('template/footer');
        } else {
            $id_user = $this->session->userdata('id_user');
            $data['wishlist'] = $this->Wishlist_model->get_by_user($id_user);
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('wishlist/index', $data);
            $this->load->view('template/footer');
        }
    }

    public function tambah($id_buku) {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'id_buku' => $id_buku
        ];

        $this->Wishlist_model->insert($data);
        $this->session->set_flashdata('success', 'Buku berhasil ditambahkan ke wishlist.');
        redirect('buku');
    }

    public function hapus($id_wishlist) {
        $this->Wishlist_model->delete($id_wishlist);
        $this->session->set_flashdata('success', 'Buku berhasil dihapus dari wishlist.');
        redirect('wishlist');
    }

    // ✅ Tampilkan Form Edit
    public function edit($id_wishlist) {
        if ($this->session->userdata('level') != 'pengguna') {
            show_404();
        }

        $wishlist = $this->Wishlist_model->get_by_id($id_wishlist);
        if (!$wishlist || $wishlist->id_user != $this->session->userdata('id_user')) {
            show_404();
        }

        $data['wishlist'] = $wishlist;
        $data['buku'] = $this->Buku_model->get_all();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('wishlist/edit', $data);
        $this->load->view('template/footer');
    }

    // ✅ Proses Update Wishlist
    public function update() {
        $id_wishlist = $this->input->post('id_wishlist');
        $id_buku = $this->input->post('id_buku');

        // Validasi agar user hanya bisa mengedit wishlist miliknya
        $wishlist = $this->Wishlist_model->get_by_id($id_wishlist);
        if (!$wishlist || $wishlist->id_user != $this->session->userdata('id_user')) {
            show_404();
        }

        $this->Wishlist_model->update($id_wishlist, [
            'id_buku' => $id_buku
        ]);

        $this->session->set_flashdata('success', 'Wishlist berhasil diperbarui.');
        redirect('wishlist');
    }
}
