<form method="post" action="<?php echo env_url(); ?>admin/actions/settings/social_links">
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
                <label for="slFacebook">Facebook</label>
                <input type="url" id="slFacebook" class="form-control" name="sl_facebook" value="<?php echo html_esc_url( config_item( 'sl_facebook' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="slInstagram">Instagram</label>
                <input type="url" id="slInstagram" class="form-control" name="sl_instagram" value="<?php echo html_esc_url( config_item( 'sl_instagram' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="slYouTube">YouTube</label>
                <input type="url" id="slYouTube" class="form-control" name="sl_youtube" value="<?php echo html_esc_url( config_item( 'sl_youtube' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="slTwitter">Twitter</label>
                <input type="url" id="slTwitter" class="form-control" name="sl_twitter" value="<?php echo html_esc_url( config_item( 'sl_twitter' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <label for="slPinterest">Pinterest</label>
              <input type="url" id="slPinterest" class="form-control" name="sl_pinterest" value="<?php echo html_esc_url( config_item( 'sl_pinterest' ) ); ?>">
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <label for="slLinkedin">Linkedin</label>
              <input type="url" id="slLinkedin" class="form-control" name="sl_linkedin" value="<?php echo html_esc_url( config_item( 'sl_linkedin' ) ); ?>">
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