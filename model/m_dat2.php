<?php
    require_once('dbconnect.php');
    $query = "SELECT (SELECT d.disease FROM diseases d WHERE d.diseaseID=hd.diseaseID) AS 'disease', hd.infected FROM health_data hd WHERE active=1";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    
header( 'Content-Type: application/json' );
    echo json_encode($data);
    $con->close();
