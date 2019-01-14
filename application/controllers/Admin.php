<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
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
	** Admin Class Dashboard Page View Functionn...
	**/
	public function index()
	{
		// Codding Here...
		$data['page_title'] = 'DASHBOARD';
		$data['get_circle'] = $this->admin->get_circle_status_true();
		$data['get_avg_humidity'] = $this->admin->get_avg_humidity();
		$data['avg_temp'] = $this->admin->get_avg_temp();
		$data['avg_pdb'] = $this->admin->get_pdb_energy();
		$data['avg_generator'] = $this->admin->get_generator_energy();
		$data['main_contain'] = $this->load->view('file/dashboard.php', $data, true);
		$this->load->view('home', $data);
	}

	/**
	** User Logout
	**/
	public function logout(){
		$this->session->unset_userdata('admin_login');
        $username= $this->session->userdata('username');
        $this->session->unset_userdata('username');
        $data=array();
        $data['message']='LOGOUT SUCCESSFUL, GOOD BYE!';
        $this->session->set_userdata($data);
        redirect(base_url(), 'refresh');
	}


	/**
	** Change Password
	**/
	public function change_password_save()
	{
	 	$username = $this->input->post('username', true);
	 	$password = $this->input->post('password', true);
	 	$confirm_password = $this->input->post('confirm_password', true);

	 	$result = $this->admin->check_hava_user($username);
	 	
	     if(isset($result->name))
	     {
	     	if($password == $confirm_password)
	     	{
	     		$update_result = $this->admin->update_password($username, $password);
	     		if($update_result)
	     		{
	     		   $data['error'] = "PASSWORD CHANGE SUCCESSFUL!";
	               $this->session->set_userdata($data);
	       	       redirect(base_url('CHANGE-PASSWORD'), 'refresh');
	     		}else{
	     		   $data['error'] = "PASSWORD NOT CHANGE!";
	               $this->session->set_userdata($data);
	       	       redirect(base_url('CHANGE-PASSWORD'), 'refresh');
	     		}

	     	}else{
	     	   $data['error'] = "CONFIRM PASSWORD DID NOT MATCH!";
	           $this->session->set_userdata($data);
	       	   redirect(base_url('CHANGE-PASSWORD'), 'refresh');
	     	}
	     }else{

	      $data['error'] = "INVALID USERNAME!";
          $this->session->set_userdata($data);
       	  redirect(base_url('CHANGE-PASSWORD'), 'refresh');
	     }
	}

	/**
	**
	**/
	public function dashboard_search()
	{
		$circle_id = $this->input->post('circle_id', true);
		$region_id = $this->input->post('region_id', true);
		$site_id = $this->input->post('site_id', true);
		$day_ago = $this->input->post('day_count', true);
		$day = '-'.$day_ago.' days';
		$date_time = date('Y-m-d', strtotime($day));


		if($circle_id == 'all' && $region_id == 'all' && $site_id == 'all')
		{
			$sql = "SELECT (SELECT AVG(`positive_real_energy`) FROM `energy_meter` WHERE CAST(`date_time` AS date) > '$date_time' AND `node_id`= 3 ) AS energy_pdb, (SELECT AVG(`positive_real_energy`) FROM `energy_meter` WHERE CAST(`date_time` AS date) > '$date_time' AND `node_id` = 4 ) AS energy_gte, (SELECT AVG(`temp`) FROM `temp_humidity` WHERE CAST(`date_time` AS date) > '$date_time') AS temp, (SELECT AVG(`humidity`) FROM `temp_humidity` WHERE CAST(`date_time` AS date) > '$date_time') AS humidity ";

		}
		else if($circle_id != 'all' && $region_id == 'all' && $site_id == 'all')
		{
			$sql = "SELECT (SELECT AVG(`positive_real_energy`) FROM `energy_meter` WHERE CAST(`date_time` AS date) > '$date_time' AND `node_id`= 3 AND circle_id = $circle_id) AS energy_pdb, (SELECT AVG(`positive_real_energy`) FROM `energy_meter` WHERE CAST(`date_time` AS date) > '$date_time' AND `node_id` = 4 AND circle_id = $circle_id) AS energy_gte,  (SELECT AVG(`temp`) FROM `temp_humidity` WHERE CAST(`date_time` AS date) > '$date_time' AND circle_id = $circle_id) AS temp, (SELECT AVG(`humidity`) FROM `temp_humidity` WHERE CAST(`date_time` AS date) > '$date_time' AND circle_id = $circle_id) AS humidity ";

		}
		else if($circle_id != 'all' && $region_id != 'all' && $site_id == 'all')
		{
			$sql = "SELECT (SELECT AVG(`positive_real_energy`) FROM `energy_meter` WHERE CAST(`date_time` AS date) > '$date_time' AND `node_id`= 3  AND circle_id = $circle_id AND region_id = $region_id) AS energy_pdb, (SELECT AVG(`positive_real_energy`) FROM `energy_meter` WHERE CAST(`date_time` AS date) > '$date_time' AND `node_id` = 4  AND circle_id = $circle_id AND region_id = $region_id) AS energy_gte,  (SELECT AVG(`temp`) FROM `temp_humidity` WHERE CAST(`date_time` AS date) > '$date_time' AND circle_id = $circle_id AND region_id = $region_id) AS temp, (SELECT AVG(`humidity`) FROM `temp_humidity` WHERE CAST(`date_time` AS date) > '$date_time' AND circle_id = $circle_id AND region_id = $region_id) AS humidity ";


		}
		else if($circle_id != 'all' && $region_id != 'all' && $site_id != 'all')
		{
			$sql = "SELECT (SELECT AVG(`positive_real_energy`) FROM `energy_meter` WHERE CAST(`date_time` AS date) > '$date_time' AND `node_id`= 3  AND circle_id = $circle_id AND region_id = $region_id AND site_id = $site_id) AS energy_pdb, (SELECT AVG(`positive_real_energy`) FROM `energy_meter` WHERE CAST(`date_time` AS date) > '$date_time' AND `node_id` = 4  AND circle_id = $circle_id AND region_id = $region_id AND site_id = $site_id) AS energy_gte,  (SELECT AVG(`temp`) FROM `temp_humidity` WHERE CAST(`date_time` AS date) > '$date_time' AND circle_id = $circle_id AND region_id = $region_id AND site_id = $site_id) AS temp, (SELECT AVG(`humidity`) FROM `temp_humidity` WHERE CAST(`date_time` AS date) > '$date_time' AND circle_id = $circle_id AND region_id = $region_id AND site_id = $site_id) AS humidity ";
		}

		$query_result = $this->db->query($sql);
	    $result = $query_result->row();

		$data['page_title'] = 'DASHBOARD';
		$data['get_circle'] = $this->admin->get_circle_status_true();
		$data['get_avg_humidity'] = $result->humidity;
		$data['avg_temp'] = $result->temp;
		$data['avg_pdb'] = $result->energy_pdb;
		$data['avg_generator'] = $result->energy_gte;
		$data['main_contain'] = $this->load->view('file/dashboard_search.php', $data, true);
		$this->load->view('home', $data);
	}




}
