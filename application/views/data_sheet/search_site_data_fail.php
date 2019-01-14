<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="main_part">
				<!-- Search site data -->
				<br>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<form class="form-inline" method="POST" action="<?php echo base_url('SEARCH-SITE-DATA'); ?>">
						  <div class="form-group">
						    <label for="pwd">SITE ID:</label>
						    <select class="form-control search_seleted" name="site_id" id="site_id" style="width: 300px">
						    	<option>SELECT SITE</option>
						    	<option value="all">All site</option>
						    	<?php
							    foreach($get_site as $row)
							    {
							     echo '<option value="'.$row->site_id.'">'.$row->site_id.'</option>';
							    }
							    ?>
						    </select>
						  </div>
						  <button type="submit" class="search_btn btn btn-default">SEARCH DATA</button>
						</form>
					</div>
				</div>
				<!-- Search site data -->
				<br>
				<!-- Search Data Fialed  -->
				<div class="row" style="padding: 10px">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<h3 style="margin-top: 150px;text-align: center;color: blue">No data Found</h3>
				</div>
				<div class="col-md-3"></div>
				</div>
				<!-- Search Data Fialed  -->
			</div>
		</div>
	</div>
</section>
 