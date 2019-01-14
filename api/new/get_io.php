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

  $device_id = $_GET['device_id'];

  //$node = $_GET['node_id'];
  echo "{";
  echo "\"";

  $sql = "SELECT distinct node_id FROM io_control WHERE device_id = '$device_id'";

  $result = $conn->query($sql);

  $cnt= $result->num_rows;  

  //print_r($count);
   $n1=0;

  if ($result->num_rows > 0) {    

    // output data of each row
  	
    while($row = $result->fetch_assoc())

    {  $n1++;           
        $node['node'] = $row["node_id"];

        print_r($node['node']);


     if($cnt > $n1){
	        	echo "-"; 
	        }


   	 	//echo "-";
   	 	 
         	     
    }


   echo "\"";
   echo ":";  
   echo "\"";


   $result = $conn->query($sql);
   $count=$result->num_rows;



    if ($result->num_rows > 0) {    

    // output data of each row
    	$c1 = 0;
  	
    while($row = $result->fetch_assoc())

    { 
    	$c1 = $c1 + 1;

	    $node['node'] = $row["node_id"]; 

	    $node_id = $node['node'];

	  	$sql = "SELECT * FROM io_control WHERE device_id = '$device_id' AND node_id = '$node_id'";

	     $resultss = $conn->query($sql);  

     if ($resultss->num_rows > 0) { 

     //$c = 0;   

    // output data of each row
  	
    while($row = $resultss->fetch_assoc())
	    {    
	    //$c = $c + 1;         
	        $io_status = $row["status"];
	               
	        print_r($io_status); 

	       /* if($count > $c){
	        	echo ","; 
	        }
	        */

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
    



	if (mysqli_query($conn,$sql))

	{		

		//echo "{".'"'."IO status".'":'.'"'.$io_status.'"'.','.'"'."Time_Interval".'":'.'"'.$time_interval.'"'."}";
	
	}

	else

	 {

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