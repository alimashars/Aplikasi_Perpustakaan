<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjam extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('level')) {
            redirect('auth');
        }
        $this->load->model('Peminjam_model');
        $this->load->model('Buku_model');
    }

    public function index() {
        $level = $this->session->userdata('level');
        $id_user = $this->session->userdata('id_user');

        $data['peminjam'] = $level == 'admin' ?
            $this->Peminjam_model->get_all_with_buku_user() :
            $this->Peminjam_model->get_by_user($id_user);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('peminjam/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $data['buku'] = $this->Buku_model->get_all_with_kategori();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('peminjam/form', $data);
        $this->load->view('template/footer');
    }

    public function simpan() {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'id_buku' => $this->input->post('id_buku'),
            'tgl_pinjam' => date('Y-m-d'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
            'status' => 'Dipinjam'
        ];
        $this->Peminjam_model->insert($data);
        $this->session->set_flashdata('success', 'Peminjaman berhasil disimpan.');
        redirect('peminjam');
    }

    public function kembalikan($id) {
        if ($this->session->userdata('level') != 'admin') {
            redirect('peminjam');
        }

        $this->Peminjam_model->update_status($id, 'Dikembalikan');
        $this->session->set_flashdata('success', 'Buku berhasil dikembalikan.');
        redirect('peminjam');
    }

    public function hapus($id) {
        if ($this->session->userdata('level') != 'admin') {
            redirect('peminjam');
        }

        $this->Peminjam_model->delete($id);
        $this->session->set_flashdata('success', 'Data peminjaman berhasil dihapus.');
        redirect('peminjam');
    }

    // ✅ Tambahan: Fitur PINJAM BUKU dari daftar buku
    public function pinjam($id_buku) {
        if ($this->session->userdata('level') != 'pengguna') {
            redirect('auth');
        }

        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'id_buku' => $id_buku,
            'tgl_pinjam' => date('Y-m-d'),
            'tgl_kembali' => null,
            'status' => 'Dipinjam'
        ];

        $this->Peminjam_model->insert($data);
        $this->session->set_flashdata('success', 'Buku berhasil dipinjam.');
        redirect('peminjam');
    }
}
