<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    // Ambil semua buku beserta nama kategori
    public function get_all_with_kategori() {
        $this->db->select('b.*, k.nama_kategori');
        $this->db->from('tb_buku b');
        $this->db->join('tb_kategori k', 'b.id_kategori = k.id_kategori', 'left');
        return $this->db->get()->result();
    }

    // ✅ Ambil semua buku tanpa join (untuk dropdown atau pilihan umum)
    public function get_all() {
        return $this->db->get('tb_buku')->result();
    }

    // Ambil data buku berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where('tb_buku', ['id_buku' => $id])->row();
    }

    // Simpan buku baru
    public function insert($data) {
        return $this->db->insert('tb_buku', [
            'judul'        => $data['judul'],
            'penulis'      => $data['penulis'],
            'penerbit'     => $data['penerbit'],
            'tahun_terbit' => $data['tahun_terbit'],
            'id_kategori'  => $data['id_kategori']
        ]);
    }

    // Update data buku
    public function update($data) {
        $this->db->where('id_buku', $data['id_buku']);
        return $this->db->update('tb_buku', [
            'judul'        => $data['judul'],
            'penulis'      => $data['penulis'],
            'penerbit'     => $data['penerbit'],
            'tahun_terbit' => $data['tahun_terbit'],
            'id_kategori'  => $data['id_kategori']
        ]);
    }

    // Hapus buku berdasarkan ID
    public function delete($id) {
        return $this->db->delete('tb_buku', ['id_buku' => $id]);
    }

    // Hitung total buku (untuk dashboard)
    public function count_all() {
        return $this->db->count_all('tb_buku');
    }
}
