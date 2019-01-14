<?php
	require_once ('db.php');

	date_default_timezone_set('Asia/Dhaka');

$device_id = $_GET['device_id'];

$sql = "SELECT * FROM data_range";
$result = $conn->query($sql);

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

echo '{Node Voltage Max :'.$node_volt_max.'}';

 
	

	

?>
