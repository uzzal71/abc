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
			                  <th>CIRCLE ID</th>
			                  <th>CIRCLE NAME</th>
			                  <th>REGION ID</th>
			                  <th>REGION NAME</th>
			                  <th>STATUS</th>
			                  <th>ACTION</th>
			                </tr>
						</thead>
						<tbody>
							<?php
							$serial = 0;
							foreach($region_list as $region)
							{
							$serial++;
							?>
							<tr>
								<td><?php echo $serial; ?></td>
								<td><?php echo $region['circle_id']?></td>  
				                <td>
				                  <?php
				                  $circle_id = $region['circle_id'];
				                  $this->db->where('circle_id',$circle_id);    
				                  $get_circle = $this->db->get('circle');   
				                  $name = $get_circle->row(); 

				                   echo $name->circle_name?>
				                </td>
				                <td><?php echo $region['region_id']?></td>  
				                <td><?php echo $region['region_name']?></td>
								<td>
								<?php
								if ($region['status'] == 1) {
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
									<a href="<?php echo base_url('REGION-EDIT/'.$region['id'])?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span></a>
									<a onclick="return ConfirmDelete()" href="<?php echo base_url('REGION-DELETE/'.$region['id'])?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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
