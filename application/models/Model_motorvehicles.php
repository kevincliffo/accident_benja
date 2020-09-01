<?php
class Model_Motorvehicles extends CI_Model {
    function addtodatabase($data)
    {
        $this->db->query("SET sql_mode = '' ");
        $insert = $this->db->insert('motorvehicles', $data);
        return $insert;
    }  
    
    public function getallmotorvehicles()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('Id', 'ASC');
        $query = $this->db->get('motorvehicles');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function getmotorvehiclesoveruuid($uuid)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('AccidentUUID', $uuid);

        $query = $this->db->get('motorvehicles');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }     
    
    public function getmotorvehicledetailsoverid($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Id', $id);

        $query = $this->db->get('motorvehicles');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }   
}