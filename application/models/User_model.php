<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	/**
	**
	**/
	function user_list()
	{
	 $query = $this->db->select('*')->get('user')->result_array();   
	 return $query;
	}

	/**
	**
	**/
	public function save_user()
	{
		$data['name'] = $this->input->post('user_id', true);
	    $data['password'] = sha1($this->input->post('password', true));	   
	    $data['email'] = $this->input->post('email', true);	   
	    $data['phone'] = $this->input->post('phone', true);	    	   
	    $data['status'] = $this->input->post('status', true);	    	   
	    $data['created_at'] = date("Y-m-d H:i:s");
	    $data['created_by'] = $this->session->userdata('username', true);

	    $this->db->insert('user',$data);
		return $this->db->affected_rows();
	}

	/**
	**
	**/
	public function get_specific_user($id)
	{
		$this->db->where('id',$id);    
		$get_user = $this->db->get('user');   
		return  $get_user->row();
	}

		/**
	** update user data
	**/
	public function update_data($id)
	{
		$data['name'] = $this->input->post('user_id', true);
	    $data['password'] = sha1($this->input->post('password', true));	   
	    $data['email'] = $this->input->post('email', true);	   
	    $data['phone'] = $this->input->post('phone', true);	    	   
	    $data['status'] = $this->input->post('status', true);	    	   
	    $data['created_at'] = date("Y-m-d H:i:s");
	    $data['created_by'] = $this->session->userdata('username');
		$this->db->where('id', $id);
		$this->db->update('user', $data);
		return $this->db->affected_rows();
	}

	/**
	** user Delete
	**/
	public function user_delete($id)
	{
		$this->db->delete('user', array('id' => $id));
		return $this->db->affected_rows();
	}

    



}
?>