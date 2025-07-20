<?php
class Ulasan_model extends CI_Model {

    // Ambil semua ulasan + data user & buku (untuk admin)
    public function get_all_with_user_and_buku() {
        $this->db->select('ulasan.*, tb_user.nama_lengkap, tb_buku.judul');
        $this->db->from('tb_ulasan ulasan');
        $this->db->join('tb_user', 'ulasan.id_user = tb_user.id_user');
        $this->db->join('tb_buku', 'ulasan.id_buku = tb_buku.id_buku');
        return $this->db->get()->result();
    }

    // Ambil ulasan berdasarkan ID (untuk edit/hapus)
    public function get_by_id($id_ulasan) {
        return $this->db->get_where('tb_ulasan', ['id_ulasan' => $id_ulasan])->row();
    }

    // Tambah data ulasan (UNTUK PENGGUNA)
    public function insert($data) {
        return $this->db->insert('tb_ulasan', $data);
    }

    // Update data ulasan
    public function update($id_ulasan, $data) {
        $this->db->where('id_ulasan', $id_ulasan);
        return $this->db->update('tb_ulasan', $data);
    }

    // Hapus data ulasan
    public function delete($id_ulasan) {
        return $this->db->delete('tb_ulasan', ['id_ulasan' => $id_ulasan]);
    }

    // Hitung semua ulasan (untuk dashboard admin)
    public function count_all() {
        return $this->db->count_all('tb_ulasan');
    }

    // Hitung ulasan berdasarkan user tertentu (untuk dashboard pengguna)
    public function count_by_user($id_user) {
        return $this->db->where('id_user', $id_user)->count_all_results('tb_ulasan');
    }
}
