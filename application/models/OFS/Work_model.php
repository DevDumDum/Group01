<?php

class Work_model extends CI_Model{

    public function get_table(){
        $this->db->select('ID, profession_type, description');
        $this->db->select('status');
        $this->db->where('status', 1);

        return $table = $this->db->get('profession')->result_array();
   }

   public function add_work($data){
       
        if($this->db->insert($data)) return true;
        else return false;
   }

}
