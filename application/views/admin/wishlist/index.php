<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Daftar Wishlist Pengguna</h3>

    <!-- Notifikasi -->
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <div class="card shadow-sm">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center align-middle" id="datatable">
            <thead class="thead-light">
              <tr>
                <th width="5%">No</th>
                <th>Nama Pengguna</th>
                <th>Judul Buku</th>
                <th>Tanggal Ditambahkan</th>
                <th width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($wishlist)): ?>
                <?php $no = 1; foreach ($wishlist as $w): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $w->nama_lengkap ?></td>
                    <td><?= $w->judul ?></td>
                    <td><?= date('d-m-Y', strtotime($w->tanggal_ditambahkan ?? $w->created_at ?? 'now')) ?></td>
                    <td>
                      <a href="<?= base_url('admin/wishlist/edit/' . $w->id_wishlist) ?>" 
                         class="btn btn-sm btn-warning mb-1" 
                         title="Edit Wishlist">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <a href="<?= base_url('admin/wishlist/hapus/' . $w->id_wishlist) ?>"
                         class="btn btn-sm btn-danger"
                         onclick="return confirm('Yakin ingin menghapus wishlist ini?')"
                         title="Hapus Wishlist">
                        <i class="fas fa-trash-alt"></i> Hapus
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center">Tidak ada data wishlist pengguna.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
