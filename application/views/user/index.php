<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4">Manajemen User</h3>

    <!-- ✅ Flashdata -->
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <!-- ✅ Tombol Tambah -->
    <a href="<?= base_url('user/tambah') ?>" class="btn btn-primary mb-3">
      <i class="fas fa-user-plus"></i> Tambah User
    </a>

    <!-- ✅ Tabel Data User -->
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="datatable">
            <thead class="thead-light">
              <tr>
                <th width="5%">No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Level</th>
                <th width="18%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($user)): ?>
                <?php $no = 1; foreach ($user as $u): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $u->nama_lengkap ?></td>
                  <td><?= $u->username ?></td>
                  <td>
                    <span class="badge badge-<?= $u->level == 'admin' ? 'primary' : 'secondary' ?>">
                      <?= ucfirst($u->level) ?>
                    </span>
                  </td>
                  <td>
                    <a href="<?= base_url('user/edit/'.$u->id_user) ?>" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('user/hapus/'.$u->id_user) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus user ini?')">
                      <i class="fas fa-trash-alt"></i> Hapus
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center">Belum ada data user.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
