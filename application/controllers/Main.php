<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		$this->load->view('view_login');
    }
    
    function dashboard()
    {
        $data['title'] = 'Accident Reporting System';

        $this->load->view('includes/header', $data);
        $this->load->view('view_dashboard', $data);
        $this->load->view('includes/footer', $data);
    }

    function adduser()
    {
        $this->load->model('model_users');
        $data['title'] = 'Users';
        $data['randompassword'] = $this->generaterandomPassword();

        $this->load->view('includes/header', $data);
        $this->load->view('view_add_user', $data);
        $this->load->view('includes/footer', $data);
    }

    function addaccident()
    {
        $this->load->model('model_users');
        $data['counties'] = $this->model_users->getallcounties();
        $data['title'] = 'Users';

        $this->load->view('includes/header', $data);
        $this->load->view('view_report_accident', $data);
        $this->load->view('includes/footer', $data);
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
            redirect('main/allusers');
        }
        else{
            redirect('main/adduser', 'refresh');
        }
    }    

    function allusers()
    {
        $this->load->model('model_users');
        $data['users'] = $this->model_users->getallusers();
        $data['title'] = 'Users';

        $this->load->view('includes/header', $data);
        $this->load->view('view_users', $data);
        $this->load->view('includes/footer', $data);
    }    

    function loginuser()
    {
        $this->load->model('model_users');

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $rememberme = $this->input->post('rememberme');

        $data = array(
            'Email'   => $email,
            'Password'   => $password
        );

        $res = $this->model_users->validate($data);
        if($res)
        {
            $this->dashboard();
        }
        else{
            redirect('main', 'refresh');
        }
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
            redirect('main');
        }
        else{
            redirect('main/register', 'refresh');
        }
    }
}
