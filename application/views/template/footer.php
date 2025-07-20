</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer text-sm">
  <div class="float-right d-none d-sm-inline">
    Sistem Informasi Perpustakaan
  </div>
  <strong>&copy; <?= date('Y') ?> <a href="#">Perpustakaan CI3</a>.</strong> All rights reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/templates') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/templates') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/templates') ?>/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/templates') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/templates') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<!-- Optional: DataTables init -->
<script>
  $(document).ready(function () {
    $('#datatable').DataTable({
      responsive: true,
      autoWidth: false
    });
  });
</script>

<!-- Optional: Dark mode restore if JS is disabled on header -->
<noscript>
  <style>
    body.dark-mode {
      background-color: #121212 !important;
      color: #f1f1f1 !important;
    }
  </style>
</noscript>

</body>
</html>
