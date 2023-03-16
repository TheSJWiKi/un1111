<form action="<?php echo env_url(); ?>admin/actions/services/update" method="post" enctype="multipart/form-data">
  <div class="modal-header">
    <h5 class="modal-title">Edit Service</h5>
    <button type="button" class="close" data-dismiss="modal">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <!-- /.modal-header -->
  <div class="modal-body">
    <div class="response-message"></div>
    <div class="form-group">
      <label for="editServiceTitle">Title <span class="required">*</span></label>
      <input type="text" id="editServiceTitle" class="form-control" name="title" value="<?php echo html_escape( $title ); ?>" required>
    </div>
    <!-- /.form-group -->
    <div class="form-group">
      <label for="editServiceShortDesc">Short Description <span class="required">*</span></label>
      <textarea class="form-control" id="editServiceShortDesc" rows="3" name="short_description" required><?php echo html_escape( $short_description ); ?></textarea>
      <p class="form-text text-primary">The recommended characters length is 90.</p>
    </div>
    <!-- /.form-group -->
    <label class="d-block" for="editServiceIcon">Icon</label>
    <input id="editServiceIcon" type="file" name="icon">
  </div>
  <!-- /.modal-body -->
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
    <input type="hidden" name="id" value="<?php echo html_escape( $id ); ?>">
  </div>
  <!-- /.modal-footer -->
</form>