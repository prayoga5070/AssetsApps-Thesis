 <footer class="main-footer">
   <strong>Copyright &copy;2024 <a href="https://portal-mki.com">PT Mitra Kiara Indonesia</a>.</strong>
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <!-- jQuery Validate -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/jquery-validation/jquery.validate.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
   $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/jqvmap/jquery.vmap.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/moment/moment.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url(); ?>assets/qrcode/dist/js/adminlte.js"></script>
 <!-- AdminLTE for demo purposes -->
 <!-- <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script> -->
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <!-- <script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script> -->
 <!-- DataTables  & Plugins -->
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/jszip/jszip.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="<?= base_url(); ?>assets/qrcode/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script>
   $(function() {
     $("#example1").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
     });
     $('#example2').DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "dom": 'Bfrtip',
       "buttons": ["excel", "pdf"]
     });
     $("#example3").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "lengthMenu": [
         [5]
       ]
     });
     $("#example4").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "lengthMenu": [
         [5]
       ],
       "dom": '<"top"l>rt<"bottom"ip><"">'
     });
     $('.datepick1').datepicker({
       dateFormat: 'yy-mm-dd',
       changeMonth: true,
       changeYear: true,
       autoclose: true,
       todayHighlight: true,
     });
   });
 </script>
 </body>

 </html>