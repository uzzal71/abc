<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-EDIT IO NUMBER FORM-</i>
					</p>
					<form name="io_number_edit_form" method="POST" autocomplete="off" action="<?php echo base_url('IO-NUMBER-UPDATE/'.$get_io_by_id->id);?>">
						<div class="form-group">
						<label for="titleText">Site ID</label>
						<input type="text" class="form-control" value="<?php echo $get_io_by_id->site_id; ?>" name="site_id" required>        
						 </div> 
    
				        <div class="form-group">
				          <label for="titleText">Device ID</label>
							<input type="text" class="form-control" value="<?php echo $get_io_by_id->device_id; ?>" name="device_id" required>        
				        </div>  

				         <div class="form-group">
				          <label for="titleText">Node ID</label>
				           <input type="text" class="form-control" value="<?php echo $get_io_by_id->node_id; ?>" name="node_id" required>
				         </div>

					    <div class="form-group">
					        <label>Status NO</label>
					 		<input type="text" class="form-control" value="<?php echo $get_io_by_id->io_no; ?>" name="io_no" required>      
					    </div>

					      <div class="form-group">
					        <label>Status Name</label>
					      <input type="text" class="form-control" value="<?php echo $get_io_by_id->io_name; ?>" name="io_name" required>
					       </div>
							  <div class="form-group">
							  	<label for="status"><i>Switching:</i></label>
							  	<select class="form-control" name="status" id="status">
							  		<option value="1">ON</option>
							  		<option value="0">OFF</option>
							  	</select>
							  </div>
							  <hr>
							  <div class="footer-box">
							  	<button type="reset" class="btn btn-danger">RESET</button>
							  	<button type="submit" id="submit" class="btn btn-info pull-right">UPDATE IO NUMBER</button>
							  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
  document.forms['io_number_edit_form'].elements['status'].value = <?php echo $get_io_by_id->status; ?>
</script>