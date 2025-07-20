<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Form Peminjaman Buku</h1>
    <form action="<?= base_url('peminjam/simpan') ?>" method="post">
      <div class="form-group">
        <label>Judul Buku</label>
        <select name="id_buku" class="form-control" required>
          <option value="">-- Pilih Buku --</option>
          <?php foreach ($buku as $b): ?>
            <option value="<?= $b->id_buku ?>"><?= $b->judul ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="<?= base_url('peminjam') ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
