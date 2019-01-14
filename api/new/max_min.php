<?php
	require_once ('db.php');

//header ('content-type:: application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$method= $_SERVER['REQUEST_METHOD'];

switch ($method) {


	case 'GET':
		//echo '{"result": "get received"}';

	handlegetoperation();
		break;


	case 'POST':
		$data = json_decode(file_get_contents('php://input'),true);

		handlePostOperation($data);
		break;


	case 'PUT':
		# code...
		break;


	case 'DELETE':
		# code...
		break;
	
	default:
		# code...
		break;
}



function handlegetoperation(){


$device_id = $_GET['device_id'];
//require_once ('db.php');

$servername = "localhost";
$username = "root";
$password = "toor";
$dbname = "bvms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

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
         $time_interval=$row["time_interval"];
    }

}

	/*$date = date("Y-m-d H:i:s");
	//$site_id = $_GET['site_id'];
	//$bank = $_GET['bank'];
	$node = $_GET['node'];
	$volt = $_GET['volt'];
	$temp = $_GET['temp'];
	$amp = $_GET['amp'];
	$ir = $_GET['ir'];*/

	//$sql = "SELECT * FROM data_range WHERE id = '1'";
	
	//$sql = "INSERT INTO tbl_data_log(device_id, date, site_id, bank, node, volt, temp, amp, ir,status) VALUES('$device_id', '$date', '$site_id', '$bank', '$node', '$volt', '$temp', '$amp', '$ir','1')";

	if (mysqli_query($conn,$sql)){

     echo "{".'"'."node_volt_max".'":'.'"'.$node_volt_max.'"'.','.'"'."node_volt_min".'":'.'"'.$node_volt_min.'"'.','.'"'."main_volt_max".'":'.'"'.$main_volt_max.'"'.','.'"'."main_volt_min".'":'.'"'.$main_volt_min.'"'.','.'"'."node_temp_max".'":'.'"'.$node_temp_max.'"'.','.'"'."node_temp_min".'":'.'"'.$node_temp_min.'"'.','.'"'."main_temp_max".'":'.'"'.$main_temp_max.'"'.','.'"'."main_temp_min".'":'.'"'.$main_temp_min.'"'.','.'"'."main_amp_max".'":'.'"'.$main_amp_max.'"'.','.'"'."main_amp_min".'":'.'"'.$main_amp_min.'"'.','.'"'."time_interval".'":'.'"'.$time_interval.'"'."}";

	}

	else {

		 echo '{"result": "sql error"}';
	}


}

function handlePostOperation($data)

{
	include "db.php";
	$device_id = $data['device_id'];
	$date = $data['date'];
	$site_id = $data['site_id'];
	$bank = $data['bank'];
	$node = $data['node'];
	$volt = $data['volt'];
	$temp = $data['temp'];
	$amp = $data['amp'];
	$ir = $data['ir'];


	$sql = "INSERT INTO tbl_data_log(device_id, date_time, site_id, bank, node_id, volt, temp, amp, ir) VALUES('$device_id', '$date', '$site_id', '$bank', '$node', '$volt', '$temp', '$amp', '$ir')";

	if (mysqli_query($conn,$sql)){

     echo '{"result": "success"}';

	}

	else {

		 echo '{"result": "sql error"}';
	}

}



?>