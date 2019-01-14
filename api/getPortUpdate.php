<?php
	require_once ('db.php');

	date_default_timezone_set('Asia/Dhaka');

$device_id = $_GET['device_id'];

$sql = "SELECT site_id,bank FROM device WHERE device_id = '$device_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $site_id=$row["site_id"];
         $bank=$row["bank"];
    }

}

$sql = "SELECT * FROM data_range";

$result = $conn->query($sql);

print_r($result);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

         $node_volt_max=$row["node_volt_max"];
         $node_volt_min=$row["node_volt_min"];
         $main_volt_max=$row["main_volt_max"];
         $main_volt_min=$row["main_volt_min"];
         $node_temp_max=$row["node_temp_max"];
         $node_temp_min=$row["node_temp_min"];
         $main_temp_max=$row["main_temp_max"];
         $main_temp_min=$row["main_temp_min"];
         $main_amp_max=$row["main_amp_max"];
         $main_amp_min=$row["main_amp_min"]; 

    }

}

	$date = date("Y-m-d H:i:s");
	//$time = explode(";",$_GET['date']);
	$node = explode(";",$_GET['node']);
	$volt = explode(";",$_GET['volt']);
	$temp = explode(";",$_GET['temp']);
	$amp = explode(";",$_GET['amp']);
	$ir = explode(";",$_GET['ir']);
	$no_of_records = $_GET['no_of_records'];

	$count=0;
	
	for($i = 0; $i < $no_of_records; $i++)
	{
		

		 		$sql = "INSERT INTO tbl_data_log (device_id, date, site_id, bank, node, volt, temp, amp, ir,status) VALUES('$device_id', '$date', '$site_id', '$bank', '$node[$i]', '$volt[$i]', '$temp[$i]', '$amp[$i]', '$ir[$i]','1')";				
			
			     $row = $conn->query($sql);


if(($volt[$i] > $node_volt_max || $volt[$i] < $node_volt_min) || ($temp[$i] > $main_volt_max || $temp[$i] < $main_volt_min)  || ($amp[$i] > $main_amp_max || $amp[$i] < $main_amp_min))

{


$sql = "INSERT INTO alarm (device_id, site_id, volt, temp, amp, ir, status) VALUES('$device_id', '$site_id', '$volt[$i]', '$temp[$i]', '$amp[$i]', '$ir[$i]','0')";				
			
			     $row = $conn->query($sql);

}


		
	
}



	echo '{"result": "sucess"}';

?>
