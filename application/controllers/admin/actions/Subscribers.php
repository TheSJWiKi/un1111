<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Subscribers Actions Controller
 *
 * @author Shahzaib
 */
class Subscribers extends MY_Controller {
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
        $this->load->model( 'Subscribers_model' );
    }
    
    /**
     * Summernote Image Upload
     *
     * @return void
     */
    public function sn_image_upload()
    {
        $this->load->library( 'upload' );
        
        if ( ! empty( $_FILES['file']['name'] ) )
        {
            if ( $this->upload->do_upload( 'file' ) )
            {
                echo get_uploads_path( $this->upload->data()['file_name'] );
            }
        }
    }
    
    /**
     * Summernote Image Delete
     *
     * @return void
     */
    public function sn_image_delete()
    {
        $file = do_secure( post( 'file' ) );
        $file = str_replace( base_url(), '', $file );
        
        if ( file_exists( $file ) )
        {
            unlink( $file );
        }
    }
    
    /**
     * Send Email to Subscribers Input Handling.
     *
     * @return void
     */
    public function send_email()
    {
        $this->load->library( 'ZMailer' );
        
        $subscribers = $this->Subscribers_model->get_confirmed();
        
        if ( $this->form_validation->run( 'compose_email' ) )
        {
            $subject = do_secure( post( 'subject' ) );
            $message = do_secure( post( 'message' ) );
            
            if ( ! empty( $subscribers ) )
            {
                foreach ( $subscribers as $subscriber )
                {
                    $url_unsub = env_url() . "unsubscribe/{$subscriber->auth_token}";
                    
                    $to_send = sprintf(
                        lang( 'subscriber_email' ),
                        $subscriber->email_address,
                        $message,
                        $url_unsub,
                        config_item( 'g_site_name' )
                    );
                
                    $status = $this->zmailer->send_email( $subscriber->email_address, $subject, $to_send );
                    
                    if ( ! $status )
                    {
                        j_error( 'failed_email' );
                    }
                }
                
                j_s_jump( 'admin/subscribers', 'sent_email_sub' );
            }
            
            j_error( 'no_confirmed_sub' );
        }
        
        d_j_error( validation_errors() );
    }
    
    /**
     * Delete Service
     *
     * @param  string $type
     * @return void
     */
    public function delete()
    {
        if ( is_logged_in() === true )
        {
            $id = intval( post( 'id' ) );
            
            if ( $this->Subscribers_model->delete( $id ) )
            {
                j_success_remove( $id );
            }
        }
        
        j_error( 'not_logged_in' );
    }
}
