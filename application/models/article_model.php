<?php
    
    class Article_Model extends CI_Model{
    
        public function __construct(){
        
            parent::__construct();
            $this->load->database();
            //load necessary libraries
        }
        
        public function submit($image=FALSE, $img_src=""){
            //concatenate ALL tags into 1 whole string
            $tags=array();
            for ($i=1;$i<=4;$i++){
                
                //get them as ARRAY
                $tag_data = $this->input->post('tag'.$i);
                
                if ($tag_data != "")
                    array_push($tags, $tag_data);
            }
            
            $tagsImploded=implode(",", $tags);
            
            //get the respective category_id
            $category_name=array(
                    'name'=>$this->input->post('category'),
                );
                
            $this->db->select('category_id');
            $category=$this->db->get_where('category', $category_name)->row_array();
            $category_id=$category['category_id'];

            if ($image == FALSE){
            
                $article=array(
                        'title'=>$this->input->post('title'),
                        'content'=>$this->input->post('content'),
                        'date_published'=>date("Y-m-d"),
                        'no_of_views'=>0,
                        'no_of_comments'=>0,
                        'category_id'=>$category_id,
                        'tag'=>$tagsImploded,
                    );
                
                return $this->db->insert('article', $article);
   
            } else {
            
                //get the image src folder!
                $article=array(
                        'title'=>$this->input->post('title'),
                        'content'=>$this->input->post('content'),
                        'img_src'=>$img_src,
                        'date_published'=>date("Y-m-d"),
                        'no_of_views'=>0,
                        'no_of_comments'=>0,
                        'category_id'=>$category_id,
                        'tag'=>$tagsImploded,
                    );
                    
                return $this->db->insert('article', $article);
            }
        }
        
        
        public function getOneNews($id){
            
            $query=$this->db->get_where('article',array('article_id'=>$id));
            /*query="select * from news where slug='something'"*/
            
        
            return $query->row_array();//single array for that row i.e. 1 row
        }
        
        public function getAllNews(){
            
            $query=$this->db->get_where('article', array('approve_status' => 1));
            /*query="select * from news"*/
            return $query->result_array();//ret array of arrays
        }
        
        public function getComments($id){
            //select comments from article_comments where article_id = 1
            //return as array
            //get username
            //get usr_img_src
            //
            
            //$this->db->select('user.username, article_comment.comment, bio.img_src');
            $this->db->select('*');
            $this->db->from('article_comment');
            $this->db->join('user', 'user.user_id = article_comment.user_id');
            $this->db->join('bio', 'bio.user_id = user.user_id');
            
            $this->db->where('article_id', $id);

            $query = $this->db->get();
            
            //$query=$this->db->get_where('article_comment', array('article_id' => $id));
            /*query="select * from news"*/
            return $query->result_array();//ret array of arrays
        }
        
        private function getNumberComments($article_id){
        
            $this->db->select('no_of_comments')->from('article')->where('article_id', $article_id);

            $array_result = $this->db->get()->row_array();
            
            return $array_result['no_of_comments'];
        }
        
        public function postComments($article_id, $user_id){
            
            $data = array(
               'comment' => $this->input->post('comments') ,
               'user_id' => $user_id ,
               'article_id' => $article_id
            );

            $this->db->insert('article_comment', $data);
            //get current number of comments!
            $no_of_comments = $this->getNumberComments($article_id);
            $data = array(
               'no_of_comments' => $no_of_comments+1
            );

            $this->db->where('article_id', $article_id);
            $this->db->update('article', $data);

        }
    }
?>
