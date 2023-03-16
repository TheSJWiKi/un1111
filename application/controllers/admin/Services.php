<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Services Controller
 *
 * @author Shahzaib
 */
class Services extends MY_Controller {
    /**
     * Services Listing Page
     *
     * @return void
     */
    public function index()
    {
        authenticate();
        $this->load->model( 'Services_model' );
        
        $data['services'] = $this->Services_model->get();
        
        $this->load_admin_template(
            'services',
            'Services',
            $data
        );
    }
}
