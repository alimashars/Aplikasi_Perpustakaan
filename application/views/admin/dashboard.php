<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Dashboard Admin</h3>

    <div class="alert text-white shadow-sm" style="background: linear-gradient(135deg, #f7971e, #ffd200); border: none;">
      Selamat datang, <b><?= $this->session->userdata('nama_lengkap') ?></b>! Anda login sebagai <b>Admin</b>.
    </div>


    <div class="row">
      <!-- Total Buku -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?= $total_buku ?></h3>
            <p>Total Buku</p>
          </div>
          <div class="icon">
            <i class="fas fa-book"></i>
          </div>
          <a href="<?= base_url('buku') ?>" class="small-box-footer">
            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Total Kategori Buku -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3><?= $total_kategori ?></h3>
            <p>Total Kategori Buku</p>
          </div>
          <div class="icon">
            <i class="fas fa-list-alt"></i>
          </div>
          <a href="<?= base_url('kategori') ?>" class="small-box-footer">
            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Total Peminjaman -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $total_peminjam ?></h3>
            <p>Total Peminjaman</p>
          </div>
          <div class="icon">
            <i class="fas fa-book-reader"></i>
          </div>
          <a href="<?= base_url('peminjam') ?>" class="small-box-footer">
            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Total Pengguna -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= $total_user ?></h3>
            <p>Total Pengguna</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="<?= base_url('user') ?>" class="small-box-footer">
            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Total Ulasan -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $total_ulasan ?></h3>
            <p>Total Ulasan</p>
          </div>
          <div class="icon">
            <i class="fas fa-comments"></i>
          </div>
          <a href="<?= base_url('admin/ulasan') ?>" class="small-box-footer">
            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Total Wishlist Pengguna -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $total_wishlist ?></h3>
            <p>Total Wishlist Pengguna</p>
          </div>
          <div class="icon">
            <i class="fas fa-heart"></i>
          </div>
          <a href="<?= base_url('admin/wishlist') ?>" class="small-box-footer">
            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
