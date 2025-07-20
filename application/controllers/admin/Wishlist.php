<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Hanya admin yang bisa akses controller ini
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }

        $this->load->model('Wishlist_model');
    }

    public function index() {
        $data['wishlist'] = $this->Wishlist_model->get_all_with_user();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/wishlist/index', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id_wishlist) {
        $this->Wishlist_model->delete($id_wishlist);
        $this->session->set_flashdata('success', 'Wishlist berhasil dihapus.');
        redirect('admin/wishlist');
    }

    public function edit($id_wishlist) {
        $this->load->model('Buku_model');
        $data['wishlist'] = $this->Wishlist_model->get_by_id($id_wishlist);
        $data['buku'] = $this->Buku_model->get_all();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/wishlist/edit', $data);
        $this->load->view('template/footer');
    }

    public function update() {
        $id_wishlist = $this->input->post('id_wishlist');
        $id_buku = $this->input->post('id_buku');

        $this->Wishlist_model->update($id_wishlist, ['id_buku' => $id_buku]);
        $this->session->set_flashdata('success', 'Wishlist berhasil diperbarui.');
        redirect('admin/wishlist');
    }
}
