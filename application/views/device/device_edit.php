<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-EDIT DEVICE FORM-</i>
					</p>
					<form name="device_edit_form" method="POST" autocomplete="off" action="<?php echo base_url('DEVICE-UPDATE/'.$get_device->id)?>">
					   <div class="form-group">
					    <label for="circle_name"><i>DEVICE ID:</i></label>
					    <input type="text" class="form-control" name="device_id" id="device_id" value="<?php echo $get_device->device_id ?>" required>
					  </div>					  
					  <div class="form-group">
					    <label for="circle_name"><i>DEVICE NAME:</i></label>
					    <input type="text" class="form-control" name="device_name" id="device_name" value="<?php echo $get_device->device_name ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="username"><i>SITE ID:</i></label>
					     <select name="site_id" id="site_id" class="form-control">
					     	<?php foreach ($site_list as $site) {?>
				              <option value="<?php echo $site['site_id']?>">[<?php echo $site['site_id']?>] <?php echo $site['site_name']?></option>
				            <?php }?>
					     </select>
					  </div>
					   <div class="form-group">
					    <label for="username"><i>NODE TYPE:</i></label>
					     <select name="node_type" class="form-control">
		               <?php foreach ($node_list as $node) {?>
		                   <option value="<?php echo $node['id']?>"
		                  <?php if($get_device->node_type == $node['id']) echo "selected"?>>
		                  <?php echo $node['node_type']?>                  
		                </option>
		              <?php }?>   
                	</select>
					  </div>
					  <div class="form-group">
					    <label for="username"><i>NODE ID:</i></label>
					     <input type="text" class="form-control" name="node_id" id="node_id" value="<?php echo $get_device->node_id ?>" required>
					  </div>
					  <div class="form-group">
					    <label for="username"><i>NODE NAME:</i></label>
					     <input type="text" class="form-control" name="node_name" id="node_name" value="<?php echo $get_device->node_name ?>" required>
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
					  	<button type="submit" id="submit" class="btn btn-info pull-right">UPDATE DEVICE</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
  document.forms['device_edit_form'].elements['site_id'].value = <?php echo $get_device->site_id; ?>
</script>

<script type="text/javascript">
  document.forms['device_edit_form'].elements['node_type'].value = <?php echo $get_device->node_type; ?>
</script>

<script type="text/javascript">
  document.forms['device_edit_form'].elements['status'].value = <?php echo $get_device->status; ?>
</script>