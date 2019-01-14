<?php 
include APPPATH.'views/'.'connection.php'; 

 ?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<!-- Search site data -->
				<br>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<form class="form-inline" method="POST" action="<?php echo base_url('SEARCH-SITE-DATA'); ?>">
						  <div class="form-group">
						    <label for="pwd">SITE ID:</label>
						    <select class="form-control search_seleted" name="site_id" id="site_id" style="width: 300px">
						    	<option>SELECT SITE</option>
						    	<option value="all">All site</option>
						    	<?php
							    foreach($get_site as $row)
							    {
							     echo '<option value="'.$row->site_id.'">'.'['.$row->site_id.'] '.$row->site_name.'</option>';
							    }
							    ?>
						    </select>
						  </div>
						  <button type="submit" class="search_btn btn btn-default">SEARCH DATA</button>
						</form>
					</div>
				</div>
				<!-- Search site data -->
				<br>
				<!-- Data Updated Data -->
				<div class="row" style="padding: 10px">
					<div class="col-md-12">
						


				          <div class="nav-tabs-custom" style="background: #c8e4e8c2;margin-top: 15px">
				            <ul class="nav nav-tabs">
				              <li class="active"><a href="#tab_1" data-toggle="tab"><b>Energy Meter</b></a></li>
				              <li><a href="#tab_2" data-toggle="tab"><b>Temparature Humidity</b></a></li>
				              <li><a href="#tab_3" data-toggle="tab"><b>Fuel Quantity</b></a></li>
				              <li><a href="#tab_4" data-toggle="tab"><b>Status Card</b></a></li>
				            </ul>
				            <div class="tab-content">
				            <div class="tab-pane active" id="tab_1">             

				<table class="table table-bordered table-striped">
				<thead>
	                <tr> 
	                  <th>Site ID</th> 
	                  <th>Site Name</th>                                  
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
	                </thead>
	                <tbody>
	                <?php 

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
	             			while($row_device_energy = mysqli_fetch_array($result_device_enery))
	             			{
	             				$sql_energy_result = "SELECT * FROM `energy_meter` WHERE `site_id` = $row_site_energy[site_id] AND `device_id` = $row_device_energy[device_id] and node_id in (3, 4) ORDER BY date_time DESC limit 2";
	             				$result_energy = mysqli_query($conn, $sql_energy_result);
					            if(mysqli_num_rows($result_energy) > 0)
					            {
					            	while($row_energy = mysqli_fetch_array($result_energy))
					            	{
					            	?>
					            		<tr> 
				                  <td><?php echo $row_energy['site_id']?></td>
				                  <td><?php
					                $this->db->select('*');
					                $this->db->from('site');
					                $this->db->where('site_id', $row_energy['site_id']);
					                $query_result = $this->db->get();
					                $result = $query_result->row();
					                echo $result->site_name;
					              ?></td>
								  <td><?php echo $row_energy['date_time']?></td>               
								  <td><?php echo $row_energy['device_id']?></td>                
				                  <td>
				                  <?php 
				                    $this->db->select('*');
					                $this->db->from('device');
					                $this->db->where('node_id', $row_energy['node_id']);
					                $this->db->where('node_type', 1);
					                $query_result = $this->db->get();
					                $result = $query_result->row();
					                echo $result->node_name;
				                  ?></td>
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
	             /**
	             $result_score = mysqli_query($conn, $sql_score);
	             if(mysqli_num_rows($result_score) > 0)
	             while($row_score = mysqli_fetch_array($result_score))
	             **/
	             ?>

				          </tbody>

							</table>              
				              </div>
				              <!-- /.tab-pane -->
				              <div class="tab-pane" id="tab_2">
				                <table class="table table-bordered table-striped">

								<thead>
				                <tr>
				                	<th>Site ID</th> 
				                	<th>Site Name</th> 
				                	<th>Date Time</th> 
				                  <th>Device ID</th>                                   
				                  <th>Node</th>                  
				                  <th>Temparature(C)</th>                  
				                  <th>Humidity(%)</th>
				                </tr>
				                </thead>
				                <tbody>
								<?php
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
									            	<td><?php
										                $this->db->select('*');
										                $this->db->from('site');
										                $this->db->where('site_id', $row_temp['site_id']);
										                $query_result = $this->db->get();
										                $result = $query_result->row();
										                echo $result->site_name;
										              ?></td>
									                  <td><?php echo $row_temp['date_time']?></td>                 
									                  <td><?php echo $row_temp['device_id']?></td>                  
									                  <td><?php 
									                    $this->db->select('*');
										                $this->db->from('device');
										                $this->db->where('node_id', $row_temp['node_id']);
										                $this->db->where('node_type', 2);
										                $query_result = $this->db->get();
										                $result = $query_result->row();
										                echo $result->node_name;
									                  ?></td>
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

				          </tbody>


				</table>    
				              



				              </div>
				              <!-- /.tab-pane -->
				              <div class="tab-pane" id="tab_3">
				          
				<table class="table table-bordered table-striped">

				<thead>
				                <tr>
					                <th>Site ID</th> 
					                <th>Site Name</th> 
					                <th>Date Time</th> 
					                <th>Device ID</th>                                   
					                <th>Node</th>                                  
					                <th>Quantity</th>                           
				                </tr>
				                </thead>
				                <tbody>




				    <?php 
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
				            	<td><?php
					                $this->db->select('*');
					                $this->db->from('site');
					                $this->db->where('site_id', $row_fuel['site_id']);
					                $query_result = $this->db->get();
					                $result = $query_result->row();
					                echo $result->site_name;
					              ?></td>
				                  <td><?php echo $row_fuel['date_time']?></td>                  
				                  <td><?php echo $row_fuel['device_id']?></td>                  
				                  <td>
				                  <?php 
				                  $this->db->select('*');
					                $this->db->from('device');
					                $this->db->where('node_id', $row_fuel['node_id']);
					                $this->db->where('node_type', 3);
					                $query_result = $this->db->get();
					                $result = $query_result->row();
					                echo $result->node_name;
				                  ?>
				                  </td>           
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

				          </tbody>
						</table> 
				            



				              
				              </div>

				              <!-- /.tab-pane -->
				              <div class="tab-pane" id="tab_4">
				          <table class="table table-bordered table-striped">

				<thead>
				             <tr>
				                <th>Site ID</th> 
				                <th>Site Name</th> 
				                <th>Date Time</th> 
				                 <th>Device ID</th>               
				                  <th>Node</th>                  
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
				                </thead>
				                <tbody>




				    <?php 

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
	            	<td><?php
	                $this->db->select('*');
	                $this->db->from('site');
	                $this->db->where('site_id', $row_io_input['site_id']);
	                $query_result = $this->db->get();
	                $result = $query_result->row();
	                echo $result->site_name;
	              ?></td>
	                  <td><?php echo $row_io_input['date_time']?></td>                  
	                  <td><?php echo $row_io_input['device_id']?></td>
	                  <td>
	                  <?php 
	                  $this->db->select('*');
		                $this->db->from('device');
		                $this->db->where('node_id', $row_io_input['node_id']);
		                $this->db->where('node_type', 4);
		                $query_result = $this->db->get();
		                $result = $query_result->row();
		                echo $result->node_name;
	                  ?>
	                  </td>                  
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
				          </tbody>


				</table>     




				              </div>
				              <!-- /.tab-pane -->
				            </div>
				            <!-- /.tab-content -->
				          </div>
				          <!-- nav-tabs-custom -->
				        </div>
				        <!-- /.col -->
				</div>
				<!-- Data Updated Data -->
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
  function updateValue()
{
    $('#textboxid').val($('#selectLoco').val());
}

$(document).ready(function () {
    updateValue();
});

$(document).ready(function() {
    $('#example1').DataTable( {
        "scrollX": true
    } );
} );

</script>


<script type="text/javascript">
  

 $(document).ready(function(){  
      $('#site_id').change(function(){  
           var site_id = $(this).val();  
           $.ajax({  
                url:"<?php echo site_url('data_sheet/fetch_data'); ?>",  
                method:"POST",  
                data:{site_id:site_id}, 
                success:function(data){  
                     $('#tabledata').html(data);  
                }  
           });  
      });  
 });  
 </script> 