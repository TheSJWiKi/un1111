<form method="post" action="<?php echo env_url(); ?>admin/actions/user/profile_settings">
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
          <p class="text-primary">
            <i class="fas fa-info-circle"></i> Leave the password fields blank if you are not interested to change.
          </p>
          <div class="form-group">
            <label for="psEmailAddress">Email Address <span class="required">*</span></label>
            <input type="email" id="psEmailAddress" class="form-control" name="email_address" value="<?php echo html_escape( $admin->email_address ); ?>" required>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="psCurrentPassword">Current Password</label>
                <input type="password" id="psCurrentPassword" class="form-control" name="c_password">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
             <div class="col-md-6">
              <div class="form-group">
                <label for="psNewPassword">New Password</label>
                <input type="password" id="psNewPassword" class="form-control" name="password">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <label for="psRetypePassword">Retype Password</label>
              <input type="password" id="psRetypePassword" class="form-control" name="r_password">
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