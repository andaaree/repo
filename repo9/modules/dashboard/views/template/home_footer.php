<footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.2
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->


    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('')?>assets/AdminLTE/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?php echo base_url('')?>assets/AdminLTE/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('')?>assets/AdminLTE/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('')?>assets/AdminLTE/js/adminlte.min.js"></script>
    <!-- DataTables -->
<script src="<?php echo base_url('')?>assets/AdminLTE/datatables/jquery.dataTables.js"></script>
    <!-- AdninLTE DataTables -->
    <script src="<?php echo base_url('')?>assets/AdminLTE/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('')?>assets/AdminLTE/dist/js/demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script type=text/javascript>
    document.querySelector('.btnSubmit').addEventListener('click', function(){
    Swal.fire(
    'Success!',
    'You successfully add a product!',
    'success'
    )
    });
    </script>
    <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>