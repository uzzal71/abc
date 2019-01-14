<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends CI_Controller
{
	/**
	** Region Class Constructor Functionn...
	**/
	function __construct() {
        parent::__construct();
        if ($this->session->userdata('admin_login')!=1) {
			redirect(base_url(''),'refresh');
		}   
    }

    /**
    ** Get Region 
    **/
	public function fetch_region()
	{
	   if($this->input->post('circle_id'))
	   {
	   echo $this->region->get_region($this->input->post('circle_id'));
	   }
	}

	/**
	** Region Data Save
	**/
	public function region_save()
	{
		$result = $this->region->save_data();
		 if($result > 0)
        {
            $data['message'] = "REGION ADD SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "REGION ADD FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('CREATE-REGION'), 'refresh');
	}

	/**
	** Add Region Page View
	**/
	public function add_region()
	{
		// Codding Here...
        $data['page_title'] = 'REGION ADD';
        $data['circle_list'] = $this->circle->circle_list();
        $data['main_contain'] = $this->load->view('region/add_region.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	** Region list view
	**/
	public function region_list()
	{
		// Codding Here...
        $data['page_title'] = 'REGION LIST';
        $data['region_list'] = $this->region->region_list();
        $data['main_contain'] = $this->load->view('region/region_list.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	** Region edit page
	**/
	public function region_edit($id)
	{
		// Codding Here...
        $data['page_title'] = 'REGION EDIT';
        $data['circle_list'] = $this->circle->circle_list();
        $data['specific_region'] = $this->region->specific_region($id);
        $data['main_contain'] = $this->load->view('region/region_edit.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	** Region Data Update
	**/
	public function region_update($id)
	{
		$result = $this->region->update_data($id);
		if($result > 0)
        {
            $data['message'] = "REGION UPDATE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "REGION UPDATED VALUE NO CHANGE!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('REGION-LIST'), 'refresh');
	}

	/**
    ** Region data delete
    **/
    public function region_delete($id)
    {
        $result = $this->region->delete_data($id);
        if($result > 0)
        {
            $data['message'] = "REGION DELETE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "REGION DELETE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('REGION-LIST'), 'refresh');

    }




}
