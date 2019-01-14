<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller
{
	public function index()
	{
		$config = Array(
	    'protocol' => 'smtp',
	    'smtp_host' => '166.62.16.132',
	    'smtp_port' => '',
	    'smtp_user' => 'kaniz@2ra-bd.net',
	    'smtp_pass' => 'Kaniz2018',
	    'mailtype'  => 'html', 
	    'charset'   => 'iso-8859-1',
	    'smtp_crypto' => 'ssl'
	     );

		$send_msg = "Hello world!";
	    $this->load->library('email', $config);
	    $this->email->set_newline("\r\n");    
	    $this->email->from('kaniz@2ra-bd.net');
	    $this->email->to('uzzalroy.acm@gmail.com'); 
	    $this->email->subject('Alarm message from ABC');
	    $this->email->message($send_msg);  
	    
	    if($this->email->send())
	    {
	    	echo "Your mail send, foo!";
	    }
	    else
	    {
	    	show_error($this->email->print_debugger());
	    }

	}
}

?>