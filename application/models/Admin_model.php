<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Model
 *
 * @author Shahzaib
 */
class Admin_model extends MY_Model {
    /**
     * Class Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'admin';
    }
}
