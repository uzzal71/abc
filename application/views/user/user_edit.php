<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-EDIT USER FORM-</i>
					</p>
					<form name="user_edit_form" method="POST" autocomplete="off" action="<?php echo base_url('USER-UPDATE/'.$edit_user->id)?>">
					  <div class="form-group">
					    <label for="user_id"><i>USER ID:</i></label>
					    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $edit_user->name; ?>" required>
					    <span id="status_response" style="font-size: 12px;float: right;"></span>
					  </div>
					  <div class="form-group">
					    <label for="password"><i>PASSWRD:</i></label>
					    <input type="password" class="form-control" name="password" id="password" value="<?php echo $edit_user->password; ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="email"><i>E-MAIL:</i></label>
					    <input type="email" class="form-control" name="email" id="email" value="<?php echo $edit_user->email; ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="phone"><i>PHONE:</i></label>
					    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $edit_user->name; ?>" required>
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

<script type="text/javascript">
  document.forms['user_edit_form'].elements['status'].value = <?php echo $edit_user->status; ?>
</script>