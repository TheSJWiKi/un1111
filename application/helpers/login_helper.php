<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Login Helper
 *
 * @author Shahzaib
 */


/**
 * Check If Admin is Logged in or Not.
 *
 * @return boolean
 */
function is_logged_in()
{
    $ci =& get_instance();
    
    if ( empty( $ci->session->userdata( 'is_logged_in' ) ) )
    {
        return false;
    }
    
    return true;
}

/**
 * Admin Authentication
 *
 * @return void
 */
function authenticate()
{
    if ( is_logged_in() === true )
    {
        if ( is_public_page() === true )
        {
            redirect( 'admin/dashboard' );
        }
    }
    else
    {
        if ( is_public_page() === false )
        {
            redirect( 'admin' );
        }
    }
}
