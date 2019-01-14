<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<!-- Code Here.... -->
				<div class="table_view">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
			                  <th>Serial</th>
			                  <th>Site ID</th>
			                  <th>Site Name</th>
			                  <th>Alarm Created</th>
			                  <th>Status</th>
			                </tr>
						</thead>
						<tbody> 
            			<?php
            			$serial = 0;
            			foreach ($site_list as $site)
            			{
            			$serial++;
            			?>              
            			<tr>
            				<td><?php echo $serial; ?></td>
		                  <td><?php echo $site['site_id']?></td>
		                  <td><?php echo $site['site_name']?></td>

		              <td>
	                  <?php
	                  $site_id = $site['site_id'];
			          $query = $this->db->query("SELECT DISTINCT `site_id`, `date_time` FROM `alarm` WHERE `site_id` = '$site_id' ORDER BY date_time DESC LIMIT 1 ");
			          $alarms = $query->result_array();
	                   if($alarms)
	                   {
	                    foreach($alarms as $alarm){
	                     	echo $alarm['date_time'];
	                    }
	                	}
	                	?> 
              			</td>

		          		<td>
	                  <?php
	                  $site_id = $site['site_id'];
			          $query = $this->db->query("SELECT DISTINCT `site_id`, `date_time` FROM `alarm` WHERE `site_id` = '$site_id' ORDER BY date_time DESC LIMIT 1 ");
			          $alarms = $query->result_array();
	                  if($alarms)
	                  {
	                    foreach($alarms as $alarm):
	                      ?>
	                      
	                      
	                      <a href="<?php echo site_url('SITE-ALARM-DISPLAY/'.$site_id);?>"><div class="led-red"></div></a>
	                      <?php
	                    endforeach;
	                  }
	                  else {?>
	                    <a href="<?php echo site_url('SITE-ALARM-DISPLAY/'.$site_id);?>"><div class="led-green"></div></a>
	                    
	                    <?php }?> 
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
