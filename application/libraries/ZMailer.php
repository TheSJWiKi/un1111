<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ZMailer Library
 *
 * @author Shahzaib
 */
class ZMailer {
  
    /**
     * Send Email Using Mail or SMTP Protocol.
     *
     * @param  string  $receiver
     * @param  string  $subject
     * @param  string  $message
     * @param  boolean $debug
     * @return boolean
     */
    public function send_email( $receiver, $subject, $message, $debug = false )
    {
        $ci =& get_instance();
        $ci->load->library( 'email' );
        
        $config['mailtype'] = 'html';
        
        if ( config_item( 'e_protocol' ) == 'smtp' )
        {
            $config['protocol']    = 'smtp';
            $config['smtp_host']   = config_item( 'e_host' );
            $config['smtp_port']   = config_item( 'e_port' );
            $config['smtp_crypto'] = config_item( 'e_encryption' );
            $config['smtp_user']   = config_item( 'e_username' );
            $config['smtp_pass']   = config_item( 'e_password' );
        }
        
        $ci->email->initialize( $config );
        $ci->email->set_newline( "\r\n" );
        
        $ci->email->from( config_item( 'e_sender' ), config_item( 'e_sender_name' ) );
        $ci->email->to( $receiver );
        $ci->email->subject( $subject );
        $ci->email->message( $message );
        
        if ( @$ci->email->send() )
        {
            return true;
        }
        
        if ( $debug === true )
        {
            return $ci->email->print_debugger();
        }
        else
        {
            return false;
        }
    }
    
}
