<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_range_model extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
		date_default_timezone_set('Asia/Dhaka');
	}
    /**
    **
    **/
	function get_range()
	{
	 $query = $this->db->select('*')->get('data_range')->result_array();   
	 return $query;
	}

	/**
	**
	**/
	public function data_save()
	{
		$data['parameter_name'] = $this->input->post('param_name', true);
	    $data['max_range'] = $this->input->post('max_range', true);
	    $data['min_range'] = $this->input->post('min_range', true);
	    $data['date_time'] = date("Y-m-d H:i:s");
	    $data['status'] = $this->input->post('status', true);
	    $this->db->insert('data_range', $data);
	    return $this->db->affected_rows();
	}

	/**
	**
	**/
	function get_range_by_id($id)
	{
	  $this->db->where('id',$id);    
	  $get_device = $this->db->get('data_range');   
	  return  $get_device->row();
	}

	/**
	**
	**/
	public function update_data($id)
	{
		$data['parameter_name'] = $this->input->post('param_name', true);
	    $data['max_range'] = $this->input->post('max_range', true);
	    $data['min_range'] = $this->input->post('min_range', true);
	    $data['date_time'] = date("Y-m-d H:i:s");
	    $data['status'] = $this->input->post('status', true);

	    $this->db->where('id', $id);
	    $this->db->update('data_range', $data);
	    return $this->db->affected_rows();
	}

	/**
	**
	**/
	public function data_range_delete($id)
	{
		$this->db->delete('data_range', array('id' => $id));
		return $this->db->affected_rows();
	}



}
?>