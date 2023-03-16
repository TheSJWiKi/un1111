<form method="post" action="<?php echo env_url(); ?>admin/actions/settings/general" enctype="multipart/form-data">
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
                <label for="gSiteName">Name <span class="required">*</span></label>
                <input type="text" id="gSiteName" class="form-control" name="g_site_name" value="<?php echo html_escape( config_item( 'g_site_name' ) ); ?>" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="gSiteKeywords">Meta Keywords</label>
                <input type="text" id="gSiteKeywords" class="form-control" name="g_site_keywords" value="<?php echo html_escape( config_item( 'g_site_keywords' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="form-group">
            <label for="gSiteDescription">Meta Desciption</label>
            <textarea id="gSiteDescription" class="form-control" name="g_site_desc" rows="4"><?php echo html_escape( config_item( 'g_site_desc' ) ); ?></textarea>
          </div>
          <!-- /.form-group -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="d-block" for="gSiteLogo">Logo</label>
                 <input id="gSiteLogo" type="file" name="g_site_logo">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label class="d-block" for="gSiteFavicon">Favicon</label>
                <input id="gSiteFavicon" type="file" name="g_site_favicon">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="gSiteTimezone">Timezone</label>
                <select class="form-control" name="g_timezone">
                  <option value="">None</option>
                  
                  <?php foreach ( DateTimeZone::listIdentifiers( DateTimeZone::ALL ) as $timezone ) { ?>
                    <option value="<?php echo $timezone; ?>" <?php echo selected_single( config_item( 'g_timezone' ), $timezone ); ?>>
                      <?php echo $timezone; ?>
                    </option>
                  <?php } ?>
                  
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="googleAnalytics">Google Analytics</label>
                <input type="text" id="googleAnalytics" class="form-control" name="google_analytics" value="<?php echo html_escape( config_item( 'google_analytics' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <span class="d-block mb-2">Favicon</span>
                <div class="output-image favicon">
                  <img src="<?php echo get_uploads_path( html_escape( config_item( 'g_site_favicon' ) ) ); ?>">
                </div>
                <!-- /.output-image -->
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <span class="d-block mb-2">Logo</span>
                <div class="output-image">
                  <img src="<?php echo get_uploads_path( html_escape( config_item( 'g_site_logo' ) ) ); ?>">
                </div>
                <!-- /.output-image -->
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="colors-radios">
            <label for="siteColor" class="d-block">Site Color</label>
            
            <!-- If Added or Updated, Don't Forget to Make Change in the Allowed List ( options_helper ). -->
            <label class="color-wrapper">
              <input type="radio" name="g_site_color" value="color_01" <?php echo checked_single( 'color_01', config_item( 'g_site_color' ) ); ?>>
              <span class="check-circle color_01"></span>
            </label>
            <label class="color-wrapper">
              <input type="radio" name="g_site_color" value="color_02" <?php echo checked_single( 'color_02', config_item( 'g_site_color' ) ); ?>>
              <span class="check-circle color_02"></span>
            </label>
            <label class="color-wrapper">
              <input type="radio" name="g_site_color" value="color_03" <?php echo checked_single( 'color_03', config_item( 'g_site_color' ) ); ?>>
              <span class="check-circle color_03"></span>
            </label>
            <label class="color-wrapper">
              <input type="radio" name="g_site_color" value="color_04" <?php echo checked_single( 'color_04', config_item( 'g_site_color' ) ); ?>>
              <span class="check-circle color_04"></span>
            </label>
          </div>
          <!-- /.colors-radios -->
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