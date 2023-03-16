<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Request Helper
 *
 * @author Shahzaib
 */


/**
 * Manage GET and POST Requests
 *
 * @param  string $type e.g. post
 * @param  string $key
 * @return string
 */
function request( $type, $key )
{
    $string = '';
    $ci     =& get_instance();
    
    if ( $ci->input->{$type}( $key ) )
    {
        $string = $ci->input->{$type}( $key );
    }
    
    return $string;
}

/**
 * Manage POST Request
 *
 * @param  string $key
 * @return string
 */
function post( $key )
{
    return request( 'post', $key );
}

/**
 * Manage GET Request
 *
 * @param  string $key
 * @return string
 */
function get( $key )
{
    return request( 'get', $key );
}

/**
 * Is Valid Form Request
 *
 * @return string|boolean
 */
function verify_form_request()
{
    $ci =& get_instance();
    
    if ( !$ci->input->is_ajax_request() )
    {
        j_error( 'only_ajax' );
    }
}
