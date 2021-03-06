<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		$this->load->view('view_login');
    }
    
    function dashboard()
    {
        if($this->session->userdata('IsLoggedIn'))
        {        
            $data['title'] = 'Accident Reporting System';
            $data['accidentSummary'] = $this->getAccidentsSummary();
            $data['faviconpartpath'] = base_url().'img/favicon.png';

            $this->load->view('includes/header', $data);
            $this->load->view('view_dashboard', $data);
            $this->load->view('includes/footer', $data);
        }        
        else
        {
            redirect('main', 'refresh');
        }        

    }

    function getAccidentsSummary()
    {
        $this->load->model('model_accidents');

        $accidentSummary = $this->model_accidents->getAccidentsSummary();
        return $accidentSummary;
    }

    function adduser()
    {
        if($this->session->userdata('IsLoggedIn'))
        {
            $this->load->model('model_users');
            $data['title'] = 'Users';
            $data['randompassword'] = $this->generaterandomPassword();
            $data['faviconpartpath'] = base_url().'img/favicon.png';

            $this->load->view('includes/header', $data);
            $this->load->view('view_add_user', $data);
            $this->load->view('includes/footer', $data);
        }        
        else
        {
            redirect('main', 'refresh');
        }              
    }

    function addaccident()
    {
        if($this->session->userdata('IsLoggedIn'))
        {
            $this->load->model('model_users');
            $data['counties'] = $this->model_users->getallcounties();
            $data['faviconpartpath'] = base_url().'img/favicon.png';
            $data['title'] = 'Users';

            $this->load->view('includes/header', $data);
            $this->load->view('view_report_accident', $data);
            $this->load->view('includes/footer', $data);
        }        
        else
        {
            redirect('main', 'refresh');
        }          
    }

    function addusertodb()
    {
        $this->load->model('model_users');

        $firstname = $this->input->post('firstName');
        $lastname = $this->input->post('lastName');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobileNumber');
        $password = $this->input->post('password');

        $data = array(
            'FirstName'   => $firstname,
            'LastName'   => $lastname,
            'Email'   => $email,
            'MobileNo'   => $mobile,
            'Password'   => md5($password),
            'UserType' => 'User'
        );

        $res = $this->model_users->registerUser($data);

        if($res)
        {
            $this->session->set_flashdata('messageType', 0);
            $this->session->set_flashdata('message', 'User added Successfully!');
            $this->session->set_flashdata('hasMessage', 1);            
            redirect('main/allusers');
        }
        else{
            $this->session->set_flashdata('messageType', 1);
            $this->session->set_flashdata('message', 'Error adding user!');
            $this->session->set_flashdata('hasMessage', 1);            
            redirect('main/adduser', 'refresh');
        }
    }    

    function allusers()
    {
        if($this->session->userdata('IsLoggedIn'))
        {
            $this->load->model('model_users');
            $data['users'] = $this->model_users->getallusers();
            $data['faviconpartpath'] = base_url().'img/favicon.png';
            $data['title'] = 'Users';

            $this->load->view('includes/header', $data);
            $this->load->view('view_users', $data);
            $this->load->view('includes/footer', $data);
        }        
        else
        {
            redirect('main', 'refresh');
        }            
    }    

    function loginuser()
    {
        $this->load->model('model_users');

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $userType = $this->input->post('userType');

        $data = array(
            'Email'   => $email,
            'Password'   => $password,
            'UserType' => $userType
        );

        $res = $this->model_users->validate($data);
        if($res['UserFound'])
        {
            $data = array(
                'Email' => $email,
                'UserId' => $res['UserId'],
                'IsLoggedIn' => $res['UserFound'],
                'UserType' => $res['UserType'],
                'FirstName' => $res['FirstName'],
                'LastName' => $res['LastName']
            );
            $this->session->set_userdata($data);

            $this->session->set_flashdata('messageType', 0);
            $this->session->set_flashdata('message', 'Welcome to your Dashboard!');
            $this->session->set_flashdata('hasMessage', 1);
            redirect('main/dashboard', 'refresh');
        }
        else{
            $this->session->set_flashdata('messageType', 1);
            $this->session->set_flashdata('message', 'Wrong Login Details!');
            $this->session->set_flashdata('hasMessage', 1);            
            redirect('main', 'refresh');
        }
    }

    function logout()
    {
        $sess_array = array(
            'Email' => '',
            'UserId' => '',
            'IsLoggedIn' => FALSE,
            'UserType' => '',
            'FirstName' => '',
            'LastName' => '');
                     
        $this->session->set_userdata($sess_array);
        $this->session->sess_destroy();
        $data['title'] = 'Login';
        $data['message'] = 'Successfully Logged Out';
        $data['faviconpartpath'] = base_url().'images/favicon.png';
        $data['loggedout'] = TRUE;
        
        redirect('main', 'refresh');
    }

    function generaterandomPassword() 
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    function forgotpassword()
    {
        $this->load->view('view-forgot-password');
    }

    function sendforgotpasswordemail()
    {

    }

    function register()
    {
		$this->load->view('view_signup');
    }

    function registeruser()
    {
        $this->load->model('model_users');

        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');
        $repeatPassword = $this->input->post('repeatPassword');

        $data = array(
            'FirstName'   => $firstname,
            'LastName'   => $lastname,
            'Email'   => $email,
            'MobileNo'   => $mobile,
            'Password'   => md5($password),
            'UserType' => 'User'
        );

        $res = $this->model_users->registerUser($data);

        if($res)
        {
            $this->session->set_flashdata('messageType', 0);
            $this->session->set_flashdata('message', 'Registration Successfull!');
            $this->session->set_flashdata('hasMessage', 1);            
            redirect('main');
        }
        else{
            $this->session->set_flashdata('messageType', 1);
            $this->session->set_flashdata('message', 'Registration Failed!');
            $this->session->set_flashdata('hasMessage', 1);            
            redirect('main/register', 'refresh');
        }
    }

	public function getAccidentsForCurrentYearPerMonth()
	{
        $this->load->model('model_accidents');
        $companyName = $this->input->post('CompanyName');
        $year = date('Y');
		$customer = $this->model_accidents->getAccidentsForCurrentYearPerMonth($year);
		echo json_encode($customer);
    }    
}
