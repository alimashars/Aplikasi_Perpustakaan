<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($title) ? $title : 'Perpustakaanku' ?></title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/fontawesome-free/css/all.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- AdminLTE Theme -->
  <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/dist/css/adminlte.min.css">

  <!-- ✨ Custom CSS -->
  <style>
    /* Global layout */
    body {
      font-family: 'Source Sans Pro', sans-serif;
      transition: background-color 0.3s, color 0.3s;
    }

    .content-wrapper {
      padding: 20px;
      transition: background-color 0.3s, color 0.3s;
    }

    /* Navbar */
    .main-header {
      background: linear-gradient(90deg, #0062ff, #00c6ff);
      color: white !important;
    }

    .main-header .nav-link,
    .main-header .fas {
      color: white !important;
    }

    .main-header .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 4px;
    }

    /* Dark Mode Styles */
    body.dark-mode {
      background-color: #121212 !important;
      color: #f1f1f1 !important;
    }

    .dark-mode .main-header,
    .dark-mode .main-sidebar,
    .dark-mode .content-wrapper,
    .dark-mode .card,
    .dark-mode .table {
      background-color: #1e1e1e !important;
      color: #fff;
    }

    .dark-mode .nav-sidebar .nav-link {
      color: #ccc;
    }

    .dark-mode .nav-sidebar .nav-link.active {
      background-color: #333;
      color: #fff;
    }

    .dark-mode .table th,
    .dark-mode .table td {
      color: #e0e0e0;
    }

    .dark-mode .btn,
    .dark-mode .form-control {
      background-color: #2c2c2c;
      color: #fff;
      border-color: #444;
    }

    .dark-mode .alert {
      background-color: #333;
      color: #fff;
      border-color: #444;
    }

    /* Smooth animation */
    .transition {
      transition: all 0.3s ease-in-out;
    }

    /* Dark Mode Toggle Button */
    #toggle-dark-mode {
      transition: background-color 0.2s, color 0.2s;
    }

    #toggle-dark-mode:hover {
      background-color: #ddd;
    }

    .dark-mode #toggle-dark-mode:hover {
      background-color: #555;
      color: #fff;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini transition">
<div class="wrapper">

<!-- ✅ Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Sidebar toggle -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
  </ul>

  <!-- ✅ Right navbar -->
  <ul class="navbar-nav ml-auto">
    <!-- Dark Mode Toggle -->
    <li class="nav-item">
      <button id="toggle-dark-mode" class="btn btn-sm btn-outline-light mr-2" title="Mode Gelap/Terang">
        <i class="fas fa-moon" id="theme-icon"></i>
      </button>
    </li>

    <!-- Logout -->
    <li class="nav-item">
      <a class="nav-link text-white" href="<?= base_url('auth/logout') ?>" onclick="return confirm('Yakin ingin keluar?')">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- ✅ Dark Mode Script -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggle-dark-mode');
    const icon = document.getElementById('theme-icon');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme === 'dark') {
      document.body.classList.add('dark-mode');
      icon.classList.replace('fa-moon', 'fa-sun');
    }

    toggleButton.addEventListener('click', function () {
      document.body.classList.toggle('dark-mode');
      const isDark = document.body.classList.contains('dark-mode');
      icon.classList.toggle('fa-moon', !isDark);
      icon.classList.toggle('fa-sun', isDark);
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });
  });
</script>
