<?php
class Model_Reports extends CI_Model {
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
        $insert = $this->db->insert('reports', $data);
        return $insert;
    }

    function addimagetodatabase($data)
    {
        $this->db->query("SET sql_mode = '' ");
        $insert = $this->db->insert('images', $data);
        return $insert;
    }    
    
    public function getallreports()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('Id', 'ASC');
        $query = $this->db->get('reports');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    public function getreportdetailsoverid($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Id', $id);

        $query = $this->db->get('reports');

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
        $this->db->where('ReportUUID', $uuid);

        $query = $this->db->get('images');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    public function getReportsSummary()
    {
        $sqlCar = "SELECT COUNT(Id) AS Count_ID FROM reports WHERE ReportType LIKE '%Car%'";
        $query = $this->db->query($sqlCar);
        $cars = $query->result_array()[0]['Count_ID'];

        $sqlMotorBike = "SELECT COUNT(Id) AS Count_ID FROM reports WHERE ReportType LIKE '%Motorbike%'";
        $query = $this->db->query($sqlMotorBike);
        $motorbikes = $query->result_array()[0]['Count_ID'];
        
        $sqlBicycle = "SELECT COUNT(Id) AS Count_ID FROM reports WHERE ReportType LIKE '%Bicycle%'";
        $query = $this->db->query($sqlBicycle);
        $bicycles = $query->result_array()[0]['Count_ID'];
        
        $sqlBus = "SELECT COUNT(Id) AS Count_ID FROM reports WHERE ReportType LIKE '%Bus%'";
        $query = $this->db->query($sqlBus);
        $buses = $query->result_array()[0]['Count_ID'];
        
        $sqlTruck = "SELECT COUNT(Id) AS Count_ID FROM reports WHERE ReportType LIKE '%Truck%'";
        $query = $this->db->query($sqlTruck);
        $trucks = $query->result_array()[0]['Count_ID'];
        
        $sqlCart = "SELECT COUNT(Id) AS Count_ID FROM reports WHERE ReportType LIKE '%Cart%'";
        $query = $this->db->query($sqlCart);
        $carts = $query->result_array()[0]['Count_ID'];
        
        $sqlPerson = "SELECT COUNT(Id) AS Count_ID FROM reports WHERE ReportType LIKE '%Person%'";
        $query = $this->db->query($sqlPerson);
        $persons = $query->result_array()[0]['Count_ID'];
        
        $sqlTuktuk = "SELECT COUNT(Id) AS Count_ID FROM reports WHERE ReportType LIKE '%Tuktuk%'";
        $query = $this->db->query($sqlTuktuk);
        $tuktuks = $query->result_array()[0]['Count_ID'];
        

        $reportSummary = array(
            'Cars' => $cars,
            'Motorbikes' => $motorbikes,
            'Bicycles' => $bicycles,
            'Buses' => $buses,
            'Trucks' => $trucks,
            'Carts' => $carts,
            'Persons' => $persons,
            'Tuktuks' => $tuktuks,
        );

        return $reportSummary;
    }

    public function getReportsForCurrentYearPerMonth($year)
    {
        $stringYear = strval($year);
        $stringMonth = '';
        $stringYearMonth = '';
        $monthValue = 1;
        $reportValues = array();

        for ($monthIndex = 0; $monthIndex <= 12; $monthIndex++) {
            $stringMonth = strval($monthValue);

            if((strlen($stringMonth) == 1))
            {
                $stringMonth = "0".$monthValue;
            }
            $stringYearMonth = $stringYear."-".$stringMonth;
            $sql = "SELECT COUNT(Id) AS Count_ID FROM reports WHERE ReportDate LIKE '%".$stringYearMonth."%'";
            $query = $this->db->query($sql);
            $value = $query->result_array()[0]['Count_ID'];

            $reportValues[$monthIndex] = $value;
            $monthValue = $monthValue + 1;
        }

        return array(
            'Jan' =>$reportValues[0],
            'Feb' =>$reportValues[1],
            'Mar' =>$reportValues[2],
            'Apr' =>$reportValues[3],
            'May' =>$reportValues[4],
            'Jun' =>$reportValues[5],
            'Jul' =>$reportValues[6],
            'Aug' =>$reportValues[7],
            'Sep' =>$reportValues[8],
            'Oct' =>$reportValues[9],
            'Nov' =>$reportValues[10],
            'Dec' =>$reportValues[11],
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