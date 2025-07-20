<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Memuat Dashboard...</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa, #ffffff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: 'Segoe UI', sans-serif;
      overflow: hidden;
      flex-direction: column;
    }

    .logo {
      max-width: 200px;
      animation: zoomIn 1.5s ease-in-out;
    }

    .text-loading {
      margin-top: 20px;
      font-size: 1.2rem;
      font-weight: 500;
      color: #007bff;
      animation: fadeIn 1.5s ease-in-out;
    }

    .spinner-border {
      margin-top: 25px;
      width: 3rem;
      height: 3rem;
    }

    @keyframes zoomIn {
      from { transform: scale(0.5); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>
<body>

  <!-- ✅ Logo -->
  <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo Perpustakaan" class="logo">

  <!-- ✅ Teks Loading -->
  <div class="text-loading">Sedang memuat dashboard Anda...</div>

  <!-- ✅ Spinner -->
  <div class="spinner-border text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>

  <!-- ✅ Auto Redirect -->
  <script>
    setTimeout(function() {
      <?php if ($this->session->userdata('level') == 'admin'): ?>
        window.location.href = "<?= base_url('admin/dashboard') ?>";
      <?php else: ?>
        window.location.href = "<?= base_url('pengguna/dashboard') ?>";
      <?php endif; ?>
    }, 5600); // 3.5 detik delay
  </script>

</body>
</html>
