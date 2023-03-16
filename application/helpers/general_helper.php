<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * General Helper
 *
 * @author Shahzaib
 */


/**
 * Isset Alert Message
 *
 * @return boolean
 */
function isset_alert_message()
{
    if ( get_flashdata( 'success' ) || get_flashdata( 'error' ) )
    {
        return true;
    }
    
    return false;
}

/**
 * Get Year ( Current )
 *
 * @return string
 */
function get_year()
{
    $timezone = config_item( 'g_timezone' );
    $format   = 'Y';
    
    if ( !empty( $timezone ) )
    {
        date_default_timezone_set( $timezone );
    }
    
    return date( $format );
}

/**
 * Is Mod Rewrite Module Enabled
 *
 * @return boolean
 */
function is_mod_rewrite_enabled()
{
    $status = false;
    
    if ( function_exists( 'apache_get_modules' ) )
    {
        $status = in_array( 'mod_rewrite', apache_get_modules() );
    }
    
    return $status;
}

/**
 * Environment URL
 *
 * @param  string $slug
 * @return string 
 */
function env_url( $slug = '' )
{
    $base_url = base_url();
    
    if ( ! is_mod_rewrite_enabled() )
    {
        $base_url .= 'index.php/';
    }
    
    $base_url .= $slug;
    
    return $base_url;
}

/**
 * Redirect Based on Environment URL
 *
 * @param  string $slug
 * @return void
 */
function env_redirect( $slug = '' )
{
    $slug = ( ! empty( $slug ) ) ? env_url( $slug ) : '';
    redirect( $slug );
    exit;
}

/**
 * Manage Title ( Appending Site Name ).
 *
 * @param  string $title
 * @return string
 */
function manage_title( $title )
{
    $site_name = config_item( 'g_site_name' );
    
    if ( !empty( $site_name ) )
    {
        $title .= ' - ' . $site_name;
    }
    
    return $title;
}

/**
 * Do Secure, Use to Avoid XSS & Sanitize the String.
 *
 * @param  string $string Any String
 * @return string
 */
function do_secure( $string )
{
    $ci =& get_instance();
    
    $string = $ci->security->xss_clean( $string );
    $string = stripslashes( $string );
    $string = preg_replace( '/\s+/', ' ', $string );
    $string = trim( $string );
    
    return $string;
}

/**
 * Do Secure, Use to Get Lowercase Output.
 *
 * @param  string $string Standard Keyboard Characters
 * @return string
 */
function do_secure_l( $string )
{
    return strtolower( do_secure( $string ) );
}

/**
 * Do Secure, Use to Secure & Encode the URL String.
 *
 * @param  string $url
 * @return string
 */
function do_secure_url( $url )
{
    $url = do_secure_l( $url );
    return urlencode( $url );
}

/**
 * Decode URL and Escape HTML
 *
 * @param  string $enc_url
 * @return string
 */
function html_esc_url( $enc_url )
{
    return html_escape( urldecode( $enc_url ) );
}

/**
 * Contact Us Info Elements Reset Margin Bottom
 * If Disabled the Form.
 *
 * @return string
 */
function cu_info_mb_reset()
{
    if ( config_item( 'cu_form_status' ) == 0 )
    {
        return ' mb-0';
    }
}

/**
 * Get Temporary Stored Session Data.
 *
 * @param  string $key
 * @return string
 */
function get_flashdata( $key )
{
    $ci =& get_instance();
    return $ci->session->flashdata( $key );
}

/**
 * Load Alert View Template
 *
 * @param  string $message
 * @param  string $view
 * @param  string $type
 * @return void
 */
function load_alert_view( $message, $view, $type = 'danger' )
{
    $view = 'admin/common/' . $view; 
    $ci   =& get_instance();
    $ci->load->view( $view, ['message' => $message, 'type' => $type] );
}

/**
 * Temporary Alert Message Based on Session.
 *
 * @param  string $view
 * @return void
 */
function alert_message( $view = 'alert_message' )
{
    if ( get_flashdata( 'success' ) )
    {
        load_alert_view( get_flashdata( 'success' ), $view, 'success' );
    }
    else if ( get_flashdata( 'error' ) )
    {
        load_alert_view( get_flashdata( 'error' ), $view );
    }
}

/**
 * Temporary Alert Message Based on Session for Non Bootstrap Page.
 *
 * @return void
 */
function alert_message_nbs()
{
    alert_message( 'alert_message_nbs' );
}

/**
 * Selected Single, Use to Add "selected" Attribute on
 * Non Looping Child Option Elements of <select>.
 *
 * @param  integer|string $value1
 * @param  integer|string $value2
 * @return string
 */
function selected_single( $value1, $value2 )
{
    if ( $value1 == $value2 )
    {
        return 'selected="selected"';
    }
}

/**
 * Checked Single, Use to Add "checked" Attribute on
 * the Radio and Checkbox Inputs.
 *
 * @param  integer|string $value1
 * @param  integer|string $value2
 * @return string
 */
function checked_single( $value1, $value2 )
{
    if ( $value1 == $value2 )
    {
        return 'checked="checked"';
    }
}

/**
 * Get Uploads Path
 *
 * @param  string $file
 * @return string
 */
function get_uploads_path( $file )
{
    return base_url() . 'assets/images/uploads/' . $file;
}

/**
 * Get Data and Time
 *
 * @param  integer $hours  Add Hours in the Current Time e.g. 24
 * @param  boolean $d_only Get Date Only by Passing "true"
 * @return string
 */
function get_date_time( $hours = null, $d_only = false )
{
    $timezone = config_item( 'g_timezone' );
    $format   = 'Y-m-d H:i:s';
    
    if ( $d_only === true ) $format = 'Y-m-d';
    
    if ( !empty( $timezone ) )
    {
        date_default_timezone_set( $timezone );
    }
    
    if ( !empty( $hours ) )
    {
        return date( $format, strtotime( "+{$hours} hours" ) );
    }
    
    return date( $format );
}

/**
 * Get Current Using Date Function
 *
 * @param  string $which
 * @return string
 */
function get_current_d( $which )
{
    $timezone = config_item( 'g_timezone' );
    
    if ( !empty( $timezone ) )
    {
        date_default_timezone_set( $timezone );
    }
    
    return date( $which );
}

/**
 * Verify the Length of Given String.
 *
 * @param  string  $text
 * @param  integer $length
 * @return boolean
 */
function is_increased_length( $text, $length = 90 )
{
    return mb_strlen( $text ) > $length;
}

/**
 * Get Sized String, Use to Get the Characters
 * Base on the Given Length.
 *
 * @param  string  $text
 * @param  integer $length
 * @return string
 */
function get_sized_text( $text, $length = 90 )
{
    return mb_substr( $text, 0, $length );
}

/**
 * Check the Short Text Length is
 * Increased or Not.
 *
 * @param  string $text
 * @return boolean
 */
function is_increased_short_text( $text )
{
    return is_increased_length( $text, 15 );
}

/**
 * Make the Longer Text Shorter.
 *
 * @param  string $text
 * @return string
 */
function short_text( $text )
{
    return get_sized_text( $text, 15 );
}

/**
 * Verify the Filling of Settings Related to Google reCaptcha.
 *
 * @return boolean
 */
function is_filled_google_recaptcha()
{
    if ( !empty( config_item( 'gr_public_key' ) ) &&
         !empty( config_item( 'gr_secret_key' ) ) )
        return true;
    
    return false;
}

/**
 * Get Contact Address for Google Map.
 *
 * @return string
 */
function get_gmap_address()
{
    $address = strtolower( config_item( 'cu_address' ) );
    return str_replace( ' ', '%20', $address );
}

/**
 * Prefix Zero
 *
 * @param  integer $num
 * @return integer
 */
function pf_zero( $num )
{
    if ( $num < 10 )
    {
        $num = '0' . $num;
    }
    
    return $num;
}
