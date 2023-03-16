<!-- Add Service: -->
<div class="modal close-after" id="add">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="<?php echo env_url(); ?>admin/actions/services/add" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">Add Service</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- /.modal-header -->
        <div class="modal-body">
          <div class="response-message"></div>
          <div class="form-group">
            <label for="serviceTitle">Title <span class="required">*</span></label>
            <input type="text" id="serviceTitle" class="form-control" name="title" required>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label for="serviceShortDesc">Short Description <span class="required">*</span></label>
            <textarea class="form-control" id="serviceShortDesc" rows="3" name="short_description" required></textarea>
            <p class="form-text text-primary">The recommended characters length is 90.</p>
          </div>
          <!-- /.form-group -->
          <label class="d-block" for="gSiteFavicon">Icon <span class="required">*</span></label>
          <input id="serviceIcon" type="file" name="icon" required>
        </div>
        <!-- /.modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
        <!-- /.modal-footer -->
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->