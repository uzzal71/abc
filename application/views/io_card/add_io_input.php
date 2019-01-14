<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-ADD IO INPUT FORM-</i>
					</p>
					<form method="POST" autocomplete="off" action="<?php echo base_url('IO-INPUT-SAVE');?>">
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
				          <select name="device_id" id="device_id" placeholder="Select a Device" class="form-control" onchange="get_node()">
				          <option value="">Select Device</option> 
				          </select>        
				          </div>  


				          <div class="form-group">
				          <label for="titleText">Node ID</label>
				          <select name="node_id" id="node_id" placeholder="Select a NodeID" class="form-control" >
				          <option value="">Select NodeID</option>
				          </select>
				          </div>


				          <div class="form-group">
				          <label>AC1</label>
			         		 <select name="ac1"  class="form-control">
			                     <option value="1">PDB</option>
			                     <option value="2">UPS</option>
			                     <option value="3">Generator</option>
			                     <option value="4">Others</option>
			                 </select>
			             </div>

              		<div class="form-group">
              			<label>AC2</label>
    				<select name="ac2" class="form-control">
                     <option value="1">PDB</option>
                     <option value="2">UPS</option>
                     <option value="3">Generator</option>
                     <option value="4">Others</option>
                 </select>
           		</div>

              <div class="form-group">
               <label>AC3</label>
              <select name="ac3" class="form-control">
              	<option value="1">PDB</option>
                    <option value="2">UPS</option>
                    <option value="3">Generator</option>
                    <option value="4">Others</option>
                 </select>
           </div>

              <div class="form-group">
              <label>AC4</label>
              <select name="ac4" class="form-control">
              		<option value="1">PDB</option>
                    <option value="2">UPS</option>
                    <option value="3">Generator</option>
                    <option value="4">Others</option>
                 </select>
           </div>

              <div class="form-group">
              <label>DigitalIn1</label>
              <select name="external1" class="form-control">
              	<option value="1">PDB</option>
                    <option value="2">UPS</option>
                    <option value="3">Generator</option>
                    <option value="4">Others</option>
                 </select>
              </div>

              <div class="form-group">
               <label>DigitalIn2</label>
              <select name="external2" class="form-control">
              	<option value="1">PDB</option>
                    <option value="2">UPS</option>
                    <option value="3">Generator</option>
                    <option value="4">Others</option>
                 </select>
           </div>

              <div class="form-group">
                <label>DigitalIn3</label>
              <select name="external3" class="form-control">
              		<option value="1">PDB</option>
                     <option value="2">UPS</option>
                     <option value="3">Generator</option>
                     <option value="4">Others</option>
                 </select>
          	   </div>

              <div class="form-group">
                <label>DigitalIn4</label>
               <select name="external4" class="form-control">
               	<option value="1">PDB</option>
                     <option value="2">UPS</option>
                     <option value="3">Generator</option>
                     <option value="4">Others</option>
                 </select>
              </div>

              <div class="form-group">
                <label>AnalogueIn1</label>
               <select name="analogue1" class="form-control">
               	<option value="1">PDB</option>
                     <option value="2">UPS</option>
                     <option value="3">Generator</option>
                     <option value="4">Others</option>
                </select>
           	   </div>

              <div class="form-group">
                <label>AnalogueIn2</label>
               <select name="analogue2"  class="form-control">
                     <option value="1">PDB</option>
                     <option value="2">UPS</option>
                     <option value="3">Generator</option>
                     <option value="4">Others</option>
                </select>
               </div>

              <div class="form-group">
                <label>AnalogueIn3</label>
               <select name="analogue3" class="form-control">
                     <option value="1">PDB</option>
                     <option value="2">UPS</option>
                     <option value="3">Generator</option>
                     <option value="4">Others</option>
                </select>                
              </div>

              <div class="form-group">
                 <label>AnalogueIn4</label>
	             <select name="analogue4" class="form-control">
	                     <option value="1">PDB</option>
	                     <option value="2">UPS</option>
	                     <option value="3">Generator</option>
	                     <option value="4">Others</option>
	            </select>              
              </div>
					  <hr>
					  <div class="footer-box">
					  	<button type="reset" class="btn btn-danger">RESET</button>
					  	<button type="submit" id="submit" class="btn btn-info pull-right">ADD IO INPUT</button>
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