<?php

    class Forum extends CI_Controller{
    
        public function __construct(){
            parent::__construct();
            //load libraries
        }
        
        public function postForum();
        
        public function replyForum($forum_id);
        
        public function publishForum($forum_id);
        
        public function rejectForum($forum_id);
        
        public function deleteForum($forum_id);
    }
