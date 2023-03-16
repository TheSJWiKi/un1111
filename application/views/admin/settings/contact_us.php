<form method="post" action="<?php echo env_url(); ?>admin/actions/settings/contact_us">
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
              <div class="form-group">
                <label for="cfStatus">Contact Form</label>
                <select id="cfStatus" class="form-control" name="cu_form_status">
                  <option value="0" <?php echo selected_single( '0', config_item( 'cu_form_status' ) ); ?>>Disable</option>
                  <option value="1" <?php echo selected_single( '1', config_item( 'cu_form_status' ) ); ?>>Enable</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="cEmailAddress">
                  Email Address
                  <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Use to receive users contact messages also on your email."></i>
                </label>
                <input type="email" id="cEmailAddress" class="form-control" name="cu_email_address" value="<?php echo html_escape( config_item( 'cu_email_address' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="cAddress">
                  Address
                  <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Also be used for Google Map iframe."></i>
                </label>
                <input type="text" id="cAddress" class="form-control" name="cu_address" value="<?php echo html_escape( config_item( 'cu_address' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="cPhone">Phone</label>
                <input type="text" id="cPhone" class="form-control" name="cu_phone" value="<?php echo html_escape( config_item( 'cu_phone' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <label for="gmapStatus">Google Map iFrame</label>
              <select id="gmapStatus" class="form-control" name="gmap_status">
                <option value="0" <?php echo selected_single( '0', config_item( 'gmap_status' ) ); ?>>Disable</option>
                <option value="1" <?php echo selected_single( '1', config_item( 'gmap_status' ) ); ?>>Enable</option>
              </select>
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <label for="grStatus">Google reCaptcha</label>
              <select id="grStatus" class="form-control" name="gr_status">
                <option value="0" <?php echo selected_single( '0', config_item( 'gr_status' ) ); ?>>Disable</option>
                <option value="1" <?php echo selected_single( '1', config_item( 'gr_status' ) ); ?>>Enable</option>
              </select>
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