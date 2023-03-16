<!-- Delete Modal: -->
<div class="modal" id="delete">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="<?php echo env_url(); ?>admin/actions/<?php echo $this->uri->segment( 2 ); ?>/delete" method="post">
        <div class="modal-body">
          <div class="response-message"></div>
          <div class="row">
            <div class="col-2 pr-0">
              <i class="fas fa-info-circle lg-size text-primary"></i>
            </div>
            <!-- /col -->
            <div class="col-10 pl-0">
              <p class="mb-0"><strong class="text-danger">Are you sure to delete it?</strong> by clicking on yes, this record will be deleted permanently.</p>
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-danger">Yes</button>
          <input type="hidden" name="id">
        </div>
        <!-- /.modal-footer -->
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->