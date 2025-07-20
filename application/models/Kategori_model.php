<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    // Ambil semua kategori
    public function get_all() {
        return $this->db->get('tb_kategori')->result();
    }

    // Ambil kategori berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where('tb_kategori', ['id_kategori' => $id])->row();
    }

    // Tambah kategori
    public function insert($nama) {
        $this->db->insert('tb_kategori', ['nama_kategori' => $nama]);
    }

    // Update kategori
    public function update($id, $nama) {
        $this->db->where('id_kategori', $id);
        $this->db->update('tb_kategori', ['nama_kategori' => $nama]);
    }

    // Hapus kategori
    public function delete($id) {
        $this->db->delete('tb_kategori', ['id_kategori' => $id]);
    }

    // ✅ Hitung total kategori (digunakan di dashboard admin)
    public function count_all() {
        return $this->db->count_all('tb_kategori');
    }
}
