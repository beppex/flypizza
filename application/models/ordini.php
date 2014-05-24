<?php

class Ordini extends CI_Model
{
    private $table = "ordini";
    
    function getAll($limit = 0, $offset = 0)
    {
        $query = $this->db->get($table, $limit, $offset);
        
        return $query->result();
    }
    
    function insert()
    {
        
    }
}