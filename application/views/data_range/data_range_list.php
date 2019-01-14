<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<!-- Code Here.... -->
				<div class="table_view" style="padding: 10px">
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
			                  <th>Serial</th>
			                   <th>Parameter Name</th>
			                   <th>Maximum</th>                  
			                   <th>Minimum</th>
			                   <th>Status</th>
			                   <th>Action</th>
			                </tr>
						</thead>
						<tbody>
							<?php
							$serial = 0;
							foreach($get_range as $range)
							{
							$serial++;
							?>
							<tr>
								<td><?php echo $serial; ?></td>
								<td><?php echo $range['parameter_name']?></td>
			                    <td><?php echo $range['max_range']?></td>
			                    <td><?php echo $range['min_range']?></td>
								<td>
								<?php
								if ($range['status'] == 1) {
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
									<a href="<?php echo base_url('DATA-RANGE-EDIT/'.$range['id'])?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span></a>
									<a onclick="return ConfirmDelete()" href="<?php echo base_url('DATA-RANGE-DELETE/'.$range['id'])?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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
