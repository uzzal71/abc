<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sheet extends CI_Controller
{
	/**
	** Data Sheet Class Constructor Functionn...
	**/
	public function __construct() {
        parent::__construct();
         if ($this->session->userdata('admin_login')!=1) {
			redirect(base_url(''),'refresh');
		}  
    }


	/**
	** Site Alarm
	**/
	public function site_alarm()
	{
		 // Codding Here...
        $data['page_title'] = 'SITE ALARM LIST';
        $data['site_list'] = $this->data_sheet->site_status_true_list(); 	
	    $data['alarm_site'] = $this->data_sheet->site_alarm_list(); 
        $data['main_contain'] = $this->load->view('data_sheet/site_alarm.php', $data, true);
        $this->load->view('home', $data);
	}


	/**
	** Updated Site Data
	**/
	public function updated_site_data()
	{
		 // Codding Here...
        $data['page_title'] = 'UPDATED DATA SHEET'; 
		$data['get_site'] = $this->data_sheet->fetch_site();
		$data['search_energy'] = $this->data_sheet->search_energy_all();
		$data['search_time_hum'] = $this->data_sheet->search_time_hum_all();
		$data['search_fuel'] = $this->data_sheet->search_fuel_all();
		$data['search_io'] = $this->data_sheet->search_io_all();
        $data['main_contain'] = $this->load->view('data_sheet/update_site_data.php', $data, true);
        $this->load->view('home', $data);
	}


	/**
	**
	**/
	public function search_site_data()
	{
		$data['get_site'] = $this->data_sheet->fetch_site();
		$data['page_title'] = 'UPDATED DATA SHEET';
	    $site_id = $this->input->post('site_id');
	    $data['site_id_check'] = $site_id;    
	    if ($site_id=='all')
	    {
	     	redirect(base_url('UPDATED-SITE-DATA'), 'refresh');
	    }
	    else
	    {
		    $data['time_hum_get'] = $this->data_sheet->time_hum_get($site_id);
		    $data['energy_meter_get'] = $this->data_sheet->energy_meter_get($site_id);  
			$data['search_fuel'] = $this->data_sheet->search_fuel($site_id);
			$data['search_io'] = $this->data_sheet->search_io($site_id); 
			$data['get_device'] = $this->data_sheet->get_sitedata_by_id($site_id); 
			$data['get_site'] = $this->data_sheet->get_site();

			if ($data['time_hum_get'] != null && !empty($data['time_hum_get']))
			{
				$data['main_contain'] = $this->load->view('data_sheet/search_site_data.php', $data, true);
			}
			elseif ($data['energy_meter_get'] != null && !empty($data['energy_meter_get']))
			{
				$data['main_contain'] = $this->load->view('data_sheet/search_site_data.php', $data, true);
			}
			elseif ($data['search_fuel'] != null && !empty($data['search_fuel']))
			{
				$data['main_contain'] = $this->load->view('data_sheet/search_site_data.php', $data, true);;
			}
			elseif ($data['search_io'] != null && !empty($data['search_io']))
			{
				$data['main_contain'] = $this->load->view('data_sheet/search_site_data.php', $data, true);
			}
			elseif ($data['time_hum_get'] != null && !empty($data['time_hum_get']) && $data['energy_meter_get'] != null && !empty($data['energy_meter_get']) && $data['search_fuel'] != null && !empty($data['search_fuel']) && $data['search_io'] != null && !empty($data['search_io']))
			{
				$data['main_contain'] = $this->load->view('data_sheet/search_site_data.php', $data, true);
			}
			else
			{
				$data['main_contain'] = $this->load->view('data_sheet/search_site_data_fail.php', $data, true);
			}

			}
			
			$this->load->view('home', $data);

	}

	/**
	** Fetch Data
	**/
	function fetch_data()
	{
	   if($this->input->post('site_id'))
	   {
	   echo $this->data_sheet->fetch_data($this->input->post('site_id'));
	   }
	}

	/**
	** ALL SITE ALARM DISPLAY
	**/
	function site_alarm_display($id)
	{
		$data['page_title'] = 'SITE - '.$id.' - ALARM DISPLAY';
	    $data['alarm'] = $this->data_sheet->get_report_by_id($id); 
	    $get_device =	$this->data_sheet->get_device_by_site($id); 
	    if ($get_device)
	    {
	    	 $data['node_name']=$get_device->node_name;
	    }

	    $data['get_range'] = $this->data_sheet->get_range_id(); 
	    $data['id'] = $id;
	    $data['main_contain'] = $this->load->view('data_sheet/site_alarm_display.php', $data, true);
		$this->load->view('home',$data);

	}


}
