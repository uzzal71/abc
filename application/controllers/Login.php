<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	/**
	** Login Class Constructor Functionn...
	**/
	function __construct() {
        parent::__construct();
        if ($this->session->userdata('admin_login')==1) {
			redirect('admin','refresh');
		}  
    }

	public function index()
	{
		$this->load->view('login');
	}

	/**
	** Check Login
	**/
	public function attempt_login()
	{
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));

		$credentials = array('name' => $username, 'password' => $password);

		$query = $this->db->get_where('user',$credentials);

		if ($query->num_rows()>0) {
	        $data['admin_login'] = 1;
	        $data['username'] = $query->row()->name;
	     	$this->session->set_userdata($data);
	     	redirect('admin', 'refresh');
		}
		else{
			$data['message'] = "INVALID USERNAME OR PASSWORD!";
			$this->session->set_userdata($data);
			redirect(base_url(), 'refresh');
		}
	}


}
