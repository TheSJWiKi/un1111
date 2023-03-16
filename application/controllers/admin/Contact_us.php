<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contact Us Controller
 *
 * @author Shahzaib
 */
class Contact_us extends MY_Controller {
    /**
     * Class Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        authenticate();
        
        $this->load->model( 'Contact_us_model' );
        $this->load->model( 'Dashboard_model' );
        
        $this->load->library( 'pagination' );
    }
    
    /**
     * Load Child Template
     *
     * @param  string $page  Child Page Name
     * @param  string $title Page Title
     * @param  array  $data
     * @return void
     */
    private function load_template( $page, $title, $data )
    {
        $this->load_admin_template( "contact_us/{$page}", $title, $data );
    }
    
    /**
     * Users Contact Messages Listing Page.
     *
     * @return void
     */
    public function received()
    {
        $config['base_url']   = env_url( 'admin/contact_us/received' );
        $config['total_rows'] = $this->Dashboard_model->get_received_messages_count();
        $config['per_page']   = 10;
        
        $offset = get_offset( $config['per_page'] );
        $this->pagination->initialize( $config );
        
        $data['messages']     = $this->Contact_us_model->get_messages( false, $config['per_page'], $offset );
        $data['pagination']   = $this->pagination->create_links();
        
        $this->load_template( 'received', 'Received', $data );
    }
    
    /**
     * Messages Replies Page
     *
     * @return void
     */
    public function replies()
    {
        $config['base_url']   = env_url( 'admin/contact_us/replies' );
        $config['total_rows'] = $this->Dashboard_model->get_messages_replies_count();
        $config['per_page']   = 10;
        
        $offset = get_offset( $config['per_page'] );
        $this->pagination->initialize( $config );
        
        $data['messages'] = $this->Contact_us_model->get_messages( true, $config['per_page'], $offset );
        $data['pagination']   = $this->pagination->create_links();
        
        $this->load_template( 'replies', 'Replies', $data );
    }
}
