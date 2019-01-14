<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-ADD USER FORM-</i>
						<?php
						$message = $this->session->userdata('message');
						if(isset($message))
						{
						?>
						<script>
						 alert(<?php echo $message;?>);
						</script>
						<?php
						$this->session->unset_userdata('message');
						}
						$error = $this->session->userdata('error');
						if(isset($error))
						{
						?>
						<script>
						 alert(<?php echo $error;?>);
						</script>
						<?php
						$this->session->unset_userdata('error');
						} 
						?>
					</p>
					<form method="POST" autocomplete="off" action="<?php echo base_url('USER-SAVE')?>">
					  <div class="form-group">
					    <label for="user_id"><i>USER ID:</i></label>
					    <input type="text" class="form-control" name="user_id" id="user_id" placeholder="USER ID" required>
					    <span id="status_response" style="font-size: 12px;float: right;"></span>
					  </div>
					  <div class="form-group">
					    <label for="password"><i>PASSWRD:</i></label>
					    <input type="password" class="form-control" name="password" id="password" placeholder="********" required>
					  </div>
					  <div class="form-group">
					    <label for="email"><i>E-MAIL:</i></label>
					    <input type="email" class="form-control" name="email" id="email" placeholder="E-MAIL" required>
					  </div>
					  <div class="form-group">
					    <label for="phone"><i>PHONE:</i></label>
					    <input type="text" class="form-control" name="phone" id="phone" placeholder="PHONE" required>
					  </div>
					  <div class="form-group">
					    <label for="phone"><i>STATUS:</i></label>
					    <select class="form-control" name="status" id="status" required>
					    	<option value="1">Active</option>
					    	<option value="0">Inactive</option>
					    </select>
					  </div>
					  <hr>
					  <div class="footer-box">
					  	<button type="reset" class="btn btn-danger">RESET</button>
					  	<button type="submit" id="submit" class="btn btn-info pull-right">ADD USER</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>