<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ajax_controller extends CI_Controller
{
	
   /**
    **
   **/
	function fetch_region_id()
	{
	   if($this->input->post('circle_id'))
		{
		echo $this->ajax->fetch_region_id($this->input->post('circle_id'));
		}
	}

	/**
	**
	**/
	 function fetch_site_id()
	 {
	    if($this->input->post('region_id'))
	    {
	    echo $this->ajax->fetch_site_id($this->input->post('region_id'));
	    }
	}

	 /**
	 **
	 **/
	function fetch_circle()
	{
	    if($this->input->post('node_type'))
	    {
	    echo $this->ajax->fetch_circle($this->input->post('node_type'));

	    }
	}

	 /**
	 **
	 **/
	function fetch_region_for_search()
	{
		$circle_id = $this->input->post('circle_id');

		if($circle_id)
		{
		  $node_type = $this->input->post('node_type');
		  echo $this->ajax->fetch_region_for_search($circle_id,$node_type);
		}
	}

	/**
	**
	**/
	function fetch_site_for_search()
	{
	    $region_id = $this->input->post('region_id');
	    $circle_id = $this->input->post('circle_id');

	    if($region_id)
	    {
	    $node_type = $this->input->post('node_type');

	    echo $this->ajax->fetch_site_for_search($circle_id,$region_id,$node_type);
	    }
	}

	/**
	**
	**/
	public function fetch_node_id()
	{
	    $region_id = $this->input->post('region_id');
	    $circle_id = $this->input->post('circle_id');
	    $site_id =$this->input->post('site_id');

	    if($site_id)
	    {
		    $node_type = $this->input->post('node_type');
		    echo $this->ajax->fetch_node_id($circle_id,$region_id,$site_id,$node_type);
	  	}
	}

	/**
	**
	**/
	function fetch_region()
	 {
	    if($this->input->post('circle_id'))
	    {
	    echo $this->ajax->fetch_region($this->input->post('circle_id'));
	    }
	 }

 	/**
 	**
 	**/
 	function fetch_siteid()
	 {
	    if($this->input->post('region_id'))
	    {
	    echo $this->ajax->fetch_siteid($this->input->post('region_id'));
	    }
	 }

	 /**
	 **
	 **/
	  public function fetch_device()
	 {
	    if($this->input->post('site_id'))
	    {
	    echo $this->ajax->fetch_device($this->input->post('site_id'));
	    }
	 }


 	/**
 	**
 	**/
 	 public function fetch_node()
	 {
	    if($this->input->post('device_id'))
	    {
	    echo $this->ajax->fetch_node($this->input->post('device_id'));
	    }
	 }



}
