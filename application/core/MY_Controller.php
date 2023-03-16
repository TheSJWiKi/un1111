<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY Controller ( Base Controller )
 *
 * @author Shahzaib
 */
class MY_Controller extends CI_Controller {
    /**
     * Class Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        set_settings();
    }
    
    /**
     * Load Admin Template
     *
     * @param  string $name  Template File Name
     * @param  string $title Page Title
     * @param  array  $data  Page Data
     * @return void
     */
    protected function load_admin_template( $name, $title = '', $data = [] )
    {
        if ( empty( $title ) )
        $title = ucwords( str_replace( '_', ' ', $name ) );

        $this->load->view( 'admin/common/header', [ 'title' => $title ] );
        $this->load->view( "admin/{$name}", $data );
        $this->load->view( 'admin/common/footer' );
    }
    
    /**
     * Delete Icon Image File
     *
     * @param  string $name
     * @return void
     */
    protected function delete_icon( $name )
    {
        $path = "assets/images/uploads/{$name}";
        
        if ( file_exists( $path ) )
        {
            unlink( $path );
        }
    }
}
