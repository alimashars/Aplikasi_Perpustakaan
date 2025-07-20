<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Data Peminjaman</h3>

    <!-- ✅ Flash Notifikasi -->
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <div class="card">
      <div class="card-body">
        
        <!-- ✅ Tombol Tambah Peminjaman untuk Pengguna -->
        <?php if ($this->session->userdata('level') == 'pengguna'): ?>
          <a href="<?= base_url('peminjam/tambah') ?>" class="btn btn-primary mb-3">
            <i class="fas fa-plus-circle"></i> Pinjam Buku
          </a>
        <?php endif; ?>

        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center align-middle" id="datatable">
            <thead class="thead-light">
              <tr>
                <th width="5%">No</th>
                <?php if ($this->session->userdata('level') == 'admin'): ?>
                  <th width="20%">Nama Pengguna</th>
                <?php endif; ?>
                <th width="20%">Judul Buku</th>
                <th width="15%">Tanggal Pinjam</th>
                <th width="15%">Tanggal Kembali</th>
                <th width="10%">Status</th>
                <?php if ($this->session->userdata('level') == 'admin'): ?>
                  <th width="15%">Aksi</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($peminjam)): ?>
                <?php $no = 1; foreach ($peminjam as $p): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <?php if ($this->session->userdata('level') == 'admin'): ?>
                      <td><?= $p->nama_lengkap ?? '-' ?></td>
                    <?php endif; ?>
                    <td><?= $p->judul ?></td>
                    <td><?= $p->tgl_pinjam ?></td>
                    <td><?= $p->tgl_kembali ?></td>
                    <td>
                      <span class="badge badge-<?= $p->status == 'Dipinjam' ? 'warning' : 'success' ?>">
                        <?= $p->status ?>
                      </span>
                    </td>
                    <?php if ($this->session->userdata('level') == 'admin'): ?>
                      <td>
                        <?php if ($p->status == 'Dipinjam'): ?>
                          <a href="<?= base_url('peminjam/kembalikan/' . $p->id_peminjam) ?>" 
                             class="btn btn-sm btn-success" 
                             onclick="return confirm('Tandai sebagai dikembalikan?')">
                            <i class="fas fa-check-circle"></i> Kembalikan
                          </a>
                        <?php else: ?>
                          <span class="text-muted">Selesai</span>
                        <?php endif; ?>
                      </td>
                    <?php endif; ?>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="<?= $this->session->userdata('level') == 'admin' ? '7' : '6' ?>" class="text-center">
                    Tidak ada data peminjaman.
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ✅ Inisialisasi DataTables -->
<script>
  $(document).ready(function () {
    $('#datatable').DataTable({
      "language": {
        "search": "Cari:",
        "lengthMenu": "Tampilkan _MENU_ entri",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "→",
          "previous": "←"
        },
        "zeroRecords": "Data tidak ditemukan",
        "infoEmpty": "Menampilkan 0 entri",
        "infoFiltered": "(disaring dari _MAX_ total entri)"
      }
    });
  });
</script>
