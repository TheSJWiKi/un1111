<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard Model
 *
 * @author Shahzaib
 */
class Dashboard_model extends MY_Model {
    /**
     * Get Count of Unconfirmed Subscribers
     *
     * @return integer
     */
    public function get_unconfirmed_subscribers_count()
    {
        $this->db->where( 'is_confirmed', 0 );
        return $this->db->count_all_results( 'subscribers' );
    }
    
    /**
     * Get Count of Confirmed Subscribers
     *
     * @return integer
     */
    public function get_confirmed_subscribers_count()
    {
        $this->db->where( 'is_confirmed', 1 );
        return $this->db->count_all_results( 'subscribers' );
    }
    
    /**
     * Get Received Messages Count
     *
     * @return integer
     */
    public function get_received_messages_count()
    {
        $this->db->where( 'is_replied', 0 );
        return $this->db->count_all_results( 'messages' );
    }
    
    /**
     * Get Replies Messages Count
     *
     * @return integer
     */
    public function get_messages_replies_count()
    {
        $this->db->where( 'is_replied', 1 );
        return $this->db->count_all_results( 'messages' );
    }
}
