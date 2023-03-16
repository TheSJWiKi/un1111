<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pages Helper
 *
 * @author Shahzaib
 */


/**
 * Is Sidebar Sections Enabled
 *
 * @return boolean
 */
function is_sidebar_sections_enabled()
{
    if ( !config_item( 'about_us_status' ) &&
         !config_item( 'sevices_status' ) &&
         !config_item( 'contact_us_status' ) )
         return false;
    
    return true;
}

/**
 * Home Page Redirect with Flashdata.
 *
 * @param  string $type
 * @param  string $key
 * @return void
 */
function home_flash_redirect( $type, $key )
{
    $ci =& get_instance();
    $ci->session->set_flashdata( $type, lang( $key ) );
    redirect();
}

/**
 * Get Public Pages
 *
 * @return array
 */
function get_public_pages()
{
    return ['forgot_password', 'change_password'];
}

/**
 * Is the Requested Page is Public.
 *
 * @return boolean
 */
function is_public_page()
{
    $ci =& get_instance();
    
    $page = $ci->uri->segment( 2 );
    
    if ( empty( $page ) || in_array( $page, get_public_pages() ) )
    {
        return true;
    }
    
    return false;
}

/**
 * Get the Slugs of Admin Area Child Pages.
 *
 * @param  string $key
 * @return array
 */
function get_admin_slugs( $key )
{
    $slugs = [
        'contact_us' => [
            'received',
            'replies'
        ],
        'settings' => [
            'general',
            'counter',
            'google_recaptcha',
            'social_links',
            'contact_us',
            'sections',
            'email'
        ]
    ];
    
    if ( array_key_exists( $key, $slugs ) )
    {
        return $slugs[$key];
    }
}

/**
 * Activate the Parent Menu
 *
 * @param  array  $slugs Child Slugs
 * @param  string $class CSS Class
 * @return string
 */
function activate_parent_menu( $slugs, $class = 'active' )
{
    $ci =& get_instance();
    
    $slug = $ci->uri->segment( 3 );
    
    if ( in_array( $slug, $slugs ) )
    {
        return $class;
    }
}

/**
 * Open Parent Menu
 *
 * @param  array $slugs Child Slugs
 * @return string
 */
function open_parent_menu( $slugs )
{
    return activate_parent_menu( $slugs, 'show' );
}

/**
 * Activate Page ( Admin Area )
 *
 * @param  string  $name Page Slug
 * @param  integer $seg URL Position
 * @return string
 */
function activate_page( $name, $seg = 2 )
{
    $ci =& get_instance();
    
    $slug = $ci->uri->segment( $seg );
    
    if ( $slug == $name )
    {
        return 'active';
    }
}

/**
 * Activate Child Page
 *
 * @param  string $name Page Slug
 * @return string
 */
function activate_child_page( $name )
{
    return activate_page( $name, 3 );
}

/**
 * Height Class for DIV that is Having "main" Class.
 *
 * @return string
 */
function main_height_class()
{
    if ( config_item( 'newsletter_status' ) == 1 )
    {
        return 'height-wns';
    }
    
    return 'height-wons';
}

/**
 * Get Offset
 *
 * @param  integer $per_page
 * @return integer
 */
function get_offset( $per_page )
{
    $ci =& get_instance();
    
    if ( !empty( $ci->uri->segment( 4 ) ) )
    {
        return ( $ci->uri->segment( 4 ) - 1 ) * $per_page;
    }
    
    return 0;
}
