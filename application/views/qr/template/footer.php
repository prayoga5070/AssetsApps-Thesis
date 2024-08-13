 <footer class="main-footer">
   <strong>Copyright &copy;2024 <a href="#">PT XYZ</a>.</strong>
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <script>
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
 </script>

 </body>

 </html>