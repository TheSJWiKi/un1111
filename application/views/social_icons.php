<ul class="icons">
  <?php if ( !empty( config_item( 'sl_facebook' ) ) ) { ?>
    <li>
      <a href="<?php echo html_esc_url( config_item( 'sl_facebook' ) ); ?>" target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
    </li>
  <?php } ?>
  
  <?php if ( !empty( config_item( 'sl_twitter' ) ) ) { ?>
    <li>
      <a href="<?php echo html_esc_url( config_item( 'sl_twitter' ) ); ?>" target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
    </li>
  <?php } ?>
  
  <?php if ( !empty( config_item( 'sl_instagram' ) ) ) { ?>
    <li>
      <a href="<?php echo html_esc_url( config_item( 'sl_instagram' ) ); ?>" target="_blank">
        <i class="fab fa-instagram"></i>
      </a>
    </li>
  <?php } ?>
  
  <?php if ( !empty( config_item( 'sl_youtube' ) ) ) { ?>
    <li>
      <a href="<?php echo html_esc_url( config_item( 'sl_youtube' ) ); ?>" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
    </li>
  <?php } ?>
  
  <?php if ( !empty( config_item( 'sl_pinterest' ) ) ) { ?>
    <li>
      <a href="<?php echo html_esc_url( config_item( 'sl_pinterest' ) ); ?>" target="_blank">
        <i class="fab fa-pinterest-p"></i>
      </a>
    </li>
  <?php } ?>
  
  <?php if ( !empty( config_item( 'sl_linkedin' ) ) ) { ?>
    <li>
      <a href="<?php echo html_esc_url( config_item( 'sl_linkedin' ) ); ?>" target="_blank">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </li>
  <?php } ?>
</ul>