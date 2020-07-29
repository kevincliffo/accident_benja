<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accidents extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

	public function index()
	{
        $this->load->model('model_accidents');
        $data['accidents'] = $this->model_accidents->getallaccidents();
        $data['title'] = 'Accident Reporting System | Accidents';

        $this->load->view('includes/header', $data);
        $this->load->view('view_accidents', $data);
        $this->load->view('includes/footer', $data);
    }

    function addaccident()
    {
        $this->load->model('model_accidents');
        $data['counties'] = $this->model_accidents->getallcounties();
        $data['title'] = 'Accident Reporting System | Report Accident';

        $this->load->view('includes/header', $data);
        $this->load->view('view_report_accident', $data);
        $this->load->view('includes/footer', $data);
    }
    function uuid(){
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    function addaccidenttodb()
    {
        $this->load->model('model_accidents');
        $message = 'Accident Report Added Successfully';
        $county = $this->input->post('county');
        $subCounty = $this->input->post('subCounty');
        $location = $this->input->post('location');
        $accidentType = $this->input->post('accidentType');
        $reporter = $this->session->userdata('Email');

        $uuid = $this->uuid();

        $data = array(
            'County'   => $county,
            'SubCounty'   => $subCounty,
            'Location'   => $location,
            'AccidentType'   => $accidentType,
            'ReportedBy'   => $reporter,
            'UUID' => $uuid
        );

        $ret = $this->model_accidents->addtodatabase($data);

        $countfiles = count($_FILES['files']['name']);

        for($i=0;$i<$countfiles;$i++){
            if(!empty($_FILES['files']['name'][$i])){
                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                $config = array(
                    'upload_path' => 'uploads/',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,
                    'max_size' => "10048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    'max_height' => "2768",
                    'max_width' => "4024",
                    'file_name' => $_FILES['files']['name'][$i]
                );
                
                $this->upload->initialize($config);
                
                $this->load->library('upload',$config); 
        
                if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    
                    $data['filenames'][] = $filename;

                    $image_data = array(
                        'AccidentUUID' => $uuid,
                        'Name' => $filename,
                        'Path' => 'uploads/'.$filename
                    );

                    $ret = $this->model_accidents->addimagetodatabase($image_data);

                }
                else{
                    $message =+ $this->upload->display_errors();
                }
            }
    
        }
        $this->session->set_flashdata('message_no', 1);
        $this->session->set_flashdata('message', $message);
        redirect('accidents/addaccident', 'refresh');
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
}
