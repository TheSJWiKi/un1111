<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo html_escape( config_item( 'g_site_desc' ) ); ?>">
  <meta name="keywords" content="<?php echo html_escape( config_item( 'g_site_keywords' ) ); ?>">
  
  <title><?php echo html_escape( config_item( 'g_site_name' ) ); ?></title>
  
  <!-- Favicon: -->
  <link rel="icon" href="<?php echo get_uploads_path( html_escape( config_item( 'g_site_favicon' ) ) ); ?>">
  
  <!-- Font Awesome: -->
  <link href="<?php echo base_url(); ?>assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
  
  <!-- Styling: -->
  <link href="<?php echo base_url(); ?>assets/css/style.css?v=<?php echo md5( SCRIPT_VERSION ); ?>" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/<?php echo html_escape( config_item( 'g_site_color' ) ); ?>.css?v=<?php echo md5( SCRIPT_VERSION ); ?>" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/style_friendly.css?v=<?php echo md5( SCRIPT_VERSION ); ?>" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/pre_loadingio.css?v=<?php echo md5( SCRIPT_VERSION ); ?>" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/btn_loadingio.css?v=<?php echo md5( SCRIPT_VERSION ); ?>" rel="stylesheet">
  
  <!-- Common Variables: -->
  <script>
    var rDate = '<?php echo html_escape( config_item( "c_rdate" ) ); ?>';
    var rHours = '<?php echo html_escape( config_item( "c_rhours" ) ); ?>';
    var rMinutes = '<?php echo html_escape( config_item( "c_rminutes" ) ); ?>';
    var releaseFDate = rDate + ' ' + rHours + ':' + rMinutes + ':00';
    var release = new Date(releaseFDate).getTime();
    var csrfToken = '<?php echo $this->security->get_csrf_hash(); ?>';
    var effectType = '<?php echo html_escape( config_item( "c_bg_effect" ) ); ?>';
    var typeText1 = '<?php echo html_escape( config_item( "c_type_text1" ) ); ?>';
    var typeText2 = '<?php echo html_escape( config_item( "c_type_text2" ) ); ?>';
    var typeText3 = '<?php echo html_escape( config_item( "c_type_text3" ) ); ?>';
    var jumpURL = '<?php echo html_esc_url( config_item( "c_jump_url" ) ); ?>';
    var baseURL = '<?php echo env_url(); ?>';
  </script>
</head>

<body>
  
  <div class="preloader">
    <div class="center-align loadingio-spinner-ripple-qeokxoivyt">
      <div class="ldio-lth9zt4i5s">
        <div></div>
        <div></div>
      </div>
      <!-- /.ldio-lth9zt4i5s --->
    </div>
    <!-- /.center-align -->
  </div>
  <!-- /.preloader -->
  
  <div class="bg-wrapper" style="background-image: url(<?php echo get_uploads_path( html_escape( config_item( 'c_bg_image' ) ) ); ?>)">
    <div class="main-wrapper" id="particles-js">
    
      <div class="alert-message">
        <?php echo alert_message_nbs(); ?>
      </div>
      <!-- /.alert-message -->
      
      <div class="header">
        <div class="c-left">
          <img src="<?php echo get_uploads_path( html_escape( config_item( 'g_site_logo' ) ) ); ?>" alt="<?php echo html_escape( config_item( 'g_site_name' ) ); ?>">
        </div>
        <!-- /col -->
        <div class="c-right">
        
          <?php $this->load->view( 'social_icons' ); ?>
          
          <button id="sidebarOpener" class="<?php echo ( ! is_sidebar_sections_enabled() ) ? 'invisible-above-sm' : ''; ?>">
            <i class="fas fa-bars"></i>
          </button>
        </div>
        <!-- /col -->
      </div>
      <!-- /.header -->
      
      <div class="sidebar">
        <button id="sidebarCloser">
          <i class="fas fa-times"></i>
        </button>
        
        <?php if ( !empty( $about_us->content ) && config_item( 'about_us_status' ) == 1 ) { ?>
          <!-- About Us: -->
          <div class="sb-section">
            <h3 class="main-text"><span>About Us</span></h3>
            <p><?php echo html_escape( $about_us->content ); ?></p>
          </div>
          <!-- /.sb-section -->
        <?php } ?>
        
        <?php if ( !empty( $services ) && config_item( 'sevices_status' ) == 1 ) { ?>
          <!-- Services: -->
          <div class="sb-section pb-0">
            <h3 class="main-text"><span>Sevices</span></h3>
            
            <?php foreach ( $services as $service ) { ?>
              <div class="service">
                <img src="<?php echo get_uploads_path( html_escape( $service->image ) ); ?>">
                <h4><?php echo html_escape( $service->title ); ?></h4>
                <p><?php echo html_escape( $service->short_description ); ?></p>
              </div>
              <!-- /.service -->
            <?php } ?>
            
          </div>
          <!-- /.sb-section -->
        <?php } ?>
        
        <?php if ( config_item( 'contact_us_status' ) == 1 ) { ?>
          <!-- Contact Us: -->
          <div class="sb-section">
            <h3 class="main-text"><span>Contact Us</span></h3>
            
            <?php if ( !empty( config_item( 'cu_address' ) ) ) { ?>
              <div class="contact-info<?php echo cu_info_mb_reset(); ?>">
                <i class="fas fa-map-marker-alt"></i>
                <span><?php echo html_escape( config_item( 'cu_address' ) ); ?></span>
              </div>
              <!-- /.contact-info -->
            <?php } ?>
            
            <?php if ( !empty( config_item( 'cu_phone' ) ) ) { ?>
              <div class="contact-info<?php echo cu_info_mb_reset(); ?>">
                <i class="fas fa-mobile"></i>
                <a href="tel:<?php echo html_escape( config_item( 'cu_phone' ) ); ?>">
                  <?php echo html_escape( config_item( 'cu_phone' ) ); ?>
                </a>
              </div>
              <!-- /.contact-info -->
            <?php } ?>
            
            <?php if ( !empty( config_item( 'cu_address' ) ) && config_item( 'gmap_status' ) == 1 ) { ?>
              <div class="gmap-wrapper">
                <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo html_escape( get_gmap_address() ); ?>&t=&z=13&ie=UTF8&iwloc=B&output=embed"></iframe>
              </div>
              <!-- /.gmap-wrapper -->
            <?php } ?>
            
            <?php if ( config_item( 'cu_form_status' ) == 1 ) { ?>
              <form class="cu-form" method="post" action="<?php echo env_url(); ?>home/send_message">
                <p>You can also fill the form below to send your query to us.</p>
                <input type="text" class="cu-field" name="full_name" placeholder="Full Name" required>
                <input type="email" class="cu-field" name="email_address" placeholder="Email Address" required>
                <textarea class="cu-field" name="message" placeholder="Message" rows="12" required></textarea>
                
                <?php if ( is_filled_google_recaptcha() && config_item( 'gr_status' ) == 1 ) { ?>
                  <div class="mb-15">
                    <div class="g-recaptcha" data-sitekey="<?php echo html_escape( config_item( 'gr_public_key' ) ); ?>"></div>
                  </div>
                  <!-- /.mb-15 -->
                <?php } ?>
                
                <div class="response-message"></div>
                <button type="submit"><i class="fas fa-paper-plane mr-1"></i> Send Message</button>
              </form>
            <?php } ?>
            
          </div>
          <!-- /.sb-section -->
        <?php } ?>
        
        <div class="sb-section social-icons">
          <?php $this->load->view( 'social_icons' ); ?>
        </div>
        <!-- /.sb-section -->
        
      </div>
      <!-- /.sidebar -->
      
      <div class="main <?php echo main_height_class(); ?>">
        <h3 class="welcome-text main-text hide-d <?php echo ( isset_alert_message() ) ? 'mt-24' : ''; ?>">Coming Soon</h3>
        <h3 class="welcome-text main-text hide-m"><span class="typed"></span></h3>
        <div class="countdown">
          <div class="cd-box">
            <div class="center-align">
              <h3 id="days">00</h3>
              <span>Days</span>
            </div>
            <!-- /.center-align -->
          </div>
          <!-- /.cd-box -->
          <div class="cd-box">
            <div class="center-align">
              <h3 id="hours">00</h3>
              <span>Hours</span>
            </div>
            <!-- /.center-align -->
          </div>
          <!-- /.cd-box -->
          <div class="cd-box">
            <div class="center-align">
              <h3 id="mins">00</h3>
              <span>Minutes</span>
            </div>
            <!-- /.center-align -->
          </div>
          <!-- /.cd-box -->
          <div class="cd-box">
            <div class="center-align">
              <h3 id="secs">00</h3>
              <span>Seconds</span>
            </div>
            <!-- /.center-align -->
          </div>
          <!-- /.cd-box -->
        </div>
        <!-- /.countdown -->
        
        <?php if ( config_item( 'newsletter_status' ) == 1 ) { ?>
          <div class="newsletter">
            <form class="nl-form" method="post" action="<?php echo env_url(); ?>home/subscribe" data-loader="true">
              <input type="email" name="email_address" placeholder="Enter Email Address" required>
              <button type="submit"><i class="fas fa-paper-plane"></i></button>
              <div class="response-message"></div>
            </form>
          </div>
          <!-- /.newsletter -->
        <?php } ?>
        
      </div>
      <!-- /.main -->
      
      <div class="footer">
        <p><?php echo html_escape( config_item( 'g_site_name' ) ); ?> &copy; <?php echo get_year(); ?></p>
      </div>
      <!-- /.header -->
      
    </div>
    <!-- /.main-wrapper -->
  </div>
  <!-- /.bg-wrapper -->
  
  <?php if ( is_filled_google_recaptcha() && config_item( 'gr_status' ) == 1 ) { ?>
    <!-- Google reCaptcha: -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <?php } ?>
  
  <?php if ( !empty( config_item( 'google_analytics' ) ) ) { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo html_escape( config_item( 'google_analytics' ) ); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '<?php echo html_escape( config_item( "google_analytics" ) ); ?>');
    </script>
  <?php } ?>
  
  <!-- jQuery: -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  
  <!-- Ripples: -->
  <script src="<?php echo base_url(); ?>assets/plugins/ripples/jquery.ripples-min.js"></script>
  
  <!-- Snowfall: -->
  <script src="<?php echo base_url(); ?>assets/plugins/snowfall/snowfall.jquery.js"></script>
  
  <!-- Particles: -->
  <script src="<?php echo base_url(); ?>assets/plugins/particles/particles.min.js"></script>
  
  <!-- Typed: -->
  <script src="<?php echo base_url(); ?>assets/plugins/typed/typed.min.js"></script>
  
  <!-- Core Files: -->
  <script src="<?php echo base_url(); ?>assets/js/functions.js?v=<?php echo md5( SCRIPT_VERSION ); ?>"></script>
  <script src="<?php echo base_url(); ?>assets/js/counter.js?v=<?php echo md5( SCRIPT_VERSION ); ?>"></script>
  <script src="<?php echo base_url(); ?>assets/js/public_script.js?v=<?php echo md5( SCRIPT_VERSION ); ?>"></script>
  <script src="<?php echo base_url(); ?>assets/js/script.js?v=<?php echo md5( SCRIPT_VERSION ); ?>"></script>
  
</body>

</html>