<?php
	require_once ('db.php');

	date_default_timezone_set('Asia/Dhaka');

$device_id = $_GET['device_id'];

$sql = "SELECT site_id FROM device WHERE device_id = '$device_id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) 

{
    // output data of each row
    while($row = $result->fetch_assoc()) {

         $site_id=$row["site_id"];         

    }

}

	$date = date("Y-m-d H:i:s");

	$node = explode(";",$_GET['node']);

	$io['io'] = explode(";",$_GET['io_no']);

	$name_io['name'] = explode(";",$_GET['io_name']);	

	$no_of_records = $_GET['no_of_records'];

	//print_r($node);
	$count=0;	

	for($i = 0; $i < $no_of_records; $i++)

		for ($j=0; $j <4 ; $j++) 

{


		$io_no = explode(",", $io['io'][$i]);

		$io_name = explode(",", $name_io['name'][$i]);	

        $sql = "INSERT INTO io (device_id, site_id, node, io_no, io_name, date_time, io_status) 
              VALUES('$device_id', '$site_id', '$node[$i]','$io_no[$j]','$io_name[$j]','$date','1')";	

		$row = $conn->query($sql);



}

	echo '{"result": "sucess"}';

?>
