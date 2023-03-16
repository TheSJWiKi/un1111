<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Services Actions Controller
 *
 * @author Shahzaib
 */
class Services extends MY_Controller {
    /**
     * Class Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        verify_form_request();
        
        if ( is_logged_in() === false ) j_error( 'not_logged_in' );
        
        $this->load->library( 'form_validation' );
        $this->load->library( 'upload' );
        $this->load->model( 'Services_model' );
    }
    
    /**
     * Read Service Data
     *
     * @param  string $requirement
     * @return void
     */
    public function read( $requirement = '' )
    {
        if ( !empty( $requirement ) )
        {
            $id = intval( post( 'id' ) );
            
            $data = $this->Services_model->get_one_where( $id );
            
            if ( $requirement == 'short_description' )
            {
                $r_data = [
                    'detail' => $data->short_description,
                    'type'   => 'Short Description',
                    'id'     => $id
                ];
                
                $this->load->view( 'admin/responses/general', $r_data );
            }
            else if ( $requirement == 'service' )
            {
                $this->load->view( 'admin/forms/edit_service', $data );
            }
        }
        else
        {
            j_error( 'invalid_req' );
        }
    }
    
    /**
     * Add Service Input Handling.
     *
     * @return void
     */
    public function add()
    {
        if ( $this->form_validation->run( 'service' ) === true )
        {
            $data1 = [
                'title'             => do_secure( post( 'title' ) ),
                'short_description' => do_secure( post( 'short_description' ) ),
                'created_at'        => get_date_time()
            ];
            
            if ( !empty( $_FILES['icon'] ) )
            {
                if ( $this->upload->do_upload( 'icon' ) )
                {
                    $data1['image'] = $this->upload->data()['file_name'];
                    
                    if ( $this->Services_model->add( $data1 ) )
                    {
                        $data2 = $data1;
                        
                        $data2['id'] = $this->db->insert_id();
                        
                        $html = $this->load->view( 'admin/responses/add_service', $data2, true );
                        
                        j_success_add( $html );
                    }
                }
                else
                {
                    d_j_error( $this->upload->display_errors() );
                }
            }
            
            j_error( 'missing_icon' );
        }
        
        d_j_error( validation_errors() );
    }
    
    /**
     * Update Service Input Handling.
     *
     * @return void
     */
    public function update()
    {
        if ( $this->form_validation->run( 'service' ) === true )
        {
            $id = intval( post( 'id' ) );
            
            $data = [
                'short_description' => do_secure( post( 'short_description' ) ),
                'title'             => do_secure( post( 'title' ) )
            ];
            
            if ( !empty( $_FILES['icon'] ) )
            {
                if ( $this->upload->do_upload( 'icon' ) )
                {
                    $image = $this->Services_model->get_one_where( $id )->image;
                    $data['image'] = $this->upload->data()['file_name'];
                    $this->delete_icon( $image );
                }
                else
                {                    
                    d_j_error( $this->upload->display_errors() );
                }
            }
            
            if ( $this->Services_model->update_where( $id, $data ) )
            {
                $data = $this->Services_model->get_one_where( $id );
                $html = $this->load->view( 'admin/responses/edit_service', $data, true );
                j_success_replace( $id, $html );
            }
            
            j_error( 'not_updated' );
        }
        
        d_j_error( validation_errors() );
    }
    
    /**
     * Delete Service
     *
     * @return void
     */
    public function delete()
    {
        $id = intval( post( 'id' ) );
        
        $image = $this->Services_model->get_one_where( $id )->image;
        
        if ( $this->Services_model->delete( $id ) )
        {
            $this->delete_icon( $image );
            j_success_remove( $id );
        }
    }
}
