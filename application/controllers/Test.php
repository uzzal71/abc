<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
	
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

	

}
