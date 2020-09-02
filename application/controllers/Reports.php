<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

	public function index()
	{
        $this->load->model('model_reports');
        $data['reports'] = $this->model_reports->getallreports();
        $data['title'] = 'Report Reporting System | Reports';

        $this->load->view('includes/header', $data);
        $this->load->view('view_reports', $data);
        $this->load->view('includes/footer', $data);
    }

    function viewdetails($id)
    {
        $this->load->model('model_reports');
        $this->load->model('model_motorvehicles');

        $data['report'] = $this->model_reports->getreportdetailsoverid($id);
        $data['images'] = $this->model_reports->getimagesoveruuid($data['report'][0]['UUID']);
        $data['motorvehicles'] = $this->model_motorvehicles->getmotorvehiclesoveruuid($data['report'][0]['UUID']);
        //print_r($data['images']);die();
        $data['title'] = 'Report Reporting System | Reports - ' .$id;

        $this->load->view('includes/header', $data);
        $this->load->view('view_single_report', $data);
        $this->load->view('includes/footer', $data);
    }

    function addreport()
    {
        $this->load->model('model_reports');
        $data['counties'] = $this->model_reports->getallcounties();
        $data['title'] = 'Report Reporting System | Report Report';

        $this->load->view('includes/header', $data);
        $this->load->view('view_report_report', $data);
        $this->load->view('includes/footer', $data);
    }

    function monthly()
    {
        $this->load->model('model_reports');
        $data['counties'] = $this->model_reports->getallcounties();
        $data['title'] = 'Report Reporting System | Monthly Report';

        $this->load->view('includes/header', $data);
        $this->load->view('view_report', $data);
        $this->load->view('includes/footer', $data);
    }

    function uuid(){
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    function addreporttodb()
    {
        $this->load->model('model_reports');
        $this->load->model('model_motorvehicles');
        $message = 'Report Report Added Successfully';
        $county = $this->input->post('county');
        $subCounty = $this->input->post('subCounty');
        $location = $this->input->post('location');
        $reportType = $this->input->post('reportType');
        $details = $this->input->post('details');
        $reporter = $this->session->userdata('Email');

        $uuid = $this->uuid();

        $data = array(
            'County'   => $county,
            'SubCounty'   => $subCounty,
            'Location'   => $location,
            'ReportType'   => $reportType,
            'ReportedBy'   => $reporter,
            'Details'  => $details,
            'UUID' => $uuid
        );

        $ret = $this->model_reports->addtodatabase($data);

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
                        'ReportUUID' => $uuid,
                        'Name' => $filename,
                        'Path' => 'uploads/'.$filename
                    );

                    $ret = $this->model_reports->addimagetodatabase($image_data);

                }
                else{
                    $message =+ $this->upload->display_errors();
                }
            }
    
        }

        $mvs = $this->input->post('motorvehicletypes');
        $cls = $this->input->post('colours');
        $nps = $this->input->post('numberplates');

        $motorvehicles = explode(",", $mvs);
        $colours = explode(",", $cls);
        $numberplates = explode(",", $nps);

        $index = 0;

        // print_r($motorvehicles);
        // die();
        while(true){
            // print_r("colours count : ".count($colours));
            if($index >= count($colours))
            {
                break;
            }

            try{
                // print_r("index : ".$index);
                $motorvehicle = $motorvehicles[$index];
                $colour = $colours[$index];
                $numberplate = $numberplates[$index];

                $data = array(
                    "ReportUUID" => $uuid,
                    "MotorVehicleType" => $motorvehicle,
                    "NumberPlate" => $numberplate,
                    "Color" =>$colour
                );
                $ret = $this->model_motorvehicles->addtodatabase($data);
            }
            catch(Exception $e){
                break;
            }
            $index = $index + 1;
        }

        $this->session->set_flashdata('message_no', 1);
        $this->session->set_flashdata('message', $message);
        redirect('reports/addreport', 'refresh');
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
