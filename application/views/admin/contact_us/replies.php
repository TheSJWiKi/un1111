<div class="row">
  <div class="col-12">
    <div class="not-in-form">
      <div class="response-message"></div>
    </div>
    <!-- /.not-in-form -->
    <!-- /.response-message -->
    <div class="card shadow mb-4">
    
      <!-- Card Header with Dropdown: -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
      </div>
      <!-- /.card-header -->
      
      <!-- Card Body: -->
      <div class="card-body pt-0 pb-0">
        
        <div class="table-responsive">
          <table class="table text-nowrap">
            <thead>
              <tr>
                <th class="wi-tr">ID</th>
                <th class="wi-tr">Full Name</th>
                <th class="wi-tr">Email Address</th>
                <th class="wi-tr">Message</th>
                <th>Reply</th>
                <th class="text-right">Sender IP</th>
                <th class="wi-tr text-right">Replied</th>
                <th class="wi-tr text-right">Received</th>
                <th class="wi-tr text-right">Action</th>
              </tr>
            </thead>
            <tbody class="records">
              <?php
                if ( !empty( $messages ) )
                {
                  foreach ( $messages as $message ) { ?>
                    <tr id="record-<?php echo html_escape( $message->id ); ?>">
                      <td><?php echo html_escape( $message->id ); ?></td>
                      <td><?php echo html_escape( $message->full_name ); ?></td>
                      <td><?php echo html_escape( $message->email_address ); ?></td>
                      
                      <td>
                        <?php echo html_escape( short_text( $message->message ) ); ?>
                        
                        <?php if ( is_increased_short_text( $message->message ) ) { ?>
                          <span class="badge badge-primary get-data-tool" data-reference="contact_us" data-requirement="message" data-id="<?php echo html_escape( $message->id ); ?>">Read More</span>
                        <?php } ?>
                      </td>
                      
                      <td>
                        <?php echo short_text( html_escape( $message->reply ) ); ?>
                        
                        <?php if ( is_increased_short_text( $message->reply ) ) { ?>
                          <span class="badge badge-primary get-data-tool" data-reference="contact_us" data-requirement="reply" data-id="<?php echo html_escape( $message->id ); ?>">Read More</span>
                        <?php } ?>
                      </td>
                      
                      <td class="text-right"><?php echo html_escape( $message->ip_address ); ?></td>
                      <td class="text-right"><?php echo html_escape( $message->replied_at ); ?></td>
                      <td class="text-right"><?php echo html_escape( $message->received_at ); ?></td>
                      <td class="text-right">
                        <button class="btn btn-sm btn-danger tool" data-id="<?php echo html_escape( $message->id ); ?>" data-toggle="modal" data-target="#delete">
                          <i class="fas fa-trash tool-i"></i>
                        </button>
                      </td>
                    </tr>
                  <?php }
                } else {
              ?>
              
                <tr id="record-0">
                  <td class="pb-0" colspan="8">No Records Found</td>
                </tr>
              
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
        
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

$this->load->view( 'admin/modals/delete' );
$this->load->view( 'admin/modals/read' );
