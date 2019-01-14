<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-EDIT CIRCLE FORM-</i>
					</p>
					<form name="circle_edit_form" method="POST" autocomplete="off" action="<?php echo base_url('CIRCLE-UPDATE/'.$specific_circle->id);?>">
					  <div class="form-group">
					    <label for="username"><i>CIRCLE ID:</i></label>
					    <input type="text" class="form-control" name="circle_id" id="circle_id" value="<?php echo $specific_circle->circle_id; ?>" required>
					    <span id="status_response" style="font-size: 12px;float: right;"></span>
					  </div>
					  <div class="form-group">
					    <label for="circle_name"><i>CIRCLE NAME:</i></label>
					    <input type="text" class="form-control" name="circle_name" id="circle_name" value="<?php echo $specific_circle->circle_name; ?>" required>
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
					  	<button type="submit" id="submit" class="btn btn-info pull-right">UPDATE</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
  document.forms['circle_edit_form'].elements['status'].value = <?php echo $specific_circle->status; ?>
</script>