<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{

   /**
   **
   **/
   public function check_login($username, $password)
   {
   		$this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query_result = $this->db->get();
        $result = $query_result->row();
        echo $result;
        exit();
   }



}

?>
