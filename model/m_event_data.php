<?php
function getalleventdata(){
     require_once('dbconnect.php');

    $query = "SELECT ed.*,CONCAT(u.firstname, u.lastname) FROM event_data ed JOIN user u ON ed.uploadedBy=u.userID WHERE ed.active = 1";
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

function upload_eventdata($projectID,$region,$year,$month,$incident,$municipality,$barangay,$number_of_deaths,$number_of_incidents,$uploadedBy){
    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');

    $query = "INSERT INTO event_data (projectID,region,year,month,incident,municipality,barangay,number_of_deaths,number_of_incidents,uploadedBy,uploadDate) VALUES('$projectID','$region','$year','$month','$incident','$municipality','$barangay','$number_of_deaths','$number_of_incidents','$uploadedBy','$datenow')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}
?>

