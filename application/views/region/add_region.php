<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-ADD REGION FORM-</i>
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
					</p>
					<form method="POST" autocomplete="off" action="<?php echo base_url('REGION-SAVE')?>">
					  <div class="form-group">
					    <label for="username"><i>CIRCLE:</i></label>
					     <select name="circle_id" id="circle_id" class="form-control">
					     	<option selected>Select Circle</option>
					     	<?php foreach ($circle_list as $circle) {?>
				              <option value="<?php echo $circle['circle_id']?>">[<?php echo $circle['circle_id']?>] <?php echo $circle['circle_name']?></option>
				            <?php }?>
					     </select>
					    <span id="status_response" style="font-size: 12px;float: right;"></span>
					  </div>
					  <div class="form-group">
					    <label for="circle_name"><i>REGION ID:</i></label>
					    <input type="text" class="form-control" name="region_id" id="region_id" placeholder="REGION ID" required>
					  </div>
					  <div class="form-group">
					    <label for="circle_name"><i>REGION NAME:</i></label>
					    <input type="text" class="form-control" name="region_name" id="region_name" placeholder="REGION NAME" required>
					  </div>
					  <div class="form-group">
					  	<label for="status"><i>STATUS:</i></label>
					  	<select class="form-control" name="status" id="status">
					  		<option value="1">Active</option>
					  		<option value="0">Inactive</option>
					  	</select>
					  </div>
					  <hr>
					  <div class="footer-box">
					  	<button type="reset" class="btn btn-danger">RESET</button>
					  	<button type="submit" id="submit" class="btn btn-info pull-right">ADD REGION</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>