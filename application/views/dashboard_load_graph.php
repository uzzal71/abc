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

    // Fule Line Chart
    var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            theme: "light2",
            backgroundColor: "#ecf0f5",
            title: {
                text: ""
            },
            axisY: {
                suffix: " Litre",
                scaleBreaks: {
                    autoCalculate: true
                }
            },
            data: [{
                type: "line",
                yValueFormatString: "#,##0\" Litre\"",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontColor: "white",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });

    // Generator, PDB Use Chart

    var chart4 = new CanvasJS.Chart("chartContainer4", {
    animationEnabled: true,
    exportEnabled: true,
    colorSet: "color3",
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
        dataPoints: <?php echo json_encode($dataPoints_time, JSON_NUMERIC_CHECK); ?>
        }]
    });

chart1.render();
chart2.render();
chart3.render();
chart4.render();

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
