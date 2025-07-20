<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Data Kategori</h3>

    <!-- ✅ Notifikasi Flash -->
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
        <!-- Tombol Tambah -->
        <a href="<?= base_url('kategori/tambah') ?>" class="btn btn-primary mb-3">
          <i class="fas fa-plus"></i> Tambah Kategori
        </a>

        <!-- Tabel Data -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center align-middle" id="datatable" style="width: 100%;">
            <thead style="background-color: #f2f2f2;">
              <tr>
                <th width="5%">No</th>
                <th>Nama Kategori</th>
                <th width="25%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($kategori)): ?>
                <?php $no = 1; foreach ($kategori as $row): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td class="text-left"><?= $row->nama_kategori ?></td>
                    <td>
                      <a href="<?= base_url('kategori/edit/'.$row->id_kategori) ?>" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <a href="<?= base_url('kategori/hapus/'.$row->id_kategori) ?>" 
                         class="btn btn-sm btn-danger" 
                         onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                        <i class="fas fa-trash"></i> Hapus
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="3" class="text-center">Belum ada data kategori.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
