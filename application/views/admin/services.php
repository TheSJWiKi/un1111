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
        <button class="btn btn-primary" data-toggle="modal" data-target="#add">Add New</button>
      </div>
      <!-- /.card-header -->
      
      <!-- Card Body: -->
      <div class="card-body pt-0 pb-0">
        
        <div class="table-responsive">
          <table class="table text-nowrap">
            <thead>
              <tr>
                <th class="wi-tr">ID</th>
                <th class="wi-tr">Title</th>
                <th>Short Description</th>
                <th class="text-right">Icon</th>
                <th class="wi-tr text-right">Created</th>
                <th class="wi-tr text-right">Actions</th>
              </tr>
            </thead>
            <tbody class="records">
              <?php
                if ( !empty( $services ) )
                {
                  foreach ( $services as $service ) { ?>
                    <tr id="record-<?php echo html_escape( $service->id ); ?>">
                      <td><?php echo html_escape( $service->id ); ?></td>
                      <td><?php echo html_escape( $service->title ); ?></td>
                      
                      <td>
                        <?php echo get_sized_text( html_escape( $service->short_description ) ); ?>

                        <?php if ( is_increased_length( $service->short_description ) ) { ?>
                          <span class="badge badge-primary get-data-tool" data-reference="services" data-requirement="short_description" data-id="<?php echo html_escape( $service->id ); ?>">Read More</span>
                        <?php } ?>
                      </td>
                      
                      <td class="text-right">
                        <img src="<?php echo get_uploads_path( html_escape( $service->image ) ); ?>" width="25" alt="">
                      </td>
                      <td class="text-right"><?php echo html_escape( $service->created_at ); ?></td>
                      <td class="text-right">
                        <div class="btn-group">
                          <button class="btn btn-sm btn-primary get-data-tool" data-reference="services" data-requirement="service" data-id="<?php echo html_escape( $service->id ); ?>">
                            <i class="fas fa-edit get-data-tool-i"></i>
                          </button>
                          <button class="btn btn-sm btn-danger tool" data-id="<?php echo html_escape( $service->id ); ?>" data-toggle="modal" data-target="#delete">
                            <i class="fas fa-trash tool-i"></i>
                          </button>
                        </div>
                        <!-- /.btn-group -->
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
        
      </div>
      <!-- /.card-body -->
      
    </div>
    <!-- /.card -->
    
  </div>
  <!-- /col -->
</div>
<!-- /.row -->

<?php

$this->load->view( 'admin/modals/add_service' );
$this->load->view( 'admin/modals/delete' );
$this->load->view( 'admin/modals/read' );
