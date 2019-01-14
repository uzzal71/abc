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
                  <th>Date Time</th>                            
                  <th>Quantity</th>                                
                </tr>
                </thead>
                <tbody> 


            <?php foreach ($report_fuel as $fuel) {?>
              
            <tr>
                  <td><?php echo $fuel['device_id']?></td>
                  <td><?php echo $fuel['site_id']?></td>
                  <td><?php 
                      $node_id = $fuel['node_id'];  
                      $this->db->where('node_type',3); 
                      $this->db->where('node_id',$node_id);
                      $get_user = $this->db->get('device');   
                      $get_node=$get_user->row();
                      echo $get_node->node_name;
                      ?> 
                  </td>
                   <td><?php echo $fuel['date_time']?></td>
                  <td><?php echo $fuel['quantity']?></td>
                 
              
            </tr>

              <?php }?>


                </tbody>
               
              </table>
				</div>
			</div>
		</div>
	</div>
</section>
