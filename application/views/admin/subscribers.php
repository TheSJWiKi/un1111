<div class="row">
  <div class="col-12">
    <div class="not-in-form">
      <div class="response-message">
        <?php echo alert_message(); ?>
      </div>
    </div>
    <!-- /.not-in-form -->
    <!-- /.response-message -->
    <div class="card shadow mb-4">
    
      <!-- Card Header with Dropdown: -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
        <button class="btn btn-primary" data-toggle="modal" data-target="#send-email">Send Email to Subscribers</button>
      </div>
      <!-- /.card-header -->
      
      <!-- Card Body: -->
      <div class="card-body pt-0 pb-0">
        
        <div class="table-responsive">
          <table class="table text-nowrap">
            <thead>
              <tr>
                <th class="wi-tr">ID</th>
                <th>Email Address</th>
                <th class="text-right">Status</th>
                <th class="wi-tr text-right">Confirmed</th>
                <th class="wi-tr text-right">Subscribed</th>
                <th class="wi-tr text-right">Action</th>
              </tr>
            </thead>
            <tbody class="records">
              <?php
                if ( !empty( $subscribers ) )
                {
                  foreach ( $subscribers as $subscriber ) { ?>
                    <tr id="record-<?php echo html_escape( $subscriber->id ); ?>">
                      <td><?php echo html_escape( $subscriber->id ); ?></td>
                      <td><?php echo html_escape( $subscriber->email_address ); ?></td>
                      
                      <td class="text-right">
                        <?php if ( $subscriber->is_confirmed == 0 ) { ?>
                          <span class="badge badge-warning">Not Confirmed</span>
                        <?php } else { ?>
                          <span class="badge badge-success">Confirmed</span>
                        <?php } ?>
                      </td>
                      
                      <td class="text-right">
                        <?php
                        if ( !empty( $subscriber->confirmed_at ) ) {
                          echo html_escape( $subscriber->confirmed_at );
                        } else {
                          echo '---';
                        }
                        ?>
                      </td>
                      
                      <td class="text-right"><?php echo html_escape( $subscriber->subscribed_at ); ?></td>
                      <td class="text-right">
                        <button class="btn btn-sm btn-danger tool" data-id="<?php echo html_escape( $subscriber->id ); ?>" data-toggle="modal" data-target="#delete">
                          <i class="fas fa-trash tool-i"></i>
                        </button>
                      </td>
                    </tr>
                  <?php }
                } else {
              ?>
                
                <tr id="record-0">
                  <td class="pb-0" colspan="6">No Records Found</td>
                </tr>
                
              <?php } ?>
            </tbody>
          </table>
        </div>
        
        <?php echo $pagination; ?>
        
      </div>
      <!-- /.card-body -->
      
    </div>
    <!-- /.card -->
    
  </div>
  <!-- /col -->
</div>
<!-- /.row -->

<?php

$this->load->view( 'admin/modals/sent_email_to_subscribers' );
$this->load->view( 'admin/modals/delete' );
