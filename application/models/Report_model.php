<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model
{
	/**
	** Node Type
	**/
	function get_node_type()
	{
	 $query = $this->db->select('*')->where('status',1)->get('node_type')->result_array();   
 	 return $query;
	}

	/**
	** Get Circle
	**/
	function get_circle()
	{
	 $query = $this->db->select('*')->where('status',1)->get('circle')->result_array();   
	 return $query;
	}

	/**
	** Search Energy meter report
	**/
	function search_report_energy($circle_id,$region_id,$site_id,$node_id,$from_date,$to_date)
	{
		$sql = "SELECT * FROM energy_meter WHERE `circle_id` = $circle_id AND`region_id` = $region_id AND `site_id` = $site_id AND `node_id` = $node_id AND CAST(`date_time` AS DATE) BETWEEN '$from_date' AND '$to_date'";
		$query_result = $this->db->query($sql);
	    $get_energy = $query_result->result_array(); 
		return $get_energy;
	}

	/**
	** Search temperature and humidity report
	**/
	function search_report_temp($circle_id,$region_id,$site_id,$node_id,$from_date,$to_date)
	{
		$sql = "SELECT * FROM temp_humidity WHERE `circle_id` = $circle_id AND`region_id` = $region_id AND `site_id` = $site_id AND `node_id` = $node_id AND CAST(`date_time` AS DATE) BETWEEN '$from_date' AND '$to_date'";
		$query_result = $this->db->query($sql);
	    $get_temp = $query_result->result_array();
		return $get_temp;
	}

	/**
	** Search Fuel report
	**/
	function search_report_fuel($circle_id,$region_id,$site_id,$node_id,$from_date,$to_date)
	{
		$sql = "SELECT * FROM fuel WHERE `circle_id` = $circle_id AND`region_id` = $region_id AND `site_id` = $site_id AND `node_id` = $node_id AND CAST(`date_time` AS DATE) BETWEEN '$from_date' AND '$to_date'";
		$query_result = $this->db->query($sql);
	    $get_fuel = $query_result->result_array();  
		return $get_fuel;
	}

	/**
	** Search IO card report
	**/
	function search_report_io($circle_id,$region_id,$site_id,$node_id,$from_date,$to_date)
	{
		$sql = "SELECT * FROM io_input WHERE `circle_id` = $circle_id AND`region_id` = $region_id AND `site_id` = $site_id AND `node_id` = $node_id AND CAST(`date_time` AS DATE) BETWEEN '$from_date' AND '$to_date'";
		$query_result = $this->db->query($sql);
	    $get_io = $query_result->result_array();  
		return $get_io;
	}



}
?>