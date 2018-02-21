<?php


function getalleventdata_area(){
     require_once('dbconnect.php');

    $query = "SELECT * FROM event_data_per_area WHERE active = 1";
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


function uploadeventdata_area($projectID,$incident,$year,$municipality,$barangay,$number_of_deaths,$uploadedBy){
    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');

    $query = "INSERT INTO event_data_per_area (projectID,incident,year,municipality,barangay,number_of_deaths,uploadedBy,uploadDate) VALUES('$projectID','$incident','$year','$municipality','$barangay','$number_of_deaths','$uploadedBy','$datenow')";
      $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {

        return $query;
    }
}


?>

