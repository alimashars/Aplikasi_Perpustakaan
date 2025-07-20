<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Dashboard Pengguna</h3>

    <div class="alert shadow-sm text-white" style="background: linear-gradient(135deg, #2066ffff, #2eaee9ff); border: none;">
      Selamat datang, <b><?= $this->session->userdata('nama_lengkap') ?></b>! Anda login sebagai <b>Pengguna</b>.
    </div>

    <div class="row">
      <!-- Data Buku -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-gradient-primary shadow">
          <div class="inner">
            <h3><?= isset($total_buku) ? $total_buku : 0 ?></h3>
            <p>Data Buku</p>
          </div>
          <div class="icon">
            <i class="fas fa-book"></i>
          </div>
          <a href="<?= base_url('buku') ?>" class="small-box-footer">
            Lihat <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Peminjaman Saya -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-gradient-success shadow">
          <div class="inner">
            <h3><?= isset($total_peminjaman) ? $total_peminjaman : 0 ?></h3>
            <p>Peminjaman Saya</p>
          </div>
          <div class="icon">
            <i class="fas fa-book-reader"></i>
          </div>
          <a href="<?= base_url('peminjam') ?>" class="small-box-footer">
            Lihat <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Ulasan Buku -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-gradient-warning shadow">
          <div class="inner">
            <h3><?= isset($total_ulasan) ? $total_ulasan : 0 ?></h3>
            <p>Ulasan Buku</p>
          </div>
          <div class="icon">
            <i class="fas fa-star"></i>
          </div>
          <a href="<?= base_url('ulasan') ?>" class="small-box-footer">
            Lihat <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Wishlist Saya -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-gradient-danger shadow">
          <div class="inner">
            <h3><?= isset($total_wishlist) ? $total_wishlist : 0 ?></h3>
            <p>Wishlist Saya</p>
          </div>
          <div class="icon">
            <i class="fas fa-heart"></i>
          </div>
          <a href="<?= base_url('wishlist') ?>" class="small-box-footer">
            Lihat <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
