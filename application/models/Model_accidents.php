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
        $stringYear = strval($year);
        $stringMonth = '';
        $stringYearMonth = '';
        $monthValue = 1;
        $accidentValues = array();

        for ($monthIndex = 0; $monthIndex <= 12; $monthIndex++) {
            $stringMonth = strval($monthValue);

            if((strlen($stringMonth) == 1))
            {
                $stringMonth = "0".$monthValue;
            }
            $stringYearMonth = $stringYear."-".$stringMonth;
            $sql = "SELECT COUNT(Id) AS Count_ID FROM accidents WHERE AccidentDate LIKE '%".$stringYearMonth."%'";
            $query = $this->db->query($sql);
            $value = $query->result_array()[0]['Count_ID'];

            $accidentValues[$monthIndex] = $value;
            $monthValue = $monthValue + 1;
        }

        return array(
            'Jan' =>$accidentValues[0],
            'Feb' =>$accidentValues[1],
            'Mar' =>$accidentValues[2],
            'Apr' =>$accidentValues[3],
            'May' =>$accidentValues[4],
            'Jun' =>$accidentValues[5],
            'Jul' =>$accidentValues[6],
            'Aug' =>$accidentValues[7],
            'Sep' =>$accidentValues[8],
            'Oct' =>$accidentValues[9],
            'Nov' =>$accidentValues[10],
            'Dec' =>$accidentValues[11],
        );        

        // return array(
        //     'Jan' =>400,
        //     'Feb' =>1400,
        //     'Mar' =>1100,
        //     'Apr' =>50,
        //     'May' =>700,
        //     'Jun' =>100,
        //     'Jul' =>1400,
        //     'Aug' =>1000,
        //     'Sep' =>70,
        //     'Oct' =>1300,
        //     'Nov' =>10,
        //     'Dec' =>1,
        // );
    }
}