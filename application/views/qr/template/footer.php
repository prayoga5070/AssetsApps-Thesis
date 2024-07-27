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
     $('#datepick1').datepicker({
       dateFormat: 'yy-mm-dd',
       changeMonth: true,
       changeYear: true,
       autoclose: true,
       todayHighlight: true,
     });
     
   });

   function ShowParameter(Collapse, ShowParameter, HideParameter) {
     //var paramSearch = document.getElementById(FullParameter);
     var showParameter = document.getElementById(ShowParameter);
     var hideParameter = document.getElementById(HideParameter);
     var divCollapse = document.getElementById(Collapse);

     divCollapse.style.display = 'block';
     //$("#" + Collapse).collapse('show');
     //paramSearch.style.display = 'block';
     showParameter.style.display = 'none';
     hideParameter.style.display = 'block';
   }
   //--***************************************END SHOW PARAMETER SEARCH ******************************************//

   //--***************************************START HIDE PARAMETER SEARCH ******************************************//

   function HideParameter(Collapse, ShowParameter, HideParameter) {
     var showParameter = document.getElementById(ShowParameter);
     var hideParameter = document.getElementById(HideParameter);
     var divCollapse = document.getElementById(Collapse);
     divCollapse.style.display = 'none';
     hideParameter.style.display = 'none';
     showParameter.style.display = 'block';
   }
 </script>
 </body>

 </html>