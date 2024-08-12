 <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy;</a> 2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?= base_url(); ?>assets/1/plugins/common/common.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/js/custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/js/settings.js"></script>
    <script src="<?= base_url(); ?>assets/1/js/gleek.js"></script>
    <script src="<?= base_url(); ?>assets/1/js/styleSwitcher.js"></script>

    <script>
        $('#alert').ready(function(){
            toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
            toastr["success"]("Login Succes!", "Success!")
        })
        toastr.info("Login Successfull");
    </script>

    <!-- Chartjs -->
    <script src="<?= base_url(); ?>assets/1/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="<?= base_url(); ?>assets/1/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="<?= base_url(); ?>assets/1/plugins/d3v3/index.js"></script>
    <script src="<?= base_url(); ?>assets/1/plugins/topojson/topojson.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="<?= base_url(); ?>assets/1/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="<?= base_url(); ?>assets/1/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="<?= base_url(); ?>assets/1/plugins/chartist/js/chartist.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <!-- Datatables -->
    <script src="<?= base_url(); ?>assets/1/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script src="<?= base_url(); ?>assets/1/plugins/summernote/dist/summernote.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/plugins/summernote/dist/summernote-init.js"></script>

    <script src="<?= base_url(); ?>assets/1/plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/plugins/sweetalert/js/sweetalert.init.js"></script>

    <script src="<?= base_url(); ?>assets/1/plugins/validation/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets/1/plugins/validation/jquery.validate-init.js"></script>
    <script src="<?= base_url(); ?>assets/build/toastr.js"></script>





    <script src="<?= base_url(); ?>assets/1/js/dashboard/dashboard-1.js"></script>

</body>

</html>