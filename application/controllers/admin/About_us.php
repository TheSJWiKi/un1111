<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * About Us Controller
 *
 * @author Shahzaib
 */
class About_us extends MY_Controller {
    /**
     * About Us Add Content Page.
     *
     * @return void
     */
    public function index()
    {
        authenticate();
        $this->load->model( 'About_us_model' );
        
        $data['about_us'] = $this->About_us_model->get_one();
        
        $this->load_admin_template(
            'about_us',
            'About Us',
            $data
        );
    }
}
