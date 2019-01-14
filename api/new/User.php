<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() 

	{	parent::__construct ();		
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('parser');
		$this->load->library('form_validation');
		$this->load->library('table');
		$this->load->library('upload');
		$this->load->dbforge();
		$this->load->database();
        $this->load->model( 'main_model');

        

        /*if ($this->session->userdata('admin_login') != 1) {

				redirect(site_url(), 'refresh');
		}*/
	}

	function index()
	{
		if ($this->session->userdata('admin_login')==1) {
			
			redirect(site_url('User/dashboard'),'refresh');
		}

		$this->load->view('index');
	}

// Start login session.........................

   function user_login(){

		$userID = $this->input->post('userID');

		$password = $this->input->post('password');

		$credentials = array('name' => $userID, 'password' => $password, 'status' => 1 );
		
		$query = $this->db->get_where('user',$credentials);

		if ($query->num_rows()>0) 

		{

			$this->session->set_userdata('admin_login',1);

			$this->session->set_userdata('login_type','admin');

			$this->session->set_userdata('email',$query->row()->email);

			$this->session->set_userdata('phone',$query->row()->phone);

			$this->session->set_userdata('menu_permitted',$query->row()->menu_permitted);			

			redirect(site_url('User/dashboard'), 'refresh');

		}

		$error = "Username & password not match!";
		
		$this->session->set_userdata('error', $error);
		//$this->load->view('index', 'refresh');
		$this->index();

	}

	function logout()
	{

		$this->session->sess_destroy();

		$message = "Logout sucessfuly!";

		$this->session->set_userdata('message', $message);

		//$this->index();

		redirect(site_url('User/index'), 'refresh');
		//redirect(site_alarm);

		//$this->load->view('User/index.php', 'refresh');
	}


// End login session...........................


	function dashboard()
	
	{	
	    $this->load->model( 'main_model');

	    $data['site'] = $this->main_model->get_site(); 	

	    $data['alarm_site'] = $this->main_model->get_alarm_site(); 

        //print_r($data['alarm_site']);

		$this->load->view('dashboard',$data);


	}

	function site_alarm($id)

	{
        $this->load->model( 'main_model');

	    $data['alarm'] = $this->main_model->get_report_by_id($id); 

	    $get_device =	$this->main_model->get_device_by_site($id); 

	    if ($get_device) {
	    	 $data['node_name']=$get_device->node_name;
	    }

	

	    //print_r($device);

	    $data['get_range'] = $this->main_model->get_range_id(); 

	    $data['id'] = $id;

	    //print_r($data['get_range']->node_volt_max);

		$this->load->view('bank_alarm',$data);

	}


function add_site()

	{
	    $this->load->model('main_model');

	    $data['get_circle'] = $this->main_model->get_circle();	

		$this->load->view('add_site',$data);
    }


     function fetch_region()

 {
    if($this->input->post('circle_id'))

    {

    $this->load->model( 'main_model' );

    echo $this->main_model->fetch_region($this->input->post('circle_id'));

    }

 }

function fetch_circle()

 {
    if($this->input->post('node_type'))

    {

    $this->load->model( 'main_model' );

    echo $this->main_model->fetch_circle($this->input->post('node_type'));

    }

 }



 function fetch_region_for_search()

 {

 	$circle_id = $this->input->post('circle_id');

    if($circle_id)

    {

    $node_type = $this->input->post('node_type');

    $this->load->model( 'main_model' );

    echo $this->main_model->fetch_region_for_search($circle_id,$node_type);

    }


 }


 function fetch_site_for_search()

 {

    $region_id = $this->input->post('region_id');

    $circle_id = $this->input->post('circle_id');

    if($region_id)

    {

    $node_type = $this->input->post('node_type');

    $this->load->model( 'main_model' );

    echo $this->main_model->fetch_site_for_search($circle_id,$region_id,$node_type);

    }


 }


 function fetch_nodeid()

 {
    $region_id = $this->input->post('region_id');

    $circle_id = $this->input->post('circle_id');

    $site_id =$this->input->post('site_id');

    if($site_id)

    {

    $node_type = $this->input->post('node_type');

    $this->load->model( 'main_model' );

    echo $this->main_model->fetch_nodeid($circle_id,$region_id,$site_id,$node_type);

    }

 }

	function save_site()

	{
		$circle_id = $this->input->post('circle_id');
		$region_id = $this->input->post('region_id');
		$site_id = $this->input->post('site_id');		
	    $site_name = $this->input->post('site_name');
	    $phone1 = $this->input->post('phone1');
	    $phone2 = $this->input->post('phone2');
	    $email1 = $this->input->post('email1');
	    $email2 = $this->input->post('email2');
	    $this->load->model( 'main_model' );
$data = $this->main_model->save_site($circle_id,$region_id,$site_id,$site_name,$phone1,$phone2,$email1,$email2);
        redirect('/User/view_site');

	}

     function view_site()

	{

	  $this->load->model( 'main_model');
	  $data['site'] = $this->main_model->get_site(); 
	  //$data['alarm'] = $this->main_model->get_report_by_id($id); 
	  //$get_device =	$this->main_model->get_device_by_site($id); 
	  //$data['node_name']=$get_device->node_name;
	  //print_r($data['site']);
      $this->load->view('view_site',$data);

	}

	
 // function view_temp_humidity()

	// {
	//   $this->load->model( 'main_model');
	//   $data['temp_humidity'] = $this->main_model->get_temp_humidity(); 
	//   //print_r($data['site']);
 //      $this->load->view('view_temp_humidity',$data);
	// }	

 function view_fuel()

	{
	  $this->load->model( 'main_model');
	  $data['get_fuel'] = $this->main_model->get_fuel(); 
	  //print_r($data['site']);
      $this->load->view('view_fuel',$data);

	}

    function edit_site($id)

	{
	   $this->load->model( 'main_model');
	   $data['get_site'] = $this->main_model->get_site_by_id($id); 
	   $this->load->view('edit_site',$data);
	}   

    function save_edit_site($id)
   
    { 
	    $site_id = $this->input->post('site_id');
	    $site_name = $this->input->post('site_name');	    
	    $phone1 = $this->input->post('phone1');	    
	    $phone2 = $this->input->post('phone2');	    
	    $email1 = $this->input->post('email1');	    
	    $email2 = $this->input->post('email2'); 
	    $this->load->model( 'main_model' );
	    $this->main_model->save_edit_site($id,$site_id,$site_name,$phone1,$phone2,$email1,$email2);
        redirect('/User/view_site');
    } 
   
	function add_device()

	{

	   $this->load->model( 'main_model' );
	   $data['get_circle'] = $this->main_model->get_circle();
	   $data['get_site'] = $this->main_model->get_site();	  
	   $data['get_node_type'] = $this->main_model->get_node_list();
       $this->load->view('add_device',$data);

	}

	function save_device()

	{
		$circle_id = $this->input->post('circle_id');
	    $region_id = $this->input->post('region_id');
	    $site_id = $this->input->post('site_id');
	    $device_id = $this->input->post('device_id');
	    $device_name = $this->input->post('device_name');	   
	    $node_type = $this->input->post('node_type');	    
	    $product_name['product'] = $this->input->post('product_name[]');
	    $node_name['node_name'] = $this->input->post('node_name[]');	   
	    $products = $product_name['product'];
	    $node_name = $node_name['node_name'];	    
	    $this->load->model('main_model' );	   
$data = $this->main_model->save_device($circle_id,$region_id,$site_id,$device_id,$device_name,$node_type,$products,$node_name);
        redirect('/User/view_device');
        
	}

	function view_device()

	{

	  $this->load->model('main_model');
	  $data['device'] = $this->main_model->get_device();
	  //print_r($data['device']);
      $this->load->view('view_device',$data);

	}

	function edit_device($id)

	{
	   $this->load->model('main_model');
	   $data['get_device'] = $this->main_model->get_device_by_id($id); 
	   $data['node_type'] = $this->main_model->get_node_list(); 
	   $data['get_site'] = $this->main_model->get_site();
       $this->load->view('edit_device',$data);
	}


	 function save_edit_device($id)
   
    {     
	    $device_id = $this->input->post('device_id');
	    $device_name = $this->input->post('device_name');	    
	    $site_id = $this->input->post('site_id');	    
	    $node_type = $this->input->post('node_type');	    
	    $node_id = $this->input->post('node_id'); 
	    $node_name = $this->input->post('node_name'); 	   
	    $this->load->model( 'main_model' );
	  $this->main_model->save_edit_device($id,$device_id,$device_name,$site_id,$node_type,$node_id,$node_name);
        redirect('/User/view_device');

    } 

	function delete_device($id)
	
	{
	   $this->load->model('main_model');
	   $data['del_device'] = $this->main_model->delete_device($id); 
	   redirect('User/view_device','refresh');
	}
     

// Start circle part-------------------------------

 function add_circle()

	{
       $this->load->view('circle_add');
	}

   function save_circle()

   {    $circle_id = $this->input->post('circle_id');
	    $circle_name = $this->input->post('circle_name');
	    $this->load->model( 'main_model' );
	    $data = $this->main_model->save_circle($circle_id,$circle_name);
        redirect('/User/view_circle');
	}

	function view_circle()

	{
      $this->load->model('main_model');
	  $data['circle'] = $this->main_model->get_circle();
      $this->load->view('view_circle',$data);
	}

    function edit_circle($id)

    {
       $this->load->model('main_model');	  
	   $data['get_circle'] = $this->main_model->get_circle_by_id($id);
       $this->load->view('edit_circle',$data);
     }

     function save_edit_circle($id)

     {
        $circle_id = $this->input->post('circle_id');
	    $circle_name = $this->input->post('circle_name');
	    $this->load->model( 'main_model' );
	    $data = $this->main_model->save_edit_circle($id,$circle_id,$circle_name);
        redirect('/User/view_circle','refresh');
	 }   

     function delete_circle($id)

     {

       $this->load->model('main_model');
	   $data['del_circle'] = $this->main_model->delete_circle($id); 
	   redirect('User/view_circle','refresh');

     }

     function delete_region($id)

     {

       $this->load->model('main_model');
	   $data['del_region'] = $this->main_model->delete_region($id); 
	   redirect('User/view_region','refresh');

     }

// End circle part---------------------------------
// Start circle part-------------------------------

     function add_region()

	 {
	   $this->load->model( 'main_model' );
	   $data['get_circle'] = $this->main_model->get_circle();
       $this->load->view('add_region',$data);
	 }

     function save_region()

    {    
   	    $circle_id = $this->input->post('circle_id');
	    $region_id = $this->input->post('region_id');
	    $region_name = $this->input->post('region_name');
	    $this->load->model( 'main_model' );
	    $data = $this->main_model->save_region($circle_id,$region_id,$region_name);
        redirect('/User/view_region');
	}

    function view_region()

    {
      $this->load->model('main_model');
	  $data['get_region'] = $this->main_model->get_region();
      $this->load->view('view_region',$data);
    }

    function edit_region($id)

    {

       $this->load->model('main_model');
       $data['get_circle'] = $this->main_model->get_circle();
	   $data['get_region'] = $this->main_model->get_region_by_id($id);	   
       $this->load->view('edit_region',$data);

    }

    function save_edit_region($id)

     {
        $circle_id = $this->input->post('circle_id');
        $region_id = $this->input->post('region_id');
	    $region_name = $this->input->post('region_name');
	    $this->load->model( 'main_model' );
	    $data = $this->main_model->save_edit_region($id,$circle_id,$region_id,$region_name);
        redirect('/User/view_region','refresh');
	 }   


     // End circle part---------------------------------

     // start new report-------------------


    function report_search()

    {
       $this->load->model( 'main_model');
       $data['get_node_type'] = $this->main_model->get_node_type();
       $data['get_circle'] = $this->main_model->get_circle();
	   $data['get_site'] = $this->main_model->get_site();
	   $data['get_node_device'] = $this->main_model->get_node_in_device();
       $this->load->view('report_search',$data);

    }



 function fetch_siteid()
 {
    if($this->input->post('region_id'))
    {
    $this->load->model( 'main_model' );
    echo $this->main_model->fetch_siteid($this->input->post('region_id'));
    }
 }


     // end new report-------------------


    function report(/*$index = 0*/)
	
	{

     $this->load->model('main_model');

        // $this->load->library('pagination');
        // $config['base_url'] = site_url('User/report/');       
        // $config['first_link'] = 'First';
        // $config['last_link'] = 'Last';
        // $config['total_rows'] = count($this->main_model->get_report());
        // $config['per_page'] = 20;
        // $TotalRecord = $config['per_page'];
        // $config['full_tag_open'] = '<ul class="pagination">';
        // $config['full_tag_close'] = '</ul>';        
        // $config['first_tag_open'] = '<li>';
        // $config['first_tag_close'] = '</li>';
        // $config['prev_link'] = '&laquo';
        // $config['prev_tag_open'] = '<li class="prev">';
        // $config['prev_tag_close'] = '</li>';
        // $config['next_link'] = '&raquo';
        // $config['next_tag_open'] = '<li>';
        // $config['next_tag_close'] = '</li>';
        // $config['last_tag_open'] = '<li>';
        // $config['last_tag_close'] = '</li>';
        // $config['cur_tag_open'] = '<li class="active"><a href="#">';
        // $config['cur_tag_close'] = '</a></li>';
        // $config['num_tag_open'] = '<li>';
        // $config['num_tag_close'] = '</li>';
        // $this->pagination->initialize($config);
        // $data['result'] =$this->main_model->find_limit($TotalRecord,$index);
        // $data['links']= $this->pagination->create_links();
       
       $data['result'] = $this->main_model->get_report();
       //$data['get_site'] = $this->main_model->get_site();
       $data['get_device'] = $this->main_model->get_device();
       $this->load->view('report',$data);
	}

	function search_report()

	{
       $this->load->model('main_model');
       $site_id = $this->input->post('selectLoco');
	   $bank = $this->input->post('selectbank');
	   $f_date = $this->input->post('f_date');
	   $t_date = $this->input->post('t_date');
       $data['result'] = $this->main_model->report_data($site_id,$bank,$f_date,$t_date);
       print_r($data['result']);
       $data['get_device'] = $this->main_model->get_device();
       $this->load->view('report',$data);

	}

	function archive($id)

	{
       $this->load->model( 'main_model');
       $this->main_model->del_report_data($id);
       redirect('User/report','refresh');
	}
     


    /// For sending SMS---------------------START
     
//     function sms_code_send($number='01733444989',$message='testing')

//     {

//     $username   = 'csl';
//     $password   = 'csl20182ra';
//     $originator = 'sender name';
//     $message    = 'Welcom to ......, your activation code is : '.$message;
//     //set POST variables
//     $url = 'http://166.62.16.132/ALLSMS/smssend.php?';

//     $fields = array(
//       'username'   => urlencode($username),
//       'password'   => urlencode($password),
//       'originator' => urlencode($originator),
//       'phone'      => urlencode($number),
//       'msgtext'    => urlencode($message)
//      );

//     $fields_string = '';

//     //url-ify the data for the POST
//     foreach($fields as $key=>$value)
//     {
//       $fields_string .= $key.'='.$value.'&';
//     }

//     rtrim($fields_string,'&');

//     //open connection
//     $ch = curl_init();

//     //set the url, number of POST vars, POST data
//     curl_setopt($ch,CURLOPT_URL,$url);
//     curl_setopt($ch,CURLOPT_POST,count($fields));
//     curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

//     //execute post
//     $result = curl_exec($ch);

//     //close connection
//     curl_close($ch);
//     return $result;
// }

    // END SMS section-----------------------




    function add_range()

    {

       //$this->load->model( 'main_model');
       //$data['get_range'] = $this->main_model->get_range();
       $this->load->view('add_range');

       //$sending = http_post("localhost", 8080, array("Username" => 'kaniz', "SendTo" => '+8801786663900', "Message" => 'this is test'));
		
	}

	function save_range()

	{
        $param_name = $this->input->post('param_name');
	    $max_range = $this->input->post('max_range');
	    $min_range = $this->input->post('min_range');
	    //$node_type = $this->input->post('node_type');
	    //$node_id = $this->input->post('node_id');
	    $this->load->model('main_model' );
	    $data = $this->main_model->save_range($param_name,$max_range,$min_range);
        redirect('/User/range');

	}


    function range()

	{  		
	   $this->load->model( 'main_model');
       $data['get_range'] = $this->main_model->get_range();
       $this->load->view('range',$data);
	}
	
	function edit_range($id)
	
	{
       $this->load->model( 'main_model');
	   $data['get_range_data'] = $this->main_model->get_range_by_id($id); 
	   //$data['get_site'] = $this->main_model->get_site();
       $this->load->view('edit_range',$data);
	}

    function save_edit_range($id)    
    {     
	    $parameter_name = $this->input->post('parameter_name');
	    $max_range = $this->input->post('max_range');
	    $min_range = $this->input->post('min_range');
	   
	    $this->load->model( 'main_model' );
	    $this->main_model->save_edit_range($id,$parameter_name,$max_range,$min_range);
        redirect('/User/range');
    }  


    // Start Create User -------------------------

    function create_users()
	{
       $this->load->model( 'main_model' );
       $data['get_site'] = $this->main_model->get_site();
       $this->load->view('create_users',$data);       
	}


    function save_user()
    
    {
        $user_id = $this->input->post('user_id');
	    $password = $this->input->post('password');	   
	    $email = $this->input->post('email');	   
	    $phone = $this->input->post('phone');	    	   
	    $created_at = date("Y-m-d H:i:s");        
        $add_site = $this->input->post('add_site');
        $site_list = $this->input->post('site_list');
        $add_device = $this->input->post('add_device');
        $device_list = $this->input->post('device_list');
        $create_user = $this->input->post('create_user');
        $user_list = $this->input->post('user_list');
        $report = $this->input->post('report');
        $data_range = $this->input->post('data_range');
        $dashboard = $this->input->post('dashboard');
$str = $add_site.','.$site_list.','.$add_device.','.$device_list.','.$create_user.','.$user_list.','.$report.','.$data_range.','.$dashboard;
        $permission = str_replace(',,',',',$str);
        $all = str_replace(',,',',',$permission);
        $menu_permission= trim($all, ',');	    	   
	    $this->load->model('main_model' );
	    $data = $this->main_model->save_user($user_id,$password,$email,$phone,$created_at,$menu_permission);
        redirect('/User/list_user');

}
// End Create User  -------------------------

	function list_user()

	{
       $this->load->model('main_model' );
	   $data['user_list'] = $this->main_model->get_user_list();
       $this->load->view('list_data',$data);
	}


	function change_pass()

	{
       $this->load->model('main_model' );
	   $data['user_list'] = $this->main_model->get_user_list();
       $this->load->view('change_pass',$data);
	}

	function save_change_pass()

	{
        $node_type = $this->input->post('node_type'); 
	    $this->load->model('main_model' );
	    $data = $this->main_model->save_node_type($node_type);
	    redirect('/User/view_node_type');
	}


	function edit_user($id)

	{
       $this->load->model('main_model' );
	   $data['edit_user'] = $this->main_model->get_user_data_by_id($id);
	   $data['menu']=$data['edit_user']->menu_permitted;
	   $data['menu_print'] = explode(",", $data['menu']);
	   $data['datas']=count($data['menu_print']);
	   //print_r($menu_print[0]);	   
       $this->load->view('edit_user',$data);
	}


	function edit_save_user($id)

	{
        $user_id = $this->input->post('user_id');
	    $password = $this->input->post('password');	   
	    $email = $this->input->post('email');	   
	    $phone = $this->input->post('phone');	    	   
	    $created_at = date("Y-m-d H:i:s");        
        $add_site = $this->input->post('add_site');
        $site_list = $this->input->post('site_list');
        $add_device = $this->input->post('add_device');
        $device_list = $this->input->post('device_list');
        $create_user = $this->input->post('create_user');
        $user_list = $this->input->post('user_list');
        $report = $this->input->post('report');
        $data_range = $this->input->post('data_range');
        $dashboard = $this->input->post('dashboard');    
       
        $str = $add_site.','.$site_list.','.$add_device.','.$device_list.','.$create_user.','.$user_list.','.$report.','.$data_range.','.$dashboard;

        $permission=str_replace(',,',',',$str);
        $all=str_replace(',,',',',$permission);
        $menu_permission= trim($all, ',');
        //print_r($p);
	    //$created_by = $this->input->post('phone');	    	   
	    $this->load->model('main_model');
	    $data = $this->main_model->edit_save_user($id,$user_id,$password,$email,$phone,$created_at,$menu_permission);
        redirect('/User/list_user');

	}


	function add_node_type()
	{
       $this->load->view('add_node_type');
	}


	function save_node_type()

	{
        $node_type = $this->input->post('node_type');
	    $this->load->model('main_model' );
	    $data = $this->main_model->save_node_type($node_type);
	    redirect('/User/view_node_type');
	}


	function view_node_type()

	{
       $this->load->model('main_model' );
	   $data['node_list'] = $this->main_model->get_node_list();
       $this->load->view('view_node_type',$data);
	}


	function edit_node_type($id)
	
	{
       $this->load->model( 'main_model');
	   $data['get_node_type'] = $this->main_model->get_node_type_by_id($id); 
	   //$data['get_site'] = $this->main_model->get_site();
       $this->load->view('edit_node_type',$data);
	}

    function save_edit_node_type($id)
    
    {     
	    $node_type = $this->input->post('node_type');
	    $this->load->model( 'main_model' );
	    $this->main_model->save_edit_node_type($id,$node_type);
        redirect('/User/view_node_type');
    }  

    function del_node_type($id)

    {
    	$this->load->model( 'main_model' );
	    $this->main_model->del_node_type($id);
        redirect('/User/view_node_type');
    }

    // start IO card----------------------
 

	function save_io(){

        $site_id = $this->input->post('site_id');
        $device_id = $this->input->post('device_id');
	    $node_id = $this->input->post('node_id');
	    $io_no = $this->input->post('io_no');
	    $io_name = $this->input->post('io_name');
	    //$io_status = $this->input->post('io_status');
	    if ($this->input->post('io_status')==1) {
	    	    $io_status=1;	    	    
	    	    }	
	    	    else {
                $io_status=0;
	    	    }    
	    $this->load->model('main_model' );
	    $data = $this->main_model->save_io($site_id,$device_id,$node_id,$io_no,$io_name,$io_status);
        redirect('/User/view_io');
	}

	function view_io()

	{
       $this->load->model('main_model' );
	   $data['get_io'] = $this->main_model->get_io();
       $this->load->view('view_io',$data);
	}


  //selection io start----------------------

  function add_io()

	{
	   $this->load->model( 'main_model' );
	   $data['get_site'] = $this->main_model->fetch_site();
	   //$data['get_io_node'] = $this->main_model->get_node_by_io();
	   //$data['get_device_by_site'] = $this->main_model->get_device_by_site();
       $this->load->view('add_io',$data);
	}
  function io_control()

	{
	   $this->load->model( 'main_model' );
	   $site_id = $this->input->post('site_id');
       $device_id = $this->input->post('device_id');
	   $node_id = $this->input->post('node_id');
	   
       $this->load->view('io_control',$data);
	}

  
 function fetch_device()
 {
    if($this->input->post('site_id'))
    {
    $this->load->model( 'main_model' );
    echo $this->main_model->fetch_device($this->input->post('site_id'));
    }
 }

 function fetch_node()
 {
    if($this->input->post('device_id'))
    {
    $this->load->model( 'main_model' );
    echo $this->main_model->fetch_node($this->input->post('device_id'));
    }
 }



function fetch_data(){
 if($this->input->post('site_id'))
    {
    $this->load->model( 'main_model' );
    echo $this->main_model->fetch_data($this->input->post('site_id'));
    }


}
 function edit_io($id)
 {
       $this->load->model( 'main_model' );
	   $data['get_io_by_id'] = $this->main_model->get_io_data($id);	   
       $this->load->view('edit_io',$data);
 }


 function save_edit_io($id) 
 {
       $site_id = $this->input->post('site_id');
       $device_id = $this->input->post('device_id');
       $node_id = $this->input->post('node_id');
       $io_no = $this->input->post('io_no');
       $io_name = $this->input->post('io_name');      
       $io_status = $this->input->post('io_status');
	   $this->load->model( 'main_model' );
	   $this->main_model->save_edit_io($id,$site_id,$device_id,$node_id,$io_no,$io_name,$io_status);
       redirect('/User/view_io');   
 }


 function view_io_data_log()
 
 {
       $this->load->model('main_model' );
	   $data['get_io'] = $this->main_model->get_io_data_log();
       $this->load->view('view_io_data_log',$data);
 }


function add_io_input()

{
      $this->load->model( 'main_model' );
   // $data['get_node'] = $this->main_model->get_node_by_io_output();
      $data['get_site'] = $this->main_model->fetch_site();
      $this->load->view('io_input_Add',$data);
}


function save_io_input()
{
	  $site_id = $this->input->post('site_id');
      $device_id = $this->input->post('device_id');
	  $node_id = $this->input->post('node_id');
	  $ac1 = $this->input->post('ac1');
	  $ac2 = $this->input->post('ac2');
	  $ac3 = $this->input->post('ac3');
	  $ac4 = $this->input->post('ac4');
	  $external1 = $this->input->post('external1');
	  $external2 = $this->input->post('external2');
	  $external3 = $this->input->post('external3');
	  $external4 = $this->input->post('external4');
	  $analogue1 = $this->input->post('analogue1');
	  $analogue2 = $this->input->post('analogue2');
	  $analogue3 = $this->input->post('analogue3');
	  $analogue4 = $this->input->post('analogue4'); 
	  $this->load->model('main_model' );
	  $this->main_model->save_io_input($site_id,$device_id,$node_id,$ac1,$ac2,$ac3,$ac4,$external1,$external2,$external3,$external4,$analogue1,$analogue2,$analogue3,$analogue4);
      redirect('/User/view_io_input_name');
}


function view_io_input_name()
{  
       $this->load->model('main_model');

	   $data['get_io_input_name'] = $this->main_model->get_io_input_name();

       $this->load->view('view_io_input_name',$data);

}

 function del_io($id)

 {     $this->load->model( 'main_model' );

	   $this->main_model->del_io($id);	

       redirect('/User/view_io');
 } 

 function view_io_input()

 {     $this->load->model('main_model' );

	   $data['get_io'] = $this->main_model->get_io_data_log();

       $this->load->view('view_io_data_log',$data);
 }

 function edit_io_input($id)

 { 	
      $this->load->model( 'main_model' );  

      $data['get_io_input'] = $this->main_model->get_io_input();

      $this->load->view('io_input_Add',$data);
 }

// selection io end------------------------
 
// End IO card-----------------------------

 function dashboard_single()
 
 {
      $this->load->model( 'main_model' ); 

	  $data['get_site'] = $this->main_model->fetch_site();

	  $data['search_energy'] = $this->main_model->search_energy_all();

	  $data['search_time_hum'] = $this->main_model->search_time_hum_all();
	  //print_r($data['search_energy']);
	  $data['search_fuel'] = $this->main_model->search_fuel_all();

	  $data['search_io'] = $this->main_model->search_io_all();

      $this->load->view('all_site_dashboard',$data);

 }

function search_site_data()

{
      $site_id = $this->input->post('site_id');    

      if ($site_id=='all') {
      	
      	redirect('/User/dashboard_single');
      }
    
     else {

      $this->load->model( 'main_model' );

      $data['time_hum_get'] = $this->main_model->time_hum_get($site_id);

      $data['energy_meter_get'] = $this->main_model->energy_meter_get($site_id);  

	  $data['search_fuel'] = $this->main_model->search_fuel($site_id);

	  $data['search_io'] = $this->main_model->search_io($site_id); 

	  $data['get_device'] = $this->main_model->get_sitedata_by_id($site_id); 

	  $data['get_site'] = $this->main_model->get_site();


if ($data['time_hum_get'] != null && !empty($data['time_hum_get'])) {
	$this->load->view('single_dashboard',$data);
}

elseif ($data['energy_meter_get'] != null && !empty($data['energy_meter_get'])) {
	$this->load->view('single_dashboard',$data);
}

elseif ($data['search_fuel'] != null && !empty($data['search_fuel'])) {
	$this->load->view('single_dashboard',$data);
}

elseif ($data['search_io'] != null && !empty($data['search_io'])) {
	$this->load->view('single_dashboard',$data);
}

elseif ($data['time_hum_get'] != null && !empty($data['time_hum_get']) && $data['energy_meter_get'] != null && !empty($data['energy_meter_get']) && $data['search_fuel'] != null && !empty($data['search_fuel']) && $data['search_io'] != null && !empty($data['search_io']))
    {

      $this->load->view('single_dashboard',$data);

 }


    else {

         $this->load->view('nodata',$data);

    }

	}

}


/*function report_search()

{
	   $this->load->model( 'main_model' );
	   $data['get_site'] = $this->main_model->get_site();
	   $data['get_node_device'] = $this->main_model->get_node_in_device();
       $this->load->view('report_search',$data);

}
*/

function temp_hum_report()

{
	   $this->load->model( 'main_model' );
	   $data['get_site'] = $this->main_model->get_site();
	   $data['get_temp'] = $this->main_model->get_temp_node_in_device();
       $this->load->view('temp_hum_search',$data);

}



function save_search_report()

{
   $node_type = $this->input->post('node_type');
   $circle_id = $this->input->post('circle_id');
   $region_id = $this->input->post('region_id');
   $site_id = $this->input->post('site_id');
   $node_id = $this->input->post('node_id');
   $from_date = $this->input->post('from_date');
   $to_date = $this->input->post('to_date');
   $this->load->model('main_model' );

   // node type----------------------

    if ($node_type==1) {

$data['report_energy'] = $this->main_model->search_report_energy($circle_id,$region_id,$site_id,$node_id,$from_date,$to_date);

$this->load->view('report',$data);

    }

    elseif ($node_type==2) {

$data['report_temp'] = $this->main_model->search_report_temp($node_type,$circle_id,$region_id,$site_id,$node_id,$from_date,$to_date);

$this->load->view('view_temp_humidity',$data);

    }

    elseif ($node_type==3) {

$data['report_fuel'] = $this->main_model->search_report_fuel($node_type,$circle_id,$region_id,$site_id,$node_id,$from_date,$to_date);

$this->load->view('view_fuel',$data);

    }

    elseif ($node_type==4) {

$data['report_io'] = $this->main_model->search_report_io($node_type,$circle_id,$region_id,$site_id,$node_id,$from_date,$to_date);

$this->load->view('view_io_data_log',$data);

    }

     // end node type----------------------
}


function save_temp_report()

{
      $site_id = $this->input->post('site_id');

	  $node_id = $this->input->post('node_id');

	  $from_date = $this->input->post('from_date'); 

	  $to_date = $this->input->post('to_date'); 

	  $this->load->model('main_model' );

      $data['temp_report'] = $this->main_model->save_temp_report($site_id,$node_id,$from_date,$to_date);

      $this->load->view('view_temp_humidity',$data);

}

function fuel_report()

{
	   $this->load->model( 'main_model' );

	   $data['get_site'] = $this->main_model->get_site();

	   $data['get_temp'] = $this->main_model->get_fuel_in_device();

       $this->load->view('fuel_search',$data);
}


function save_fuel_report()

{
      $site_id = $this->input->post('site_id');

	  $node_id = $this->input->post('node_id');

	  $from_date = $this->input->post('from_date');

	  $to_date = $this->input->post('to_date');

	  $this->load->model('main_model' );

      $data['fuel_report'] = $this->main_model->save_fuel_report($site_id,$node_id,$from_date,$to_date);

      $this->load->view('view_fuel',$data);

}


function io_search()

{
	   $this->load->model( 'main_model' );

	   $data['get_site'] = $this->main_model->get_site();

	   $data['get_io'] = $this->main_model->get_io_in_device();

       $this->load->view('io_search',$data);
}



function save_io_report()

{
      $site_id = $this->input->post('site_id');

	  $node_id = $this->input->post('node_id');

	  $from_date = $this->input->post('from_date'); 

	  $to_date = $this->input->post('to_date'); 

	  $this->load->model('main_model' );

      $data['io_report'] = $this->main_model->save_io_report($site_id,$node_id,$from_date,$to_date);

      $this->load->view('view_io_data_log',$data);


}

function email()

{
/*  $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'smtp.2ra-bd.net';
    $config['smtp_port']    = '25';
    $config['smtp_timeout'] = '7';
    $config['smtp_user']    = 'kaniz@2ra-bd.net';
    $config['smtp_pass']    = 'Kaniz2018';
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'text'; // or html
    $config['validation'] = TRUE;*/ // bool whether to validate email or not 

    $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.2ra-bd.net',
    'smtp_port' => '465',
    'smtp_user' => 'kaniz@2ra-bd.net',
    'smtp_pass' => 'Kaniz2018',
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1',
    'smtp_crypto' => 'ssl'
     );
     $this->load->library('email', $config);
     $this->email->set_newline("\r\n");
    // Set to, from, message, etc.        
    //$result = $this->email->send();
    //$this->email->initialize($config);
    $this->email->from('kaniz@2ra-bd.net', 'kaniz@2ra-bd.net');
    $this->email->to('rana@2ra-bd.net'); 
    $this->email->subject('Test alarm mail for ABC');
    $this->email->message('Testing the email for ABC project.');  
    $this->email->send();

    // echo "<script>window.location = 'http://166.62.16.132/ALLSMS/smssend.php?phone=$phone1&text=$send_msg&user=csl&password=csl20182ra'</script>";
    //echo $this->email->print_debugger();
    //echo "send";
    //$this->load->view('email_view');

   }

}
