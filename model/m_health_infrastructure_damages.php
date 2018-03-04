<?php

function getallhealthinfrastructuredamages() {
    require_once('dbconnect.php');

    $query = "SELECT hid.*, CONCAT(u.firstname, u.lastname) AS 'uploadedBy', (SELECT id.name FROM infrastructure_damages id WHERE hid.infrastructureDamageType=id.infrastructure_damagesID) AS 'infrastructureDamageType', (SELECT loh.name FROM level_of_hospital loh WHERE hid.hospitalLevel=loh.level_of_hospitalID) AS 'hospitalLevel', (SELECT wsd.name FROM water_system_damages wsd WHERE wsd.water_system_damagesID=hid.waterSystemDamageID) AS 'waterSystemDamageID' FROM health_infrastructure_damages hid JOIN user u ON hid.uploadedBy=u.userID WHERE hid.active = 1";
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

function uploadhealthinfrastructuredamages($projectID,$year,$month,$region,$city,$barangay,$incident,$number_of_incidents,$infrastructureDamageType,$hospital,$hospitalLevel,$waterSystemDamageID,$uploadedBy) {
    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    
    $query = "INSERT INTO health_infrastructure_damages (projectID,year,month,region,city,barangay,incident,number_of_incidents,infrastructureDamageType,hospital,hospitalLevel,waterSystemDamageID,uploadedBy,uploadDate) VALUES('$projectID','$year','$month','$region','$city','$barangay','$incident','$number_of_incidents','$infrastructureDamageType','$hospital','$hospitalLevel','$waterSystemDamageID','$uploadedBy','$datenow')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}


?>

