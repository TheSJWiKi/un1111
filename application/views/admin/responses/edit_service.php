<td><?php echo html_escape( $id ); ?></td>
<td><?php echo html_escape( $title ); ?></td>

<td>
  <?php echo get_sized_text( html_escape( $short_description ) ); ?>

  <?php if ( is_increased_length( $short_description ) ) { ?>
    <span class="badge badge-primary get-data-tool" data-reference="services" data-requirement="short_description" data-id="<?php echo html_escape( $id ); ?>">Read More</span>
  <?php } ?>
</td>

<td class="text-right">
  <img src="<?php echo get_uploads_path( html_escape( $image ) ); ?>" width="25" alt="">
</td>
<td class="text-right"><?php echo html_escape( $created_at ); ?></td>
<td class="text-right">
  <div class="btn-group">
    <button class="btn btn-sm btn-primary get-data-tool" data-reference="services" data-requirement="service" data-id="<?php echo html_escape( $id ); ?>">
      <i class="fas fa-edit get-data-tool-i"></i>
    </button>
    <button class="btn btn-sm btn-danger tool" data-id="<?php echo html_escape( $id ); ?>" data-toggle="modal" data-target="#delete">
      <i class="fas fa-trash tool-i"></i>
    </button>
  </div>
  <!-- /.btn-group -->
</td>