<?php
//include "db.php";
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
//include "db.php";
$device_id = $_GET['device_id'];
//require_once ('db.php');
 $servername = "localhost";
 $username = "root";
 $password = "toor";
 $dbname = "abc";

// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  echo "{";
  echo "\"";
  echo "Time_Interval\":\"15\",";

$sql = "SELECT * FROM device  WHERE device_id = '$device_id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $node_type=$row["node_type"];

         $node_id=$row["node_id"];
        
         $time_interval=15;
        // print_r($node_type);
    }

}

  echo "\"";
  echo "Dev_type\":\"";
  $sql = "SELECT DISTINCT node_type FROM device  WHERE device_id = '$device_id'";
  $result = $conn->query($sql);
  $cnt= $result->num_rows;  
  $n1=0;

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	   $n1++;
         //$node_type['node']=$row["node_type"];
         $node_type=$row["node_type"];
         //$node_id=$row["node_id"];        
         $time_interval=15;
         if ($node_type==1) {
         	echo "EM";
         }

         elseif ($node_type==2){
         echo "TH";
         }

         elseif ($node_type==3){
         echo "FU";
         }

         elseif ($node_type==4){
         echo "IO";
         }
         // print_r($node_type);
           if($cnt > $n1){
	        	echo "-"; 
	        }
        // print_r($node_type);
    }

  }
  echo "\"";
  echo ",";
  echo "\"";
  echo "Dev_id\":\"";
  $sql = "SELECT DISTINCT node_type FROM device WHERE device_id = '$device_id'";

  $result = $conn->query($sql);
  //$result = $conn->query($sql);
   $count=$result->num_rows;
   //print_r($result);
    if ($result->num_rows > 0) {
    // output data of each row
    	$c1 = 0;  	
    while($row = $result->fetch_assoc())
    { 
    	$c1 = $c1 + 1;
	    $node['node'] = $row["node_type"];
	    $node_id = $node['node'];
      $sql = "SELECT node_id FROM device  WHERE device_id = '$device_id' AND node_type = '$node_id'";
      $resultss = $conn->query($sql);
      $counts=$resultss->num_rows;
      //print_r($resultss);
      if ($resultss->num_rows > 0) { 
      $c = 0;  
      // output data of each row  	
      while($row = $resultss->fetch_assoc())	    
	    {
	    $c = $c + 1;         
	        $node_id = $row["node_id"];	               
	        print_r($node_id); 
	        if($counts > $c){
	        	echo ","; 
	        }
	      }

      if($count > $c1){
	        	echo "-"; 
	        }    
    }

  }
}
echo "\"";
echo "}";
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

	$sql = "INSERT INTO tbl_data_log(device_id, date_time, site_id, bank, node_id, volt, temp, amp, ir) VALUES('$device_id', NOW(), '$site_id', '$bank', '$node', '$volt', '$temp', '$amp', '$ir')";

	if (mysqli_query($conn,$sql))

	{
     echo '{"result": "success"}';
	}

	else 
	{
		 echo '{"result": "sql error"}';
	}

}



?>