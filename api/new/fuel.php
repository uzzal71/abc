<?php
	require_once ('db.php');

	date_default_timezone_set('Asia/Dhaka');

$device_id = $_GET['device_id'];

$sql = "SELECT site_id FROM device WHERE device_id = '$device_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $site_id = $row["site_id"];
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
         $site_name = $row["site_name"];         
    }

}


$sql = "SELECT * FROM data_range WHERE id = '9'";

$results = $conn->query($sql);

//print_r($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {

         $fuel_max_range=$row["max_range"];
         $fuel_min_range=$row["min_range"];  

       //print_r($vll_max_range);

    }

}	

	$date_time = date("Y-m-d");		
	$node = explode(";",$_GET['node']);
	//$fuel = explode(";",$_GET['fuel']);
	$quantity = explode(";",$_GET['quantity']);	
	$no_of_records = $_GET['no_of_records'];

	$count=0;
	
	for($i = 0; $i < $no_of_records; $i++)
	{		
        if ($quantity[$i] == "Disconnected") {
            $quantity[$i] = 'NULL';
        }
	$sql = "INSERT INTO fuel (device_id, circle_id, region_id, site_id, node_id, quantity, date_time, status) 
	VALUES('$device_id', '$circle_id','$region_id','$site_id', '$node[$i]',$quantity[$i], NOW(),'1')";				
			
	$row = $conn->query($sql);	

$msg1="";$msg2="";

if($quantity[$i] > $fuel_max_range)

{

$msg1= "Huge quantity".',Q='.$quantity[$i];

$sql = "INSERT INTO alarm (device_id, site_id, parameter, value, remarks, date_time, status) VALUES ('$device_id', '$site_id','fuel Quantity','$quantity[$i]','High', NOW(), '0')";
$row = $conn->query($sql);
}
			 
if($quantity[$i] < $fuel_min_range)

{
$msg2= "Low quantity".',Q='.$quantity[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value, remarks, date_time, status) VALUES ('$device_id', '$site_id','fuel Quantity','$quantity[$i]','low', NOW(), '0')";
$row = $conn->query($sql);
}

 }

echo '{"result": "sucess"}';
$mssg = 'Site ID : '. $site_id . ', Site Name : ' . $site_name .', message : '. $msg1.' '.$msg2; 
$send_msg = str_replace(',,',',',$mssg);

if(strlen($send_msg) > 4) {

 $token = "736236549:AAFS5uo1_0sHXIVWo4LlGNl8P-IRENIybUE";

$data = [
    'text' => $send_msg,
    'chat_id' => '-340494196'
];

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data)) ;  

 // 
 // <script type="text/javascript">
 //     window.location = 'https://api.telegram.org/bot736236549:AAFS5uo1_0sHXIVWo4LlGNl8P-IRENIybUE/sendMessage?chat_id=-340494196&text='+ <?php echo $send_msg; 
 // </script>
 // <?php   
	
// echo "<script>window.location = 'http://166.62.16.132/ALLSMS/smssend.php?phone=$phone1&text=$send_msg&user=csl&password=csl20182ra'</script>";

/*header("Location:http://166.62.16.132/ALLSMS/smssend.php?phone=$phone1&text=$send_msg&user=csl&password=csl20182ra");*/

}

?>


