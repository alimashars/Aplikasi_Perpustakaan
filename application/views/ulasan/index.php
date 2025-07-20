<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Daftar Buku untuk Diberi Ulasan</h3>

    <!-- ✅ Notifikasi sukses -->
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
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center align-middle" id="datatable">
            <thead class="thead-light">
              <tr>
                <th width="5%">No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th width="15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($buku)): ?>
                <?php $no = 1; foreach ($buku as $b): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $b->judul ?></td>
                  <td><?= $b->penulis ?></td>
                  <td><?= $b->penerbit ?></td>
                  <td><?= $b->nama_kategori ?></td>
                  <td>
                    <a href="<?= base_url('ulasan/beri/' . $b->id_buku) ?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-pen"></i> Beri Ulasan
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6" class="text-center">Tidak ada buku yang dapat diberi ulasan.</td>
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
      language: {
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ entri",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        infoEmpty: "Menampilkan 0 data",
        infoFiltered: "(disaring dari total _MAX_ entri)",
        zeroRecords: "Tidak ditemukan data",
        paginate: {
          first: "Pertama",
          last: "Terakhir",
          next: "→",
          previous: "←"
        }
      }
    });
  });
</script>
