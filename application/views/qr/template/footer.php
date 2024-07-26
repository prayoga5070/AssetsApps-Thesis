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
   $(document).ready(function() {
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

   // let tabelNavigation = $('#NavigationTable').DataTable({
   //       "processing": true,
   //       "responsive": true,
   //       "serverSide": true,
   //       "ordering": true, // Set true agar bisa di sorting
   //       "dom" : '<"top"i>rt<"bottom"lp><"clear">',
   //       "order": [
   //           [0, 'asc']
   //       ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
   //       "ajax": {
   //           "url": "<?= base_url('/Configuration/Navigation/getDataNav') ?>", // URL file untuk proses select datanya
   //           "type": "POST",
   //       },
   //       "deferRender": true,
   //       "aLengthMenu": [
   //           [5, 10, 50],
   //           [5, 10, 50]
   //       ], // Combobox Limit
   //       "columns": [
   //           { "data" : 'code',"sortable": false},
   //           { "data" : "name" },  // Tampilkan kolom nama_kategori pada table kategori
   //           { "data" : "status" },  // Tampilkan kolom subkat pada table sub kategori
   //           { "data" : "user"}, // Tampilkan kolomid_kategori pada table kategori
   //           { "data" : "qrcode",
   //             "render" : function(data, type, row, meta){
   //               return `<img src="<?php echo base_url('qr/asset/qr_code/') ?>${row.qrcode}">`;
   //             }
   //           },
   //           { "data" : "id",
   //             "render" : function(data, type, row, meta){
   //               let button = `<div class="btn-group mb-4 btn-group-sm">` +
   //                 `<a href="<?php echo base_url('qr/asset/edit/'); ?>${row.id}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>` +
   //                 `<a href="<?php echo base_url('qr/asset/detail/'); ?>${row.id}" class="btn btn-info"><i class="fa fa-info"></i> Detail</a>` +
   //                 `<a href="<?php echo base_url('qr/asset/delete/'); ?>${row.id}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>`+
   //                 `</div>`
   //               ;
   //               return button
   //             }
   //           }
   //       ],
   //   });
   // //--------------------------Function untuk melempar parameter search ---------------------//
   //   //Untuk melempar parameter search
   //   oTable = $('#NavigationTable').DataTable();
   //   $('#BtnSearch').click(function () {
   //       oTable.columns(2).search($('#txtTypeSearchParam').val().trim());
   //       oTable.columns(3).search($('#txtNamaSearchParam').val().trim());

   //       //hit search ke server
   //       oTable.draw();
   //   });


   //   //---------------------Function untuk reset data pencarian----------------//
   //   $('#BtnClearSearch').click(function () {
   //       $('#txtTypeSearchParam').val("");
   //       $('#txtNamaSearchParam').val("");
   //       oTable.columns(2).search($('#txtTypeSearchParam').val().trim());
   //       oTable.columns(3).search($('#txtNamaSearchParam').val().trim());
   //       //hit search ke server
   //       oTable.draw();
   //   });

   //--***************************************START SHOW PARAMETER SEARCH ******************************************//
   //function untuk togle parameter
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

   //--***************************************END HIDE PARAMETER SEARCH ******************************************//
 </script>
 </body>

 </html>