<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contact Us Model
 *
 * @author Shahzaib
 */
class Contact_us_model extends MY_Model {
    /**
     * Class Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'messages';
    }
    
    /**
     * Get the List of Contact Messages
     *
     * @param  boolean $replied_only
     * @param  integer $limit
     * @param  integer $offset
     * @return array
     */
    public function get_messages( $replied_only, $limit, $offset )
    {
        $this->db->limit( $limit, $offset );
        
        if ( $replied_only === true )
        {
            $this->db->where( 'is_replied', 1 );
        }
        else
        {
            $this->db->where( 'is_replied', 0 );
        }
        
        $data = $this->db->get( $this->table );
        
        if ( $data->num_rows() > 0 )
        {
            return $data->result();
        }
    }
}
