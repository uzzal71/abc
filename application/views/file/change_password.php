<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-CHANGE PASSWORD FORM-</i>
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
					<form method="POST" autocomplete="off" action="<?php echo base_url('CHANGE-PASSWORD-SAVE');?>">
					  <div class="form-group">
					    <label for="username"><i>USERNAME:</i></label>
					    <input type="text" class="form-control" name="username" id="username" value="<?php echo $this->session->userdata('username'); ?>" readonly>
					  </div>
					  <div class="form-group">
					    <label for="password"><i>PASSWORD:</i></label>
					    <input type="password" class="form-control" name="password" id="password">
					  </div>
					  <div class="form-group">
					    <label for="confirm_password"><i>CONFIRM PASSWORD:</i></label>
					    <input type="password" class="form-control" name="confirm_password" id="confirm_password">
					  </div>
					  <hr>
					  <div class="footer-box">
					  	<button type="reset" class="btn btn-danger">Reset</button>
					  	<button type="submit" id="submit" onclick="change_password()" class="btn btn-info pull-right">Submit</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>


