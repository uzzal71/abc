<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sheet_model extends CI_Model
{

    
		/**
	** Site Status true list
	**/
	function site_status_true_list()
	{
	 $query = $this->db->select('*')->where('status',1)->get('site')->result_array();   
	 return $query;
	}

	/**
	** Site Generate Alarm List
	**/
	function site_alarm_list()
	{
	$this->db->select('site_id');
	$this->db->from('alarm');
	$this->db->distinct('site_id');
	$query = $this->db->get();
	return $query->result();
	}

	/**
	**
	**/
	function fetch_site()
	{
	  $this->db->order_by("site_name", "ASC");
	  $this->db->where('status',1);
	  $query = $this->db->get("site");
	  return $query->result();
	}

	/**
	**
	**/
	function search_energy_all()
	{
		$sql = "SELECT * FROM energy_meter GROUP BY `site_id` ORDER BY `date_time` DESC ";
		$query_result = $this->db->query($sql);
	    $get_energy = $query_result->result_array(); 
		return $get_energy;

		// $this->db->select('*');
		// $this->db->from('energy_meter');
		// $this->db->order_by("date_time", "DESC");
		// $this->db->group_by('site_id');
		// $query = $this->db->get();
		// return $query->result_array();
	}

	/**
	**
	**/
	function search_time_hum_all()
	{
		$this->db->select('*');
		$this->db->from('temp_humidity');
		$this->db->group_by('site_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	**
	**/
	function search_fuel_all()
	{
		$this->db->select('*');
		$this->db->from('fuel');
		$this->db->group_by('site_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	**
	**/
	function search_io_all()
	{
		$this->db->select('*');
		$this->db->from('io_input');
		$this->db->group_by('site_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	**
	**/
	function time_hum_get($site_id)
	{
	  $this->db->where('site_id', $site_id);  
	  $this->db->group_by('node_id',"ASC");
	   $this->db->order_by('id',"ASC");
	  $query = $this->db->get('temp_humidity');  
	  return $query->result_array();
	}

	/**
	**
	**/
	function energy_meter_get($site_id)
	{
	  $this->db->where('site_id', $site_id);  
	  $this->db->group_by('node_id',"ASC");
	  $this->db->order_by('id',"ASC");
	  $query = $this->db->get('energy_meter');  
	  return $query->result_array();
	}

	/**
	**
	**/

	function search_fuel($site_id)
	{
	  $this->db->where('site_id', $site_id);  
	  $this->db->limit(1);
	  $this->db->order_by('id',"DESC");
	  $query = $this->db->get('fuel');  
	  return $query->row();
	}

	/**
	**
	**/

	function search_io($site_id)
	{
	  $this->db->where('site_id', $site_id);   
	  $this->db->limit(2);
	  $this->db->order_by('id',"DESC");
	  $query = $this->db->get('io_input');  
	  return $query->row();
	}

	/**
	**
	**/
	function get_site()
	{
	 $query = $this->db->select('*')->where('status',1)->get('site')->result_array();   
	 return $query;
	}

	/**
	**
	**/
	function get_sitedata_by_id($site_id)
	{
	  $this->db->where('site_id',$site_id);    
	  $get_device = $this->db->get('site');   
	  return  $get_device->row();
	}

	/**
	**
	**/
	function get_report_by_id($id)
	{
	 $query = $this->db->select('*')->where('site_id',$id)->get('alarm')->result_array();   
	 return $query; 
	}

	/**
	**
	**/
	function get_device_by_site($id)
	{
       $this->db->where('site_id',$id);    
       $get_device = $this->db->get('device');   
       return  $get_device->row();
	}

	/**
	**
	**/
	function get_range_id()
	{
	  $this->db->where('id',1);    
	  $get_device = $this->db->get('data_range');   
	  return  $get_device->row();
	}


}


?>