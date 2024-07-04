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

 <!-- jQuery -->
 
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

   });
 </script>
 </body>

 </html>