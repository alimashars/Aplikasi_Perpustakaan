<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Beri Ulasan Buku</h3>

    <div class="card">
      <div class="card-body">
        <form method="post" action="<?= base_url('ulasan/simpan') ?>">
          <input type="hidden" name="id_buku" value="<?= $buku->id_buku ?>">

          <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" class="form-control" value="<?= $buku->judul ?>" readonly>
          </div>

          <div class="form-group">
            <label>Ulasan</label>
            <textarea name="ulasan" class="form-control" rows="4" required placeholder="Tulis ulasan Anda..."></textarea>
          </div>

          <div class="form-group">
            <label>Rating (1-5)</label>
            <select name="rating" class="form-control" required>
              <option value="">-- Pilih Rating --</option>
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
              <?php endfor; ?>
            </select>
          </div>

          <button type="submit" class="btn btn-success">Kirim Ulasan</button>
          <a href="<?= base_url('ulasan') ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
