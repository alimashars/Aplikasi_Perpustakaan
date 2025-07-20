<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Edit Wishlist</h3>

    <div class="card">
      <div class="card-body">
        <form method="post" action="<?= base_url('wishlist/update') ?>">
          <input type="hidden" name="id_wishlist" value="<?= $wishlist->id_wishlist ?>">

          <div class="form-group">
            <label for="id_buku">Pilih Buku</label>
            <select name="id_buku" class="form-control" required>
              <option value="">-- Pilih Buku --</option>
              <?php foreach ($buku as $b): ?>
                <option value="<?= $b->id_buku ?>" <?= $b->id_buku == $wishlist->id_buku ? 'selected' : '' ?>>
                  <?= $b->judul ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="<?= base_url('wishlist') ?>" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
