<?php
include APPPATH.'views/'.'connection.php';

$date = array();
$litre = array();

$m= date("m"); // Month value
$de= date("d"); //today's date
$y= date("Y"); // Year value
for($i = 0; $i <= 7; $i++)
{
    $date_time =  date('Y-m-d', mktime(0,0,0,$m,($de-$i),$y));
    $sql = "SELECT `date_time`, `quantity` FROM `fuel` WHERE CAST(`date_time` AS DATE) = '$date_time' ORDER BY `date_time` DESC LIMIT 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {
            array_push($litre, $row['quantity']);
        }
    }
    else
    {
        array_push($litre, 0);
    }

    array_push($date, date('Y-m-d', mktime(0,0,0,$m,($de-$i),$y)));

}

$dataPoints = array(
    array("label"=> $date[6], "y"=>  abs($litre[6] - $litre[7])),
    array("label"=> $date[5], "y"=>  abs($litre[5] - $litre[6])),
    array("label"=> $date[4], "y"=>  abs($litre[4] - $litre[5])),
    array("label"=> $date[3], "y"=>  abs($litre[3] - $litre[4])),
    array("label"=> $date[2], "y"=>  abs($litre[2] - $litre[3])),
    array("label"=> $date[1], "y"=>  abs($litre[1] - $litre[2])),
    array("label"=> $date[0], "y"=>  abs($litre[0] - $litre[1])),
); 


/**
**Ebergy Usge
**/
$pdb = $avg_pdb->energy_pdb;
$gte = $avg_generator->energy_gte;
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
** Humidity
**/
$Huidity = $get_avg_humidity->humidity;
$dataPoints_humidity = array(
    array("label"=> "", "y"=> round(100-$Huidity, 2)),
    array("label"=> "HUMIDITY", "y"=> round($Huidity, 2)),
);

/**
** Time use generator, pdb
**/
$dataPoints_time = array(
    array("label"=> "GENERATOR", "y"=> 261),
    array("label"=> "PDB", "y"=> 590),
);


?>