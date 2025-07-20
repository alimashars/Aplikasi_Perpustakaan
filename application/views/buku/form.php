<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4"><?= isset($buku) ? 'Edit' : 'Tambah' ?> Buku</h3>

    <div class="card">
      <div class="card-body">
        <form action="<?= isset($buku) ? base_url('buku/update') : base_url('buku/simpan') ?>" method="post">
          <?php if (isset($buku)): ?>
            <input type="hidden" name="id_buku" value="<?= $buku->id_buku ?>">
          <?php endif; ?>

          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" class="form-control" required 
              value="<?= isset($buku) ? $buku->judul : '' ?>">
          </div>

          <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" name="penulis" class="form-control"
              value="<?= isset($buku) ? $buku->penulis : '' ?>">
          </div>

          <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" class="form-control"
              value="<?= isset($buku) ? $buku->penerbit : '' ?>">
          </div>

          <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" class="form-control"
              value="<?= isset($buku) ? $buku->tahun_terbit : '' ?>">
          </div>

          <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select id="id_kategori" name="id_kategori" class="form-control" required>
              <option value="">-- Pilih Kategori --</option>
              <?php foreach ($kategori as $k): ?>
                <option value="<?= $k->id_kategori ?>" <?= isset($buku) && $buku->id_kategori == $k->id_kategori ? 'selected' : '' ?>>
                  <?= $k->nama_kategori ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
          </button>
          <a href="<?= base_url('buku') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
