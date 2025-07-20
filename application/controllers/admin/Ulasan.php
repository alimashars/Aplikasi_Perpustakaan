<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }

        $this->load->model('Ulasan_model');
        $this->load->model('Buku_model');
    }

    public function index() {
        $data['ulasan'] = $this->Ulasan_model->get_all_with_user_and_buku();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/ulasan/index', $data);
        $this->load->view('template/footer');
    }

    public function edit($id_ulasan) {
        $data['ulasan'] = $this->Ulasan_model->get_by_id($id_ulasan);
        $data['buku'] = $this->Buku_model->get_all(); // untuk dropdown buku

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/ulasan/edit', $data);
        $this->load->view('template/footer');
    }

    public function update() {
        $id_ulasan = $this->input->post('id_ulasan');
        $data = [
            'id_buku'   => $this->input->post('id_buku'),
            'ulasan'    => $this->input->post('ulasan')
        ];

        $this->Ulasan_model->update($id_ulasan, $data);
        $this->session->set_flashdata('success', 'Ulasan berhasil diperbarui.');
        redirect('admin/ulasan');
    }

    public function hapus($id_ulasan) {
        $this->Ulasan_model->delete($id_ulasan);
        $this->session->set_flashdata('success', 'Ulasan berhasil dihapus.');
        redirect('admin/ulasan');
    }
}
