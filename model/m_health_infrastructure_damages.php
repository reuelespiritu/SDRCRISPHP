<?php

function getallhealthinfrastructuredamages() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM health_infrastructure_damages WHERE active = 1";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);


        $num_rows = mysqli_num_rows($result);
        $query_result = array();

        if ($num_rows > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $query_result[] = $row;
            }
            return $query_result;
        } else {
            return FALSE;
        }
    }
    $con->close();
}

function uploadhealthinfrastructuredamages($projectID,$infrastructureDamage,$infrastructureDamageType,$hospital,$hospitalLevel,$waterSystemDamage,$waterSystemDamageID,$uploadedBy) {
    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    
    $query = "INSERT INTO health_infrastructure_damages (projectID,infrastructureDamage,infrastructureDamageType,hospital,hospitalLevel,waterSystemDamage,waterSystemDamageID,uploadedBy,uploadDate) VALUES('$projectID','$infrastructureDamage','$infrastructureDamageType','$hospital','$hospitalLevel','$waterSystemDamage','$waterSystemDamageID','$uploadedBy','$datenow')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}


?>

