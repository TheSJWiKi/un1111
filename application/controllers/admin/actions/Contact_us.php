<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contact Us Actions Controller
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
        verify_form_request();
        
        if ( is_logged_in() === false ) j_error( 'not_logged_in' );
        
        $this->load->library( 'form_validation' );
        $this->load->model( 'Contact_us_model' );
    }
    
    /**
     * Read Message Data
     *
     * @param  string $requirement
     * @return void
     */
    public function read( $requirement = '' )
    {
        if ( !empty( $requirement ) )
        {
            $id   = intval( post( 'id' ) );
            $data = $this->Contact_us_model->get_one_where( $id );
            
            if ( $requirement == 'message' || $requirement == 'reply' )
            {
                $r_data = ['detail' => $data->{$requirement}, 'type' => ucfirst( $requirement ), 'id' => $id];
                $this->load->view( 'admin/responses/general', $r_data );
            }
            else if ( $requirement == 'for_reply' )
            {
                $this->load->view( 'admin/forms/reply', $data );
            }
        }
    }
    
    /**
     * Send Message Reply
     *
     * @return void
     */
    public function reply()
    {
        $this->load->library( 'ZMailer' );
        
        $id   = intval( post( 'id' ) );
        $text = do_secure( post( 'reply_message' ) );
        
        $data = $this->Contact_us_model->get_one_where( $id );
        
        if ( !empty( $data ) )
        {
            $subject = 'Contact Message Reply';
            $message = sprintf( lang( 'e_message_reply' ), $data->full_name, $data->message, $text, config_item( 'g_site_name' ) );
            
            if ( $this->zmailer->send_email( $data->email_address, $subject, $message ) )
            {
                $data = [
                    'replied_at' => get_date_time(),
                    'is_replied' => 1,
                    'reply'      => $text
                ];
                
                if ( $this->Contact_us_model->update_where( $id, $data ) )
                {
                    j_success_remove( $id, 'replied' );
                }
            }
            
            j_error( 'failed_email' );
        }
        
        j_error( 'invalid_req' );
    }
    
    /**
     * Delete Message
     *
     * @return void
     */
    public function delete()
    {
        $id = intval( post( 'id' ) );
        
        if ( $this->Contact_us_model->delete( $id ) )
        {
            j_success_remove( $id );
        }
    }
}
