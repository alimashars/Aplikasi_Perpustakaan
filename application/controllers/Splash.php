<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Splash extends CI_Controller {

    public function index() {
        // ambil level dari session
        $level = $this->session->userdata('level');

        // kalau tidak login, arahkan ke login
        if (!$level) {
            redirect('auth');
        }

        // tampilkan splash view
        $this->load->view('splash');
    }
}
