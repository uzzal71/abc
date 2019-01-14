<?php
	require_once ('db.php');

	date_default_timezone_set('Asia/Dhaka');

$device_id = rtrim($_GET['device_id'], ';');

$sql = "SELECT site_id FROM device WHERE device_id = '$device_id' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
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
         $site_name = $row["site_name"];          
    }

}


$sql = "SELECT * FROM data_range WHERE id = '7'";

$results = $conn->query($sql);

//print_r($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {

         $temp_max_range=$row["max_range"];
         $temp_min_range=$row["min_range"];  

       //print_r($vll_max_range);
    }

}	
$sql = "SELECT * FROM data_range WHERE id = '8'";

$results = $conn->query($sql);

//print_r($sql);

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {

         $hum_max_range=$row["max_range"];
         $hum_min_range=$row["min_range"];  

       //print_r($vll_max_range);

    }

}	

	$date = date("Y-m-d");		
	$node = explode(";",$_GET['node']);
	$temp = explode(";",$_GET['temp']);
	$humidity = explode(";",$_GET['humidity']);	
	$no_of_records = $_GET['no_of_records'];

	$count=0;
	
	for($i = 0; $i < $no_of_records; $i++)
	{	
        if ($node[$i]=='Disconnected') {
			$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','Node','Disconnected','Disconnected', NOW(), '0')";
         $rows = $conn->query($sql);

		}
		if($temp[$i] == "Disconnected")
		{
			$temp[$i] = 'NULL';
		}
		if($humidity[$i] == "Disconnected")
		{
			$humidity[$i] = 'NULL';
		}


	$sql = "INSERT INTO temp_humidity(device_id, circle_id, region_id, site_id, node_id, temp, humidity, date_time, status) VALUES('$device_id', '$circle_id','$region_id','$site_id', '$node[$i]', $temp[$i], $humidity[$i], NOW(),'1')";			
			
	$row = $conn->query($sql);	

$msg1="";$msg2="";$msg3="";$msg4="";

if($temp[$i] > $temp_max_range)

{

$msg1= " high temp ".', T = '.$temp[$i]." in Node : ".$node[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value, remarks, date_time, status) VALUES ('$device_id', '$site_id','Temparature','$temp[$i]','High', NOW(), '0')";
$rows = $conn->query($sql);

}

			 
if($temp[$i] < $temp_min_range)
{

$msg2= "Low temp ".',T = '.$temp[$i]." in Node: ".$node[$i];

$sql = "INSERT INTO alarm (device_id, site_id, parameter, value, remarks,date_time, status) VALUES ('$device_id', '$site_id','Temparature','$temp[$i]','low', NOW(), '0')";
$row = $conn->query($sql);

}


if($humidity[$i] > $hum_max_range)

{

$msg3= "High Humidity ".', H = '.$humidity[$i]." in Node: ".$node[$i];
$sql = "INSERT INTO alarm (device_id, site_id, parameter, value,remarks,date_time, status) VALUES ('$device_id', '$site_id','Humidity','$humidity[$i]','High', NOW(), '0')";
$rows = $conn->query($sql);

}
			 
if($humidity[$i] < $hum_min_range)

{
$msg4= "Low Humidity ".', H = '.$humidity[$i]." in Node: ".$node[$i];

$sql = "INSERT INTO alarm (device_id, site_id, parameter, value, remarks,date_time, status) VALUES ('$device_id', '$site_id','Humidity','$humidity[$i]','low', NOW(), '0')";

$row = $conn->query($sql);

 }

$message_array = array();

if($msg1)
{
    //$sss .= $msg1.', ';
    array_push($message_array, $msg1);
}
if($msg2)
{
    //$sss .= $msg2.', ';
    array_push($message_array, $msg2);
}
if($msg3)
{
    //$sss .= $msg3.', ';
    array_push($message_array, $msg3);
}
if($msg4)
{
    //$sss .= $msg4.', ';
    array_push($message_array, $msg4);
}

$txt = '';
// Message send
$txt .= 'Site Id : '.$site_id. ' , ';
$txt .= 'Site Name : '.$site_name;
if(count($message_array) > 0)
{
    $txt = '';
    $i = 0; 
    while($i < count($message_array))
    {
        if($message_array[$i])
        {
        $txt .= $message_array[$i];
        if($message_array[$i++])
        {
            $txt .= '  ';
        }
    }
    }

 $token = "736236549:AAFS5uo1_0sHXIVWo4LlGNl8P-IRENIybUE";

$data = [
    'text' => $txt,
    'chat_id' => '-340494196'
];

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));  

}

$msg1="";$msg2="";$msg3="";$msg4="";
$txt;


}

echo '{"result": "sucess"}';

//print_r($send_msg);
//echo "<script>window.location = 'http://166.62.16.132/ALLSMS/smssend.php?phone=$phone1&text=$send_msg&user=csl&password=csl20182ra'</script>";
/*header("Location:http://166.62.16.132/ALLSMS/smssend.php?phone=$phone1&text=$send_msg&user=csl&password=csl20182ra");
*/

?>
