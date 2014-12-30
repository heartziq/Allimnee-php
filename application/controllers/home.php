<?php

require getcwd().'/application/controllers/mainController.php';

    class Home extends Main_Controller{
    
        public function __construct(){
        
            parent::__construct();
            $this->load->helper('url');
            //load necessary libraries
            $this->load->model('credential_model'); //load the model DB 'credential_model'
            $this->load->library('form_validation');
            //$this->form_validation->set_error_delimeters('<div class="error">', '</div>');
            $this->load->helper('url');
        }
        
        public function index(){
        
            $data['username'] = $this->userData;
            //$data['role'] = $this->userData;
            $this->load->view("template/header", $data);
            $this->load->view("template/footer", $data);
        }
        
        
    }
