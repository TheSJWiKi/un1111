<!-- Send Email to Subscribers: -->
<div class="modal close-after" id="send-email">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="<?php echo env_url(); ?>admin/actions/subscribers/send_email" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Send Email to Subscribers<br><small><i>(Only Confirmed Subscribers)</i></small></h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- /.modal-header -->
        <div class="modal-body">
          <div class="response-message"></div>
          <div class="form-group">
            <label for="emailSubject">Subject <span class="required">*</span></label>
            <input type="text" id="emailSubject" class="form-control" name="subject" required>
          </div>
          <!-- /.form-group -->
          <label for="emailMessage">Message <span class="required">*</span></label>
          <textarea class="form-control textarea" id="emailMessage" rows="6" name="message"></textarea>
          <p class="form-text text-primary mb-0">Due to the limited execution time limit and memory available to PHP, if your subscribers are of a very large amount then, it's not recommended to use this tool.</p>
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