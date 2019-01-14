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
<th>PDB</th>                  
<th>GENERATOR</th>                  
<th>UPS</th>                  
<th>AC4</th>                  
<th>DIN1</th>                  
<th>DIN2</th>                  
<th>DIN3</th>                  
<th>DIN4</th>                  
<th>AIN1</th>                  
<th>AIN2</th>                  
<th>AIN3</th>                  
<th>AIN4</th>                                         
</tr>
<?php 
include 'connection.php';
$sql_site_io_input = "SELECT DISTINCT(`site_id`) AS site_id FROM `io_input`";
$result_site_io_input = mysqli_query($conn, $sql_site_io_input);
if(mysqli_num_rows($result_site_io_input) > 0)
{
	while($row_site_io_input = mysqli_fetch_array($result_site_io_input))
	{
		$sql_device_io_input = "SELECT DISTINCT(`device_id`) AS device_id FROM `io_input` WHERE `site_id` = $row_site_io_input[site_id] ";
		$result_device_io_input = mysqli_query($conn, $sql_device_io_input);
		if(mysqli_num_rows($result_device_io_input) > 0)
		{
			while($row_device_io_input = mysqli_fetch_array($result_device_io_input))
			{
				$sql_io_input_node = "SELECT DISTINCT(`node_id`) AS node_id FROM `io_input` WHERE `site_id` = $row_site_io_input[site_id] AND `device_id` = $row_device_io_input[device_id]";

				$result_io_input_node = mysqli_query($conn, $sql_io_input_node);
	             if(mysqli_num_rows($result_io_input_node) > 0)
	             {
		             while($row_io_input_node = mysqli_fetch_array($result_io_input_node))
		             {
		             	

				$sql_io_input_result = "SELECT * FROM `io_input` WHERE `site_id` = $row_site_io_input[site_id] AND `device_id` = $row_device_io_input[device_id] and node_id = $row_io_input_node[node_id] ORDER BY date_time DESC limit 1";
				$result_io_input = mysqli_query($conn, $sql_io_input_result);

            if(mysqli_num_rows($result_io_input) > 0)
            {
            	while($row_io_input = mysqli_fetch_array($result_io_input))
            	{
            		?>
            		<tr>
	            	<td><?php echo $row_io_input['site_id']?></td>
	                  <td><?php echo $row_io_input['date_time']?></td>                  
	                  <td><?php echo $row_io_input['device_id']?></td>                  
	                  <?php 

				if ($row_io_input['ac1']==1)
				{?>


				<td style="color: green"><b>ON</b>
				</td>

				<?php }

				else 
				{?>
				  <td style="color: red"><b>OFF</b>
				</td>
				  
				<?php }?> 
				                  
				<!--  for ac2    -->  

				<?php 

				if ($row_io_input['ac2']==1)
				{?>


				<td style="color: green;text-align: center;"><b>ON</b>
				</td>

				<?php }

				else 
				{?>
				  <td style="color: red;text-align: center;"><b>OFF</b>
				  
				<?php }?> 


				<!--  for ac3    -->  

				<?php 

				if ($row_io_input['ac3']==1)
				{?>


				<td style="color: green"><b>ON</b>
				</td>

				<?php }

				else 
				{?>
				  <td style="color: red"><b>OFF</b>
				</td>
				  
				<?php }?>

				 <!--  for ac4    -->  

				<?php 

				if ($row_io_input['ac4']==1)
				{?>


				<td style="color: green"><b>ON</b>
				</td>

				<?php }

				else 
				{?>
				  <td style="color: red"><b>OFF</b>
				</td>
				  
				<?php }?> 

				 <!--  for ac4    -->  

				<?php 

				if ($row_io_input['ext1']==1)
				{?>


				<td style="color: green"><b>ON</b>
				</td>

				<?php }

				else 
				{?>
				  <td style="color: red"><b>OFF</b>
				</td>
				  
				<?php }?> 



				<?php if ($row_io_input['ext2']==1){?>


				<td style="color: green"><b>ON</b>
				</td>

				<?php }

				else 
				{?>
				  <td style="color: red"><b>OFF</b>
				</td>
				  
				<?php }?>


				<?php if ($row_io_input['ext3']==1) 
				{?>


				<td style="color: green"><b>ON</b>
				</td>

				<?php }

				else 
				{?>
				  <td style="color: red"><b>OFF</b>
				</td>
				  
				<?php }?>
				<?php if ($row_io_input['ext4']==1){?>
				<td style="color: green"><b>ON</b>
				</td>

				<?php }

				else 
				{?>
				  <td style="color: red"><b>OFF</b>
				</td>
				  
				<?php }?>                                                    
                  <td><?php echo $row_io_input['anlg1']?></td>                 
                  <td><?php echo $row_io_input['anlg2']?></td>                 
                  <td><?php echo $row_io_input['anlg3']?></td>                 
                  <td><?php echo $row_io_input['anlg4']?></td>                 
                 
                              
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