<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-ADD SITE FORM-</i>
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
					<form method="POST" autocomplete="off" action="<?php echo base_url('SITE-SAVE')?>">
					  <div class="form-group">
					    <label for="username"><i>CIRCLE:</i></label>
					     <select name="circle_id" id="circle_id" class="form-control" onchange="get_region()">
					     	<?php foreach ($circle_list as $circle) {?>
				              <option value="<?php echo $circle['circle_id']?>">[<?php echo $circle['circle_id']?>] <?php echo $circle['circle_name']?></option>
				            <?php }?>
					     </select>
					    <span id="status_response" style="font-size: 12px;float: right;"></span>
					  </div>
					  <div class="form-group">
					    <label for="username"><i>REGION:</i></label>
					     <select name="region_id" id="region_id" class="form-control">
					     	<option value="">Select Region</option>
					     </select>
					    <span id="status_response" style="font-size: 12px;float: right;"></span>
					  </div>
					  <div class="form-group">
					    <label for="circle_name"><i>SITE ID:</i></label>
					    <input type="text" class="form-control" name="site_id" id="site_id" placeholder="SITE ID" required>
					  </div>					  
					  <div class="form-group">
					    <label for="circle_name"><i>SITE NAME:</i></label>
					    <input type="text" class="form-control" name="site_name" id="site_name" placeholder="SITE NAME" required>
					  </div>
					  <div class="form-group">
					    <label for="circle_name"><i>PHONE ONE:</i></label>
					    <input type="text" class="form-control" name="phone1" id="phone1" placeholder="PHONE ONE" required>
					  </div>
					  <div class="form-group">
					    <label for="circle_name"><i>PHONE TWO:</i></label>
					    <input type="text" class="form-control" name="phone2" id="phone2" placeholder="PHONE TWO" required>
					  </div>
					  <div class="form-group">
					    <label for="circle_name"><i>E-MAIL ONE:</i></label>
					    <input type="text" class="form-control" name="email1" id="email1" placeholder="E-MAIL ONE" required>
					  </div>
					  <div class="form-group">
					    <label for="circle_name"><i>E-MAIL TWO:</i></label>
					    <input type="text" class="form-control" name="email2" id="email2" placeholder="E-MAIL TWO" required>
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
					  	<button type="submit" id="submit" class="btn btn-info pull-right">ADD SITE</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>

<script>

function get_region()
{
   var circle_id = $('#circle_id').val();
  if(circle_id != '')
  {
   $.ajax({
    url:"<?php echo base_url('site/fetch_region'); ?>",
    method:"POST",
    data:{circle_id:circle_id},
    success:function(data)
    {
     
     $('#region_id').html(data);     
    }
   });
  }
  else
  {
   $('#region_id').html('<option value="">Select Region</option>');
  
  }
}

</script>