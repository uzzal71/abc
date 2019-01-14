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
			<table id="horizental" class="display nowrap" style="width:100%">
                <thead>
                <tr>

                  <th>Serial</th>
                  <th>Device ID</th>
                  <th>Site ID</th>                  
                  <th>Site Name</th>                  
                  <th>Node ID</th>                  
                  <th>Node Name</th>                  
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
                  <th>ACTION</th>   
                </tr>
                </thead>
                <tbody> 

            <?php
            $serial = 0; 
            foreach ($get_io_input as $io_log)
             {
              $serial++;
              ?>   

            <tr>
                <td><?php echo $serial; ?></td>
                  <td><?php echo $io_log['device_id']?></td>
                  <td><?php echo $io_log['site_id']?></td>
                   <td><?php
                      $this->db->select('*');
                      $this->db->from('site');
                      $this->db->where('site_id', $io_log['site_id']);
                      $query_result = $this->db->get();
                      $result = $query_result->row();
                      echo $result->site_name;
                    ?></td>
                  <td><?php echo $io_log['node_id']?></td>
                   <td>
                    <?php 
                      $this->db->select('*');
                    $this->db->from('device');
                    $this->db->where('node_id', $io_log['node_id']);
                    $this->db->where('node_type', 4);
                    $query_result = $this->db->get();
                    $result = $query_result->row();
                    echo $result->node_name;
                    ?></td>
                  <td><?php if ($io_log['ac1']==1) 
                             {
                            echo "PDB";
                              }
                            elseif ($io_log['ac1']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['ac1']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['ac1']==4) {
                               echo "Others";
                             } ?>
                  </td>


                  <td><?php if($io_log['ac2']==1)
                              {
                            echo "PDB";
                              }
                            elseif ($io_log['ac2']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['ac2']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['ac2']==4) {
                               echo "Others";
                             }?></td>


                  <td><?php if ($io_log['ac3']==1)
                        {
                             echo "PDB";
                              }
                            elseif ($io_log['ac3']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['ac3']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['ac3']==4) {
                               echo "Others";

                  }?></td>

                  <td><?php if ($io_log['ac4']==1)
                        {
                             echo "PDB";
                              }
                            elseif ($io_log['ac4']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['ac4']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['ac4']==4) {
                               echo "Others";

                  }?></td>

                  <td><?php if ($io_log['external1']==1)
                        {
                             echo "PDB";
                              }
                            elseif ($io_log['external1']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['external1']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['external1']==4) {
                               echo "Others";

                  }?></td>

                  <td><?php if ($io_log['external2']==1)
                        {
                             echo "PDB";
                              }
                            elseif ($io_log['external2']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['external2']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['external2']==4) {
                               echo "Others";

                  }?></td>

                  <td><?php if ($io_log['external3']==1)
                        {
                             echo "PDB";
                              }
                            elseif ($io_log['external3']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['external3']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['external3']==4) {
                               echo "Others";

                  }?></td>

                  <td><?php if ($io_log['external4']==1)
                        {
                            echo "PDB";
                              }
                            elseif ($io_log['external4']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['external4']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['external4']==4) {
                               echo "Others";
                  }?></td>

                  <td><?php if ($io_log['analogue1']==1)
                        {
                             echo "PDB";
                              }
                            elseif ($io_log['analogue1']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['analogue1']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['analogue1']==4) {
                               echo "Others";

                  }?></td>

                  <td><?php if ($io_log['analogue2']==1)
                        {
                            echo "PDB";
                              }
                            elseif ($io_log['analogue2']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['analogue2']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['analogue2']==4) {
                               echo "Others";

                  }?></td>

                  <td><?php if ($io_log['analogue3']==1)
                        {
                            echo "PDB";
                              }
                            elseif ($io_log['analogue3']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['analogue3']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['analogue3']==4) {
                               echo "Others";

                  }?></td>
                  
                  <td><?php if ($io_log['analogue4']==1)
                        {
                             echo "PDB";
                              }
                            elseif ($io_log['analogue4']==2) {
                               echo "UPS";
                             } 
                             elseif ($io_log['analogue4']==3) {
                               echo "Generator";
                             } 
                             elseif ($io_log['analogue4']==4) {
                               echo "Others";

                  }?></td>
                <td>
                	<a href="<?php echo base_url('IO-INPUT-EDIT/'.$io_log['id']);?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                   <a onclick="return ConfirmDelete()" href="<?php echo base_url('IO-INPUT-DELETE/'.$io_log['id'])?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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

