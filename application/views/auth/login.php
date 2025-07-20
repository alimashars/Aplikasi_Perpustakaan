<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Aplikasi Perpustakaan</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
    }

    .login-container {
      max-width: 420px;
      margin-top: 8%;
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

    .alert {
      border-radius: 10px;
    }
  </style>
</head>
<body>

<div class="container login-container">
  <div class="row justify-content-center">
    <div class="col">
      <div class="card p-4">
        <div class="text-center mb-4">
          <i class="bi bi-person-circle fs-1 text-primary"></i>
          <h4 class="mt-2 fw-bold">Selamat Datang</h4>
          <p class="text-muted small">Masukkan username dan password untuk masuk ke Sistem Perpustakaan 😊💖✨📚</p>
        </div>

        <!-- Flash Message -->
        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><i class="bi bi-exclamation-circle-fill"></i> <?= $this->session->flashdata('error') ?></div>
        <?php elseif ($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><i class="bi bi-check-circle-fill"></i> <?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <!-- Form Login -->
        <form method="post" action="<?= base_url('auth/login') ?>">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
              <input type="text" name="username" id="username" class="form-control" required autofocus>
            </div>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
              <input type="password" name="password" id="password" class="form-control" required>
              <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                <i class="bi bi-eye-slash" id="toggleIcon"></i>
              </span>
            </div>
          </div>

          <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
          </button>
        </form>

        <!-- Link ke Register -->
        <p class="mt-3 text-center">
          Belum punya akun?
          <a href="<?= base_url('auth/register') ?>" class="text-primary fw-semibold text-decoration-none">
            Daftar di sini
          </a>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Script Toggle Password -->
<script>
  function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleIcon.classList.remove('bi-eye-slash');
      toggleIcon.classList.add('bi-eye');
    } else {
      passwordInput.type = 'password';
      toggleIcon.classList.remove('bi-eye');
      toggleIcon.classList.add('bi-eye-slash');
    }
  }
</script>

</body>
</html>
