<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_example extends CI_Model 
{
    public function all_example()
    {
        $query = $this->db->query("SELECT * FROM tbl_exapmle ORDER BY id ASC");
        return $query->result_array();
    }
}