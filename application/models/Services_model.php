<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Services Model
 *
 * @author Shahzaib
 */
class Services_model extends MY_Model {
    /**
     * Class Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'services';
    } 
}
