<?php
class Model_Accidents extends CI_Model {
    public function getallcounties()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('Id', 'ASC');
        $query = $this->db->get('counties');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function addtodatabase($data)
    {
        $this->db->query("SET sql_mode = '' ");
        $insert = $this->db->insert('accidents', $data);
        return $insert;
    }

    function addimagetodatabase($data)
    {
        $this->db->query("SET sql_mode = '' ");
        $insert = $this->db->insert('images', $data);
        return $insert;
    }    
    
    public function getallaccidents()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('Id', 'ASC');
        $query = $this->db->get('accidents');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }    
}