<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Subscribers Controller
 *
 * @author Shahzaib
 */
class Subscribers extends MY_Controller {
    /**
     * Subscribers Listing Page
     *
     * @return void
     */
    public function index(  )
    {
        authenticate();
        
        $this->load->model( 'Subscribers_model' );
        $this->load->library( 'pagination' );
        
        $config['base_url']   = env_url( 'admin/subscribers/index' );
        $config['total_rows'] = $this->Subscribers_model->get_count();
        $config['per_page']   = 10;
        
        $offset = get_offset( $config['per_page'] );
        
        $this->pagination->initialize( $config );
        
        $data['subscribers'] = $this->Subscribers_model->get( $config['per_page'], $offset );
        $data['pagination']  = $this->pagination->create_links();
        
        $this->load_admin_template(
            'subscribers',
            'Subscribers',
            $data
        );
    }
}
