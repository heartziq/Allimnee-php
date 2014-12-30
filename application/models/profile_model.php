<?php
    
    class Profile_Model extends CI_Model{
    
        public function __construct(){
        
            parent::__construct();
            $this->load->database();
            
        }
        
        public function loadProfile($user_id){
        
            $profile=array(
                    'user_id'=>$user_id,
                );
                
            return $this->db->get_where('bio', $profile)->row_array();
        }
        
        public function editProfile($user_id, $image=FALSE, $img_src=""){
        
            if ($image == FALSE){
            
            //contact, img_src, company, year_grad, interest, user_id
                $data = array(
                   'contact' => $this->input->post('contact') ,
                   'img_src' => $img_src ,
                   'company' => $this->input->post('company') ,
                   'year_grad' => $this->input->post('yog') ,
                   'interest' => $this->input->post('interest') ,
                   'user_id' => $user_id
                );

                return $this->db->insert('bio', $data); 
   
            } else {
            
                //contact, img_src, company, year_grad, interest, user_id
                    $data = array(
                       'contact' => $this->input->post('contact') ,
                       'img_src' => $this->input->post('img') ,
                       'company' => $this->input->post('company') ,
                       'year_grad' => $this->input->post('yog') ,
                       'interest' => $this->input->post('interest') ,
                       'user_id' => $user_id
                    );

                    return $this->db->insert('bio', $data); 
            }

        }
        
        public function getEmailAddress($user_id){
        
            $this->db->select('email')->from('user')->where('user_id', $user_id);

            $array_result = $this->db->get()->row_array();
            
            return $array_result['email'];            
        }
        
        public function getUsername($user_id){
        
            $this->db->select('username')->from('user')->where('user_id', $user_id);

            $array_result = $this->db->get()->row_array();
            
            return $array_result['username'];          
        }
        
        private function getPrevImg($user_id){
        
            $this->db->select('img_src')->from('bio')->where('user_id', $user_id);

            $array_result = $this->db->get()->row_array();
            
            return $array_result['img_src'];
        }
        
        private function getBioId($user_id){
        
            $this->db->select('bio_id')->from('bio')->where('user_id', $user_id);

            $array_result = $this->db->get()->row_array();
            
            return $array_result['bio_id'];            
        }
        
        public function updateProfile($user_id, $image=FALSE, $img_src = ""){
        
            //get the bio_id
            $bio_id = $this->getBioId($user_id);
            
            if ($image == FALSE){
            //get previous img!
            $img_src = $this->getPrevImg($user_id);
            
            //contact, img_src, company, year_grad, interest, user_id
                $data = array(
                   'contact' => $this->input->post('contact') ,
                   'img_src' => $img_src ,
                   'company' => $this->input->post('company') ,
                   'year_grad' => $this->input->post('yog') ,
                   'interest' => $this->input->post('interest') ,
                   'user_id' => $user_id
                );

                $this->db->where('bio_id', $bio_id);
                $this->db->update('bio', $data); 
   
            } else {
            
            //contact, img_src, company, year_grad, interest, user_id
                $data = array(
                   'contact' => $this->input->post('contact') ,
                   'img_src' => $img_src , 
                   'company' => $this->input->post('company') ,
                   'year_grad' => $this->input->post('yog') ,
                   'interest' => $this->input->post('interest') ,
                   'user_id' => $user_id
                );

                $this->db->where('bio_id', $bio_id);
                $this->db->update('bio', $data);  
            }

        }    
        
    }
    
?>
