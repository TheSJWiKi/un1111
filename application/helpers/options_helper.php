<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Options Helper
 *
 * @author Shahzaib
 */


/**
 * Set Database Settings as CI Configuration.
 *
 * @return void
 */
function set_settings()
{
    $ci =& get_instance();
    $ci->load->model( 'settings_model' );
    
    $data = $ci->settings_model->get_managed();
    
    foreach ( $data as $key => $value )
    {
        $ci->config->set_item( $key, $value );
    }
}

/**
 * Get Valid Color Values.
 *
 * @return array
 */
function get_valid_colors()
{
    return ['color_01', 'color_02', 'color_03', 'color_04'];
}
