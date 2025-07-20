<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    /**
     * Ambil semua data user
     */
    public function get_all() {
        return $this->db->get('tb_user')->result();
    }

    /**
     * Ambil user berdasarkan ID
     */
    public function get_by_id($id) {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row();
    }

    /**
     * Tambah user baru
     */
    public function insert($data) {
        return $this->db->insert('tb_user', $data);
    }

    /**
     * Update data user
     */
    public function update($data) {
        $this->db->where('id_user', $data['id_user']);
        return $this->db->update('tb_user', $data);
    }

    /**
     * Hapus user berdasarkan ID
     */
    public function delete($id) {
        return $this->db->delete('tb_user', ['id_user' => $id]);
    }

    /**
     * Cek login berdasarkan username dan password
     * Password disarankan menggunakan hash bcrypt di masa depan
     */
    public function cek_login($username, $password) {
        return $this->db->get_where('tb_user', [
            'username' => $username,
            'password' => md5($password) // ganti ke password_hash() untuk lebih aman
        ])->row();
    }

    /**
     * Cek apakah username sudah terdaftar
     */
    public function username_exists($username) {
        return $this->db->where('username', $username)
                        ->from('tb_user')
                        ->count_all_results() > 0;
    }

    /**
     * Hitung jumlah total user (untuk dashboard admin)
     */
    public function count_all() {
        return $this->db->count_all('tb_user');
    }
}
