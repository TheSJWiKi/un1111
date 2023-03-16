<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home Controller
 *
 * @author Shahzaib
 */
class Home extends MY_Controller {
    /**
     * Home Page
     *
     * @return void
     */
    public function index()
    {
        $this->load->model( 'About_us_model' );
        $this->load->model( 'Services_model' );
        $data['about_us'] = $this->About_us_model->get_one();
        $data['services'] = $this->Services_model->get();
        $this->load->view( 'home', $data );
    }
    
    /**
     * Contact Us Form Input Handling
     *
     * @return void
     */
    public function send_message()
    {
        verify_form_request();
        
        if ( config_item( 'cu_form_status' ) == 0 || config_item( 'contact_us_status' ) == 0 ) j_error_cf( 'temp_disabled' );
        
        $this->load->library( 'form_validation' );
        $this->load->model( 'Contact_us_model' );
        $this->load->library( 'ZMailer' );
        
        if ( $this->form_validation->run( 'contact_us' ) === true )
        {
            $status = true;
            
            if ( is_filled_google_recaptcha() && config_item( 'gr_status' ) == 1 )
            {
                $handler = curl_init();
                curl_setopt( $handler, CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $handler, CURLOPT_POST, true );
                curl_setopt( $handler, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify' );
                
                curl_setopt( $handler, CURLOPT_POSTFIELDS, [
                    'response' => do_secure( post( 'g-recaptcha-response' ) ),
                    'secret'   => config_item( 'gr_secret_key' )
                ] );
                
                $response = curl_exec( $handler );
                $response = json_decode( $response );
                curl_close( $handler );
                
                if ( !$response->success )
                {
                    $status = false;
                }
            }
            
            if ( $status === true )
            {
                $data = [
                    'full_name'     => do_secure( post( 'full_name' ) ),
                    'email_address' => do_secure_l( post( 'email_address' ) ),
                    'message'       => do_secure( post( 'message' ) ),
                    'ip_address'    => $this->input->ip_address(),
                    'received_at'   => get_date_time()
                ];
                
                if ( !preg_match( '/^[A-Za-z \.]+$/', $data['full_name'] ) )
                {
                    j_error_cf( 'invalid_full_name' );
                }
                
                if ( $this->Contact_us_model->add( $data ) )
                {
                    if ( !empty( config_item( 'cu_email_address' ) ) )
                    {
                        $receiver = config_item( 'cu_email_address' );
                        $subject  = $data['full_name'] . ' Sent a Message';
                        
                        $message = sprintf(
                            lang( 'e_contact_us' ),
                            $data['email_address'],
                            $data['message']
                        );
                        
                        $this->zmailer->send_email( $receiver, $subject, $message );
                    }
                    
                    j_success_cf( 'contact_msg_sent' );
                }
            }
            
            j_error_cf( 'recaptcha' );
        }
        
        d_j_error_cf( validation_errors() );
    }
    
    /**
     * Subscription Form Input Handling
     *
     * @return void
     */
    public function subscribe()
    {
        verify_form_request();
        
        if ( config_item( 'newsletter_status' ) == 0 ) j_error_nbs( 'temp_disabled' );
        
        $this->load->library( 'form_validation' );
        $this->load->model( 'Subscribers_model' );
        $this->load->library( 'ZMailer' );
        $this->load->helper( 'string' );
        
        if ( $this->form_validation->run( 'just_email_address' ) === true )
        {
            $email_address = do_secure_l( post( 'email_address' ) );
            
            if ( !$this->Subscribers_model->get_one_where( $email_address, 'email_address' ) )
            {
                $authentication_token = random_string( 'md5' );
                
                $url_confirm = env_url() . "confirm_sub/{$authentication_token}";
                $url_unsub   = env_url() . "unsubscribe/{$authentication_token}";
                $subject     = 'Please Confirm your Subscription';
                $s_name      = config_item( 'g_site_name' );
                
                $message = sprintf(
                    lang( 'e_subscribe' ),
                    $url_confirm,
                    $url_unsub,
                    $s_name
                );
                
                $data = [
                    'email_address' => $email_address,
                    'auth_token'    => $authentication_token,
                    'subscribed_at' => get_date_time()
                ];
                
                if ( $this->zmailer->send_email( $data['email_address'], $subject, $message ) )
                {
                    if ( $this->Subscribers_model->add( $data ) )
                    {
                        j_success_nbs( 'subscribed' );
                    }
                    
                    j_error_nbs( 'failed_subscribe' );
                }
                
                j_error_nbs( 'failed_email' );
            }
            
            j_error_nbs( 'already_subscribed' );
        }
        
        d_j_error_nbs( form_error( 'email_address' ) );
    }
    
    /**
     * Confirm Subscription
     *
     * @param  string $token
     * @return void
     */
    public function confirm_sub( $token )
    {
        if ( !empty( $token ) )
        {
            $this->load->model( 'Subscribers_model' );
            
            if ( $this->Subscribers_model->verify_subscriber( $token ) )
            {
                $data = ['confirmed_at' => get_date_time(), 'is_confirmed' => 1];
                
                if ( $this->Subscribers_model->update_where( $token, $data, 'auth_token' ) )
                {
                    home_flash_redirect( 'success', 'confirmed_sub' );
                }
                
                home_flash_redirect( 'error', 'went_wrong' );
            }
            else
            {
                home_flash_redirect( 'error', 'invalid_conf_sub' );
            }
        }
    }
    
    /**
     * Unsubscribe
     *
     * @param  string $token
     * @return void
     */
    public function unsubscribe( $token )
    {
        if ( !empty( $token ) )
        {
            $this->load->model( 'Subscribers_model' );
            
            if ( $this->Subscribers_model->verify_subscriber( $token ) )
            {
                if ( $this->Subscribers_model->delete( $token, 'auth_token' ) )
                {
                    home_flash_redirect( 'success', 'unsubscribed' );
                }
                
                home_flash_redirect( 'error', 'went_wrong' );
            }
            else
            {
                home_flash_redirect( 'error', 'invalid_conf_sub' );
            }
        }
    }
}
