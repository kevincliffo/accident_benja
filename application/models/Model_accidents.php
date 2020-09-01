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
    
    public function getaccidentdetailsoverid($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Id', $id);

        $query = $this->db->get('accidents');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    public function getimagesoveruuid($uuid)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('AccidentUUID', $uuid);

        $query = $this->db->get('images');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    public function getAccidentsSummary()
    {
        $sqlCar = "SELECT COUNT(Id) AS Count_ID FROM accidents WHERE AccidentType LIKE '%Car%'";
        $query = $this->db->query($sqlCar);
        $cars = $query->result_array()[0]['Count_ID'];

        $sqlMotorBike = "SELECT COUNT(Id) AS Count_ID FROM accidents WHERE AccidentType LIKE '%Motorbike%'";
        $query = $this->db->query($sqlMotorBike);
        $motorbikes = $query->result_array()[0]['Count_ID'];
        
        $sqlBicycle = "SELECT COUNT(Id) AS Count_ID FROM accidents WHERE AccidentType LIKE '%Bicycle%'";
        $query = $this->db->query($sqlBicycle);
        $bicycles = $query->result_array()[0]['Count_ID'];
        
        $sqlBus = "SELECT COUNT(Id) AS Count_ID FROM accidents WHERE AccidentType LIKE '%Bus%'";
        $query = $this->db->query($sqlBus);
        $buses = $query->result_array()[0]['Count_ID'];
        
        $sqlTruck = "SELECT COUNT(Id) AS Count_ID FROM accidents WHERE AccidentType LIKE '%Truck%'";
        $query = $this->db->query($sqlTruck);
        $trucks = $query->result_array()[0]['Count_ID'];
        
        $sqlCart = "SELECT COUNT(Id) AS Count_ID FROM accidents WHERE AccidentType LIKE '%Cart%'";
        $query = $this->db->query($sqlCart);
        $carts = $query->result_array()[0]['Count_ID'];
        
        $sqlPerson = "SELECT COUNT(Id) AS Count_ID FROM accidents WHERE AccidentType LIKE '%Person%'";
        $query = $this->db->query($sqlPerson);
        $persons = $query->result_array()[0]['Count_ID'];
        
        $sqlTuktuk = "SELECT COUNT(Id) AS Count_ID FROM accidents WHERE AccidentType LIKE '%Tuktuk%'";
        $query = $this->db->query($sqlTuktuk);
        $tuktuks = $query->result_array()[0]['Count_ID'];
        

        $accidentSummary = array(
            'Cars' => $cars,
            'Motorbikes' => $motorbikes,
            'Bicycles' => $bicycles,
            'Buses' => $buses,
            'Trucks' => $trucks,
            'Carts' => $carts,
            'Persons' => $persons,
            'Tuktuks' => $tuktuks,
        );

        return $accidentSummary;
    }

    public function getAccidentsForCurrentYearPerMonth($year)
    {
        return array(
            'Jan' =>100,
            'Feb' =>1400,
            'Mar' =>1100,
            'Apr' =>50,
            'May' =>700,
            'Jun' =>100,
            'Jul' =>0,
            'Aug' =>1000,
            'Sep' =>70,
            'Oct' =>1000,
            'Nov' =>10,
            'Dec' =>1,
        );
    }
}