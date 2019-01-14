<?php 

$current_date = date('Y-m-d');

 ?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<br>
				<!-- Code Here.... -->
				<div class="change_passport_body">
					<p class="form_title_center">
						<i>-REPORT SEARCH FORM-</i>
					</p>
					<form action="<?php echo base_url('SEARCH-REPORT-RESULT');?>" method="POST" autocomplete="off">
					  <div class="form-group">
					    <label for="node_type"><i>NODE TYPE:</i></label>
					    <select class="form-control" name="node_type" id="node_type" onchange="get_circle_data()">
						  <?php $output = '<option value="">Select Node Type</option>';
				          foreach ($get_node_type as $node_type) 
				          {
				            $output .= '<option value="'.$node_type['id'].'">'.$node_type['node_type'].'</option>';           
				          } 
				          echo $output;
				          ?>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="circle_id"><i>CIRCLE:</i></label>
					    <select class="form-control" name="circle_id" id="circle_id" onchange="get_region_data()">
					    <?php $output = '<option value="">Select Circle</option>';
				        foreach ($get_circle as $circle) 
				        {
				  		$output .= '<option value="'.$circle['circle_id'].'">'.$circle['circle_id'].'&nbsp;('.$circle['circle_name'].')'.'</option>';           
				        } 
				          echo $output;
				        ?>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="region_id"><i>REGION:</i></label>
					    <select class="form-control" name="region_id" id="region_id" onchange="get_site_data()">
					    	<option>SELECT REGION</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="site_id"><i>SITE:</i></label>
					    <select class="form-control" name="site_id" id="site_id" onchange="get_node_data()">
					    	<option>SELECT SITE</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="node_id"><i>NODE:</i></label>
					    <select class="form-control" name="node_id" id="node_id">
					    	<option>SELECT NODE</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="from_date"><i>FROM DATE:</i></label>
					    <input type="text" class="form-control" name="from_date" id="from_date" value="<?php echo $current_date; ?>">
					  </div>
					  <div class="form-group">
					    <label for="to_date"><i>TO DATE:</i></label>
					    <input type="text" class="form-control" name="to_date" id="to_date" value="<?php echo $current_date; ?>">
					  </div>
					  <hr>
					  <div class="footer-box">
					  	<button type="reset" class="btn btn-danger">Reset</button>
					  	<button type="submit" class="btn btn-info pull-right">SEARCH</button>
					  </div>
					</form>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>

<script>
/**
** Get Circle
**/
function get_circle_data(){
  var node_type = $('#node_type').val();
  if(node_type != '')
  {
   $.ajax({
    url:"<?php echo site_url('ajax_controller/fetch_circle'); ?>",
    method:"POST",
    data:{node_type:node_type},
    success:function(data)
    {
     $('#circle_id').html(data);
     $('#region_id').html('<option value="">Select Region</option>');
     $('#site_id').html('<option value="">Select Site</option>');
     $('#node_id').html('<option value="">Select Node</option>');
     
    }
   });
  }
  else
  {
   $('#circle_id').html('<option value="">Select Circle</option>');
   $('#region_id').html('<option value="">Select Region</option>');
   $('#site_id').html('<option value="">Select Site</option>');
   $('#node_id').html('<option value="">Select Node</option>');
  }
 }
 
 /**
 **
 **/
  function get_region_data(){
  var circle_id = $('#circle_id').val();
  var node_type = $('#node_type').val();
  
  if(circle_id != '')
  {
   $.ajax({
    url:"<?php echo site_url('ajax_controller/fetch_region_for_search'); ?>",
    method:"POST",
    data:{
      circle_id:circle_id,
      node_type:node_type
    },
    success:function(data)
    {   

     $('#region_id').html(data);
     $('#site_id').html('<option value="">Select Site</option>');
     $('#node_id').html('<option value="">Select Node</option>');
    }
   });
  }
  else
  {
   $('#region_id').html('<option value="">Select Region</option>');
   $('#site_id').html('<option value="">Select Site</option>');
   $('#node_id').html('<option value="">Select Node</option>');
  }
 }

/**
** Get site
**/ 

 function get_site_data(){
  var region_id = $('#region_id').val();
  var node_type = $('#node_type').val();
  var circle_id = $('#circle_id').val();
  //alert(region_id);
  if(region_id != '')
  {
   $.ajax({
    url:"<?php echo site_url('ajax_controller/fetch_site_for_search'); ?>",
    method:"POST",
    data:{
      region_id:region_id,
      node_type:node_type,
      circle_id:circle_id
    },
    success:function(data)
    {
     $('#site_id').html(data);
     $('#node_id').html('<option value="">Select Node</option>');
    }
   });
  }
  else
  {
   $('#site_id').html('<option value="">Select Site</option>');
   $('#node_id').html('<option value="">Select Node</option>');
  }
 }

 /**
 ** get node data
 **/

function get_node_data(){
  var site_id = $('#site_id').val();
  var region_id = $('#region_id').val();
  var node_type = $('#node_type').val();
  var circle_id = $('#circle_id').val();
  if(site_id != '')
  {
   $.ajax({
    url:"<?php echo site_url('ajax_controller/fetch_node_id'); ?>",
    method:"POST",
    data:{
      site_id:site_id,
      region_id:region_id,
      node_type:node_type,
      circle_id:circle_id
    },
    success:function(data)
    {
     $('#node_id').html(data);
    }
   });
  }
  else
  {  
   $('#node_id').html('<option value="">Select Node</option>');
  }
 }

</script>