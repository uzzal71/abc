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
<th>Node ID</th>                                  
<th>Quantity</th> 
</tr>
<?php 
include 'connection.php';
$sql_site_fuel = "SELECT DISTINCT(`site_id`) AS site_id FROM `fuel`";
$result_site_fuel = mysqli_query($conn, $sql_site_fuel);
if(mysqli_num_rows($result_site_fuel) > 0)
{
	while($row_site_fuel = mysqli_fetch_array($result_site_fuel))
	{
		$sql_device_fuel = "SELECT DISTINCT(`device_id`) AS device_id FROM `fuel` WHERE `site_id` = $row_site_fuel[site_id] ";
		$result_device_fuel = mysqli_query($conn, $sql_device_fuel);
		if(mysqli_num_rows($result_device_fuel) > 0)
		{
			while($row_device_fuel = mysqli_fetch_array($result_device_fuel))
			{
				$sql_fuel_node = "SELECT DISTINCT(`node_id`) AS node_id FROM `fuel` WHERE `site_id` = $row_site_fuel[site_id] AND `device_id` = $row_device_fuel[device_id]";

				$result_fuel_node = mysqli_query($conn, $sql_fuel_node);
	             if(mysqli_num_rows($result_fuel_node) > 0)
	             {
		             while($row_fuel_node = mysqli_fetch_array($result_fuel_node))
		             {
		             	

				$sql_fuel_result = "SELECT * FROM `fuel` WHERE `site_id` = $row_site_fuel[site_id] AND `device_id` = $row_device_fuel[device_id] and node_id = $row_fuel_node[node_id] ORDER BY date_time DESC limit 1";
				$result_fuel = mysqli_query($conn, $sql_fuel_result);

            if(mysqli_num_rows($result_fuel) > 0)
            {
            	while($row_fuel = mysqli_fetch_array($result_fuel))
            	{
            		?>
            		 <tr><td><?php echo $row_fuel['site_id']?></td>
	                  <td><?php echo $row_fuel['date_time']?></td>                  
	                  <td><?php echo $row_fuel['device_id']?></td>                             
	                  <td><?php echo $row_fuel['node_id']?></td>                             
	                  <td><?php echo $row_fuel['quantity']?></td>
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