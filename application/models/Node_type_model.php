<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Node_type_model extends CI_Model
{
	/**
	** Node type get status 1
	**/
	public function node_status_list()
	{
		$query = $this->db->select('*')->where('status',1)->get('node_type')->result_array();   
 		return $query;
	}

	/**
	** get all site
	**/
	function node_type_list()
	{
	 $query = $this->db->select('*')->get('node_type')->result_array();   
	 return $query;
	}

	/**
	**
	**/
	public function specific_note_type($id)
	{
		$this->db->where('id',$id);    
		$result = $this->db->get('node_type');   
		return $result->row();
	}

		/**
	** Site data save here...
	**/
	public function save_data()
	{
		$data['node_type'] = $this->input->post('node_type', true);
	    $data['status'] = $this->input->post('status', true);
	    $this->db->insert('node_type', $data);
		return $this->db->affected_rows();
	}

	/**
	** Site data save here...
	**/
	public function update_data($id)
	{
		$data['node_type'] = $this->input->post('node_type', true);		
	    $data['status'] = $this->input->post('status', true);
	    $this->db->where('id', $id);
		$this->db->update('node_type', $data);
		return $this->db->affected_rows();
	}

	/**
	**
	**/
	public function delete_data($id)
	{
		$this->db->delete('node_type', array('id' => $id));
		return $this->db->affected_rows();
	}

    



}
?>