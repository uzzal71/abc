<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{
	/**
	** SITE Class Constructor Functionn...
	**/
	function __construct() {
        parent::__construct();
        if ($this->session->userdata('admin_login')!=1) {
			redirect(base_url(''),'refresh');
		}   
    }

	/**
	** site add here....
	**/
	public function add_site()
	{
		// Codding Here...
        $data['page_title'] = 'SITE ADD';
        $data['circle_list'] = $this->circle->circle_list();
        $data['region_list'] = $this->region->region_list();
        $data['main_contain'] = $this->load->view('site/add_site.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	** site save data here...
	**/
	public function site_save()
	{
		$result = $this->site->save_data();
		 if($result > 0)
        {
            $data['message'] = "SITE ADD SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "SITE ADD FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('CREATE-SITE'), 'refresh');
	}

	/**
	** site list view page here...
	**/
	public function site_list()
	{
		// Codding Here...
        $data['page_title'] = 'SITE LIST';
        $data['site_list'] = $this->site->site_list();
        $data['main_contain'] = $this->load->view('site/site_list.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	** Site edit here...
	**/
	public function site_edit($id)
	{
		// Codding Here...
        $data['page_title'] = 'SITE EDIT';
        $data['specific_site'] = $this->site->specific_site($id);
        $data['main_contain'] = $this->load->view('site/site_edit.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	** Site update here...
	**/
	public function site_update($id)
	{
		$result = $this->site->update_data($id);
		 if($result > 0)
        {
            $data['message'] = "SITE UPDATE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "SITE UPDATE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('SITE-LIST'), 'refresh');
	}

	/**
	** Site Delete here...
	**/
	public function site_delete($id)
	{
		$result = $this->site->delete_data($id);
		 if($result > 0)
        {
            $data['message'] = "SITE DELETE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "SITE DELETE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('SITE-LIST'), 'refresh');
	}

	/** get region by circle id
	**
	**/
	function fetch_region()
	{
	    if($this->input->post('circle_id'))
	    {
	    echo $this->site->fetch_region($this->input->post('circle_id'));
	    }
	}





}
