<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-ADD NODE TYPE FORM-</i>
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
						<div class="alert alert-danger alert-dismissible">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>>
						 <strong><?php echo $error;?></strong>
						</div>
						<?php
						$this->session->unset_userdata('error');
						} 
						?>
					</p>
					<form method="POST" autocomplete="off" action="<?php echo base_url('NODE-TYPE-SAVE');?>">
					  <div class="form-group">
					    <label for="username"><i>NODE TYPE:</i></label>
					    <input type="text" class="form-control" name="node_type" id="node_type" required>
					  </div>
					  <div class="form-group">
					    <label for="username"><i>NODE TYPE:</i></label>
					    <select class="form-control" id="status" name="status">
					    	<option value="1">Active</option>
					    	<option value="0">Inactive</option>
					    </select>
					  </div>
					  <hr>
					  <div class="footer-box">
					  	<button type="reset" class="btn btn-danger">RESET</button>
					  	<button type="submit" id="submit" class="btn btn-info pull-right">ADD NODE TYPE</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>