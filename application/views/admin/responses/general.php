<div class="modal-body">
  <button type="button" class="close" data-dismiss="modal">
    <span aria-hidden="true">&times;</span>
  </button>
  <p><?php echo nl2br( html_escape( $detail ) ); ?></p><hr>
  <small class="text-primary d-block">
    &mdash; <?php echo html_escape( $type ); ?>, ID <?php echo html_escape( $id ); ?>
  </small>
</div>