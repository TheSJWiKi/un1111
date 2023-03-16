<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Unconfirmed Subscribers</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo html_escape( $unconfirmed_subscribers_count ); ?></div>
          </div>
          <!-- /col -->
          <div class="col-auto">
            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
          </div>
          <!-- /col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /col -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Confirmed Subscribers</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo html_escape( $confirmed_subscribers_count ); ?></div>
          </div>
          <!-- /col -->
          <div class="col-auto">
            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
          </div>
          <!-- /col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /col -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Received Messages</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo html_escape( $received_messages_count ); ?></div>
          </div>
          <!-- /col -->
          <div class="col-auto">
            <i class="fas fa-envelope fa-2x text-gray-300"></i>
          </div>
          <!-- /col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /col -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Messages Replies</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo html_escape( $messages_replies_count ); ?></div>
          </div>
          <!-- /col -->
          <div class="col-auto">
            <i class="fas fa-reply fa-2x text-gray-300"></i>
          </div>
          <!-- /col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /col -->
</div>
<!-- /.row -->