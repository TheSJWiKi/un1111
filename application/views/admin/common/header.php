<!DOCTYPE html>
<html lang="en">

<head>
  
  <!-- Meta: -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="noindex">

  <title><?php echo manage_title( $title ); ?></title>
  
  <!-- Favicon: -->
  <link rel="icon" href="<?php echo get_uploads_path( html_escape( config_item( 'g_site_favicon' ) ) ); ?>">

  <!-- Custom Fonts for this Template: -->
  <link href="<?php echo base_url(); ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom Styles for this Template: -->
  <link href="<?php echo base_url(); ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/admin/css/custom.css?v=<?php echo md5( SCRIPT_VERSION ); ?>" rel="stylesheet">
  
  <!-- jQuery: -->
  <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
  
  <!-- Common Variables: -->
  <script>
    var csrfToken = '<?php echo $this->security->get_csrf_hash(); ?>';
    var eProtocol = '<?php echo html_escape( config_item( "e_protocol" ) ); ?>';
    var baseURL = '<?php echo env_url(); ?>';
    var snImageUpload = '<?php echo env_url(); ?>admin/actions/subscribers/sn_image_upload';
    var snDeleteUpload = '<?php echo env_url(); ?>admin/actions/subscribers/sn_image_delete';
  </script>

</head>

<?php if ( is_public_page() ) { ?>
<body class="bg-gradient-primary">
<?php } else { ?>
<body id="page-top">
  
  <!-- Page Wrapper: -->
  <div id="wrapper">
  
    <!-- Sidebar: -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
      <!-- Sidebar - Brand: -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo env_url(); ?>admin/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <!-- /.sidebar-brand -->
        <div class="sidebar-brand-text mx-3"><?php echo html_escape( config_item( 'g_site_name' ) ); ?></div>
      </a>
      <hr class="sidebar-divider my-0">
      
      <li class="nav-item <?php echo activate_page( 'dashboard' ); ?>">
        <a class="nav-link" href="<?php echo env_url(); ?>admin/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item <?php echo activate_page( 'subscribers' ); ?>">
        <a class="nav-link" href="<?php echo env_url(); ?>admin/subscribers">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Subscribers</span>
        </a>
      </li>
      
      <hr class="sidebar-divider">
      
      <div class="sidebar-heading">
        Contact Us
      </div>
      <!-- /.sidebar-heading -->
      <li class="nav-item <?php echo activate_parent_menu( get_admin_slugs( 'contact_us' )  ); ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseContactUs" aria-expanded="true" aria-controls="collapseContactUs">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Message</span>
        </a>
        <div id="collapseContactUs" class="collapse <?php echo open_parent_menu( get_admin_slugs( 'contact_us' ) ); ?>" aria-labelledby="headingContactUs" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php echo activate_child_page( 'received' ); ?>" href="<?php echo env_url(); ?>admin/contact_us/received">Received</a>
            <a class="collapse-item <?php echo activate_child_page( 'replies' ); ?>" href="<?php echo env_url(); ?>admin/contact_us/replies">Replies</a>
          </div>
        </div>
        <!-- /.collapse -->
      </li>
      <hr class="sidebar-divider">
      
      <div class="sidebar-heading">
        Others
      </div>
      <!-- /.sidebar-heading -->
      <li class="nav-item <?php echo activate_page( 'about_us' ); ?>">
        <a class="nav-link" href="<?php echo env_url(); ?>admin/about_us">
          <i class="fas fa-fw fa-address-card"></i>
          <span>About Us</span>
        </a>
      </li>
      <li class="nav-item <?php echo activate_page( 'services' ); ?>">
        <a class="nav-link" href="<?php echo env_url(); ?>admin/services">
          <i class="fas fa-fw fa-headphones-alt"></i>
          <span>Services</span>
        </a>
      </li>
      <li class="nav-item <?php echo activate_parent_menu( get_admin_slugs( 'settings' )  ); ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="true" aria-controls="collapseSettings">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Settings</span>
        </a>
        <div id="collapseSettings" class="collapse <?php echo open_parent_menu( get_admin_slugs( 'settings' ) ); ?>" aria-labelledby="headingSettings" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php echo activate_child_page( 'general' ); ?>" href="<?php echo env_url(); ?>admin/settings/general">General</a>
            <a class="collapse-item <?php echo activate_child_page( 'counter' ); ?>" href="<?php echo env_url(); ?>admin/settings/counter">Counter</a>
            <a class="collapse-item <?php echo activate_child_page( 'google_recaptcha' ); ?>" href="<?php echo env_url(); ?>admin/settings/google_recaptcha">Google reCaptcha</a>
            <a class="collapse-item <?php echo activate_child_page( 'social_links' ); ?>" href="<?php echo env_url(); ?>admin/settings/social_links">Social Links</a>
            <a class="collapse-item <?php echo activate_child_page( 'contact_us' ); ?>" href="<?php echo env_url(); ?>admin/settings/contact_us">Contact Us</a>
            <a class="collapse-item <?php echo activate_child_page( 'sections' ); ?>" href="<?php echo env_url(); ?>admin/settings/sections">Sections</a>
            <a class="collapse-item <?php echo activate_child_page( 'email' ); ?>" href="<?php echo env_url(); ?>admin/settings/email">Email</a>
          </div>
        </div>
        <!-- /.collapse -->
      </li>
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar): -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
      <!-- /.text-center -->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper: -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content: -->
      <div id="content">

        <!-- Topbar: -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar): -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
          <a href="<?php echo base_url(); ?>" class="btn btn-success" target="_blank">Home Page</a>

          <!-- Topbar Navbar: -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information: -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assets/images/profile.png">
              </a>
              <!-- Dropdown - User Information: -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item <?php echo activate_child_page( 'profile' ); ?>" href="<?php echo env_url(); ?>admin/settings/profile">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="<?php echo env_url(); ?>admin/logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
              <!-- /.dropdown-menu -->
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        
        <!-- Begin Page Content: -->
        <div class="container-fluid">
<?php } ?>