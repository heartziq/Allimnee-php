<?php

require getcwd().'/application/controllers/mainController.php';

    class Profile extends Main_Controller{
    
    //index
        public function __construct(){
            
            parent::__construct();
            
            $this->load->model('profile_model');
            $this->load->model('form_validation');
            $this->load->helper(array('form', 'url'));
            
            //unsure what this library provides
            $this->load->helper('url');
        }
        
        //create profile
        
        private function checkIfBioExist($user_id){
        
            $usr_profile = $this->profile_model->loadProfile($user_id);
            
            if (empty($usr_profile)){
            
                return FALSE;
                
            } else {
            
                return $usr_profile;
            }
        }
        
        private function checkUserPermision($user_id){
        
            $permission_granted = FALSE;
            
            //set session on user_id
            if ($this->userData['user_id'] == $user_id){
            
                $permission_granted = TRUE;
            }
            
            return $permission_granted;
        }
        
        public function createProfile($user_id){
        
            if ($this->isLogged()){
            
                if ($this->checkUserPermission($user_id)){
                
                    /**
                        1)Full NAme
                        2)Image
                        3)gender
                        4)age
                        5)contact
                    **/
                    $this->form_validation->set_rules('fname', 'Full Name', 'required');
                    $this->form_validation->set_rules('age', 'Age', 'required|is_natural');
                    $this->form_validation->set_rules('contact', 'Contact', 'required|is_natural|max_length[8]|min_length[8]');
                    
                    if ($this->form_validation->run() == FALSE){
                    
                        $this->base_view("profile/form");
                        
                    } else {
                    
                        $this->profile_model->doCreateProfile();
                        
                        $data['msg'] = "Profile Succesfully created";
                        $data['time'] = "1";
                        $data['url'] = "home";
                        
                        $this->base_view("refresh", $data);
                    }
                    
                } else {
                    
                    //unauthorised to make changes
                    $this->viewProfile($user_id);
                }
                
            } else {
            
                $data['msg'] = "You are not logged on. Kindly login";
                $data['time'] = "1";
                $data['url'] = "credential";
                
                $this->base_view("refresh", $data);
            }
        }
    
    //viewProfile
    
        public function viewProfile($user_id){
        
            if ($this->isLogged()){
            
                /**
                        1)Full NAme
                        2)Image
                        3)gender
                        4)age
                        5)contact
                **/
            
                $data['fname'] = $this->getFullName($user_id);
                $data['gender'] = $this->getAge($user_id);
                $data['contact'] = $this->getContact($user_id);
                $data['job'] = $this->getJobOffered($user_id);
                
            } else {
            
                $data['msg'] = "You have not logged in yet! Kindly do so before proceeding";
                $data['time'] = "2";
                $data['url'] = "credential";
                
                $this->base_view("refresh", $data);
            }
        }
        
        public function editProfile(){
        
            
        }
        
    
    //...
    
    }
?>