<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Response Helper
 *
 * @author Shahzaib
 */


/**
 * Get JSON Response
 *
 * @param  string $status Status Value e.g. true
 * @param  string $value  Any String to Use as Response
 * @param  array  $extras Append New Indexes
 * @return string JSON
 */
function get_json_response( $status, $value, $extras = null )
{
    $data = ['value' => $value, 'status' => $status];
    
    if ( is_array( $extras ) )
    {
        foreach ( $extras as $key => $extra )
        {
            $data[$key] = $extra;
        }
    }
    
    return json_encode( $data );
}

/**
 * Error Message in JSON Form For Non Bootstrap Page Requester.
 *
 * @param  string $key Located in Errors Language File
 * @return void
 */
function j_error_nbs( $key )
{
    exit( get_json_response( 'false_nbs', lang( $key ) ) );
}

/**
 * Error Message in JSON Form.
 *
 * @param  string $key Located in Errors Language File
 * @return void
 */
function j_error( $key )
{
    exit( get_json_response( 'false', lang( $key ) ) );
}

/**
 * Error Message in JSON Form for Contact Form ( Google reCaptcha ).
 *
 * @param  string $key Located in Errors Language File
 * @return void
 */
function j_error_cf( $key )
{
    exit( get_json_response( 'false_cf', lang( $key ) ) );
}

/**
 * Direct Error Message in JSON Form For Non Bootstrap Page Requester.
 *
 * @param  string $text Any String
 * @return void
 */
function d_j_error_nbs( $text )
{
    exit( get_json_response( 'false_nbs', $text ) );
}

/**
 * Direct Error Message in JSON Form.
 *
 * @param  string $text Any String
 * @return void
 */
function d_j_error( $text )
{
    exit( get_json_response( 'false', $text ) );
}

/**
 * Direct Error Message in JSON Form for Contact Form ( Google reCaptcha ).
 *
 * @param  string $text Any String
 * @return void
 */
function d_j_error_cf( $text )
{
    exit( get_json_response( 'false_cf', $text ) );
}

/**
 * Success Message in JSON Form For Non Bootstrap Page Requester.
 *
 * @param  string $key Located in Success Language File
 * @return void
 */
function j_success_nbs( $key )
{
    exit( get_json_response( 'true_nbs', lang( $key ) ) );
}

/**
 * Success Message in JSON Form For Contact Form.
 *
 * @param  string $key Located in Success Language File
 * @return void
 */
function j_success_cf( $key )
{
    exit( get_json_response( 'true_cf', lang( $key ) ) );
}

/**
 * Success Message in JSON Form.
 *
 * @param  string $key Located in Success Language File
 * @return void
 */
function j_success( $key )
{
    exit( get_json_response( 'true', lang( $key ) ) );
}

/**
 * Success Message as HTML to Append.
 *
 * @param  string $html
 * @param  string $key Located in Success Language File
 * @return void
 */
function j_success_add( $html, $key = 'added' )
{
    exit( get_json_response( 'add', $html, ['message' => lang( $key )] ) );
}

/**
 * Success Message as HTML to Replace.
 *
 * @param  integer $id
 * @param  string  $html
 * @return void
 */
function j_success_replace( $id, $html )
{
    exit( get_json_response( 'replace', $html, ['id' => $id, 'message' => lang( 'updated' )] ) ); 
}

/**
 * Successful, Remove a HTML Record.
 *
 * @param  integer $id  Record ID
 * @param  string  $key Located in Success Language File
 * @return void
 */
function j_success_remove( $id, $key = 'deleted' )
{
    exit( get_json_response( 'remove', $id, ['message' => lang( $key )] ) );
}

/**
 * Success Jump, Redirect to Target Location.
 *
 * @param  string  $target    Where to Go
 * @param  string  $key       Located in Success Language File
 * @param  boolean $base_path Allow/Disallow to Append Base URL
 * @return void
 */
function j_s_jump( $target, $key = '', $base_path = true )
{
    if ( !empty( $key ) )
    {
        $ci =& get_instance();
        $ci->session->set_flashdata( 'success', lang( $key ) );
    }

    if ( $base_path === true )
    {
        $target = env_url( $target );
    }

    exit( get_json_response( 'jump', $target ) );
}

/**
 * Success Jump For Settings Child Pages
 *
 * @param  string $page
 * @return void
 */
function j_settings( $page )
{
    j_s_jump( 'admin/settings/' . $page, 'updated' );
}
