<?php

function getallhealthdata() {
    require_once('dbconnect.php');

    $query = "SELECT hd.*, CONCAT(u.firstname, u.lastname) FROM sdrcris.health_data hd JOIN sdrcris.user u ON hd.uploadedBy=u.userID WHERE hd.active = 1;";
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

function upload_healthdata($projectID,$year,$month,$region,$city,$AWdiarrhea,$ABdiarrhea,$hepatitis,$typhoidparatyphoidFever,$cholera,$dengue,$malaria,$leptospirosis,$tetanus,$pneumonia,$bronchitis,$influenza,$TBrespiratory,$chickenpox,$dengueFever,$measles,$hypertension,$diseasesOfTheHeart,$respiratoryInfection,$diabetes,$uploadedBy) {
    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');

    $query = "INSERT INTO health_data (projectID,year,month,region,city,AWdiarrhea,ABdiarrhea,hepatitis,typhoidparatyphoidFever,cholera,dengue,malaria,leptospirosis,tetanus,pneumonia,bronchitis,influenza,TBrespiratory,chickenpox,dengueFever,measles,hypertension,diseasesOfTheHeart,respiratoryInfection,diabetes,uploadedBy,uploadDate) VALUES('$projectID','$year','$month','$region','$city','$AWdiarrhea','$ABdiarrhea','$hepatitis','$typhoidparatyphoidFever','$cholera','$dengue','$malaria','$leptospirosis','$tetanus','$pneumonia','$bronchitis','$influenza','$TBrespiratory','$chickenpox','$dengueFever','$measles','$hypertension','$diseasesOfTheHeart','$respiratoryInfection','$diabetes','$uploadedBy','$datenow')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}
?>

