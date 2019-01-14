<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class api_model extends CI_Model
{
    public function device_all_data()
    {
        return $this->db->select('*')->from('temp_humidity')->order_by('id','desc')->get()->result();
    }

    public function temp_humidity_create_data($data)
    {
    	if($data['temp'] = 0)
    	{
    		$data['temp'] = NULL;
    	}
    	if($data['humidity'] == 0)
    	{
    		$data['humidity'] = NULL;
    	}
        $this->db->insert('temp_humidity',$data);
        return array('status' => 201,'message' => 'Data has been created.');
    }

}