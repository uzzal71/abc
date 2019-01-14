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
      <th>Total Kwh</th>                  
      <th>l1 (Amp)</th>                  
      <th>l2 (Amp)</th>                  
      <th>l3 (Amp)</th>                  
      <th>ln (Amp)</th>                  
      <th>V12 (Volt)</th>                  
      <th>V23 (Volt)</th>                  
      <th>V31 (Volt)</th> 
    </tr>
<?php 
include 'connection.php';
$sql_site_energy = "SELECT DISTINCT(`site_id`) AS site_id FROM `energy_meter`";
$result_site_energy = mysqli_query($conn, $sql_site_energy);
if(mysqli_num_rows($result_site_energy) > 0)
{
	while($row_site_energy = mysqli_fetch_array($result_site_energy))
	{
		$sql_device_enery = "SELECT DISTINCT(`device_id`) AS device_id FROM `energy_meter` WHERE `site_id` = $row_site_energy[site_id] ";
		$result_device_enery = mysqli_query($conn, $sql_device_enery);
		if(mysqli_num_rows($result_device_enery) > 0)
		{
			while($row_device_enery = mysqli_fetch_array($result_device_enery))
			{
				$sql_energy_result = "SELECT * FROM `energy_meter` WHERE `site_id` = $row_site_energy[site_id] AND `device_id` = $row_device_enery[device_id] and node_id in (3, 4) ORDER BY date_time DESC limit 2";
				$result_energy = mysqli_query($conn, $sql_energy_result);
            if(mysqli_num_rows($result_energy) > 0)
            {
            	while($row_energy = mysqli_fetch_array($result_energy))
            	{

            		?>
            		<tr> 
				      <td><?php echo $row_energy['site_id']?></td>
					  <td><?php echo $row_energy['date_time']?></td>               
					  <td><?php echo $row_energy['device_id']?></td>                
	                  <td><?php echo $row_energy['total_real_power']?></td>
	                  <td><?php echo $row_energy['instantaneous_current_l1']?></td>
	                  <td><?php echo $row_energy['instantaneous_current_l2']?></td>
	                  <td><?php echo $row_energy['instantaneous_current_l3']?></td>                  
	                  <td><?php echo $row_energy['instantaneous_current_ln']?></td>
	                  <td><?php echo $row_energy['voltage_phase_l12']?></td>
	                  <td><?php echo $row_energy['voltage_phase_l23']?></td>
	                  <td><?php echo $row_energy['voltage_phase_l31']?></td>                  
				    </tr>
            		<?php
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