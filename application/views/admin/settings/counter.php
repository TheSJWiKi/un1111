<form method="post" action="<?php echo env_url(); ?>admin/actions/settings/counter" enctype="multipart/form-data">
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
                <label class="d-block" for="cBGImage">Background Image</label>
                <input id="cBGImage" type="file" name="c_bg_image">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="cBGEffect">Choose Effect</label>
                <select id="cBGEffect" class="form-control" name="c_bg_effect">
                  <option value="">None</option>
                  <option value="snowfall" <?php echo selected_single( 'snowfall', config_item( 'c_bg_effect' ) ); ?>>Snowfall</option>
                  <option value="ripples" <?php echo selected_single( 'ripples', config_item( 'c_bg_effect' ) ); ?>>Ripples</option>
                  <option value="particles" <?php echo selected_single( 'particles', config_item( 'c_bg_effect' ) ); ?>>Particles</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="cTypeText1">Type Text 1 <span class="required">*</span></label>
                <input type="text" id="cTypeText1" class="form-control" name="c_type_text1" value="<?php echo html_escape( config_item( 'c_type_text1' ) ); ?>" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="cTypeText2">Type Text 2 <span class="required">*</span></label>
                <input type="text" id="cTypeText2" class="form-control" name="c_type_text2" value="<?php echo html_escape( config_item( 'c_type_text2' ) ); ?>" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="cTypeText3">Type Text 3 <span class="required">*</span></label>
                <input type="text" id="cTypeText3" class="form-control" name="c_type_text3" value="<?php echo html_escape( config_item( 'c_type_text3' ) ); ?>" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="datetimepicker">Release Date</label>
                <input type="text" id="datetimepicker" class="form-control" name="c_rdate" value="<?php echo html_escape( config_item( 'c_rdate' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="cReleaseHours">Release Time Hours</label>
                <select id="cReleaseHours" name="c_rhours" class="form-control">
                  
                  <?php for ( $i = 1; $i <= 23; $i++ ) { ?>
                    <option value="<?php echo pf_zero( $i ); ?>" <?php echo selected_single( config_item( 'c_rhours' ), pf_zero( $i ) ); ?>><?php echo pf_zero( $i ); ?></option>
                  <?php } ?>
                  
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="cReleaseMinutes">Release Time Minutes</label>
                <select id="cReleaseMinutes" name="c_rminutes" class="form-control">
                  
                  <?php for ( $i = 0; $i <= 59; $i++ ) { ?>
                    <option value="<?php echo pf_zero( $i ); ?>" <?php echo selected_single( config_item( 'c_rminutes' ), pf_zero( $i ) ); ?>><?php echo pf_zero( $i ); ?></option>
                  <?php } ?>
                  
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="cJumpURL">
                  Jump URL
                  <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="If added the URL, the user will be redirected when the timer is ended."></i>
                </label>
                <input type="url" id="cJumpURL" class="form-control" name="c_jump_url" value="<?php echo html_esc_url( config_item( 'c_jump_url' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          
          <div class="row">
            <div class="col-md-6">
              <span class="d-block mb-2">Background Image:</span>
              <div class="output-image">
                <img src="<?php echo get_uploads_path( html_escape( config_item( 'c_bg_image' ) ) ); ?>">
              </div>
              <!-- /.output-image -->
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