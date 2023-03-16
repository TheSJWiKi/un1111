<form method="post" action="<?php echo env_url(); ?>admin/actions/settings/google_recaptcha">
  <div class="row">
    <div class="col-12">
      <div class="response-message">
        <?php echo alert_message(); ?>
      </div>
      <!-- /.response-message -->
      <div class="card shadow mb-4">
      
        <!-- Card Header with Dropdown: -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
        </div>
        <!-- /.card-header -->
        
        <!-- Card Body: -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <label for="grPublicKey">Public Key <span class="required">*</span></label>
              <input type="text" id="grPublicKey" class="form-control" name="gr_public_key" value="<?php echo html_esc_url( config_item( 'gr_public_key' ) ); ?>">
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <label for="grSecretKey">Secret Key <span class="required">*</span></label>
              <input type="password" id="grSecretKey" class="form-control" name="gr_secret_key" value="<?php echo html_esc_url( config_item( 'gr_secret_key' ) ); ?>">
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-body -->
        
        <!-- Card Footer: -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-check-circle"></i> Update
          </button>
        </div>
        <!-- /.card-footer -->
        
      </div>
      <!-- /.card -->
      
    </div>
    <!-- /col -->
  </div>
  <!-- /.row -->
</form>