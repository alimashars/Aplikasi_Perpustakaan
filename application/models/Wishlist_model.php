<?php
class Wishlist_model extends CI_Model {

    // Ambil wishlist berdasarkan user (untuk pengguna)
    public function get_by_user($id_user) {
        $this->db->select('wishlist.*, tb_buku.judul, tb_buku.penulis');
        $this->db->from('tb_wishlist wishlist');
        $this->db->join('tb_buku', 'tb_buku.id_buku = wishlist.id_buku');
        $this->db->where('wishlist.id_user', $id_user);
        return $this->db->get()->result();
    }

    // Ambil semua wishlist beserta info user (untuk admin)
    public function get_all_with_user() {
        $this->db->select('wishlist.*, tb_buku.judul, tb_user.nama_lengkap');
        $this->db->from('tb_wishlist wishlist');
        $this->db->join('tb_buku', 'tb_buku.id_buku = wishlist.id_buku');
        $this->db->join('tb_user', 'tb_user.id_user = wishlist.id_user');
        return $this->db->get()->result();
    }

    // Ambil 1 wishlist berdasarkan ID-nya (untuk edit oleh pengguna)
    public function get_by_id($id_wishlist) {
        $this->db->select('wishlist.*, tb_buku.judul, tb_buku.id_buku');
        $this->db->from('tb_wishlist wishlist');
        $this->db->join('tb_buku', 'tb_buku.id_buku = wishlist.id_buku');
        $this->db->where('wishlist.id_wishlist', $id_wishlist);
        return $this->db->get()->row();
    }

    // Simpan data wishlist baru
    public function insert($data) {
        return $this->db->insert('tb_wishlist', $data);
    }

    // Update wishlist berdasarkan ID
    public function update($id_wishlist, $data) {
        $this->db->where('id_wishlist', $id_wishlist);
        return $this->db->update('tb_wishlist', $data);
    }

    // Hapus wishlist
    public function delete($id_wishlist) {
        return $this->db->delete('tb_wishlist', ['id_wishlist' => $id_wishlist]);
    }

    // Hitung total wishlist oleh user (untuk dashboard pengguna)
    public function count_by_user($id_user) {
        return $this->db->where('id_user', $id_user)->count_all_results('tb_wishlist');
    }

    // ✅ Hitung total seluruh wishlist (untuk dashboard admin)
    public function count_all() {
        return $this->db->count_all('tb_wishlist');
    }
}
