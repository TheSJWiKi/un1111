<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Settings Actions Controller
 *
 * @author Shahzaib
 */
class Settings extends MY_Controller {
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
        $this->load->model( 'Settings_model' );
        $this->load->library( 'upload' );
    }
    
    /**
     * General Page Input Handling.
     *
     * @return void
     */
    public function index()
    {
        if ( $this->form_validation->run( 'settings_general' ) === true )
        {
            if ( !in_array( post( 'g_site_color' ), get_valid_colors() ) ) j_error( 'invalid_color' );
            
            $data = [
                'google_analytics' => do_secure( post( 'google_analytics' ) ),
                'g_site_name'      => do_secure( post( 'g_site_name' ) ),
                'g_site_keywords'  => do_secure( post( 'g_site_keywords' ) ),
                'g_site_color'     => do_secure_l( post( 'g_site_color' ) ),
                'g_site_desc'      => do_secure( post( 'g_site_desc' ) ),
                'g_timezone'       => do_secure( post( 'g_timezone' ) )
            ];
            
            if ( !empty( $_FILES['g_site_logo'] ) || !empty( $_FILES['g_site_favicon'] ) )
            {
                if ( !empty( $_FILES['g_site_logo'] ) )
                {
                    if ( $this->upload->do_upload( 'g_site_logo' ) )
                    {
                        $image = config_item( 'g_site_logo' );
                        $data['g_site_logo'] = $this->upload->data()['file_name'];
                        $this->delete_icon( $image );
                    }
                    else
                    {
                        d_j_error( $this->upload->display_errors() );
                    }
                }
                
                if ( !empty( $_FILES['g_site_favicon'] ) )
                {
                    if ( $this->upload->do_upload( 'g_site_favicon' ) )
                    {
                        $image = config_item( 'g_site_favicon' );
                        $data['g_site_favicon'] = $this->upload->data()['file_name'];
                        $this->delete_icon( $image );
                    }
                    else
                    {
                        d_j_error( $this->upload->display_errors() );
                    }
                }
            }
            
            $this->Settings_model->update_settings( $data );
            j_settings( 'general' );
        }
        else
        {
            d_j_error( form_error( 'email_address' ) );
        }
    }
    
    /**
     * Counter Page Input Handling.
     *
     * @return void
     */
    public function counter()
    {
        if ( $this->form_validation->run( 'settings_counter' ) === true )
        {
            $data = [
                'c_bg_effect'  => do_secure( post( 'c_bg_effect' ) ),
                'c_type_text1' => do_secure( post( 'c_type_text1' ) ),
                'c_type_text2' => do_secure( post( 'c_type_text2' ) ),
                'c_type_text3' => do_secure( post( 'c_type_text3' ) ),
                'c_rdate'      => do_secure( post( 'c_rdate' ) ),
                'c_rhours'     => do_secure( post( 'c_rhours' ) ),
                'c_rminutes'   => do_secure( post( 'c_rminutes' ) ),
                'c_jump_url'   => do_secure_url( post( 'c_jump_url' ) )
            ];
            
            if ( !empty( $_FILES['c_bg_image'] ) )
            {
                if ( $this->upload->do_upload( 'c_bg_image' ) )
                {
                    $image = config_item( 'c_bg_image' );
                    $data['c_bg_image'] = $this->upload->data()['file_name'];
                    $this->delete_icon( $image );
                }
                else
                {
                    d_j_error( $this->upload->display_errors() );
                }
            }
            
            $this->Settings_model->update_settings( $data );
            j_settings( 'counter' );
        }
        
        d_j_error( validation_errors() );
    }
    
    /**
     * Google reCaptcha Page Input Handling.
     *
     * @return void
     */
    public function google_recaptcha()
    {
        $data = [
            'gr_public_key' => do_secure( post( 'gr_public_key' ) ),
            'gr_secret_key' => do_secure( post( 'gr_secret_key' ) )
        ];
        
        $this->Settings_model->update_settings( $data );
        j_settings( 'google_recaptcha' );
    }
  
    /**
     * Social Links Page Input Handling.
     *
     * @return void
     */
    public function social_links()
    {
        $data = [
            'sl_facebook'  => do_secure_url( post( 'sl_facebook' ) ),
            'sl_instagram' => do_secure_url( post( 'sl_instagram' ) ),
            'sl_youtube'   => do_secure_url( post( 'sl_youtube' ) ),
            'sl_twitter'   => do_secure_url( post( 'sl_twitter' ) ),
            'sl_pinterest' => do_secure_url( post( 'sl_pinterest' ) ),
            'sl_linkedin'  => do_secure_url( post( 'sl_linkedin' ) )
        ];
        
        $this->Settings_model->update_settings( $data );
        j_settings( 'social_links' );
    }
    
    /**
     * Contact Us Page Input Handling.
     *
     * @return void
     */
    public function contact_us()
    {
        if ( $this->form_validation->run( 'settings_contact_us' ) === true )
        {
            $data = [
                'cu_form_status'   => intval( post( 'cu_form_status' ) ),
                'gmap_status'      => intval( post( 'gmap_status' ) ),
                'gr_status'        => intval( post( 'gr_status' ) ),
                'cu_address'       => do_secure( post( 'cu_address' ) ),
                'cu_email_address' => do_secure_l( post( 'cu_email_address' ) ),
                'cu_phone'         => do_secure( post( 'cu_phone' ) )
            ];
            
            $this->Settings_model->update_settings( $data );
            j_settings( 'contact_us' );
        }
        
        d_j_error( form_error( 'cu_email_address' ) );
    }
    
    /**
     * Sections Page Input Handling.
     *
     * @return void
     */
    public function sections()
    {
        $data = [
            'contact_us_status' => intval( post( 'contact_us_status' ) ),
            'newsletter_status' => intval( post( 'newsletter_status' ) ),
            'about_us_status'   => intval( post( 'about_us_status' ) ),
            'sevices_status'    => intval( post( 'sevices_status' ) )
        ];
        
        $this->Settings_model->update_settings( $data );
        j_settings( 'sections' );
    }
    
    /**
     * Email Page Input Handling.
     *
     * @return void
     */
    public function email()
    {
        $fv_key = 'settings_email_smtp';
        
        if ( post( 'e_protocol' ) == 'mail' ) $fv_key = 'settings_email_mail';
        
        if ( $this->form_validation->run( $fv_key ) === true )
        {
            $data = [
                'e_sender_name' => do_secure( post( 'e_sender_name' ) ),
                'e_sender'      => do_secure_l( post( 'e_sender' ) ),
                'e_protocol'    => do_secure( post( 'e_protocol' ) )
            ];
            
            if ( post( 'e_protocol' ) == 'smtp'  )
            {
                $data['e_host']       = do_secure( post( 'e_host' ) );
                $data['e_username']   = do_secure_l( post( 'e_username' ) );
                $data['e_password']   = do_secure( post( 'e_password' ) );
                $data['e_encryption'] = do_secure( post( 'e_encryption' ) );
                $data['e_port']       = intval( post( 'e_port' ) );
            }
            
            $this->Settings_model->update_settings( $data );
            j_settings( 'email' );
        }
        
        d_j_error( validation_errors() );
    }
    
    /**
     * Test Email Settings
     *
     * @return void
     */
    public function test_esettings()
    {
        $this->load->library( 'ZMailer' );
        
        if ( $this->form_validation->run( 'just_email_address' ) === true )
        {
            $receiver = do_secure_l( post( 'email_address' ) );
            $subject  = 'Email Settings Test';
            $message  = lang( 'e_test_email' );
            $status   = $this->zmailer->send_email( $receiver, $subject, $message, true );
            
            if ( $status === true )
            {
                j_success( 'esettings_tested' );
            }
            
            d_j_error( $status );
        }
        
        d_j_error( form_error( 'email_address' ) );
    }
}
