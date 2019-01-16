<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TEST extends CI_Model
{

   public function get_pdb_energy()
   {
    $date = new DateTime('7 days ago');
     $date_time = $date->format('Y-m-d');
    // get min
    $sql = "SELECT DISTINCT(`site_id`) as site FROM `energy_meter`";
    $query_result = $this->db->query($sql);
    $result = $query_result->result_array();
    echo '<pre>';
    print_r($result);
    exit();
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
