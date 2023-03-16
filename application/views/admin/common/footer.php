<?php if ( !is_public_page() ) { ?>  
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer: -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?php echo html_escape( config_item( 'g_site_name' ) ) . ' ' . get_year(); ?> &mdash; v<?php echo SCRIPT_VERSION; ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button: -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal: -->
  <div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!-- /.modal-header -->
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo env_url(); ?>admin/logout">Logout</a>
        </div>
        <!-- /.modal-footer -->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php } ?>

  <!-- Bootstrap Core JavaScript: -->
  <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core Plugin JavaScript: -->
  <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  
  <!-- Data Time Picker: -->
  <script src="<?php echo base_url(); ?>assets/admin/vendor/datetimepicker/jquery.datetimepicker.full.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/admin/vendor/datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
  
  <!-- Summernote: -->
  <script src="<?php echo base_url(); ?>assets/admin/vendor/summernote/summernote-bs4.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/admin/vendor/summernote/summernote-bs4.css" rel="stylesheet">
  
  <!-- SB Admin 2: -->
  <script src="<?php echo base_url(); ?>assets/admin/js/sb-admin-2.min.js"></script>
  
  <!-- Custom Scripts for All Pages: -->
  <script src="<?php echo base_url(); ?>assets/admin/js/script.js?v=<?php echo md5( SCRIPT_VERSION ); ?>"></script>
  <script src="<?php echo base_url(); ?>assets/js/functions.js?v=<?php echo md5( SCRIPT_VERSION ); ?>"></script>
  <script src="<?php echo base_url(); ?>assets/js/script.js?v=<?php echo md5( SCRIPT_VERSION ); ?>"></script>

</body>

</html>