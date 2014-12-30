<?php
    
    class Event_Model extends CI_Model{
    
        public function __construct(){
        
            parent::__construct();
        }
        
        public function getEventCreator($event_id){
            
    /*
        SELECT event.event_id, user.user_id FROM event, user
WHERE user.user_id = event.user_id
AND event.event_id = $event_id
        */
            $this->db->select('events.user_id, user.user_id');
            $this->db->from('events');
            $this->db->join('user', 'user.user_id = events.user_id');
            //$this->db->join('bio', 'bio.user_id = user.user_id');
            
            $this->db->where('events.event_id', $event_id);
            $query = $this->db->get();

            return $query->result_array();//ret array of arrays
        }
        
        public function getAllEvents($event_id){
        
            $query=$this->db->get_where('events', array('approve_status' => 1));
            /*query="select * from news"*/
            return $query->result_array();//ret array of arrays
        }
        
        public function addEvent($user_id, $image=FALSE, $img_src=""){
        
            if ($image == FALSE){
            
            //contact, img_src, company, year_grad, interest, user_id
                $data = array(
                   'title' => $this->input->post('title') ,
                   'img_src' => $img_src ,
                   'description' => $this->input->post('description') ,
                   'start_date' => $this->input->post('start_date') ,
                   'end_date' => $this->input->post('end_date') ,
                   'venue' => $this->input->post('venue') ,
                   'user_id' => $user_id
                );

                return $this->db->insert('events', $data);
   
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
        
        public function updateEvent($user_id, $image=FALSE, $img_src=""){
            
            
        }
    }
