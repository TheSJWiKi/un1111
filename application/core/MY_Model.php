<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY Model ( Base Model )
 *
 * @author Shahzaib
 */
class MY_Model extends CI_Model {
    protected $table;
    
    /** 
     * Manage Database Table Name
     *
     * @param  string $table
     * @return string
     */
    private function manage_table( $table )
    {
        if ( !empty( $this->table ) )
        {
            return $this->table;
        }
        
        return $table;
    }
    
    /**
     * Add Record
     *
     * @param  array  $data
     * @param  string $table
     * @return integer|boolean
     */
    public function add( $data, $table = '' )
    {
        $this->db->insert( $this->manage_table( $table ), $data );
        
        if ( $this->db->affected_rows() )
        {
            return $this->db->insert_id();
        }
        
        return false;
    }
    
    /**
     * Get Records
     *
     * @param  integer $limit
     * @param  integer $offset
     * @param  string  $table
     * @return array
     */
    public function get( $limit = 0, $offset = 0, $table = '' )
    {
        if ( !empty( $limit ) )
        {
            $this->db->limit( $limit, $offset );
        }
        
        $data = $this->db->get( $this->manage_table( $table ) );
        
        if ( $data->num_rows() > 0 )
        {
            return $data->result();
        }
    }
    
    /**
     * Get Count
     *
     * @param   string  $table
     * @return integer
     */
    public function get_count( $table = '' )
    {
        return $this->db->count_all_results( $this->manage_table( $table ) );
    }
    
    /**
     * Get Record
     *
     * @param string $table
     * @return array
     */
    public function get_one( $table = '' )
    {
        $data = $this->db->get( $this->manage_table( $table ) );
        
        if ( $data->num_rows() > 0 )
        {
            return $data->row();
        }
    }
    
    /**
     * Get Record ( Conditioning )
     *
     * @param  integer|string $value
     * @param  string         $col
     * @param  string         $table
     * @return array
     */
    public function get_one_where( $value, $col = 'id', $table = '' )
    {
        $this->db->where( $col, $value );
        $data = $this->db->get( $this->manage_table( $table ) );
        
        if ( $data->num_rows() > 0 )
        {
            return $data->row();
        }
    }
    
    /**
     * Update Record
     *
     * @param  array  $data
     * @param  string $table
     * @return boolean
     */
    public function update( $data, $table = '' )
    {
        $this->db->update( $this->manage_table( $table ), $data );
        
        if ( $this->db->affected_rows() )
        {
            return true;
        }
        
        return false;
    }
    
    /**
     * Update Record ( Conditioning )
     *
     * @param  integer|string $value
     * @param  array          $data
     * @param  string         $col
     * @param  string         $table
     * @return boolean
     */
    public function update_where( $value, $data, $col = 'id', $table = '' )
    {
        $this->db->where( $col, $value );
        $this->db->update( $this->manage_table( $table ), $data );
        
        if ( $this->db->affected_rows() )
        {
            return true;
        }
        
        return false;
    }
    
    /**
     * Delete Record
     *
     * @param  integer|string $value
     * @param  string         $col
     * @param  string         $table
     * @return boolean
     */
    public function delete( $value, $col = 'id', $table = '' )
    {
        $this->db->where( $col, $value );
        $this->db->delete( $this->manage_table( $table ) );
       
        if ( $this->db->affected_rows() )
        {
            return true;
        }
        
        return false;
    }
}
