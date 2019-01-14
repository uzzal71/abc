<?php
	require_once ('db.php');

	date_default_timezone_set('Asia/Dhaka');



$device_id = $_GET['device_id'];

$sql = "SELECT distinct site_id FROM device WHERE device_id = '$device_id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $site_id=$row["site_id"];         
    }

}

$sql = "SELECT * FROM site WHERE site_id = '$site_id'";
$resultt = $conn->query($sql);


if ($resultt->num_rows > 0) {
    // output data of each row
    while($row = $resultt->fetch_assoc())
     {
         $site_id = $row["site_id"];
         $circle_id = $row["circle_id"];
         $region_id = $row["region_id"];
         $phone1 = $row["phone1"];
         $email1 = $row["email1"];          
    }

}

	// For start VLL Data........

$sql = "SELECT * FROM data_range WHERE id = '1'";

$results = $conn->query($sql);

//print_r($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {

         $vll_max_range=$row["max_range"];
         $vll_min_range=$row["min_range"];  
         //$vll_parametr=$row["min_range"];  

       //print_r($vll_max_range);

    }

}
	// For start VLn Data........

$sql = "SELECT * FROM data_range WHERE id = '2'";

$results = $conn->query($sql);

//print_r($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {

         $vln_max_range=$row["max_range"];
         $vln_min_range=$row["min_range"];  

       //print_r($vll_max_range);

    }

}

	// For start Generator phase current Data........

$sql = "SELECT * FROM data_range WHERE id = '3'";

$results = $conn->query($sql);

//print_r($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {

         $pc_max_range=$row["max_range"];
         $pc_min_range=$row["min_range"];  

       //print_r($vll_max_range);

    }

}	


// For start Generator power per phase Data........

$sql = "SELECT * FROM data_range WHERE id = '4'";

$results = $conn->query($sql);

//print_r($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {

         $pp_max_range=$row["max_range"];
         $pp_min_range=$row["min_range"]; 
         //print_r($vll_max_range);

    }

}


// For start Total power Data........

$sql = "SELECT * FROM data_range WHERE id = '5'";

$results = $conn->query($sql);

//print_r($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {

         $tp_max_range=$row["max_range"];
         $tp_min_range=$row["min_range"];  
         //print_r($vll_max_range);
    }

}

// For start Frequency Data........

$sql = "SELECT * FROM data_range WHERE id = '6'";

$results = $conn->query($sql);

//print_r($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {

         $freq_max_range=$row["max_range"];
         $freq_min_range=$row["min_range"];  

       //print_r($vll_max_range);
    }

}
	$date_time = date("Y-m-d H:i:s");
	$node = explode(";",$_GET['node']);
	$positive_real_energy = explode(";",$_GET['positive_real_energy']);
	$total_real_power = explode(";",$_GET['total_real_power']);
	$total_apparent_power = explode(";",$_GET['total_apparent_power']);
	$total_reactive_power = explode(";",$_GET['total_reactive_power']);
	$total_power_factor = explode(";",$_GET['total_power_factor']);
	$frequency = explode(";",$_GET['frequency']);
	$instantaneous_current_l1 = explode(";",$_GET['instantaneous_current_l1']);
	$instantaneous_current_l2 = explode(";",$_GET['instantaneous_current_l2']);
	$instantaneous_current_l3 = explode(";",$_GET['instantaneous_current_l3']);
	$instantaneous_current_ln = explode(";",$_GET['instantaneous_current_ln']);
	$voltage_phase_l12 = explode(";",$_GET['voltage_phase_l12']);
	$voltage_phase_l23 = explode(";",$_GET['voltage_phase_l23']);
	$voltage_phase_l31 = explode(";",$_GET['voltage_phase_l31']);
	$voltage_phase_l1 = explode(";",$_GET['voltage_phase_l1']);
	$voltage_phase_l2 = explode(";",$_GET['voltage_phase_l2']);
	$voltage_phase_l3 = explode(";",$_GET['voltage_phase_l3']);
	$real_power_l1 = explode(";",$_GET['real_power_l1']);
	$real_power_l2 = explode(";",$_GET['real_power_l2']);
	$real_power_l3 = explode(";",$_GET['real_power_l3']);
	$no_of_records = $_GET['no_of_records'];
	$count=0;
	
	for($i = 0; $i < $no_of_records; $i++)
	{
		if ($node[$i]=='disconnected') {
			$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,status) VALUES ('$device_id', '$site_id','Node','Disconnected','Disconnected','0')";
         $rows = $conn->query($sql);
		}

	else{

		if($positive_real_energy[$i] == "Disconnected") {
			$positive_real_energy[$i] = 'NULL';
		}
		if($total_real_power[$i] == "Disconnected"){
			$total_real_power[$i] = 'NULL';
		}
		if($total_apparent_power[$i] == "Disconnected"){
			$total_apparent_power[$i] = 'NULL';
		}
		if($total_reactive_power[$i] == "Disconnected"){
			$total_reactive_power[$i] = 'NULL';
		}
		if($total_power_factor[$i] == "Disconnected"){
			$total_power_factor[$i] = 'NULL';
		}
		if($frequency[$i] == "Disconnected"){
			$frequency[$i] = 'NULL';
		}
		if($instantaneous_current_l1[$i] == "Disconnected"){
			$instantaneous_current_l1[$i] = 'NULL';
		}
		if($instantaneous_current_l2[$i] == "Disconnected"){
			$instantaneous_current_l2[$i] = 'NULL';
		}
		if($instantaneous_current_l3[$i] == "Disconnected"){
			$instantaneous_current_l3[$i] = 'NULL';
		}
		if($instantaneous_current_ln[$i] == "Disconnected"){
			$instantaneous_current_ln[$i] = 'NULL';
		}
		if($voltage_phase_l12[$i] == "Disconnected"){
			$voltage_phase_l12[$i] = 'NULL';
		}
		if($voltage_phase_l23[$i] == "Disconnected"){
			$voltage_phase_l23[$i] = 'NULL';
		}
		if($voltage_phase_l31[$i] == "Disconnected"){
			$voltage_phase_l31[$i] = 'NULL';
		}
		if($voltage_phase_l1[$i] == "Disconnected"){
			$voltage_phase_l1[$i] = 'NULL';
		}
		if($voltage_phase_l2[$i] == "Disconnected"){
			$voltage_phase_l2[$i] = 'NULL';
		}
		if($voltage_phase_l3[$i] == "Disconnected"){
			$voltage_phase_l3[$i] = 'NULL';
		}
		if($real_power_l1[$i] == "Disconnected"){
			$real_power_l1[$i] = 'NULL';
		}
		if($real_power_l2[$i] == "Disconnected"){
			$real_power_l2[$i] = 'NULL';
		}
		if($real_power_l3[$i] == "Disconnected"){
			$real_power_l3[$i] = 'NULL';
		}


	$sql = "INSERT INTO energy_meter (device_id, circle_id, region_id, site_id, node_id, positive_real_energy, total_real_power, total_apparent_power, total_reactive_power, total_power_factor, frequency, instantaneous_current_l1,instantaneous_current_l2,instantaneous_current_l3,instantaneous_current_ln,voltage_phase_l12,voltage_phase_l23,voltage_phase_l31,voltage_phase_l1,voltage_phase_l2,voltage_phase_l3,real_power_l1,real_power_l2,real_power_l3,date_time,status) 
	VALUES('$device_id', '$circle_id', '$region_id', '$site_id', '$node[$i]', $positive_real_energy[$i], $total_real_power[$i], $total_apparent_power[$i], $total_reactive_power[$i], $total_power_factor[$i], $frequency[$i], $instantaneous_current_l1[$i],$instantaneous_current_l2[$i],$instantaneous_current_l3[$i],$instantaneous_current_ln[$i],$voltage_phase_l12[$i],$voltage_phase_l23[$i],$voltage_phase_l31[$i],$voltage_phase_l1[$i],$voltage_phase_l2[$i],$voltage_phase_l3[$i],$real_power_l1[$i],$real_power_l2[$i],$real_power_l3[$i],NOW(),'1')";				
			
			     $row = $conn->query($sql);
			     $real1 = $real_power_l1[$i];
			     $real2 = $real_power_l2[$i];
			     $real3 = $real_power_l3[$i];			     
			     $total_power[$i] = $real1+$real2+$real3;

$msg1="";$msg2="";$msg3="";$msg4="";$msg5="";$msg6="";$msg7="";$msg8="";$msg9="";$msg10="";$msg11="";$msg12="";$msg13="";$msg14="";$msg15="";$msg16="";$msg17="";$msg18="";$msg19="";$msg20="";$msg21="";$msg22="";$msg23="";$msg24="";$msg25="";$msg26="";$msg27="";

if($voltage_phase_l12[$i] > $vll_max_range)
{

$msg1= "high V12".',V='.$voltage_phase_l12[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l12','$voltage_phase_l12[$i]','High', NOW(), '0')";
$rows = $conn->query($sql);

}
			 
if($voltage_phase_l12[$i] < $vll_min_range)
{

$msg2= "Low V12".',V='.$voltage_phase_l12[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value, remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l12','$voltage_phase_l12[$i]','low', NOW(), '0')";
$row = $conn->query($sql);

 }

if($voltage_phase_l23[$i] > $vll_max_range)
{

$msg3= "High V23".',V='.$voltage_phase_l23[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l23','$voltage_phase_l23[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

}

if($voltage_phase_l23[$i] < $vll_min_range)
{

$msg4= "Low V23".',V='.$voltage_phase_l23[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l23','$voltage_phase_l23[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

}

if($voltage_phase_l31[$i] > $vll_max_range)
{

$msg5= "High V31".',V='.$voltage_phase_l31[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l31','$voltage_phase_l31[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

}

if($voltage_phase_l31[$i] < $vll_min_range){

$msg5= "Low V31".',V='.$voltage_phase_l31[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l31','$voltage_phase_l31[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

}

if($voltage_phase_l1[$i] > $vln_max_range){

$msg6= "High V1".',V='.$voltage_phase_l1[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l1','$voltage_phase_l1[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

 }

if($voltage_phase_l1[$i] < $vln_min_range){

$msg7= "Low V1".',V='.$voltage_phase_l1[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l1','$voltage_phase_l1[$i]','Low',' NOW(), 0')";
$row = $conn->query($sql);

}


if($voltage_phase_l2[$i] > $vln_max_range){

$msg8= "High V2".',V='.$voltage_phase_l2[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l2','$voltage_phase_l2[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

}

if($voltage_phase_l2[$i] < $vln_min_range){

$msg9= "Low V2".',V='.$voltage_phase_l2[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l2','$voltage_phase_l2[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

}
			 
if($voltage_phase_l3[$i] > $vln_max_range){

$msg10= "High V3".',V='.$voltage_phase_l3[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l3','$voltage_phase_l3[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

}

if($voltage_phase_l3[$i] < $vln_min_range){

$msg11= "Low V3".',V='.$voltage_phase_l3[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','voltage_phase_l3','$voltage_phase_l3[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

}

if($instantaneous_current_l1[$i] > $pc_max_range){

$msg12= "High I1".',I='.$instantaneous_current_l1[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','instantaneous_current_l1','$instantaneous_current_l1[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

}

if($instantaneous_current_l1[$i] < $pc_min_range){

$msg13= "Low I1".',I='.$instantaneous_current_l1[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','instantaneous_current_l1','$instantaneous_current_l1[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);
}

if($instantaneous_current_l2[$i] > $pc_max_range){

$msg14= "High I2".',I='.$instantaneous_current_l2[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','instantaneous_current_l2','$instantaneous_current_l2[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

}

if($instantaneous_current_l2[$i] < $pc_min_range){

$msg15= "Low I2".',I='.$instantaneous_current_l2[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','instantaneous_current_l2','$instantaneous_current_l2[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

}

if($instantaneous_current_l3[$i] > $pc_max_range){

$msg16= "High I3".',I='.$instantaneous_current_l3[$i];
$sql ="INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','instantaneous_current_l3','$instantaneous_current_l3[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

}

if($instantaneous_current_l3[$i] < $pc_min_range){

$msg17= "Low I3".',I='.$instantaneous_current_l3[$i];
$sql ="INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','instantaneous_current_l3','$instantaneous_current_l3[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

}
if($instantaneous_current_ln[$i] > $pc_max_range){

$msg18= "High In".',I='.$instantaneous_current_ln[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','instantaneous_current_ln','$instantaneous_current_ln[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

}

if($instantaneous_current_ln[$i] < $pc_min_range){

$msg19= "Low In".',I='.$instantaneous_current_ln[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','instantaneous_current_ln','$instantaneous_current_ln[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

}

if($real_power_l1[$i] > $pp_max_range){

$msg20= "High real_power_l1".',P='.$real_power_l1[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','real_power_l1','$real_power_l1[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

}

if($real_power_l1[$i] < $pp_min_range){

$msg21= "Low real_power_l1".',P='.$real_power_l1[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','real_power_l1','$real_power_l1[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

 }

if($real_power_l2[$i] > $pp_max_range){

$msg22= "High real_power_l2".',P='.$real_power_l2[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','real_power_l2','$real_power_l2[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

}

if($real_power_l2[$i] < $pp_min_range){

$msg23= "Low real_power_l2".',P='.$real_power_l2[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','real_power_l2','$real_power_l2[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

}
if($real_power_l3[$i] > $pp_max_range){

$msg23= "High real_power_l3".',P='.$real_power_l3[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','real_power_l3','$real_power_l3[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

}

if($real_power_l3[$i] < $pp_min_range){

$msg24= "Low real_power_l3".',P='.$real_power_l3[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','real_power_l3','$real_power_l3[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

			 }		

if($total_power[$i] > $tp_max_range){

$msg25= "High real_power_l3".',P='.$real_power_l3[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','total_power','$total_power[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

			 }

if($total_power[$i] < $tp_min_range){

$msg26= "Low total_power".',P='.$total_power[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','total_power','$total_power[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

			 }

if($frequency[$i] > $freq_max_range){

	$msg27= "High frequency".',F='.$frequency[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','frequency','$frequency[$i]','High', NOW(), '0')";
$row = $conn->query($sql);

			 }

if($frequency[$i] < $freq_min_range){

$msg28= "Low frequency".',F='.$frequency[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES('$device_id', '$site_id','frequency','$frequency[$i]','Low', NOW(), '0')";
$row = $conn->query($sql);

			 }
	   }	
}

echo '{"result": "sucess"}';
$mssg=$msg1.';'.$msg2.';'.$msg3.';'.$msg4.';'.$msg5.';'.$msg6.';'.$msg7.';'.$msg8.';'.$msg9.';'.$msg10.';'.$msg11.';'.$msg12.';'.$msg13.';'.$msg14.';'.$msg15.';'.$msg16.';'.$msg17.';'.$msg18.';'.$msg19.';'.$msg20.';'.$msg21.';'.$msg22.';'.$msg23.';'.$msg24.';'.$msg25.';'.$msg26.';'.$msg27.';'.$msg28; 
//print_r($mssg);
$send_mssg = str_replace(';;',';',$mssg);
$send_msg = str_replace(';;',';',$send_mssg);
if(strlen($send_msg) > 4) {

 $token = "736236549:AAFS5uo1_0sHXIVWo4LlGNl8P-IRENIybUE";

$data = [
    'text' => $send_msg,
    'chat_id' => '-340494196'
];

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));  

}
//print_r($send_msg);

/**
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
**/     
//     $this->load->library('email', $config);
//     $this->email->set_newline("\r\n");    
//     $this->email->from('kaniz@2ra-bd.net', 'kaniz@2ra-bd.net');
//     $this->email->to('kanizsnigdha@gmail.com'); 
//     $this->email->subject('Alarm message from ABC');
//     $this->email->message($send_msg);  
//     $this->email->send();
//     redirect('http://166.62.16.132/abc/application/');
    
// window.location = 'http://166.62.16.132/abc/application/controllers/Login'

// echo "<script>


// window.location = 'http://166.62.16.132/ALLSMS/smssend.php?phone=$phone1&text=$send_msg&user=csl&password=csl20182ra'





// </script>";


/*header("Location:http://166.62.16.132/ALLSMS/smssend.php?phone=$phone1&text=$send_msg&user=csl&password=csl20182ra");*/




 

// start mail portion-------------------------------

    // $config['protocol']    = 'smtp';
    // $config['smtp_host']    = 'ssl://smtp.gmail.com';
    // $config['smtp_port']    = '465';
    // $config['smtp_timeout'] = '7';
    // $config['smtp_user']    = 'something@gmail.com';
    // $config['smtp_pass']    = '*****';
    // $config['charset']    = 'utf-8';
    // $config['newline']    = "\r\n";
    // $config['mailtype'] = 'text'; // or html
    // $config['validation'] = TRUE; // bool whether to validate email or not     

    // $this->email->initialize($config);
    // $this->email->from('kanizsnigdha@gmail.com', 'kanizsnigdha');
    // $this->email->to('snigdhakaniz@gmail.com'); 
    // $this->email->subject('Alarm from ABC');
    // $this->email->message($send_msg);  
    // $this->email->send();

// end mail portion-------------------------------

?>
