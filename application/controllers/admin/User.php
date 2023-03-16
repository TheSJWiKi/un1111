<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User ( Admin ) Controller
 *
 * @author Shahzaib
 */
class User extends MY_Controller {
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
     * Login Page
     *
     * @return void
     */
    public function index()
    {
        $this->load_admin_template( 'login' );
    }
    
    /**
     * Account Settings Page
     *
     * @return void
     */
    public function settings()
    {
        $this->load->model( 'Admin_model' );
        
        $user_id = $this->session->userdata( 'id' );
        
        $data['admin'] = $this->Admin_model->get_one_where( $user_id );
        
        $this->load_admin_template( 'profile_settings', '', $data );
    }
    
    /**
     * Forgot Password Page
     *
     * @return void
     */
    public function forgot_password()
    {
        $this->load_admin_template( 'forgot_password' );
    }
    
    /**
     * Change Password Page
     *
     * @param  string $token
     * @return void
     */
    public function change_password( $token = '' )
    {
        $this->load_admin_template( 'change_password', '', ['token' => $token] );
    }
    
    /**
     * Account Logout
     *
     * @return void
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect( 'admin' );
    }
}
