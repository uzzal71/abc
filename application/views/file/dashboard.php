<!-- Graph Calculation this php script file -->
<?php include APPPATH.'views/'.'dashboard_calculation.php'; ?>
<!-- Graph Calculation this php script file -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="main_part">
                <!-- Search Form -->
                <div class="row">
                    <div class="col-md-12">
                        <form autocomplete="off" action="<?php echo site_url('admin/dashboard_search'); ?>" method="post">
                            <div class="col-md-3">
                                <label for="titleText">Circle</label>
                                <select name="circle_id" id="circle_id" onchange="get_region_id()" style="width: 100%;height: 40px;border-radius: 2px;">
                                    <option value="all">All</option>
                                    <?php foreach ($get_circle as $circle) {?>
                                        <option value="<?php echo $circle['circle_id']?>" required>
                                            <?php echo $circle['circle_id']?>&nbsp;<?php echo $circle['circle_name']?>
                                        </option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="titleText">Region</label>
                                <select name="region_id" id="region_id" onchange="get_site_id()" style="width: 100%;height: 40px;">
                                    <option value="all">All</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="titleText">Site </label>
                                <select name="site_id" id="site_id" style="width: 100%;height: 40px;">
                                    <option value="all">All</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="titleText" >Day Count </label>
                                <input type="number" name="day_count" min="1" max="30" placeholder="Type DayCount" style="width: 100%;height: 40px;" required>
                            </div>

                            <div class="col-md-1"><label for="titleText"></label>
                                <button type="submit" style="margin-top: 10px;" id="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Search Form -->
                <br>
                <!-- Energy Usage, Temparature, Huidity -->
                <div class="row" style="padding: 10px">
                    <div class="col-md-4">
                        <div class="single_div">
                            <h2><i class="fas fa-tachometer-alt"></i> Energy Usage (kWh)</h2>
                            <div id="chartContainer1" style="height: 250px; width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single_div">
                            <h2><i class="fas fa-cloud-sun-rain"></i> Temparature</h2>
                            <div class="temparature">
                                <p>
                                    <?php echo round($avg_temp->temp, 2);?>&#x2103;
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single_div">
                            <h2><i class="fab fa-creative-commons-sampling"></i> Humidity</h2>
                            <div id="chartContainer2" style="height: 250px; width: 100%;background-color: #f1f1f1"></div>
                        </div>
                    </div>
                </div>
                <!-- Energy Usage, Temparature, Huidity -->
                <br>
                <!-- Fuel, time -->
                <div class="row" style="padding: 10px">
                    <div class="col-md-6">
                        <div class="fuel_div">
                            <h2><i class="fas fa-flask"></i> Fuel Consumption (litre)</h2>
                            <div id="chartContainer3" style="height: 320px; width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="time">
                            <h2><i class="far fa-clock"></i> Time</h2>
                            <div id="chartContainer4" style="height: 300px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <!-- Fuel, time -->

                <br>

            </div>
        </div>
    </div>
</section>

<!-- Ajax Request please view dashboard_load_graph.php file -->
<!-- Ajax Request please view dashboard_load_graph.php file -->
<?php include APPPATH.'views/'.'dashboard_load_graph.php'; ?>
<!-- Ajax Request please view dashboard_load_graph.php file -->
<!-- Ajax Request please view dashboard_load_graph.php file -->
