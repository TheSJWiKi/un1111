<!-- Test Email Settings Modal: -->
<div class="modal" id="test-email">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="<?php echo env_url(); ?>admin/actions/settings/test_esettings" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Test Settings</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- /.modal-header -->
        <div class="modal-body">
          <div class="response-message"></div>
          <label for="eTestSettingsReceiver">Receiver Email Address <span class="required">*</span></label>
          <input type="email" class="form-control" id="eTestSettingsReceiver" name="email_address" required>
        </div>
        <!-- /.modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
        <!-- /.modal-footer -->
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->