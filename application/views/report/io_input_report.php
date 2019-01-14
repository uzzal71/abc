<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<!-- Code Here.... -->
				<div class="table_view" style="padding: 10px">	 
					<table id="horizental" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                  <th>Device ID</th>
                  <th>Site ID</th>                  
                  <th>Node</th>                  
                  <th>Date Time</th>                  
                  <th>AC1</th>                  
                  <th>AC2</th>                  
                  <th>AC3</th>                  
                  <th>AC4</th>
                  <th>D-In1</th>                  
                  <th>D-In2</th>                  
                  <th>D-In3</th>                  
                  <th>D-In4</th>
                  <th>A-In1</th>                  
                  <th>A-In2</th>                  
                  <th>A-In3</th>                  
                  <th>A-In4</th>      
                               
                </tr>
                </thead>
                <tbody> 

            <?php foreach ($report_io as $io_log) {?>   

            <tr>
                  <td><?php echo $io_log['device_id']?></td>
                  <td><?php echo $io_log['site_id']?></td>
                  <td><?php echo $io_log['node_id']?></td>
                  <td><?php echo $io_log['date_time']?></td>
                  <td><?php if ($io_log['ac1']==1) 
                             {
                            echo "ON";
                              }
                            else {
                            echo "OFF";
                            }?>
                  </td>


                  <td><?php if($io_log['ac2']==1)
                              {
                            echo "ON";
                              }
                            else {
                            echo "OFF";
                             }?></td>


                  <td><?php if ($io_log['ac3']==1)
                        {
                             echo "ON";
                              }
                            else {
                            echo "OFF";

                  }?></td>

                  <td><?php if ($io_log['ac4']==1)
                        {
                             echo "ON";
                              }
                            else {
                            echo "OFF";

                  }?></td>

                  <td><?php if ($io_log['ext1']==1)
                        {
                             echo "ON";
                              }
                            else {
                            echo "OFF";

                  }?></td>

                  <td><?php if ($io_log['ext2']==1)
                        {
                             echo "ON";
                              }

                            else {
                            echo "OFF";

                  }?></td>

                  <td><?php if ($io_log['ext3']==1)
                        {
                             echo "ON";
                              }
                            else {
                            echo "OFF";

                  }?></td>

                  <td><?php if ($io_log['ext4']==1)
                        {
                             echo "ON";
                              }
                            else {
                            echo "OFF";

                  }?></td>

                  <td><?php echo $io_log['anlg1'];?></td>
                  <td><?php echo $io_log['anlg2'];?></td>
                  <td><?php echo $io_log['anlg3'];?></td>
                  <td><?php echo $io_log['anlg4'];?></td>
         
            </tr>

            <?php }?>

                </tbody>
               
              </table>
				</div>
			</div>
		</div>
	</div>
</section>
