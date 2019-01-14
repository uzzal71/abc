<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table border="1">
<tr> 
	<th>Site ID</th> 
	<th>Date Time</th> 
	<th>Device ID</th>                                   
	<th>Node</th>                  
	<th>Temparature(C)</th>                  
	<th>Humidity(%)</th>
</tr>
<?php 
include 'connection.php';
$sql_site_temp = "SELECT DISTINCT(`site_id`) AS site_id FROM `temp_humidity`";
$result_site_temp = mysqli_query($conn, $sql_site_temp);
if(mysqli_num_rows($result_site_temp) > 0)
{
	while($row_site_temp = mysqli_fetch_array($result_site_temp))
	{
		$sql_device_temp = "SELECT DISTINCT(`device_id`) AS device_id FROM `temp_humidity` WHERE `site_id` = $row_site_temp[site_id] ";
		$result_device_temp = mysqli_query($conn, $sql_device_temp);
		if(mysqli_num_rows($result_device_temp) > 0)
		{
			while($row_device_temp = mysqli_fetch_array($result_device_temp))
			{
				$sql_temp_node = "SELECT DISTINCT(`node_id`) AS node_id FROM `temp_humidity` WHERE `site_id` = $row_site_temp[site_id] AND `device_id` = $row_device_temp[device_id]";

				$result_temp_node = mysqli_query($conn, $sql_temp_node);
	             if(mysqli_num_rows($result_temp_node) > 0)
	             {
		             while($row_temp_node = mysqli_fetch_array($result_temp_node))
		             {
		             	

				$sql_temp_result = "SELECT * FROM `temp_humidity` WHERE `site_id` = $row_site_temp[site_id] AND `device_id` = $row_device_temp[device_id] and node_id = $row_temp_node[node_id]  ORDER BY date_time DESC limit 1";
				$result_temp = mysqli_query($conn, $sql_temp_result);

            if(mysqli_num_rows($result_temp) > 0)
            {
            	while($row_temp = mysqli_fetch_array($result_temp))
            	{

            		?>
            		<tr>
	            	<td><?php echo $row_temp['site_id']?></td>
	                  <td><?php echo $row_temp['date_time']?></td>                 
	                  <td><?php echo $row_temp['device_id']?></td>                  
	                  <td><?php echo $row_temp['node_id'];?></td>                  
	                  <td><?php
	                  if($row_temp['temp'] != 0) {
	                  	echo $row_temp['temp'];
	                  } 
	                  else{
	                  	echo "Disconnect";
	                  }
	                  ?></td>
	                  <td><?php
	                  if($row_temp['humidity'] != 0) {
	                  	echo $row_temp['humidity'];
	                  } 
	                  else{
	                  	echo "Disconnect";
	                  }
	                  ?></td>
	            </tr>
            		<?php

            	 }
	             }	
            	}
            }
			}
		}
	}
}



 ?>

 </table>


</body>
</html>