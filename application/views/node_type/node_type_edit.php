<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-EDIT NODE TYPE FORM-</i>
					</p>
					<form method="POST" autocomplete="off" name="node_type_edit_form" action="<?php base_url('NODE-TYPE-UPDATE/'.$specific_note_type->id)?>">
					  <div class="form-group">
					    <label for="username"><i>NODE TYPE:</i></label>
					    <input type="text" class="form-control" name="node_type" id="node_type" value="<?php echo $specific_note_type->node_type; ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="username"><i>STATUS:</i></label>
					    <select class="form-control" id="status" name="status">
					    	<option value="1">Active</option>
					    	<option value="0">Inactive</option>
					    </select>
					  </div>
					  <hr>
					  <div class="footer-box">
					  	<button type="reset" class="btn btn-danger">RESET</button>
					  	<button type="submit" id="submit" class="btn btn-info pull-right">UPDATE NODE TYPE</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
  document.forms['node_type_edit_form'].elements['status'].value = <?php echo $specific_note_type->status; ?>
</script>