<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<!-- Code Here.... -->
				<div class="table_view">
				<?php
						$message = $this->session->userdata('message');
						if(isset($message))
						{
						?>
						<div class="alert alert-success alert-dismissible">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						 <strong><?php echo $message;?></strong>
						</div>
						<?php
						$this->session->unset_userdata('message');
						}
						$error = $this->session->userdata('error');
						if(isset($error))
						{
						?>
						<div class="alert alert-warning alert-dismissible">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						 <strong><?php echo $error;?></strong>
						</div>
						<?php
						$this->session->unset_userdata('error');
						} 
						?>	
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
			                  <th>SERIAL</th>
			                  <th>CIRCLE</th>
			                  <th>REGION</th>
			                  <th>SITE</th>                  
			                  <th>NODE TYPE</th>                  
			                  <th>NODE NAME</th>                  
			                  <th>DEVICE ID</th>                                   
			                  <th>DEVICE NAME</th>                  
			                  <th>STATUS</th>
			                  <th>ACTION</th>
			                </tr>
						</thead>
						<tbody>
							<?php
							$serial = 0;
							foreach($device_list as $device)
							{
							$serial++;
							?>
							<tr>
								<td><?php echo $serial; ?></td> 
				                <td>
				                  <?php
				                  $circle_id = $device['circle_id'];
				                  $this->db->where('circle_id',$circle_id);    
				                  $get_circle = $this->db->get('circle');   
				                  $name = $get_circle->row(); 
				                   echo $name->circle_name;
				                ?>
				                </td>
				                 <td>
				                  <?php
				                  $region_id = $device['region_id'];
				                  $this->db->where('region_id',$region_id);    
				                  $get_region = $this->db->get('region');   
				                  $name = $get_region->row(); 
				                   echo $name->region_name;
				                  ?>
				                </td>
				                <td>
				                  <?php
				                  $site_id = $device['site_id'];
				                  $this->db->where('site_id',$site_id);    
				                  $get_site = $this->db->get('site');   
				                  $name = $get_site->row(); 
				                   echo $name->site_name;
				                  ?>
				                </td>
				                <td>
				                  <?php
				                  $node_type = $device['node_type'];
				                  $this->db->where('id', $node_type);   
				                  $get_node_type = $this->db->get('node_type');   
				                  $name = $get_node_type->row(); 
				                   echo $name->node_type;
				                  ?>
				                </td>
				                <td><?php echo $device['device_id']?></td>
				                <td><?php echo $device['node_name']?></td>
			                    <td><?php echo $device['device_name']?></td>
								<td>
								<?php
								if ($device['status'] == 1) {
								 ?>
								 <button class="btn btn-xs btn-success">Active</button>
								 <?php	
								 }
								 else{
								 ?>
								 <button class="btn btn-xs btn-warning">Inactive</button>
								 <?php
								 } 
								 ?>
								</td>
								<td>
									<a href="<?php echo base_url('DEVICE-EDIT/'.$device['id'])?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span></a>
									<a onclick="return ConfirmDelete()" href="<?php echo base_url('DEVICE-DELETE/'.$device['id'])?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
								</td>
							</tr>
							<?php							
							} 
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
