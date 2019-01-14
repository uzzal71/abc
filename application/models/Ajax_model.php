<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model
{

    /**
    **
    **/
   function fetch_region_id($circle_id)
   {
   	$circle_id = $this->input->post('circle_id');
    $this->db->where('circle_id', $circle_id);
    $this->db->where('status',1);
    $query = $this->db->get('region');
    $output = '<option value="">All</option>';
    foreach($query->result() as $row)
    {
     $output .= '<option selected value="'.$row->region_id.'">'.$row->region_id.'&nbsp;('.$row->region_name.')'.'</option>';
    }
    return $output;
   }

   	/**
   **
   **/
   function fetch_site_id($region_id)
   {

    $this->db->where('region_id', $region_id);
    $this->db->where('status',1);  
    $query = $this->db->get('site');
    $output = '<option value="">All</option>';
    foreach($query->result() as $row)
    {
     $output .= '<option selected value="'.$row->site_id.'">'.$row->site_id.'&nbsp;('.$row->site_name.')'.'</option>';
    }
    return $output;

   }

   /**
   **
   **/
    function fetch_circle($node_type){
  // energy meter----------------
    
    $this->db->where('status',1); 

    $this->db->group_by('circle_id');

    if ($node_type==1) {
      $query = $this->db->get('energy_meter');
    }

    elseif ($node_type==2) {
      $query = $this->db->get('temp_humidity');
    }

    elseif ($node_type==3) {
      $query = $this->db->get('fuel');
    }

    elseif ($node_type==4) {
      $query = $this->db->get('io_input');
    }

    $output = '<option value="">Select Circle</option>';

     foreach($query->result() as $row)
      {

        $get_id=$row->circle_id;

        $this->db->where('circle_id',$get_id);    
        $get_device = $this->db->get('circle');   
        $get_circle=$get_device->row(); 

$output .= '<option value="'.$row->circle_id.'">'.$row->circle_id.'&nbsp;('.$get_circle->circle_name.')'.'</option>';

      }
       return $output;    
 }

 /**
 **
 **/
  function fetch_region_for_search($circle_id,$node_type){


  $this->db->where('circle_id', $circle_id);
  $this->db->group_by('region_id');

   if ($node_type==1) {
      $query = $this->db->get('energy_meter');
    }

    elseif ($node_type==2) {
      $query = $this->db->get('temp_humidity');
    }

    elseif ($node_type==3) {
      $query = $this->db->get('fuel');
    }

    elseif ($node_type==4) {
      $query = $this->db->get('io_input');
    }

    elseif ($node_type==5) {
      $query = $this->db->get('io_input');
    }

  $output = '<option value="">Select Region</option>';

  foreach($query->result() as $row)  
  {
        $get_id=$row->region_id;
        $this->db->where('region_id',$get_id);    
        $get_device = $this->db->get('region');   
        $get_region = $get_device->row(); 

   $output .= '<option value="'.$row->region_id.'">'.$row->region_id.'&nbsp;('.$get_region->region_name.')'.'</option>';
  }

  return $output;

 }

 /**
 **
 **/
  function fetch_site_for_search($circle_id,$region_id,$node_type){


  $this->db->where('circle_id', $circle_id);
  $this->db->where('region_id', $region_id);
  $this->db->group_by('site_id');

   if ($node_type==1) {
      $query = $this->db->get('energy_meter');
    }

    elseif ($node_type==2) {
      $query = $this->db->get('temp_humidity');
    }

    elseif ($node_type==3) {
      $query = $this->db->get('fuel');
    }

    elseif ($node_type==4) {
      $query = $this->db->get('io_input');
    }

    elseif ($node_type==5) {
      $query = $this->db->get('io_input');
    }

  $output = '<option value="">Select site</option>';

  foreach($query->result() as $row)  
  {
        $get_id=$row->site_id;
        $this->db->where('site_id',$get_id);    
        $get_device = $this->db->get('site');   
        $get_region = $get_device->row(); 

$output .= '<option value="'.$row->site_id.'">'.$row->site_id.'&nbsp;('.$get_region->site_name.')'.'</option>';

  }

  return $output;

 }

 /**
 **
 **/
   function fetch_node_id($circle_id,$region_id,$site_id,$node_type)

 {

  $this->db->where('circle_id', $circle_id);
  $this->db->where('region_id', $region_id);
  $this->db->where('site_id', $site_id);
  

   if ($node_type==1) {
      $this->db->group_by('node_id');
      $query = $this->db->get('energy_meter');
    }

    elseif ($node_type==2) {
      $this->db->group_by('node_id');
      $query = $this->db->get('temp_humidity');
    }

    elseif ($node_type==3) {
      $this->db->group_by('node_id');
      $query = $this->db->get('fuel');
    }

    elseif ($node_type==4) {
      $this->db->group_by('node_id');
      $query = $this->db->get('io_input');
    }

     elseif ($node_type==5) {
      $this->db->group_by('node_id');
      $query = $this->db->get('io_input');
    }

  $output = '<option value="">Select Node</option>';

  foreach($query->result() as $row)
  
  {

     if ($node_type==1) {
      $get_id=$row->node_id;
    }

    elseif ($node_type==2) {
     $get_id=$row->node_id;
    }

    elseif ($node_type==3) {
      $get_id=$row->node_id;
    }

    elseif ($node_type==4) {
      $get_id=$row->node_id;
    }

    elseif ($node_type==5) {
      $get_id=$row->node_id;
    }
      
         
        $this->db->where('site_id',$site_id);    
        $this->db->where('node_type',$node_type);    
        $this->db->where('node_id',$get_id);
        $get_device = $this->db->get('device');   
        $get_node = $get_device->row(); 

      

if ($node_type==1) {
     $output .= '<option value="'.$row->node_id.'">'.$row->node_id.'&nbsp;('.$get_node->node_name.')'.'</option>';
    }

    elseif ($node_type==2) {
    $output .= '<option value="'.$row->node_id.'">'.$row->node_id.'&nbsp;('.$get_node->node_name.')'.'</option>';
    }

    elseif ($node_type==3) {
      $output .= '<option value="'.$row->node_id.'">'.$row->node_id.'&nbsp;('.$get_node->node_name.')'.'</option>';
    }

    elseif ($node_type==4) {
     $output .= '<option value="'.$row->node_id.'">'.$row->node_id.'&nbsp;('.$get_node->node_name.')'.'</option>';
    }

  }
  return $output;
 }


    /**
    **
    **/
    function fetch_region($circle_id)
   {
    $this->db->where('circle_id', $circle_id);
    $this->db->where('status',1);
    $query = $this->db->get('region');
    $output = '<option value="">All</option>';
    foreach($query->result() as $row)
    {
     $output .= '<option value="'.$row->region_id.'">'.$row->region_id.'&nbsp;('.$row->region_name.')'.'</option>';
    }
    return $output;
   }

   /**
   **
   **/
  function fetch_siteid($region_id)
   {
    $this->db->where('region_id', $region_id);
    $this->db->where('status',1);  
    $query = $this->db->get('site');
    $output = '<option value="">All</option>';
    foreach($query->result() as $row)
    {
     $output .= '<option value="'.$row->site_id.'">['.$row->site_id.'] '.$row->site_name.')'.'</option>';
    }
    return $output;
   }

   /**
   **
   **/
    function fetch_device($site_id)
   {
    $this->db->where('site_id', $site_id);
    $this->db->where('status',1);
    
    $this->db->group_by('device_id');
    $query = $this->db->get('device');
    $output = '<option value="">Select Device</option>';
    foreach($query->result() as $row)
    {
     $output .= '<option value="'.$row->device_id.'">['.$row->device_id.'] '.$row->device_name.'</option>';
    }
    return $output;
   }


   /**
   **
   **/
    function fetch_node($device_id)
   {
    $this->db->where('device_id', $device_id);
    $this->db->where('status',1);
    $this->db->where('node_type',4);  
    $this->db->order_by('node_id','ASC');
    $query = $this->db->get('device');
    $output = '<option value="">Select NodeID</option>';
    foreach($query->result() as $row)
    {
     $output .= '<option value="'.$row->node_id.'">['.$row->node_id.'] '.$row->node_name.'</option>';
    }
    return $output;
   }


}
?>