<?php
	

header ('content-type:: application/json');
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
$password = "";
$dbname = "bvms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT site_id,bank FROM device WHERE device_id = '$device_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $site_id=$row["site_id"];
         $bank=$row["bank"];
    }

}

	$date = date("Y-m-d H:i:s");
	//$site_id = $_GET['site_id'];
	//$bank = $_GET['bank'];
	$node = $_GET['node'];
	$volt = $_GET['volt'];
	$temp = $_GET['temp'];
	$amp = $_GET['amp'];
	$ir = $_GET['ir'];
	
	$sql = "INSERT INTO tbl_data_log(device_id, date, site_id, bank, node, volt, temp, amp, ir,status) VALUES('$device_id', '$date', '$site_id', '$bank', '$node', '$volt', '$temp', '$amp', '$ir','1')";

	if (mysqli_query($conn,$sql)){

     echo '{"result": "success"}';

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


	$sql = "INSERT INTO tbl_data_log(device_id, date, site_id, bank, node, volt, temp, amp, ir) VALUES('$device_id', '$date', '$site_id', '$bank', '$node', '$volt', '$temp', '$amp', '$ir')";

	if (mysqli_query($conn,$sql)){

     echo '{"result": "success"}';

	}

	else {

		 echo '{"result": "sql error"}';
	}



}



?>