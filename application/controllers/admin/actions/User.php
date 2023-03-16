<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User ( Admin ) Actions Controller
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
        verify_form_request();
        
        $this->load->library( 'form_validation' );
        $this->load->model( 'Admin_model' );
    }
  
    /**
     * Login Page Input Handling.
     *
     * @return void
     */
    public function login()
    {
        if ( $this->form_validation->run( 'login' ) === true )
        {
            $email_address = do_secure_l( post( 'email_address' ) );
            $password      = post( 'password' );
            
            $admin = $this->Admin_model->get_one_where( $email_address, 'email_address' );
            
            if ( !empty( $admin ) )
            {
                if ( !password_verify( $password, $admin->password ) )
                {
                    j_error( 'invalid_admin' );
                }
                
                $this->session->set_userdata( ['is_logged_in' => true, 'id' => $admin->id] );
                j_s_jump( 'admin/dashboard' );
            }
            
            j_error( 'invalid_admin' );
        }
        
        d_j_error( validation_errors() );
    }
    
    /**
     * Profile Settings Page Input Handling.
     *
     * @return void
     */
    public function profile_settings()
    {
        if ( is_logged_in() === true )
        {
            if ( $this->form_validation->run( 'just_email_address' ) === true )
            {
                $user_id = $this->session->userdata( 'id' );
                $data['email_address'] = do_secure_l( post( 'email_address' ) );
                
                if ( post( 'c_password' ) || post( 'r_password' ) )
                {
                    if ( ( !post( 'password' ) || !post( 'r_password' ) ) )
                    {
                        j_error( 'missing_passwords' );
                    }
                }
                
                if ( post( 'password' ) )
                {
                    $admin = $this->Admin_model->get_one_where( $user_id );
                    
                    if ( post( 'c_password' ) && post( 'r_password' ) )
                    {
                        if ( post( 'password' ) != post( 'r_password' ) )
                        {
                            j_error( 'passwords_match' );
                        }
                    }
                    else
                    {
                        j_error( 'missing_passwords' );
                    }
                    
                    if ( password_verify( post( 'c_password' ), $admin->password ) )
                    {
                        $data['password'] = password_hash( post( 'password' ), PASSWORD_DEFAULT );
                    }
                    else
                    {
                        j_error( 'wrong_password' );
                    }
                }
                
                if ( $this->Admin_model->update_where( $user_id, $data ) )
                {
                    j_settings( 'profile' );
                }
                
                j_error( 'not_updated' );
            }
            
            d_j_error( form_error( 'email_address' ) );
        }
        
        j_error( 'not_logged_in' );
    }
    
    /**
     * Forgot Password Page Input Handling.
     *
     * @return void
     */
    public function forgot_password()
    {
        $this->load->library( 'ZMailer' );
        $this->load->helper( 'string' );
        
        if ( $this->form_validation->run( 'just_email_address' ) === true )
        {
            $email_address = do_secure_l( post( 'email_address' ) );
            $admin         = $this->Admin_model->get_one_where( $email_address, 'email_address' );
            
            if ( !empty( $admin ) )
            {
                $authentication_token = random_string( 'md5' );
                $verification_url     = env_url() . "admin/change_password/{$authentication_token}";
                $subject              = 'Change Password Request';
                $message              = sprintf( lang( 'e_change_password' ), $verification_url );
                
                if ( $this->zmailer->send_email( $email_address, $subject, $message ) )
                {
                    $data = [
                        'token_expiry' => get_date_time( '24' ),
                        'auth_token'   => $authentication_token
                    ];
                    
                    if ( $this->Admin_model->update_where( $admin->id, $data ) )
                    {
                        j_success( 'recover_password' );
                    }
                }
                
                j_error( 'failed_email' );
            }
            
            j_error( 'invalid_email' );
        }
        
        d_j_error( form_error( 'email_address' ) );
    }
    
    /**
     * Change Password Page Input Handling.
     *
     * @return void
     */
    public function change_password()
    {
        if ( $this->form_validation->run( 'change_password' ) === true )
        {
            if ( post( 'password' ) == post( 'c_password' ) )
            {
                $token = post( 'auth_token' );
                $admin = $this->Admin_model->get_one_where( $token, 'auth_token' );
                
                if ( !empty( $admin ) )
                {
                    if ( get_date_time() > $admin->token_expiry )
                    {
                        j_error( 'token_expired' );
                    }
                    
                    $data = [
                        'password'     => password_hash( post( 'password' ), PASSWORD_DEFAULT ),
                        'token_expiry' => '',
                        'auth_token'   => ''
                    ];
                    
                    if ( $this->Admin_model->update_where( $admin->id, $data ) )
                    {
                        j_s_jump( 'admin', 'password_changed' );
                    }
                }
                
                j_error( 'invalid_token' );
            }
            
            j_error( 'passwords_unmatched' );
        }
        
        d_j_error( validation_errors() );
    }
}
