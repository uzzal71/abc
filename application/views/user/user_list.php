<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
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
				<!-- Code Here.... -->
				<div class="table_view">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
			                  <th>Serial</th>
			                  <th>Name</th>
			                  <th>Email</th>
			                  <th>Phone</th>
			                  <th>Created At</th>
			                  <th>Created By</th>
			                  <th>Status</th>
			                  <th>Action</th>
			                </tr>
						</thead>
						<tbody>
							<?php
							$serial = 0;
							foreach($user_list as $user)
							{
							$serial++;
							?>
							<tr>
								<td><?php echo $serial; ?></td>
								<td><?php echo $user['name']; ?></td>
								<td><?php echo $user['email']; ?></td>
								<td><?php echo $user['phone']; ?></td>
								<td><?php echo $user['created_at']; ?></td>
								<td><?php echo $user['created_by']; ?></td>
								<td>
								<?php
								if ($user['status'] == 1) {
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
									<a href="<?php echo base_url('USER-EDIT/'.$user['id'])?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span></a>
									<a onclick="return ConfirmDelete()" href="<?php echo base_url('USER-DELETE/'.$user['id'])?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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

