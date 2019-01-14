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
                  <th>Site ID</th>                  
                  <th>Node</th> 
                   <th>Date</th>                                 
                  <th>Temp</th>                  
                  <th>Humidity</th>
                </tr>
                </thead>
                <tbody>

            <?php foreach ($report_temp as $temp) {?>              
            <tr>
                  <td><?php echo $temp['device_id']?></td>
                  <td><?php echo $temp['site_id']?></td>
                  <td><?php
                            $node_id = $temp['node_id'];  
                            $this->db->where('node_type',2); 
                            $this->db->where('node_id',$node_id);
                            $get_user = $this->db->get('device');   
                            $get_node=$get_user->row();
                            echo $get_node->node_name;?>
                   </td>
                   <td><?php echo $temp['date_time']?></td>
                  <td><?php echo $temp['temp']?></td>
                  <td><?php echo $temp['humidity']?></td>                 
              
            </tr>
              <?php }?>


                </tbody>
               
              </table>
				</div>
			</div>
		</div>
	</div>
</section>
