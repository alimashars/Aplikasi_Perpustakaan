<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Akun - Aplikasi Perpustakaan</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
    }

    .register-container {
      max-width: 480px;
      margin-top: 5%;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      animation: fadeIn 0.9s ease;
    }

    .form-control {
      border-radius: 10px;
    }

    .btn-primary {
      border-radius: 10px;
      font-weight: 600;
      background-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0069d9;
    }

    .alert {
      border-radius: 10px;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-25px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

<div class="container register-container">
  <div class="row justify-content-center">
    <div class="col">
      <div class="card p-4">
        <div class="text-center mb-4">
          <i class="bi bi-person-plus-fill fs-1 text-primary"></i>
          <h4 class="mt-2 fw-bold">Buat Akun Baru</h4>
          <p class="text-muted small">Silakan isi data di bawah untuk mendaftar</p>
        </div>

        <!-- ✅ Flash Message -->
        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><i class="bi bi-exclamation-circle-fill"></i> <?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <!-- ✅ Form Registrasi -->
        <form method="post" action="<?= base_url('auth/register_action') ?>">
          <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
              <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
              <input type="text" class="form-control" name="username" id="username" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
              <input type="password" class="form-control" name="password" id="password" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="level" class="form-label">Daftar Sebagai</label>
            <select name="level" id="level" class="form-select" required>
              <option value="">-- Pilih --</option>
              <option value="pengguna">👤 Pengguna</option>
              <option value="admin">💻 Admin</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-person-plus"></i> Daftar
          </button>
        </form>

        <!-- ✅ Link ke Login -->
        <p class="text-center mt-3">
          Sudah punya akun?
          <a href="<?= base_url('auth') ?>" class="text-primary fw-semibold text-decoration-none">
            Login di sini
          </a>
        </p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
