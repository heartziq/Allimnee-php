<?php
    
    class Credential_Model extends CI_Model{
    
        public function __construct(){
        
            parent::__construct();
            
            //load necessary libraries
            $this->load->database();
            $this->load->helper('form');
            
        }
        
        public function doRegister(){
        
            //create an array containing all the post variables
            //call $this->db->insert(tableName, array);
            $user=array(
                'email_address'=>$this->input->post('email'),
                'password'=>md5($this->input->post('pass')),
                
            );
            
            return $this->db->insert('user', $user);
        }
        
        public function checkLogin(){
        
            //create an array containing all the post variables
            //call $this->db->get_where(tableName, array);
            
            //return result to Credential controller.
            $user=array(
                'password'=>md5($this->input->post('pass')),
                'email_address'=>$this->input->post('email'),

                );
                
             $query = $this->db->get_where('user', $user);
             return $query->row_array();
        }
        
    }
    
?>
