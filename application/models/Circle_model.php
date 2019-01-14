<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Circle_model extends CI_Model
{
	/**
	** Get All Circle
	**/    
	public function circle_list()
	{
	 $query = $this->db->select('*')->get('circle')->result_array();   
	 return $query;
	}

	/**
	** Circle Data Save
	**/
	public function save_data()
	{
		$data['circle_id'] = $this->input->post('circle_id', true);
		$data['circle_name'] = $this->input->post('circle_name', true);
		$data['status'] = $this->input->post('status', true);
		$this->db->insert('circle', $data);
		return $this->db->affected_rows();

	}

	/**
	** get single circle data
	**/
	public function specific_circle($id)
	{
		$this->db->where('id',$id);    
		$result = $this->db->get('circle');   
		return $result->row();
	}

	/**
	** update circle data
	**/
	public function update_data($id)
	{
		$data['circle_id'] = $this->input->post('circle_id', true);
		$data['circle_name'] = $this->input->post('circle_name', true);
		$data['status'] = $this->input->post('status', true);
		$this->db->where('id', $id);
		$this->db->update('circle', $data);
		return $this->db->affected_rows();
	}

	/**
	** Circle Delete
	**/
	public function circle_delete($id)
	{
		$this->db->delete('circle', array('id' => $id));
		return $this->db->affected_rows();
	}

	/**
	**
	**/
	



}
?>