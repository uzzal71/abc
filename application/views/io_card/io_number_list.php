<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<!-- Code Here.... -->
				<div class="table_view" style="padding: 10px">
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
				<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                  <th>Serial</th>
                  <th>Device ID</th>
                  <th>Site ID</th>
                  <th>Site Name</th>                  
                  <th>Node ID</th>                  
                  <th>Node Name</th>                  
                  <th>IO NO</th>                  
                  <th>IO Name</th>                  
                  <th>IO Status</th>
                  <th>ON/OFF</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody> 


                <?php 
                $Serial = 0;
                foreach ($get_io_number as $io_list) 
                {
                  $Serial++;
                ?>

                <tr>

                  <td><?php echo $Serial; ?></td>
                  <td><?php echo $io_list['device_id']?></td>
                  <td><?php echo $io_list['site_id']?></td>
                   <td><?php
                      $this->db->select('*');
                      $this->db->from('site');
                      $this->db->where('site_id', $io_list['site_id']);
                      $query_result = $this->db->get();
                      $result = $query_result->row();
                      echo $result->site_name;
                    ?></td>                  
                  <td><?php echo $io_list['node_id']?></td>
                   <td>
                    <?php 
                      $this->db->select('*');
                    $this->db->from('device');
                    $this->db->where('node_id', $io_list['node_id']);
                    $this->db->where('node_type', 4);
                    $query_result = $this->db->get();
                    $result = $query_result->row();
                    echo $result->node_name;
                    ?></td>
                  <td><?php echo $io_list['io_no']?></td>                
                  <td><?php echo $io_list['io_name']?></td>

                  <td><?php if ($io_list['status']==1)
                   {
                     echo "ON";
                   }
                  elseif ($io_list['status']==0)
                   {
                    echo "OFF";
                   } 
                   ?>
                  </td>

                  <td><?php if ($io_list['status']==1)
                   {
                    ?>
                    <a href="<?php echo base_url('IO-NUMBER-OFF/'.$io_list['id']);?>" class="btn btn-xs btn-danger">OFF</a>
                    <?php
                   }
                  elseif ($io_list['status']==0)
                   {
                    ?>
                    <a href="<?php echo base_url('IO-NUMBER-ON/'.$io_list['id']);?>" class="btn btn-xs btn-warning">ON</a>
                   
                    <?php
                   } 
                   ?>
                  </td>
                 
                  
                  <td>
        				   <a href="<?php echo base_url('IO-NUMBER-EDIT/'.$io_list['id']);?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                   <a onclick="return ConfirmDelete()" href="<?php echo base_url('IO-NUMBER-DELETE/'.$io_list['id'])?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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

