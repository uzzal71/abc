<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model
{

   public function get_pdb_energy()
   {
    $date = new DateTime('17 days ago');
     $date_time = $date->format('Y-m-d');
    $sql = "SELECT DISTINCT(`site_id`) as site FROM `energy_meter`";
    $query_result = $this->db->query($sql);
    $result = $query_result->result_array();
    $total_site = count($result);
    $total_energy = 0;
    for($i = 0; $i < $total_site; $i++)
    {
      $site_id =  $result[$i]['site'];
      $sql_energy = "SELECT positive_real_energy as real_energy FROM energy_meter WHERE site_id = $site_id AND node_id = 4 AND CAST(`date_time` AS DATE) = '$date_time' ORDER BY id DESC LIMIT 1 ";
   
      $query_energy = $this->db->query($sql_energy);
      $result_energy = $query_energy->row();
      //$total_energy = $total_energy + $result_energy[0]->real_energy; 
      echo $result_energy['real_energy'];
      echo '<pre>';
      print_r($result_energy);

    }
    echo $total_energy;
    $avg = $total_energy / $total_site;
    return $avg;
    exit();

   }

   /**
   **
   **/
   public function get_generator_energy()
   {
    $date = new DateTime('7 days ago');
    $date_time = $date->format('Y-m-d');
    $sql = "SELECT DISTINCT(`site_id`) FROM energy_meter";
    $query_result = $this->db->query($sql);
    $result = $query_result->row();
    return $result;
   }



}

?>
