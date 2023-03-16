<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Settings Model
 *
 * @author Shahzaib
 */
class Settings_model extends MY_Model {
    /**
     * Update Settings
     *
     * @param  array $data
     * @return void
     */
    public function update_settings( $data )
    {
        foreach ( $data as $key => $value )
        {
            $this->db->where( 'access_key', $key );
            $this->db->update( 'settings', ['value' => $value] );
        }
    }
    
    /**
     * Get Settings
     *
     * @return array
     */
    public function get_managed()
    {
        $settings = $this->db->get( 'settings' );
        $managed  = [];
        
        if ( $settings->num_rows() > 0 )
        {
            $settings = $settings->result();
            
            foreach ( $settings as $setting )
            {
                $managed[$setting->access_key] = $setting->value;
            }
            
            return $managed;
        }
    }
}
