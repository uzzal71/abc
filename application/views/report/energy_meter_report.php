<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<!-- Code Here.... -->
				<div class="table_view" style="padding: 10px">
				<table id="horizental" class="display nowrap" style="width:100%">
                <thead>
                 <tr>
                  <th>Device ID</th>
                  <th>Node</th>  
                   <th>DateTime</th>                 
                  <th>Total kWh</th>                  
                  <th>Total Real Power</th>                  
                  <th>Total Apparent Power</th>                  
                  <th>Total Reactive Power</th>
                  <th>Total Power Factor</th>
                  <th>Frequency</th>
                  <th>I1</th>                 
                  <th>I2</th>                 
                  <th>I3</th>                 
                  <th>In</th>                 
                  <th>V12</th>                 
                  <th>V23</th>                 
                  <th>V31</th>                 
                  <th>V1</th>                 
                  <th>V2</th>                 
                  <th>V3</th>                 
                  <th>Real Power L1</th>                 
                  <th>Real Power L2</th>                 
                  <th>Real Power L3</th>
                  </tr>
                </thead>

                <tbody>
            <?php foreach ($report_energy as $report) {?>              
            <tr><td><?php echo $report['device_id']?></td>              
                <td><?php
                   $device_id= $report['device_id'];
                   $node_id = $report['node_id'];
                   $this->db->where('node_type',1); 
                   $this->db->where('node_id',$node_id);
                   $this->db->where('device_id',$device_id);
                   $get_user = $this->db->get('device');   
                   $get_node=$get_user->row();
                   echo $get_node->node_name;
                   ?>                    
                  </td>
                  <td><?php echo $report['date_time']?></td> 
                  <td><?php echo $report['positive_real_energy']?></td>
                  <td><?php echo $report['total_real_power']?></td>
                  <td><?php echo $report['total_apparent_power']?></td>
                  <td><?php echo $report['total_reactive_power']?></td>
                  <td><?php echo $report['total_power_factor']?></td>
                  <td><?php echo $report['frequency']?></td>
                  <td><?php echo $report['instantaneous_current_l1']?></td> 
                  <td><?php echo $report['instantaneous_current_l2']?></td> 
                  <td><?php echo $report['instantaneous_current_l3']?></td> 
                  <td><?php echo $report['instantaneous_current_ln']?></td> 
                  <td><?php echo $report['voltage_phase_l12']?></td> 
                  <td><?php echo $report['voltage_phase_l23']?></td> 
                  <td><?php echo $report['voltage_phase_l31']?></td> 
                  <td><?php echo $report['voltage_phase_l1']?></td> 
                  <td><?php echo $report['voltage_phase_l2']?></td> 
                  <td><?php echo $report['voltage_phase_l3']?></td> 
                  <td><?php echo $report['real_power_l1']?></td> 
                  <td><?php echo $report['real_power_l2']?></td> 
                  <td><?php echo $report['real_power_l3']?></td>                
              </tr>

              <?php }?>

                </tbody>
               
              </table>
				</div>
			</div>
		</div>
	</div>
</section>