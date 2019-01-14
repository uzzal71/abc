<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Node_type extends CI_Controller
{
	/**
	** NODE TYPE Class Constructor Functionn...
	**/
	function __construct() {
        parent::__construct();
        if ($this->session->userdata('admin_login')!=1) {
			redirect(base_url(''),'refresh');
		}   
    }

	/**
	** NODE TYPE add
	**/
	public function add_node_type()
	{
		// Codding Here...
        $data['page_title'] = 'NODE TYPE ADD';
        $data['main_contain'] = $this->load->view('node_type/add_node_type.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	** node type save data here...
	**/
	public function site_save()
	{
		$result = $this->node_type->save_data();
		 if($result > 0)
        {
            $data['message'] = "NODE TYPE ADD SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "NODE TYPE ADD FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('CREATE-NODE-TYPE'), 'refresh');
	}

	/**
	**  node type update here...
	**/
	public function node_type_update($id)
	{
		$result = $this->node_type->update_data($id);
		 if($result > 0)
        {
            $data['message'] = "NODE TYPE UPDATE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "NODE TYPE UPDATE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('NODE-TYPE-LIST'), 'refresh');
	}

	/**
	** node type Delete here...
	**/
	public function node_type_delete($id)
	{
		$result = $this->node_type->delete_data($id);
		 if($result > 0)
        {
            $data['message'] = "NODE TYPE DELETE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "NODE TYPE DELETE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('NODE-TYPE-LIST'), 'refresh');
	}

	/**
	** NODE TYPE list
	**/
	public function node_type_list()
	{
		// Codding Here...
        $data['page_title'] = 'NODE TYPE LIST';
        $data['node_type_list'] = $this->node_type->node_type_list();
        $data['main_contain'] = $this->load->view('node_type/node_type_list.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	** NODE TYPE edit
	**/
	public function node_type_edit($id)
	{
		// Codding Here...
        $data['page_title'] = 'NODE TYPE EDIT';
        $data['specific_note_type'] = $this->node_type->specific_note_type($id);
        $data['main_contain'] = $this->load->view('node_type/node_type_edit.php', $data, true);
        $this->load->view('home', $data);
	}


}
