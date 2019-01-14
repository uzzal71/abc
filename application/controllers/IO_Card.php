<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IO_Card extends CI_Controller
{

	/**
	** io card Class Constructor Functionn...
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
	function io_number_add()
	{
		$data['page_title'] = 'ADD IO NUMBER';
		$data['get_site'] = $this->io_card->fetch_site();
        $data['main_contain'] = $this->load->view('io_card/add_io_number.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	**
	**/
	public function io_number_create()
	{
		$result = $this->io_card->save_io_number_data();
        if($result > 0)
        {
            $data['message'] = "IO NUMBER SAVE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "IO NUMBER SAVE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('IO-NUMBER-LIST'), 'refresh');
	}

	/**
	**
	**/
	function io_input_add()
	{
		$data['page_title'] = 'ADD IO INPUT';
		$data['get_site'] = $this->io_card->fetch_site();
        $data['main_contain'] = $this->load->view('io_card/add_io_input.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	**
	**/
	function io_number_list()
	{
		$data['page_title'] = 'IO NUMBER LIST';
		$data['get_io_number'] = $this->io_card->get_io_number();
        $data['main_contain'] = $this->load->view('io_card/io_number_list.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	**
	**/
	function io_input_list()
	{
		$data['page_title'] = 'IO INPUT LIST';
		$data['get_io_input'] = $this->io_card->get_io_input();
        $data['main_contain'] = $this->load->view('io_card/io_input_list.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	**
	**/
	public function io_number_edit($id)
	{
		$data['page_title'] = 'IO NUMBER EDIT';
		$data['get_io_by_id'] = $this->io_card->get_io_number_by_id($id);
		$data['main_contain'] = $this->load->view('io_card/io_number_edit.php', $data, true);
        $this->load->view('home', $data);	
	}

	/**
	**
	**/
	public function io_number_update($id)
	{
		$result = $this->io_card->io_number_update($id);
        if($result > 0)
        {
            $data['message'] = "IO NUMBER UPDATE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "IO NUMBER UPDATED VALUE NO CHANGE!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('IO-NUMBER-LIST'), 'refresh');
	}

	/**
	**
	**/
	public function io_number_delete($id)
	{
		$result = $this->io_card->io_number_delete($id);
        if($result > 0)
        {
            $data['message'] = "IO NUMBER DELETE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "IO NUMBER DELETE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('IO-NUMBER-LIST'), 'refresh');
	}

	/**
	**
	**/
	public function io_number_off($id)
	{
		$result = $this->io_card->io_number_off($id);
        if($result > 0)
        {
            $data['message'] = "IO NUMBER OFF SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "IO NUMBER OFF FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('IO-NUMBER-LIST'), 'refresh');
	}

	/**
	**
	**/
	public function io_number_on($id)
	{
		$result = $this->io_card->io_number_on($id);
        if($result > 0)
        {
            $data['message'] = "IO NUMBER ON SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "IO NUMBER ON FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('IO-NUMBER-LIST'), 'refresh');
	}

	/**
	**
	**/
	public function io_input_edit($id)
	{
		$data['page_title'] = 'IO INPUT EDIT';
		$data['get_io_input'] = $this->io_card->get_io_input_by_id($id);
		$data['main_contain'] = $this->load->view('io_card/io_input_edit.php', $data, true);
        $this->load->view('home', $data);
	}

	/**
	**
	**/
	public function io_input_save()
	{
		$result = $this->io_card->io_input_save_data();
        if($result > 0)
        {
            $data['message'] = "IO INPUT SAVE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "IO INPUT SAVE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('IO-INPUT-LIST'), 'refresh');
	}
	

	/**
	**
	**/
	public function io_input_update($id)
	{
		$result = $this->io_card->io_input_data_update($id);
        if($result > 0)
        {
            $data['message'] = "IO INPUT UPDATE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "IO INPUT UPDATE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('IO-INPUT-LIST'), 'refresh');
	}

	/**
	**
	**/
	public function io_input_delete($id)
	{
		$result = $this->io_card->io_input_delete($id);
        if($result > 0)
        {
            $data['message'] = "IO INPUT DELETE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "IO INPUT DELETE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('IO-INPUT-LIST'), 'refresh');
	}

}
