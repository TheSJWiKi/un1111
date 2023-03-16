<form method="post" action="<?php echo env_url(); ?>admin/actions/settings/sections">
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
                <label for="aboutUsStatus">About Us</label>
                <select id="aboutUsStatus" class="form-control" name="about_us_status">
                  <option value="0" <?php echo selected_single( '0', config_item( 'about_us_status' ) ); ?>>Disable</option>
                  <option value="1" <?php echo selected_single( '1', config_item( 'about_us_status' ) ); ?>>Enable</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="servicesStatus">Services</label>
                <select id="servicesStatus" class="form-control" name="sevices_status">
                  <option value="0" <?php echo selected_single( '0', config_item( 'sevices_status' ) ); ?>>Disable</option>
                  <option value="1" <?php echo selected_single( '1', config_item( 'sevices_status' ) ); ?>>Enable</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <label for="contactUsStatus">Contact Us</label>
              <select id="contactUsStatus" class="form-control" name="contact_us_status">
                <option value="0" <?php echo selected_single( '0', config_item( 'contact_us_status' ) ); ?>>Disable</option>
                <option value="1" <?php echo selected_single( '1', config_item( 'contact_us_status' ) ); ?>>Enable</option>
              </select>
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <label for="newsletterStatus">Newsletter</label>
              <select id="newsletterStatus" class="form-control" name="newsletter_status">
                <option value="0" <?php echo selected_single( '0', config_item( 'newsletter_status' ) ); ?>>Disable</option>
                <option value="1" <?php echo selected_single( '1', config_item( 'newsletter_status' ) ); ?>>Enable</option>
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