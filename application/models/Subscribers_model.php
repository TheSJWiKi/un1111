<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Subscribers Model
 *
 * @author Shahzaib
 */
class Subscribers_Model extends MY_Model {
    /**
     * Class Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'subscribers';
    }
    
    /**
     * Get Confirmed Subscribers
     *
     * @return object
     */
    public function get_confirmed()
    {
        $this->db->where( 'is_confirmed', 1 );
        $data = $this->db->get( $this->table );
        
        if ( $data->num_rows() > 0 )
        {
            return $data->result();
        }
    }
    
    /**
     * Verify Unconfirmed Subscriber
     *
     * @param  string $token
     * @return boolean
     */
    public function verify_subscriber( $token )
    {
        $this->db->where( 'auth_token', $token );
        $data = $this->db->get( $this->table );
        return $data->num_rows() > 0;
    }
}
