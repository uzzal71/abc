<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IO_card_model extends CI_Model
{

	/**
	** get io number
	**/    
	function get_io_number()
	{
	$query = $this->db->select('*')->get('io_control')->result_array();   
	 return $query;
	}

	/**
	** get io input data
	**/
	function get_io_input()
	{
	 $query = $this->db->select('*')->get('io_input_name')->result_array();   
	 return $query;
	}

	/**
	** get site data
	**/
	function fetch_site()
	{
	  $this->db->order_by("site_name", "ASC");
	  $this->db->where('status',1);
	  $query = $this->db->get("site");
	  return $query->result();
	}

	/**
	** get io number by id
	**/
	function get_io_number_by_id($id)
	{
	  $this->db->where('id',$id);    
	  $get_user = $this->db->get('io_control');   
	  return  $get_user->row();
	}

	/**
	** io input get by id
	**/
	function get_io_input_by_id($id)
	{
	  $this->db->where('id',$id);    
	  $get_user = $this->db->get('io_input_name');   
	  return  $get_user->row();
	}

	/**
	**
	**/
	public function save_io_number_data()
	{
		$data['site_id'] = $this->input->post('site_id', true);
		$data['device_id'] = $this->input->post('device_id', true);
		$data['node_id'] = $this->input->post('node_id', true);
		$data['io_no'] = $this->input->post('io_no', true);
		$data['io_name'] = $this->input->post('io_name', true);
		$data['status'] = $this->input->post('status', true);

		$this->db->insert('io_control', $data);
		return $this->db->affected_rows();
	}

	/**
	** Update io number
	**/
	public function io_number_update($id)
	{
		$data['site_id'] = $this->input->post('site_id', true);
		$data['device_id'] = $this->input->post('device_id', true);
		$data['node_id'] = $this->input->post('node_id', true);
		$data['io_no'] = $this->input->post('io_no', true);
		$data['io_name'] = $this->input->post('io_name', true);
		$data['status'] = $this->input->post('status', true);

		$this->db->where('id', $id);
		$this->db->update('io_control', $data);
		return $this->db->affected_rows();
	}

	/**
	** delete io number
	**/
	public function io_number_delete($id)
	{
		$this->db->delete('io_control', array('id' => $id));
		return $this->db->affected_rows();
	}

	/**
	** io number off
	**/
	public function io_number_off($id)
	{
		$data['status'] = 0;
		$this->db->where('id', $id);
		$this->db->update('io_control', $data);
		return $this->db->affected_rows();
	}

	/**
	** io number on
	**/
	public function io_number_on($id)
	{
		$data['status'] = 1;
		$this->db->where('id', $id);
		$this->db->update('io_control', $data);
		return $this->db->affected_rows();
	}

	/**
	** io input save
	**/
	public function io_input_save_data()
	{
	  $data['site_id'] = $this->input->post('site_id', true);
      $data['device_id'] = $this->input->post('device_id', true);
	  $data['node_id'] = $this->input->post('node_id', true);
	  $data['ac1'] = $this->input->post('ac1', true);
	  $data['ac2'] = $this->input->post('ac2', true);
	  $data['ac3'] = $this->input->post('ac3', true);
	  $data['ac4'] = $this->input->post('ac4', true);
	  $data['external1'] = $this->input->post('external1', true);
	  $data['external2'] = $this->input->post('external2', true);
	  $data['external3'] = $this->input->post('external3', true);
	  $data['external4'] = $this->input->post('external4', true);
	  $data['analogue1'] = $this->input->post('analogue1', true);
	  $data['analogue2'] = $this->input->post('analogue2', true);
	  $data['analogue3'] = $this->input->post('analogue3', true);
	  $data['analogue4'] = $this->input->post('analogue4', true);

	  $this->db->insert('io_input_name', $data);
	  return $this->db->affected_rows();
	}

	/**
	**
	**/
	public function io_input_data_update($id)
	{
	  $data['site_id'] = $this->input->post('site_id', true);
      $data['device_id'] = $this->input->post('device_id', true);
	  $data['node_id'] = $this->input->post('node_id', true);
	  $data['ac1'] = $this->input->post('ac1', true);
	  $data['ac2'] = $this->input->post('ac2', true);
	  $data['ac3'] = $this->input->post('ac3', true);
	  $data['ac4'] = $this->input->post('ac4', true);
	  $data['external1'] = $this->input->post('external1', true);
	  $data['external2'] = $this->input->post('external2', true);
	  $data['external3'] = $this->input->post('external3', true);
	  $data['external4'] = $this->input->post('external4', true);
	  $data['analogue1'] = $this->input->post('analogue1', true);
	  $data['analogue2'] = $this->input->post('analogue2', true);
	  $data['analogue3'] = $this->input->post('analogue3', true);
	  $data['analogue4'] = $this->input->post('analogue4', true);

	  $this->db->where('id', $id);
	  $this->db->update('io_input_name', $data);
	  return $this->db->affected_rows();

	}

	/**
	** delete io number
	**/
	public function io_input_delete($id)
	{
		$this->db->delete('io_input_name', array('id' => $id));
		return $this->db->affected_rows();
	}



}
?>