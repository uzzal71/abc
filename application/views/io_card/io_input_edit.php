<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-EDIT IO INPUT FORM-</i>
					</p>
					<form name="io_input_edit" method="POST" autocomplete="off" action="<?php echo base_url('IO-INPUT-UPDATE/'.$get_io_input->id);?>">
					    <div class="form-group">
					   <label for="site_id">Site ID</label>
					    <input type="text" name="site_id" id="site_id" value="<?php echo $get_io_input->site_id; ?>" class="form-control" readonly>
					    </div> 
    
				          <div class="form-group">
				          <label for="device_id">Device ID</label>
				          <input type="text" name="device_id" id="device_id" value="<?php echo $get_io_input->device_id; ?>" class="form-control" readonly>      
				          </div>  


				          <div class="form-group">
				          <label for="node_id">Node ID</label>
				          <input type="text" name="node_id" id="node_id" value="<?php echo $get_io_input->node_id; ?>" class="form-control" readonly>
				          </div>


				          <div class="form-group">
				          <label>AC1</label>
			         		 <select name="ac1" class="form-control">
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
					  	<button type="submit" id="submit" class="btn btn-info pull-right">UPDATE IO INPUT</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>



<script type="text/javascript">
  document.forms['io_input_edit'].elements['ac1'].value = <?php echo $get_io_input->ac1; ?>
</script>

<script type="text/javascript">
  document.forms['io_input_edit'].elements['ac2'].value = <?php echo $get_io_input->ac2; ?>
</script>

<script type="text/javascript">
  document.forms['io_input_edit'].elements['ac3'].value = <?php echo $get_io_input->ac3; ?>
</script>

<script type="text/javascript">
  document.forms['io_input_edit'].elements['ac4'].value = <?php echo $get_io_input->ac4; ?>
</script>

<script type="text/javascript">
  document.forms['io_input_edit'].elements['external1'].value = <?php echo $get_io_input->external1; ?>
</script>

<script type="text/javascript">
  document.forms['io_input_edit'].elements['external2'].value = <?php echo $get_io_input->external2; ?>
</script>

<script type="text/javascript">
  document.forms['io_input_edit'].elements['external3'].value = <?php echo $get_io_input->external3; ?>
</script>

<script type="text/javascript">
  document.forms['io_input_edit'].elements['external4'].value = <?php echo $get_io_input->external4; ?>
</script>

<script type="text/javascript">
  document.forms['io_input_edit'].elements['analogue1'].value = <?php echo $get_io_input->analogue1; ?>
</script>

<script type="text/javascript">
  document.forms['io_input_edit'].elements['analogue2'].value = <?php echo $get_io_input->analogue2; ?>
</script>

<script type="text/javascript">
  document.forms['io_input_edit'].elements['analogue3'].value = <?php echo $get_io_input->analogue3; ?>
</script>

<script type="text/javascript">
  document.forms['io_input_edit'].elements['analogue4'].value = <?php echo $get_io_input->analogue4; ?>
</script>



