<?php
	require_once ('db.php');

	date_default_timezone_set('Asia/Dhaka');
    $device_id = $_GET['device_id'];
    $sql = "SELECT site_id FROM device WHERE device_id = '$device_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    { 
    while($row = $result->fetch_assoc())
    {
         $site_id=$row["site_id"];       
    }

    }
	$date = date("Y-m-d H:i:s");
	$node = explode(";",$_GET['node']);
	$io['status'] = explode(";",$_GET['status']);
	$no_of_records = $_GET['no_of_records'];
	for($i = 0; $i < $no_of_records; $i++)
    {
      	$io_no['io'] = explode(",", $io['status'][$i]); 

	    $ac1 = $io_no['io'][0];
	    $ac2 = $io_no['io'][1];	
	    $ac3 = $io_no['io'][2];
	    $ac4 = $io_no['io'][3];
	    $ext1= $io_no['io'][4];
	    $ext2= $io_no['io'][5];
	    $ext3= $io_no['io'][6];
	    $ext4= $io_no['io'][7];
	    $anlg1=$io_no['io'][8];
	    $anlg2=$io_no['io'][9];
	    $anlg3=$io_no['io'][10];
	    $anlg4=$io_no['io'][11];  
	
        $sql = "INSERT INTO io_input (device_id, site_id, node_id, ac1, ac2, ac3, ac4, ext1, ext2, ext3, ext4,anlg1,anlg2, anlg3, anlg4) 
        VALUES('$device_id', '$site_id', '$node[$i]','$ac1','$ac2','$ac3','$ac4','$ext1','$ext2','$ext3','$ext4','$anlg1','$anlg2','$anlg3','$anlg4')";	
	    $row = $conn->query($sql);
    }
	echo '{"result": "sucess"}';

?>
