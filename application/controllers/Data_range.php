<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_range extends CI_Controller
{
	/**
	** Admin Class Constructor Functionn...
	**/
	public function __construct() {
        parent::__construct();
         if ($this->session->userdata('admin_login')!=1) {
			redirect(base_url(''),'refresh');
		}  
    }

    /**
	**
	**/
	public function data_range_add()
	{  	
	   $data['page_title'] = 'DATA RANGE ADD';	
       $data['main_contain'] = $this->load->view('data_range/add_data_range.php', $data, true);
       $this->load->view('home',$data);
	}

	/**
	**
	**/
	public function data_range_save()
	{  	
	   $result = $this->data_range->data_save();
        if($result > 0)
        {
            $data['message'] = "DATA RANGE ADD SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "DATA RANGE ADD FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('DATA-RANGE-LIST'), 'refresh');
	}

	/**
	**
	**/
	public function data_range_list()
	{  	
	   $data['page_title'] = 'DATA RANGE LIST';	
       $data['get_range'] = $this->data_range->get_range();
       $data['main_contain'] = $this->load->view('data_range/data_range_list.php', $data, true);
       $this->load->view('home',$data);
	}

	/**
	**
	**/
	public function data_range_edit($id)
	{
		$data['page_title'] = 'DATA RANGE EDIT';
		$data['get_range_data'] = $this->data_range->get_range_by_id($id);
		$data['main_contain'] = $this->load->view('data_range/data_range_edit.php', $data, true);
		$this->load->view('home',$data); 
	}

	/**
	**
	**/
	public function data_range_update($id)
	{
		$result = $this->data_range->update_data($id);
        if($result > 0)
        {
            $data['message'] = "DATA RANGE UPDATE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "DATA RANGE UPDATE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('DATA-RANGE-LIST'), 'refresh');
	}

	/**
	**
	**/
	public function data_range_delete($id)
	{
		$result = $this->data_range->data_range_delete($id);
        if($result > 0)
        {
            $data['message'] = "DATA RANGE DELETE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "DATA RANGE DELETE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('DATA-RANGE-LIST'), 'refresh');
	}



}
