<?php
include APPPATH.'views/'.'connection.php'; 
/**
** PIE Charts Energy
**/
$pdb = $avg_pdb;
$gte = $avg_generator;

if ($pdb != 0 AND $gte != 0){
    $pdb_percetage = $gte/($pdb + $gte)*100;
    $gte_percetage = $pdb/($gte + $pdb)*100;
}
else{
    $pdb_percetage = 100;
    $gte_percetage = 100;
}

$dataPoints_energy = array(
    array("label"=> "GENERATOR", "y"=> $gte_percetage),
    array("label"=> "PDB", "y"=> $pdb_percetage),
);

/**
** PIE Charts Humidity
**/
$Huidity = $get_avg_humidity;
$dataPoints_humidity = array(
    array("label"=> "", "y"=> round(100-$Huidity, 2)),
    array("label"=> "HUMIDITY", "y"=> round($Huidity, 2)),
);



?>
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
                                    <?php echo round($avg_temp, 2);?>&#x2103;
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
            </div>
        </div>
    </div>
</section>

<script>
    window.onload = function () {

         CanvasJS.addColorSet("color1",
                [//colorSet Array
                "#B2D72D",
                "#FFBA42"              
                ]);

         CanvasJS.addColorSet("color2",
                [//colorSet Array
                "#f46241",
                "#79C379"              
                ]);

    var chart1 = new CanvasJS.Chart("chartContainer1", {
    animationEnabled: true,
    exportEnabled: true,
    colorSet: "color1",
    backgroundColor: "#ecf0f5",
    title:{
        text: ""
    },
    subtitles: [{
        text: ""
    }],
    data: [{
        type: "pie",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label}  #percent%",
        yValueFormatString: "฿#,##0",
        dataPoints: <?php echo json_encode($dataPoints_energy, JSON_NUMERIC_CHECK); ?>
        }]
    });

     /**
    ** pie chart
    **/
    var chart2 = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
    exportEnabled: true,
    colorSet: "color2",
    backgroundColor: "#ecf0f5",
    title:{
        text: ""
    },
    subtitles: [{
        text: ""
    }],
    data: [{
        type: "pie",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} #percent%",
        yValueFormatString: "฿#,##0",
        dataPoints: <?php echo json_encode($dataPoints_humidity, JSON_NUMERIC_CHECK); ?>
        }]
    });

chart1.render();
chart2.render();

}
</script>



<script type="text/javascript">

/**
** Ajax Request get region data
**/
function get_region_id()
{
   var circle_id = $('#circle_id').val();

    $.ajax({
        url:"<?php echo base_url('ajax_controller/fetch_region_id'); ?>",
        method:"POST",
        data:{circle_id:circle_id},
        success:function(data)
        {

            $('#region_id').html(data);
            $('#site_id').html('<option value="all">All</option>');
        }
    });
}

/**
** Ajax Request get site data
**/
function get_site_id()
{
    var region_id = $('#region_id').val();

    $.ajax({
        url:"<?php echo site_url('ajax_controller/fetch_site_id'); ?>",
        method:"POST",
        data:{region_id:region_id},
        success:function(data)
        {
            $('#site_id').html(data);
        }
    });
}

</script>
