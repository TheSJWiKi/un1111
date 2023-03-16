<form method="post" action="<?php echo env_url(); ?>admin/actions/settings/email">
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#test-email">Test Settings</button>
        </div>
        <!-- /.card-header -->
        
        <!-- Card Body: -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="eFromAddress">From Address <span class="required">*</span></label>
                <input type="email" id="eFromAddress" class="form-control" name="e_sender" value="<?php echo html_escape( config_item( 'e_sender' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="eFromName">From Name <span class="required">*</span></label>
                <input type="text" id="eFromName" class="form-control" name="e_sender_name" value="<?php echo html_escape( config_item( 'e_sender_name' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6">
              <label for="eProtocol">Protocol</label>
              <select id="eProtocol" class="form-control" name="e_protocol">
                <option value="smtp" <?php echo selected_single( 'smtp', config_item( 'e_protocol' ) ); ?>>SMTP</option>
                <option value="mail" <?php echo selected_single( 'mail', config_item( 'e_protocol' ) ); ?>>Mail</option>
              </select>
            </div>
            <!-- /col -->
            <div class="col-md-6 smtp-field">
              <div class="form-group">
                <label for="eHost">Host <span class="required">*</span></label>
                <input type="text" id="eHost" class="form-control" name="e_host" value="<?php echo html_escape( config_item( 'e_host' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6 smtp-field">
              <div class="form-group">
                <label for="eUsername">Username <span class="required">*</span></label>
                <input type="text" id="eUsername" class="form-control" name="e_username" value="<?php echo html_escape( config_item( 'e_username' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
            <div class="col-md-6 smtp-field">
              <div class="form-group">
                <label for="ePassword">Password <span class="required">*</span></label>
                <input type="password" id="ePassword" class="form-control" name="e_password" value="<?php echo html_escape( config_item( 'e_password' ) ); ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-6 smtp-field">
              <label for="eEncryption">Encryption</label>
              <select id="eEncryption" class="form-control" name="e_encryption">
                <option value="">None</option>
                <option value="tls" <?php echo selected_single( 'tls', config_item( 'e_encryption' ) ); ?>>TLS</option>
                <option value="ssl" <?php echo selected_single( 'ssl', config_item( 'e_encryption' ) ); ?>>SSL</option>
              </select>
            </div>
            <!-- /col -->
            <div class="col-md-6 smtp-field">
              <label for="ePort">Port <span class="required">*</span></label>
              <input type="text" id="ePort" class="form-control" name="e_port" value="<?php echo html_escape( config_item( 'e_port' ) ); ?>">
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

<?php

$this->load->view( 'admin/modals/test_email_settings' );

