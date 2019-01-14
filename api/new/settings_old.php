<?php
//include('db.php');
//require_once ('db.php');
//header ('content-type:: application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$method= $_SERVER['REQUEST_METHOD'];
//include APPPATH.'api/new/'.'db.php';



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
include "db.php";

$device_id = $_GET['device_id'];
//require_once ('db.php');

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "bvms";

// Create connection
 //$conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
 // if ($conn->connect_error) {
 //     die("Connection failed: " . $conn->connect_error);
 // } 

$sql = "SELECT * FROM device  WHERE device_id = '$device_id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $node_type=$row["node_type"];
         $node_id=$row["node_id"];
        /* $node_volt_min=$row["node_volt_min"];
         $main_volt_max=$row["main_volt_max"];
         $main_volt_min=$row["main_volt_min"];
         $node_temp_max=$row["node_temp_max"];
         $node_temp_min=$row["node_temp_min"];
         $main_temp_max=$row["main_temp_max"];
         $main_temp_min=$row["main_temp_min"];
         $main_amp_max=$row["main_amp_max"];
         $main_amp_min=$row["main_amp_min"];*/
         $time_interval=20;
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

		// if($node_type==1){

		// 	echo "{".'"'."EM".'":'.'"'.$node_id.'"'.','.'"'."Time_Interval".'":'.'"'.$time_interval.'"'."}";
		// }
		// elseif ($node_type==2) {

		// 	echo "{".'"'."TH".'":'.'"'.$node_id.'"'.','.'"'."Time_Interval".'":'.'"'.$time_interval.'"'."}";
		// }
		// elseif ($node_type==3) {

		// 	echo "{".'"'."FU".'":'.'"'.$node_id.'"'.','.'"'."Time_Interval".'":'.'"'.$time_interval.'"'."}";
		// }
		// elseif ($node_type==4) {

		// 	echo "{".'"'."IO".'":'.'"'.$node_id.'"'.','.'"'."Time_Interval".'":'.'"'.$time_interval.'"'."}";
		// }
		// elseif ($node_type==5) {

		// 	echo "{".'"'."SC".'":'.'"'.$node_id.'"'.','.'"'."Time_Interval".'":'.'"'.$time_interval.'"'."}";
		// }

		echo "{".'"'."Time_Interval".'":'.'"'.$time_interval.'"'.','.'"'."Dev_type".'":'.'"'."TH-EM-IO".'"'.','.'"'."Dev_id".'":'.'"'."1,2,3,4,5,6,7-1,2,3-1".'"'."}";


		//echo '{'Time_Interval':'15', 'Dev_type':'TH-EM', 'Dev_id':'2,4,5-1,2' }';

	}

	else {

		 echo '{"result": "Error"}';
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