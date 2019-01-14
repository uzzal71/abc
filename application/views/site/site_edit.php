<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-EDIT SITE FORM-</i>
					</p>
					<form name="site_edit_form" method="POST" autocomplete="off" action="<?php echo base_url('SITE-UPDATE/'.$specific_site->id);?>">
					  <div class="form-group">
					    <label for="site_id"><i>SITE ID:</i></label>
					    <input type="text" class="form-control" name="site_id" id="site_id" value="<?php echo $specific_site->site_id;?>" required>
					  </div>					  
					  <div class="form-group">
					    <label for="site_name"><i>SITE NAME:</i></label>
					    <input type="text" class="form-control" name="site_name" id="site_name" value="<?php echo $specific_site->site_name;?>" required>
					  </div>
					  <div class="form-group">
					    <label for="phone1"><i>PHONE ONE:</i></label>
					    <input type="text" class="form-control" name="phone1" id="phone1" value="<?php echo $specific_site->phone1;?>" required>
					  </div>
					  <div class="form-group">
					    <label for="phone2"><i>PHONE TWO:</i></label>
					    <input type="text" class="form-control" name="phone2" id="phone2" value="<?php echo $specific_site->phone2;?>" required>
					  </div>
					  <div class="form-group">
					    <label for="email1"><i>E-MAIL ONE:</i></label>
					    <input type="text" class="form-control" name="email1" id="email1" value="<?php echo $specific_site->email1;?>" required>
					  </div>
					  <div class="form-group">
					    <label for="email2"><i>E-MAIL TWO:</i></label>
					    <input type="text" class="form-control" name="email2" id="email2" value="<?php echo $specific_site->email2;?>" required>
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
					  	<button type="submit" id="submit" class="btn btn-info pull-right">UPDATE SITE</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
  document.forms['site_edit_form'].elements['status'].value = <?php echo $specific_site->status; ?>
</script>