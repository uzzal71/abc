<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller
{
	/**
	** File Class Constructor Functionn...
	**/
	function __construct() {
        parent::__construct();
        if ($this->session->userdata('admin_login')!=1) {
			redirect(base_url(''),'refresh');
		}      
    }

	/**
    ** DASHBOARD...
    **/
	public function dashboard(){
		// Codding Here...
		$data['page_title'] = 'DASHBOARD';
		$data['main_contain'] = $this->load->view('file/dashboard.php', $data, true);
		$this->load->view('home',$data);
	}

	/**
    ** USER CHANGE PASSWORD...
    **/
	public function change_password(){
		// Codding Here...
		$data['page_title'] = 'CHANGE PASSWORD';
		$data['main_contain'] = $this->load->view('file/change_password.php', $data, true);
		$this->load->view('home',$data);
	}

	/** 
	** CREATE USER PAGE VIEWS
	**/
	public function create_user()
	{
		// Codding Here...
		$data['page_title'] = 'CREATE USER';
		$data['main_contain'] = $this->load->view('file/create_user.php', $data, true);
		$this->load->view('home',$data);
	}

	

}
