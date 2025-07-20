<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Edit Ulasan Pengguna</h3>

    <div class="card">
      <div class="card-body">
        <form action="<?= base_url('admin/ulasan/update') ?>" method="post">
          <input type="hidden" name="id_ulasan" value="<?= $ulasan->id_ulasan ?>">

          <div class="form-group">
            <label for="id_buku">Judul Buku</label>
            <select name="id_buku" id="id_buku" class="form-control">
              <?php foreach ($buku as $b): ?>
                <option value="<?= $b->id_buku ?>" <?= $b->id_buku == $ulasan->id_buku ? 'selected' : '' ?>>
                  <?= $b->judul ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="ulasan">Isi Ulasan</label>
            <textarea name="ulasan" id="ulasan" class="form-control" rows="4"><?= $ulasan->ulasan ?></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="<?= base_url('admin/ulasan') ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
