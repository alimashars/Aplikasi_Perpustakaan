<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Data Buku</h3>

    <!-- Flashdata Notifikasi -->
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <!-- Tombol Tambah untuk Admin -->
    <?php if ($this->session->userdata('level') == 'admin'): ?>
      <a href="<?= base_url('buku/tambah') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Buku
      </a>
    <?php endif; ?>

    <div class="card shadow-sm">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center" id="datatable">
            <thead class="thead-light">
              <tr>
                <th width="5%">No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($buku as $b): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $b->judul ?></td>
                <td><?= $b->penulis ?></td>
                <td><?= $b->penerbit ?></td>
                <td><?= $b->tahun_terbit ?></td>
                <td><?= $b->nama_kategori ?></td>
                <td>
                  <?php if ($this->session->userdata('level') == 'admin'): ?>
                    <a href="<?= base_url('buku/edit/' . $b->id_buku) ?>" 
                       class="btn btn-sm btn-warning" 
                       title="Edit">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('buku/hapus/' . $b->id_buku) ?>" 
                       class="btn btn-sm btn-danger" 
                       onclick="return confirm('Yakin ingin menghapus buku ini?')" 
                       title="Hapus">
                      <i class="fas fa-trash"></i> Hapus
                    </a>
                  <?php else: ?>
                    <a href="<?= base_url('wishlist/tambah/' . $b->id_buku) ?>" 
                       class="btn btn-sm btn-outline-success" 
                       title="Tambahkan ke Wishlist">
                      <i class="fas fa-heart"></i> Favorit
                    </a>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; ?>

              <?php if (empty($buku)): ?>
              <tr>
                <td colspan="7" class="text-center">Tidak ada data buku.</td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
