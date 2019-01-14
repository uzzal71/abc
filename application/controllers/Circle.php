<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Circle extends CI_Controller
{
	/**
	** Circle Class Constructor Functionn...
	**/
	public function __construct() {
        parent::__construct();
         if ($this->session->userdata('admin_login')!=1) {
			redirect(base_url(''),'refresh');
		}  
    }

    /**
    ** Add Circle View Page
    **/
    public function add_circle()
    {
        // Codding Here...
        $data['page_title'] = 'ADD CIRCLE';
        $data['main_contain'] = $this->load->view('circle/add_circle.php', $data, true);
        $this->load->view('home', $data);
    }

    /**
    ** Circle Save Data
    **/

    public function circle_save()
    {
        $result = $this->circle->save_data();
        if($result > 0)
        {
            $data['message'] = "CIRCLE ADD SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "CIRCLE ADD FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('CREATE-CIRCLE'), 'refresh');

    }

    /**
    ** Circle List Page
    **/
    public function circle_list()
    {
         // Codding Here...
        $data['page_title'] = 'CIRCLE LIST';
        $data['circle_list'] = $this->circle->circle_list();
        $data['main_contain'] = $this->load->view('circle/circle_list.php', $data, true);
        $this->load->view('home', $data);
    }

    /**
    ** Circle Edit Page View
    **/
    public function circle_edit($id)
    {
         // Codding Here...
        $data['page_title'] = 'CIRCLE EDIT';
        $data['specific_circle'] = $this->circle->specific_circle($id);
        $data['main_contain'] = $this->load->view('circle/circle_edit.php', $data, true);
        $this->load->view('home', $data);
    }

    /**
    ** Circle Update function
    **/
    public function circle_update($id)
    {
        $result = $this->circle->update_data($id);
        if($result > 0)
        {
            $data['message'] = "CIRCLE UPDATE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "CIRCLE UPDATED VALUE NO CHANGE!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('CIRCLE-LIST'), 'refresh');

    }

    /**
    ** Circle delete
    **/
    public function circle_delete($id)
    {
        $result = $this->circle->circle_delete($id);
        if($result > 0)
        {
            $data['message'] = "CIRCLE DELETE SUCCESS!";
            $this->session->set_userdata($data);
        }
        else
        {
            $data['error'] = "CIRCLE DELETE FAILED!";
            $this->session->set_userdata($data);
        }

        redirect(base_url('CIRCLE-LIST'), 'refresh');

    }
    

}
