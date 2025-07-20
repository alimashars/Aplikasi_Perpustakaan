<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjam_model extends CI_Model {

    /**
     * Ambil semua data peminjam (untuk admin) beserta info buku dan user
     */
    public function get_all_with_buku_user() {
        $this->db->select('p.*, b.judul, u.nama_lengkap');
        $this->db->from('tb_peminjam p');
        $this->db->join('tb_buku b', 'p.id_buku = b.id_buku');
        $this->db->join('tb_user u', 'p.id_user = u.id_user');
        $this->db->order_by('p.id_peminjam', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Ambil data peminjaman berdasarkan ID user (untuk pengguna)
     */
    public function get_by_user($id_user) {
        $this->db->select('p.*, b.judul');
        $this->db->from('tb_peminjam p');
        $this->db->join('tb_buku b', 'p.id_buku = b.id_buku');
        $this->db->where('p.id_user', $id_user);
        $this->db->order_by('p.id_peminjam', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Ambil satu data peminjaman berdasarkan ID
     */
    public function get_by_id($id_peminjam) {
        $this->db->select('p.*, b.judul, b.id_buku, u.nama_lengkap');
        $this->db->from('tb_peminjam p');
        $this->db->join('tb_buku b', 'p.id_buku = b.id_buku');
        $this->db->join('tb_user u', 'p.id_user = u.id_user');
        $this->db->where('p.id_peminjam', $id_peminjam);
        return $this->db->get()->row();
    }

    /**
     * Tambah data peminjaman baru
     */
    public function insert($data) {
        return $this->db->insert('tb_peminjam', $data);
    }

    /**
     * Update data lengkap peminjaman berdasarkan ID
     */
    public function update($id_peminjam, $data) {
        $this->db->where('id_peminjam', $id_peminjam);
        return $this->db->update('tb_peminjam', $data);
    }

    /**
     * Update status saja (dipinjam, dikembalikan, dll)
     */
    public function update_status($id, $status) {
        $this->db->where('id_peminjam', $id);
        return $this->db->update('tb_peminjam', ['status' => $status]);
    }

    /**
     * Hapus data peminjaman berdasarkan ID
     */
    public function delete($id) {
        return $this->db->delete('tb_peminjam', ['id_peminjam' => $id]);
    }

    /**
     * Hitung semua data peminjaman (untuk dashboard admin)
     */
    public function count_all() {
        return $this->db->count_all('tb_peminjam');
    }

    /**
     * Hitung jumlah peminjaman berdasarkan ID user (untuk dashboard pengguna)
     */
    public function count_by_user($id_user) {
        return $this->db->where('id_user', $id_user)
                        ->from('tb_peminjam')
                        ->count_all_results();
    }
}
