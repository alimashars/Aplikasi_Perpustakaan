<div class="content-header">
  <div class="container-fluid">
    <h3 class="mb-4"><?= isset($user) ? 'Edit' : 'Tambah' ?> User</h3>

    <div class="card">
      <div class="card-body">
        <form action="<?= isset($user) ? base_url('user/update') : base_url('user/simpan') ?>" method="post">
          <?php if (isset($user)): ?>
            <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
          <?php endif; ?>

          <div class="form-group mb-3">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required
                   value="<?= isset($user) ? $user->nama_lengkap : '' ?>">
          </div>

          <div class="form-group mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required
                   value="<?= isset($user) ? $user->username : '' ?>">
          </div>

          <div class="form-group mb-3">
            <label for="password">Password
              <?= isset($user) ? '<small class="text-muted">(Kosongkan jika tidak diubah)</small>' : '' ?>
            </label>
            <input type="password" name="password" id="password" class="form-control" <?= isset($user) ? '' : 'required' ?>>
          </div>

          <div class="form-group mb-4">
            <label for="level">Level</label>
            <select name="level" id="level" class="form-control" required>
              <option value="">-- Pilih Level --</option>
              <option value="admin" <?= isset($user) && $user->level == 'admin' ? 'selected' : '' ?>>💻 Admin</option>
              <option value="pengguna" <?= isset($user) && $user->level == 'pengguna' ? 'selected' : '' ?>>👤 Pengguna</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
          </button>
          <a href="<?= base_url('user') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
