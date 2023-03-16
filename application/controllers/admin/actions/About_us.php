<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * About Us Action Controller
 *
 * @author Shahzaib
 */
class About_us extends MY_Controller {
    /**
     * About Us Page Input Handling.
     *
     * @return void
     */
    public function update()
    {
        if ( is_logged_in() === true )
        {
            verify_form_request();
            $this->load->model( 'About_us_model' );
            $content = do_secure( post( 'content' ) );
            
            if ( $this->About_us_model->update( ['content' => $content] ) )
            {
                j_s_jump( 'admin/about_us', 'updated' );
            }
            
            j_error( 'not_updated' );
        }
        
        j_error( 'not_logged_in' );
    }
}
