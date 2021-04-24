<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Model 
{
    function show()
    {
        $query = "SELECT * FROM users";
        return $this->db->query($query)->result_array();
    }
}

