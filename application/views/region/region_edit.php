<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-EDIT REGION FORM-</i>
					</p>
					<form name="region_edit_form" method="POST" autocomplete="off" action="<?php echo base_url('REGION-UPDATE/'.$specific_region->id)?>">
					  <div class="form-group">
					    <label for="username"><i>CIRCLE:</i></label>
					     <select name="circle_id" id="circle_id" class="form-control">
					     	<?php foreach ($circle_list as $circle) {?>
				              <option value="<?php echo $circle['circle_id']?>">[<?php echo $circle['circle_id']?>] <?php echo $circle['circle_name']?></option>
				            <?php }?>
					     </select>
					    <span id="status_response" style="font-size: 12px;float: right;"></span>
					  </div>
					  <div class="form-group">
					    <label for="circle_name"><i>REGION ID:</i></label>
					    <input type="text" class="form-control" name="region_id" id="region_id" value="<?php echo $specific_region->region_id; ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="circle_name"><i>REGION NAME:</i></label>
					    <input type="text" class="form-control" name="region_name" id="region_name" value="<?php echo $specific_region->region_id; ?>" required>
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
					  	<button type="submit" id="submit" class="btn btn-info pull-right">UPDATE REGION</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
  document.forms['region_edit_form'].elements['circle_id'].value = <?php echo $specific_region->circle_id; ?>
</script>
<script type="text/javascript">
  document.forms['region_edit_form'].elements['status'].value = <?php echo $specific_region->status; ?>
</script>