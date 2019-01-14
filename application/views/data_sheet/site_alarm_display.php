<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<!-- Code Here.... -->
				<div class="table_view" style="padding: 10px">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
			                   <th>Serial</th>
			                   <th>Device ID</th>
			                   <th>Parameter</th>                  
			                   <th>Value</th>                  
			                   <th>Remarks</th>
			                </tr>
						</thead>
						<tbody>
							<?php
							$serial = 0;
							foreach($alarm as $report)
							{
							?> 
            				<tr>
			                  <td><?php echo $serial++; ?></td>                
			                  <td><?php echo $report['device_id']; ?></td>                
			                  <td><?php echo $report['parameter']; ?></td>
			                  <td><?php echo $report['value']; ?></td>                  
			                  <td><?php echo $report['remarks']; ?>&nbsp;&nbsp;
			                   <?php echo $node_name; ?>&nbsp;&nbsp;
			                    <?php echo $report['parameter']; ?>
			                   </td>                
           					</tr>
             			 <?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
