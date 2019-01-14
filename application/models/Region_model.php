<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region_model extends CI_Model
{    
    /**
    ** Get All Region
    **/
     function region_list()
	{
	 $query = $this->db->select('*')->get('region')->result_array();   
	 return $query;
	}

	/**
	** Region data save
	**/
	public function save_data()
	{
		$data['circle_id'] = $this->input->post('circle_id', true);
		$data['region_id'] = $this->input->post('region_id', true);
		$data['region_name'] = $this->input->post('region_name', true);
		$data['status'] = $this->input->post('status', true);
		$this->db->insert('region', $data);
		return $this->db->affected_rows();
	}

	/**
	** Region Single Data View
	**/
	public function specific_region($id)
	{
		$this->db->where('id',$id);    
		$result = $this->db->get('region');   
		return $result->row();
	}

	/**
	** Region Update Data
	**/
	public function update_data($id)
	{
		$data['circle_id'] = $this->input->post('circle_id', true);
		$data['region_id'] = $this->input->post('region_id', true);
		$data['region_name'] = $this->input->post('region_name', true);
		$data['status'] = $this->input->post('status', true);
		$this->db->where('id', $id);
		$this->db->update('region', $data);
		return $this->db->affected_rows();
	}

	/**
	**
	**/
	public function delete_data($id)
	{
		$this->db->delete('region', array('id' => $id));
		return $this->db->affected_rows();
	}



}

?>