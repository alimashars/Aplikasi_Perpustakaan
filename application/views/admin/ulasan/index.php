<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Ulasan Buku dari Pengguna</h3>

    <!-- ✅ Notifikasi Flashdata -->
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
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center align-middle" id="datatable" style="width: 100%;">
            <thead class="thead-light">
              <tr>
                <th width="5%">No</th>
                <th width="20%">Nama Pengguna</th>
                <th width="25%">Judul Buku</th>
                <th>Ulasan</th>
                <th width="10%">Rating</th>
                <th width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($ulasan)): ?>
                <?php $no = 1; foreach ($ulasan as $u): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $u->nama_lengkap ?></td>
                    <td class="text-left"><?= $u->judul ?></td>
                    <td class="text-left"><?= $u->ulasan ?></td>
                    <td><?= $u->rating ?>/5</td>
                    <td>
                      <!-- Tombol Edit -->
                      <a href="<?= base_url('admin/ulasan/edit/' . $u->id_ulasan) ?>" 
                         class="btn btn-sm btn-warning mb-1" 
                         title="Edit Ulasan">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <!-- Tombol Hapus -->
                      <a href="<?= base_url('admin/ulasan/hapus/' . $u->id_ulasan) ?>" 
                         class="btn btn-sm btn-danger" 
                         onclick="return confirm('Hapus ulasan ini?')"
                         title="Hapus Ulasan">
                        <i class="fas fa-trash-alt"></i> Hapus
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6" class="text-center">Belum ada ulasan dari pengguna.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
