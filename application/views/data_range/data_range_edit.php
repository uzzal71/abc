<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-DATA RANGE UPDATE FORM-</i>
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
						<div class="alert alert-danger alert-dismissible">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>>
						 <strong><?php echo $error;?></strong>
						</div>
						<?php
						$this->session->unset_userdata('error');
						} 
						?>
					</p>
					<form name="data_range_edit_form" method="POST" autocomplete="off" action="<?php echo base_url('DATA-RANGE-UPDATE/'.$get_range_data->id);?>">
					  <div class="form-group">
			              <label for="titleText">PARAMETER NAME</label>
			         	<input type="text" class="form-control" value="<?php echo $get_range_data->parameter_name; ?>" name="param_name" required>
			            </div> 

			              <div class="form-group">
			              <label for="titleText">MAXIMUM</label>
			            <input type="text" class="form-control" value="<?php echo $get_range_data->max_range; ?>" name="max_range" required>
			              </div> 

			              <div class="form-group">
			              <label for="titleText">MINIMUM</label>
			            <input type="text" class="form-control" value=" <?php echo $get_range_data->min_range; ?>" name="min_range" required>
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
					  	<button type="submit" id="submit" class="btn btn-info pull-right">UPDATE DATA RANGE</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
  document.forms['data_range_edit_form'].elements['status'].value = <?php echo $get_range_data->status; ?>
</script>