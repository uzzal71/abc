<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-ADD IO NUMBER FORM-</i>
					</p>
					<form method="POST" autocomplete="off" action="<?php echo base_url('IO-NUMBER-SAVE');?>">
						<div class="form-group">
						<label for="titleText">Site ID</label>
						<select name="site_id" id="site_id" class="form-control" onchange="get_device()">
						<option value="">Select site</option>
						    <?php
						    foreach($get_site as $row)
						    {
						     echo '<option value="'.$row->site_id.'">['.$row->site_id.']'.$row->site_name.'</option>';
						    }
						    ?>
						</select>        
						 </div> 
    
				        <div class="form-group">
				          <label for="titleText">Device ID</label>
							<select name="device_id" id="device_id" class="form-control" onchange="get_node()">
							    <option value="">Select Device</option> 
							</select>        
				        </div>  

				         <div class="form-group">
				          <label for="titleText">Node ID</label>
				           <select name="node_id" id="node_id" class="form-control">
				            <option value="">Select NodeID</option>
				            </select>
				         </div>

					    <div class="form-group">
					        <label>Status NO</label>
					 		<input type="text" class="form-control" placeholder="Status NO" name="io_no" required>      
					    </div>

					      <div class="form-group">
					        <label>Status Name</label>
					      <input type="text" class="form-control" placeholder="Status Name" name="io_name" required>
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
							  	<button type="submit" id="submit" class="btn btn-info pull-right">ADD IO NUMBER</button>
							  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>




<script>

 function get_device(){
  var site_id = $('#site_id').val();
  if(site_id != '')
  {
   $.ajax({
    url:"<?php echo site_url('ajax_controller/fetch_device'); ?>",
    method:"POST",
    data:{site_id:site_id},
    success:function(data)
    {
     
     $('#device_id').html(data);
     $('#node_id').html('<option value="">Select NodeID</option>');
    }
   });
  }
  else
  {
   $('#device_id').html('<option value="">Select Device</option>');
   $('#node_id').html('<option value="">Select NodeID</option>');
  }
 }


function get_node(){
  var device_id = $('#device_id').val();
  if(device_id != '')
  {
   $.ajax({
    url:"<?php echo site_url('ajax_controller/fetch_node'); ?>",
    method:"POST",
    data:{device_id:device_id},
    success:function(data)
    {
     $('#node_id').html(data);
    }
   });
  }
  else
  {
   $('#node_id').html('<option value="">Select NodeID</option>');
  }
 }
 

</script>