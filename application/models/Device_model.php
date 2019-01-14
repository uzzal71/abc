<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device_model extends CI_Model
{
	/**
	** get all site
	**/
	function device_list()
	{
	 $query = $this->db->select('*')->get('device')->result_array();   
	 return $query;
	}
    
	/**
	**
	**/
	function save_device()
	{
		$circle_id = $this->input->post('circle_id', true);
	    $region_id = $this->input->post('region_id', true);
	    $site_id = $this->input->post('site_id', true);
	    $device_id = $this->input->post('device_id', true);
	    $device_name = $this->input->post('device_name', true);	   
	    $node_type = $this->input->post('node_type', true);
	    $status = $this->input->post('status', true);	    
	    $node_id = $this->input->post('node_id');
	    $node_name = $this->input->post('node_name');
	    $total_row = count($node_id);
	    for($i = 0; $i < $total_row; $i++)
	    {
	    	$sql = "INSERT INTO `device`(`device_id`, `device_name`, `circle_id`, `region_id`, `site_id`, `node_type`, `node_id`, `node_name`, `status`) VALUES ('$device_id','$device_name','$circle_id','$region_id','$site_id','$node_type','$node_id[$i]','$node_name[$i]','$status')";
	    	$this->db->query($sql);
	    }	   

		return $this->db->affected_rows();
	}

	/**
	**
	**/
	public function update_device($id)
	{
		$data['device_id'] = $this->input->post('device_id', true);
	    $data['device_name'] = $this->input->post('device_name', true);	    
	    $data['site_id'] = $this->input->post('site_id', true);	    
	    $data['node_type'] = $this->input->post('node_type', true);	    
	    $data['node_id'] = $this->input->post('node_id', true); 
	    $data['node_name'] = $this->input->post('node_name', true); 	
	    $data['status'] = $this->input->post('status', true); 	

		$this->db->where('id', $id);
		$this->db->update('device', $data);
		return $this->db->affected_rows();
	}

	/**
	**
	**/
	public function device_delete($id)
	{
		$this->db->delete('device', array('id' => $id));
		return $this->db->affected_rows();
	}

	/**
	**
	**/
	function get_device_by_id($id)
	{
	  $this->db->where('id',$id);    
	  $get_device = $this->db->get('device');   
	  return  $get_device->row();
	}



}
?>