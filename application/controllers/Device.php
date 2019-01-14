<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends CI_Controller
{
	/**
	** DEVICE Class Constructor Functionn...
	**/
	function __construct() {
        parent::__construct();
        if ($this->session->userdata('admin_login')!=1) {
			redirect(base_url(''),'refresh');
		}   
    }

	/**
	** Device add
	**/
	public function add_device()
	{
		// Codding Here...
        $data['page_title'] = 'DEVICE ADD';
        $data['circle_list'] = $this->circle->circle_list();
        $data['region_list'] = $this->region->region_list();
        $data['site_list'] = $this->site->site_list();
        $data['node_list'] = $this->node_type->node_status_list();
        $data['main_contain'] = $this->load->view('device/add_device.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	**
	**/
	public function device_save_data()
	{
		$result = $this->device->save_device();
        if($result > 0)
        {
            $data['message'] = "DEVICE ADD SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "DEVICE ADD FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('DEVICE-LIST'), 'refresh');
	}

	/**
	** Device list
	**/
	public function device_list()
	{
		// Codding Here...
        $data['page_title'] = 'DEVICE LIST';
        $data['device_list'] = $this->device->device_list();
        $data['main_contain'] = $this->load->view('device/device_list.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	** Device edit
	**/
	public function device_edit($id)
	{
		// Codding Here...
        $data['page_title'] = 'DEVICE EDIT';
        $data['get_device'] = $this->device->get_device_by_id($id);
        $data['site_list'] = $this->site->site_list();
        $data['node_list'] = $this->node_type->node_status_list();
        $data['main_contain'] = $this->load->view('device/device_edit.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	**
	**/
	public function device_update($id)
	{
		$result = $this->device->update_device($id);
        if($result > 0)
        {
            $data['message'] = "DEVICE UPDATE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "DEVICE UPDATE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('DEVICE-LIST'), 'refresh');
	}

	/**
	**
	**/
	public function device_delete($id)
	{
		$result = $this->device->device_delete($id);
        if($result > 0)
        {
            $data['message'] = "DEVICE DELETE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "DEVICE DELETE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('DEVICE-LIST'), 'refresh');
	}


}
