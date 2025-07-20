<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4"><?= isset($kategori) ? 'Edit' : 'Tambah' ?> Kategori</h3>

    <div class="card">
      <div class="card-body">
        <form action="<?= isset($kategori) ? base_url('kategori/update') : base_url('kategori/simpan') ?>" method="post">
          <?php if (isset($kategori)): ?>
            <input type="hidden" name="id_kategori" value="<?= $kategori->id_kategori ?>">
          <?php endif; ?>

          <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" required 
              value="<?= isset($kategori) ? $kategori->nama_kategori : '' ?>">
          </div>

          <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
          </button>
          <a href="<?= base_url('kategori') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
