<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model
{
	/**
	** get all site
	**/
	function site_list()
	{
	 $query = $this->db->select('*')->get('site')->result_array();   
	 return $query;
	}

	/**
	** Specific site get data here...
	**/
	public function specific_site($id)
	{
		$this->db->where('id',$id);    
		$result = $this->db->get('site');   
		return $result->row();
	}

	/**
	** Site data save here...
	**/
	public function save_data()
	{
		$data['circle_id'] = $this->input->post('circle_id', true);
		$data['region_id'] = $this->input->post('region_id', true);
		$data['site_id'] = $this->input->post('site_id', true);		
	    $data['site_name'] = $this->input->post('site_name', true);
	    $data['phone1'] = $this->input->post('phone1', true);
	    $data['phone2'] = $this->input->post('phone2', true);
	    $data['email1'] = $this->input->post('email1', true);
	    $data['email2'] = $this->input->post('email2', true);
	    $data['status'] = $this->input->post('status', true);
	    $this->db->insert('site', $data);
		return $this->db->affected_rows();
	}

	/**
	** Site data save here...
	**/
	public function update_data($id)
	{
		$data['site_id'] = $this->input->post('site_id', true);		
	    $data['site_name'] = $this->input->post('site_name', true);
	    $data['phone1'] = $this->input->post('phone1', true);
	    $data['phone2'] = $this->input->post('phone2', true);
	    $data['email1'] = $this->input->post('email1', true);
	    $data['email2'] = $this->input->post('email2', true);
	    $data['status'] = $this->input->post('status', true);
	    $this->db->where('id', $id);
		$this->db->update('site', $data);
		return $this->db->affected_rows();
	}

	/**
	**
	**/
	public function delete_data($id)
	{
		$this->db->delete('site', array('id' => $id));
		return $this->db->affected_rows();
	}

	/**
	** Getch region by cricle id here...
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


    



}
?>