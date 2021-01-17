    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
	&copy; 2020 <strong>Rizky Ahmad Mahmudi - STMIK STIKOM INDONESIA </strong>		
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url()?>/assets/bootstrap/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->

<script src="<?=base_url()?>/assets/bootstrap/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?=base_url()?>/assets/bootstrap/dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>/assets/bootstrap/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>/assets/bootstrap/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<?php 
if (isset($extra)){
	$this->load->view($extra);
}
?>
</body>
</html>