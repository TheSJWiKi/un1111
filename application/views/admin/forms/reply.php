<form action="<?php echo env_url(); ?>admin/actions/contact_us/reply" method="post">
  <div class="modal-header">
    <h5 class="modal-title">Reply</h5>
    <button type="button" class="close" data-dismiss="modal">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <!-- /.modal-header -->
  <div class="modal-body">
    <div class="response-message"></div>
    <div class="form-group">
      <label for="replyTo">To</label>
      <input type="text" id="replyTo" class="form-control" value="<?php echo html_escape( $email_address ); ?>" readonly>
    </div>
    <!-- /.form-group -->
    <div class="form-group">
      <label for="replyMessage">Message <span class="required">*</span></label>
      <textarea class="form-control" id="replyMessage" rows="9" name="reply_message" required></textarea>
    </div>
    <!-- /.form-group -->
  </div>
  <!-- /.modal-body -->
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Send</button>
    <input type="hidden" name="id" value="<?php echo html_escape( $id ); ?>">
  </div>
  <!-- /.modal-footer -->
</form>