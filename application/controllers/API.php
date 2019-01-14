<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller
{
	public function index()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
		        //$response = $this->MyModel->auth();
		        $response['status'] = 200;
		        if($response['status'] == 200){
		        	$resp = $this->api->temp_all_data();
	    			json_output($response['status'],$resp);
		        }	
		    }    	
	}

	/**
	**
	**/
	public function temp_humidity()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else{
			$params = json_decode(file_get_contents('php://input'), TRUE);
			if ($_POST['device_id'] == "" || $_POST['circle_id'] == "") {
			$respStatus = 400;
			$resp = array('status' => 400,'message' =>  'Device & Author can\'t empty', 'data' => $_POST);
			json_output($respStatus , $resp);
		} else {
    		$resp = $this->api->temp_humidity_create_data($_POST);
    		json_output(200, $resp);
		}
		}
	}
}