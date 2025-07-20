<h2><?= $buku->judul ?></h2>
<p><strong>Penulis:</strong> <?= $buku->penulis ?></p>
<p><strong>Penerbit:</strong> <?= $buku->penerbit ?></p>
<p><strong>Tahun:</strong> <?= $buku->tahun_terbit ?></p>

<hr>
<h4>Ulasan</h4>
<?php foreach ($ulasan as $u): ?>
    <div style="margin-bottom:10px">
        <strong><?= $u->nama_lengkap ?></strong> (<?= $u->rating ?>/5)<br>
        <?= $u->ulasan ?><br>
        <small><?= $u->tanggal_ulasan ?></small>
        <hr>
    </div>
<?php endforeach; ?>

<?php if ($this->session->userdata('level') == 'pengguna'): ?>
<form method="post" action="<?= base_url('ulasan/simpan') ?>">
    <input type="hidden" name="id_buku" value="<?= $buku->id_buku ?>">
    <textarea name="ulasan" class="form-control" required></textarea><br>
    <input type="number" name="rating" min="1" max="5" class="form-control" required><br>
    <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
</form>
<?php endif; ?>
