<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
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
    public function create_user()
    {
    	// Codding Here...
        $data['page_title'] = 'ADD USER';
        $data['main_contain'] = $this->load->view('user/add_user.php', $data, true);
        $this->load->view('home', $data);
    }

    /**
    **
    **/
    public function user_list()
    {
    	// Codding Here...
        $data['page_title'] = 'USER LIST';
        $data['user_list'] = $this->user->user_list();
        $data['main_contain'] = $this->load->view('user/user_list.php', $data, true);
        $this->load->view('home', $data);
    }

    /**
    **
    **/
    public function user_edit($id)
    {
    	// Codding Here...
        $data['page_title'] = 'EDIT USER';
        $data['edit_user'] = $this->user->get_specific_user($id);
        $data['main_contain'] = $this->load->view('user/user_edit.php', $data, true);
        $this->load->view('home', $data);
    }

    /**
    **
    **/
    public function user_save()
    {
    	$result = $this->user->save_user();
    	if($result > 0)
    	{
    		$data['message'] = "USER SAVE SUCCESS!";
    		$this->session->set_userdata($data);
    	}
    	else
    	{
    		$data['error'] = "USER SAVE UNSUCCESS!";
    		$this->session->set_userdata($data);
    	}
    	redirect(base_url('USER-LIST'), 'refresh');        
    }

    /**
    ** user update
    **/
    public function user_update($id)
    {
        $result = $this->user->update_data($id);
        if($result > 0)
        {
            $data['message'] = "USER UPDATE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "USER UPDATE UNSUCCESS!";
            $this->session->set_userdata($data);
        }
        redirect(base_url('USER-LIST'), 'refresh');
    }
    
    /**
    ** user delete info
    **/
    public function user_delete($id)
    {
        $result = $this->user->user_delete($id);
        if($result > 0)
        {
            $data['message'] = "USER DELETE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "USER DELETE UNSUCCESS!";
            $this->session->set_userdata($data);
        }
        redirect(base_url('USER-LIST'), 'refresh');
    }



}
?>