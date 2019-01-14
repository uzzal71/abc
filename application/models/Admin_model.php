<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  /**
  **
  **/
  public function get_circle_status_true()
  {
     $query = $this->db->select('*')->where('status',1)->get('circle')->result_array();   
     return $query;
  }


   /**
   **
   **/
   public function check_hava_user($username)
   {
		 $this->db->select('*');
     $this->db->from('user');
     $this->db->where('name', $username);
     $query_result = $this->db->get();
     $result = $query_result->row();
     return $result;
   }

   /**
   **
   **/
   public function update_password($username, $password)
   {
      $password = sha1($password);
      $this->db->set('password', $password); 
      $this->db->where('name', $username);  
      $this->db->update('user');
      return $this->db->affected_rows();
   }

   /**
   **
   **/
   public function get_avg_humidity()
   {
     $date = new DateTime('7 days ago');
     $date_time = $date->format('Y-m-d');
     $sql = "SELECT AVG(`humidity`) AS humidity FROM `temp_humidity` WHERE cast(`date_time` as date) > '$date_time' ";
     $query_result = $this->db->query($sql);
     $result = $query_result->row();
     return $result;
   }

   /**
   **
   **/
   public function get_avg_temp()
   {
     $date = new DateTime('7 days ago');
     $date_time = $date->format('Y-m-d');
     $sql = "SELECT AVG(`temp`) AS temp FROM `temp_humidity` WHERE cast(`date_time` as date) >'$date_time' ";
     $query_result = $this->db->query($sql);
     $result = $query_result->row();
     return $result;
   }

   /**
   **
   **/
   public function get_pdb_energy()
   {
    $date = new DateTime('7 days ago');
     $date_time = $date->format('Y-m-d');
    // get min
    $sql = "SELECT AVG(`positive_real_energy`) AS energy_pdb FROM `energy_meter` WHERE cast(`date_time` as date) > '$date_time' AND node_id = '3' ";
    $query_result = $this->db->query($sql);
    $result = $query_result->row();
    return $result;
   }

   /**
   **
   **/
   public function get_generator_energy()
   {
    $date = new DateTime('7 days ago');
    $date_time = $date->format('Y-m-d');
    $sql = "SELECT AVG(`positive_real_energy`) AS energy_gte FROM `energy_meter` WHERE cast(`date_time` as date) > '$date_time' AND node_id = '4' ";
    $query_result = $this->db->query($sql);
    $result = $query_result->row();
    return $result;
   }



}

?>
