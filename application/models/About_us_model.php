<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * About Us Model
 *
 * @author Shahzaib
 */
class About_us_model extends MY_Model {
    /**
     * Class Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'about_us';
    }
}
