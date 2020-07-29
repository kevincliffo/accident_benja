<?php
class Model_Users extends CI_Model {
    function userExists($email){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);
        $query = $this->db->get('users');
        
        if($query->num_rows() > 0)
        {
            return true;
        }

        return false;
    }
    
    function updateusersubscriptionstatus($userid, $status){
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('UserId', $userid);
        $data = array('Subscribed' => $status);
        $result = $this->db->update('users', $data);

        return $result;
    }

    function updatelastlogin($email){
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('Africa/Nairobi'));        
        $timestamp = $now->format('Y-m-d H:i:s');

        $data = array('LastLogin' => $timestamp);
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);
        $this->db->update('users', $data);
        
        $array = array('Email' => $email, 'LastLogin' => $timestamp);
        $this->db->set($array);
        $this->db->insert('logins');        
    }

    function deleteuser($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('UserId', $id);

        $this->db->delete('users');
    }

    function validate($data)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $data['Email']);
        //$this->db->where('UserType', $data['Email']);
        $this->db->where('Password', md5($data['Password']));

        $query = $this->db->get('users');

        if($query->num_rows() == 1)
        {
            $user = $this->getuserdataoveremail($data['Email']);
            //print_r($user); die();
            $ret = array(
                'UserId' => $user[0]['UserId'],
                'FirstName' => $user[0]['FirstName'],
                'LastName' => $user[0]['LastName'],
                'UserFound' => true,
                'UserType' => $user[0]['UserType'],
                'Email' => $user[0]['Email']
            );
            return $ret;
        }

        $ret = array(
            'UserId' => '',
            'FirstName' => '',
            'LastName' => '',
            'UserFound' => false,
            'UserType' => '',
            'Email' => '');

        return $ret;
    }

    function getuserscount()
    { 
        $this->db->query("SET sql_mode = '' ");
        $sql = 'SELECT COUNT(*) AS US_Count FROM users';
        $result = $this->db->query($sql);

        if($result->num_rows() > 0)
        {
            $count = (int)$result->result()[0]->US_Count ;
        }
        else
        {
            $count = 0;
        }

        return $count;
    }      
    
    function registerUser($userdata)
    {
        $this->db->query("SET sql_mode = '' ");
        $insert = $this->db->insert('users', $userdata);
        return $insert;
    }
    
    public function getuserdataoverid($id)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('UserId', $id);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getuserdataoveremail($email)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('Email', $email);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    } 

    public function getallusers()
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('*'); 
        $this->db->order_by('UserId', 'ASC');
        $query = $this->db->get('users');
        
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return array();
        }
    }
}