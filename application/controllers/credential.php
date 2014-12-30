<?php

require getcwd().'/application/controllers/mainController.php';

    class Credential extends Main_Controller{
    
        public function __construct(){
        
            parent::__construct();
            
            //load necessary libraries
            $this->load->model('credential_model'); //load the model DB 'credential_model'
            $this->load->model('profile_model');
            $this->load->library('form_validation');
            //$this->form_validation->set_error_delimeters('<div class="error">', '</div>');
            $this->load->helper('url');
        }
        
        
        //index
        public function index(){
            
            $data['username'] = $this->userData;
            $this->base_view("template/header", $data);

        }
        
        private function isProfileExist($user){
        
            $data['user'] = $this->profile_model->checkProfile($user);
            
            if (! empty($data['user'])){
            
                return TRUE;
            }
            
            return FALSE;
        }
        

        //register
        public function register(){
            
            //set form validation rules
            $this->form_validation->set_rules('email', 'Invalid Email Address', 'required|valid_email');
            $this->form_validation->set_rules('pass', 'Password', 'required|matches[cPass]');
            $this->form_validation->set_rules('cPass', 'Confirm Password', 'required');
            
            //check validation
            if ($this->form_validation->run() == FALSE){

                //$this->load->view("credential/form");
                $this->base_view("credential/form");
            
            } else {
            
                $this->credential_model->doRegister();//assumption made here
                $data['msg'] = "Registration Successful!\nPlease proceed to complete\nyour profile";
                $data['time'] = "2";
                $data['url'] = "profile";//controller
                //$this->load->view('credential/confirm', $data);
                $this->base_view("refresh", $data);
                //redirect('home', 'refresh');
            }
        }
        
        //login
        public function login(){
            
                $data['user'] = $this->credential_model->checkLogin();
                
                
                if (! empty($data['user'])){
                
                    $newdata = array(
                        'email'  => $data['user']['email_address'],
                        'role'     => $data['user']['role_id'], //get role column
                        'logged_in' => TRUE,
                        //'user_id' => $data['user']['user_id']
                    );
                    
                    //set the session
                    $this->session->set_userdata($newdata);
                    
                    $user = $this->session->userdata('email');
                    
                    //check if userExist
                    if (! isProfileExist($user)){
                    
                        $message = 'You have not complete your profile\nPlease do so now';
                        $url = 'profile';
                        
                        $data['msg'] = $message;
                        $data['time'] = '2';
                        $data['url'] = $url;
                        
                    } else {
                        
                        $message = 'Login Success. You may proceed';
                        $url = 'home';
                        
                        $data['msg'] = $message;
                        $data['time'] = '2';
                        $data['url'] = $url
                    }

                    $this->base_view('refresh', $data);
                    
                } else {
                
                    $data['msg'] = "Login Failed!";
                    $data['time'] = "2";
                    $data['url'] = "credential";
                    $this->base_view('refresh', $data);
                }
        }
        
        //logout
        public function logout(){
            
            //destroying session data
            $this->session->sess_destroy();
            
            //setting message...
            $data['msg'] = "You have successfully logged out";
            $data['time'] = "2";
            $data['url'] = "home";
            $this->base_view('refresh', $data);
        }
    
    }
?>