<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
	/**
	** Report Class Constructor Functionn...
	**/
	function __construct() {
        parent::__construct();
        if ($this->session->userdata('admin_login')!=1) {
			redirect(base_url(''),'refresh');
		}      
    }

    /**
    ** Report Class Collection Report Page View Function...
    **/
	public function report_search(){
		// Codding Here...
		$data['page_title'] = 'REPORT SEARCH';
		$data['get_node_type'] = $this->report->get_node_type();
        $data['get_circle'] = $this->report->get_circle();
		$data['main_contain'] = $this->load->view('report/report_search.php', $data, true);
		$this->load->view('home',$data);
	}

	/**
	** Report Class Sticker Report Page View Function...
	**/
	public function sticker_report(){
		// Codding Here...
		$data['page_title'] = 'STICKER REPORT';
		$data['main_contain'] = $this->load->view('report/sticker_report.php', $data, true);
		$this->load->view('home',$data);
	}

	/**
    ** Report Class Fail Report Page View Function...
    **/
	public function fail_report(){
		// Codding Here...
		$data['page_title'] = 'FAIL REPORT';
		$data['main_contain'] = $this->load->view('report/fail_report.php', $data, true);
		$this->load->view('home',$data);
	}

	/**
	**
	**/
	function search_report_result()
	{
	   $node_type = $this->input->post('node_type');
	   $circle_id = $this->input->post('circle_id');
	   $region_id = $this->input->post('region_id');
	   $site_id = $this->input->post('site_id');
	   $node_id = $this->input->post('node_id');
	   $from_date = $this->input->post('from_date');
	   $to_date = $this->input->post('to_date');

	   	$data['site_id'] = $site_id;

	    if($node_type==1)
	    {
			$data['report_energy'] = $this->report->search_report_energy($circle_id,$region_id,$site_id,$node_id,$from_date,$to_date);
			$data['page_title'] = 'ENERGY METER REPORT';
			$data['main_contain'] = $this->load->view('report/energy_meter_report.php',$data, true);
		}
		else if ($node_type==2) {
			$data['report_temp'] = $this->report->search_report_temp($circle_id,$region_id,$site_id,$node_id,$from_date,$to_date);
			$data['page_title'] = 'TEMPERATURE AND HUMIDITY REPORT';
			$data['main_contain'] = $this->load->view('report/temp_humidity_report',$data, true);
		}
		else if ($node_type==3)
		{
			$data['report_fuel'] = $this->report->search_report_fuel($circle_id,$region_id,$site_id,$node_id,$from_date,$to_date);
			$data['page_title'] = 'FUEL REPORT';
			$data['main_contain'] = $this->load->view('report/fuel_report.php',$data, true);
		}

		else if ($node_type==4)
		{
			$data['report_io'] = $this->report->search_report_io($circle_id,$region_id,$site_id,$node_id,$from_date,$to_date);
			$data['page_title'] = 'IO CARD REPORT';
			$data['main_contain'] = $this->load->view('report/io_input_report.php',$data, true);
		}

	    $this->load->view('home',$data);
	}



}
