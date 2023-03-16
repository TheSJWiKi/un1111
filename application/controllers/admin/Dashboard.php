<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard Controller
 *
 * @author Shahzaib
 */
class Dashboard extends MY_Controller {
    /**
     * Dashboard Page
     *
     * @return void
     */
    public function index()
    {
        authenticate();
        $this->load->model( 'Dashboard_model' );
        
        $data['unconfirmed_subscribers_count'] = $this->Dashboard_model->get_unconfirmed_subscribers_count();
        $data['confirmed_subscribers_count']   = $this->Dashboard_model->get_confirmed_subscribers_count();
        $data['received_messages_count']       = $this->Dashboard_model->get_received_messages_count();
        $data['messages_replies_count']        = $this->Dashboard_model->get_messages_replies_count();
        
        $this->load_admin_template(
            'dashboard',
            'Dashboard',
            $data
        );
    }
}
