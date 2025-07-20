<?php
  $segment1 = $this->uri->segment(1);
  $segment2 = $this->uri->segment(2);
  $level = $this->session->userdata('level');
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= $level == 'admin' ? base_url('admin/dashboard') : base_url('pengguna/dashboard') ?>" class="brand-link text-center">
    <span class="brand-text font-weight-light">📚 Perpustakaan</span>
  </a>


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- User Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column align-items-start pl-2">
      <div class="text-white">
        <strong><?= $this->session->userdata('nama_lengkap') ?></strong><br>
        <small><?= ucfirst($level) ?></small>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="false">

        <?php if ($level == 'admin'): ?>
          <!-- Dashboard Admin -->
          <li class="nav-item">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= ($segment1 == 'admin' && $segment2 == 'dashboard') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard Admin</p>
            </a>
          </li>

          <!-- Data Buku -->
          <li class="nav-item">
            <a href="<?= base_url('buku') ?>" class="nav-link <?= ($segment1 == 'buku') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>Data Buku</p>
            </a>
          </li>

          <!-- Data Peminjaman -->
          <li class="nav-item">
            <a href="<?= base_url('peminjam') ?>" class="nav-link <?= ($segment1 == 'peminjam') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-hand-holding"></i>
              <p>Data Peminjaman</p>
            </a>
          </li>

          <!-- Kategori Buku -->
          <li class="nav-item">
            <a href="<?= base_url('kategori') ?>" class="nav-link <?= ($segment1 == 'kategori') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>Kategori Buku</p>
            </a>
          </li>

          <!-- Manajemen User -->
          <li class="nav-item">
            <a href="<?= base_url('user') ?>" class="nav-link <?= ($segment1 == 'user') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>Manajemen User</p>
            </a>
          </li>

          <!-- Ulasan Pengguna -->
          <li class="nav-item">
            <a href="<?= base_url('admin/ulasan') ?>" class="nav-link <?= ($segment1 == 'admin' && $segment2 == 'ulasan') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-comments"></i>
              <p>Ulasan Pengguna</p>
            </a>
          </li>

          <!-- Wishlist Pengguna -->
          <li class="nav-item">
            <a href="<?= base_url('admin/wishlist') ?>" class="nav-link <?= ($segment1 == 'admin' && $segment2 == 'wishlist') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-heart"></i>
              <p>Wishlist Pengguna</p>
            </a>
          </li>

        <?php else: ?>
          <!-- Dashboard Pengguna -->
          <li class="nav-item">
            <a href="<?= base_url('pengguna/dashboard') ?>" class="nav-link <?= ($segment1 == 'pengguna' && $segment2 == 'dashboard') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <!-- Data Buku -->
          <li class="nav-item">
            <a href="<?= base_url('buku') ?>" class="nav-link <?= ($segment1 == 'buku') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-book-open"></i>
              <p>Data Buku</p>
            </a>
          </li>

          <!-- Peminjaman Saya -->
          <li class="nav-item">
            <a href="<?= base_url('peminjam') ?>" class="nav-link <?= ($segment1 == 'peminjam') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>Peminjaman Saya</p>
            </a>
          </li>

          <!-- Ulasan Buku -->
          <li class="nav-item">
            <a href="<?= base_url('ulasan') ?>" class="nav-link <?= ($segment1 == 'ulasan') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-star"></i>
              <p>Ulasan Buku</p>
            </a>
          </li>

          <!-- Wishlist Saya -->
          <li class="nav-item">
            <a href="<?= base_url('wishlist') ?>" class="nav-link <?= ($segment1 == 'wishlist') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-heart"></i>
              <p>Wishlist Saya</p>
            </a>
          </li>
        <?php endif; ?>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper -->
<div class="content-wrapper">
