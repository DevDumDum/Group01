<?php

class Post_model extends CI_Model{
   
   public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('OFS/Post_model');
  }

   public function get_table(){
        $this->db->select('ID, poster_ID, profession_ID, 
        worker_count, requirements, location, timestamp, status');
        $this->db->where('status', 1);

        return $table = $this->db->get('post')->result_array();
   }

   public function add_post($data){
      if($this->db->insert('post', $data))
          return true;
      else return false;
   }
}

