<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Settings Controller
 *
 * @author Shahzaib
 */
class Settings extends MY_Controller {
    /**
     * Class Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        authenticate();
    }
    
    /**
     * Load Child Template
     *
     * @param  string $page  Child Page Name
     * @param  string $title Page Title
     * @return void
     */
    private function load_template( $page, $title )
    {
        $this->load_admin_template( "settings/{$page}", $title );
    }
    
    /**
     * General Page
     *
     * @return void
     */
    public function index()
    {
        $this->load_template( 'general', 'General' );
    }
    
    /**
     * Counter Page
     *
     * @return void
     */
    public function counter()
    {
        $this->load_template( 'counter', 'Counter' );
    }
    
    /**
     * Google reCaptcha Page
     *
     * @return void
     */
    public function google_recaptcha()
    {
        $this->load_template( 'google_recaptcha', 'Google reCaptcha' );
    }
    
    /**
     * Social Links Page
     *
     * @return void
     */
    public function social_links()
    {
        $this->load_template( 'social_links', 'Social Links' );
    }
    
    /**
     * Contact Us Page
     *
     * @return void
     */
    public function contact_us()
    {
        $this->load_template( 'contact_us', 'Contact Us' );
    }
    
    /**
     * Sections Page
     *
     * @return void
     */
    public function sections()
    {
        $this->load_template( 'sections', 'Sections' );
    }
    
    /**
     * Email Page
     *
     * @return void
     */
    public function email()
    {
        $this->load_template( 'email', 'Email' );
    }
}
