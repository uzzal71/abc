<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
	
	public function index()
	{
		// Codding Here...
		$data['page_title'] = 'DASHBOARD';
		$data['avg_pdb'] = $this->test_model->get_pdb_energy();
		$data['avg_generator'] = $this->test_model->get_generator_energy();
		$data['main_contain'] = $this->load->view('file/dashboard.php', $data, true);
		$this->load->view('home', $data);
	}

	

}
