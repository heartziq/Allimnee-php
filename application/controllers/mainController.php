<?php

    class Main_Controller extends CI_Controller{
        
        //stores all important data pertaining to the user
        protected $userData;
        
        public function __construct(){
        
            parent::__construct();
            $this->load->library('session');
            $this->userData = $this->session->all_userdata();
        }
        
        protected function base_view($string="", $data=array()){
        
            $this->load->view("template/header", $data);
            $this->load->view($string, $data);
            $this->load->view("template/footer", $data);
        }
        
        //Determine whether or not the user has logged in.
        //return TRUE if he is logged in
        protected function isLogged(){
        
            if (! empty($this->userData['email'])){
                
                return TRUE;
            } else {
                return FALSE;
            }
        }
        
        protected function isAdmin(){
        
            if ($this->userData['role'] == 1){
                
                return TRUE;
            } else {
                
                return FALSE;
            }
        }
        
        
        /** protected function uploadPhoto($view, $url="article/submit") {
        
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|pjpg|jpg|png';
            $config['max_size'] = '30000';
            $config['overwrite'] = TRUE;
            //$config['max_width'] = '30000';
            //$config['max_height'] = '30000';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("image")) {
            
                $data = array('upload_data' => $this->upload->data());
                
                $data['msg'] = "Upload Successful!";
                $data['time'] = "2";
                $data['url'] = $url;

                //$data['img_src'] = $data['upload_data']['file_name'];
                $img_src=$data['upload_data']['file_name'];
                $data['img_src'] = $img_src;
                
                $this->base_view($view, $data);
                
                return $img_src;
                
            } else {
                //output error
                $error = array('error' => $this->upload->display_errors());
                $data['msg'] = $error['error'];
                $data['time'] = "3";
                $data['url'] = "article/submit";
                
                $this->base_view($view, $data);
                return false;
            }
        }
        
        **/
            
    }
