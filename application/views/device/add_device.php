<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-ADD DEVICE FORM-</i>
					</p>
					<form method="POST" autocomplete="off" action="<?php echo base_url('DEVICE-SAVE')?>">
					  <div class="form-group">
					    <label for="username"><i>CIRCLE:</i></label>
					     <select name="circle_id" id="circle_id" class="form-control" onchange="get_region_data()">
					     	<?php foreach ($circle_list as $circle) {?>
				              <option value="<?php echo $circle['circle_id']?>">[<?php echo $circle['circle_id']?>] <?php echo $circle['circle_name']?></option>
				            <?php }?>
					     </select>
					    <span id="status_response" style="font-size: 12px;float: right;"></span>
					  </div>
					  <div class="form-group">
				          <label for="titleText">Region </label>
				          <select name="region_id" id="region_id" class="form-control" onchange="get_site_data()">
				          <option value="" required>Select Region</option> 
				          </select>        
			          </div>

			          <div class="form-group">
				          <label for="titleText">Site</label>
				          <select name="site_id" id="site_id" class="form-control">
				          <option value="" required>Select Site</option>
				          </select>
				       </div> 
					  <div class="form-group">
					    <label for="circle_name"><i>DEVICE ID:</i></label>
					    <input type="text" class="form-control" name="device_id" id="device_id" placeholder="DEVICE ID" required>
					  </div>					  
					  <div class="form-group">
					    <label for="circle_name"><i>DEVICE NAME:</i></label>
					    <input type="text" class="form-control" name="device_name" id="device_name" placeholder="DEVICE NAME" required>
					  </div>
					  <div class="form-group">
					    <label for="username"><i>NODE TYPE:</i></label>
					     <select name="node_type" id="node_type" class="form-control">
					     	<?php foreach ($node_list as $node_type) {?>
				              <option value="<?php echo $node_type['id']?>"><?php echo $node_type['node_type']?></option>
				            <?php }?>
					     </select>
					    <span id="status_response" style="font-size: 12px;float: right;"></span>
					  </div>
					  <div class="form-group">
					  	<label for="status"><i>STATUS:</i></label>
					  	<select class="form-control" name="status" id="status">
					  		<option value="1">Active</option>
					  		<option value="0">Inactive</option>
					  	</select>
					  </div>
					  <div class="form-group">
 						<label>Node</label>
			        </div>
			        <div class="field_wrapper">
					    <div>
					        <input type="text" name="node_name[]" value="" placeholder="Node Name" style="padding: 4px;width: 192px" />
					        <input type="text" name="node_id[]" value="" placeholder="Node ID" style="padding: 4px;width: 192px" />
					        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php base_url()?>media/add-icon.png"/></a>
					    </div>
					</div>
					<hr>
					  <div class="footer-box">
					  	<button type="reset" class="btn btn-danger">RESET</button>
					  	<button type="submit" id="submit" class="btn btn-info pull-right">ADD DEVICE</button>
					  </div>
					   </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-top:10px"><input type="text" name="node_name[]" value="" placeholder="Node Name" style="padding: 4px;width: 192px" />&nbsp;<input type="text" name="node_id[]" value="" placeholder="Node ID" style="padding: 4px;width: 192px" />&nbsp;<a href="javascript:void(0);" class="remove_button"><img src="<?php base_url()?>media/remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>


<script>
function get_region_data(){
  var circle_id = $('#circle_id').val();
  if(circle_id != '')
  {
   $.ajax({
    url:"<?php echo site_url('ajax_controller/fetch_region'); ?>",
    method:"POST",
    data:{circle_id:circle_id},
    success:function(data)
    {
     
     $('#region_id').html(data);
     $('#site_id').html('<option value="">Select Site</option>');
    }
   });
  }
  else
  {
   $('#region_id').html('<option value="">Select Region</option>');
   $('#site_id').html('<option value="">Select Site</option>');
  }
 }

 function get_site_data(){
  var region_id = $('#region_id').val();
  if(region_id != '')
  {
   $.ajax({
    url:"<?php echo site_url('ajax_controller/fetch_siteid'); ?>",
    method:"POST",
    data:{region_id:region_id},
    success:function(data)
    {
     $('#site_id').html(data);
    }
   });
  }
  else
  {
   $('#site_id').html('<option value="">Select SiteID</option>');
  }
 }
 
</script>
