<?php

require_once ('model/m_event_data.php');

function geteventdata_area() {
    $result = array();
    $result = getalleventdata_area();
    return $result;
}

function submit_eventdata_area($projectid, $data, $userid) {
    if($data['type'] == "application/vnd.ms-excel") {
        $fh = fopen($data['tmp_name'], 'r+');
        $lines = array();
        while (($row = fgetcsv($fh, 8192)) !== FALSE) {
            $lines[] = $row;
        }
        $x = 1;
        $checker = array();
        foreach ($lines as $arr_result) {
            $incident = $arr_result[0];
            if ($incident == NULL || is_string($incident)) {
                $checker['incident'] = $x;
            }
            $year = $arr_result[1];
            if ($year == NULL || $year < 0) {
                $checker['year'] = $x;
            }
            $month= $arr_result[2];
            if ($month== NULL || $month< 0) {
                $checker['month'] = $x;
            }
            $municipality = $arr_result[3];
            if ($municipality == NULL || is_string($incident)) {
                $checker['municipality'] = $x;
            }
            $barangay = $arr_result[4];
            if ($barangay == NULL || is_string($barangay)) {
                $checker['barangay'] = $x;
            }
            $region = $arr_result[5];
            if ($region== NULL || is_string($region)) {
                $checker['region'] = $x;
            }
            $numofdeaths = $arr_result[6];
            if ($numofdeaths < 0) {
                $checker['numofdeaths'] = $x;
            }
            $number_of_incidents= $arr_result[7];
            if ($numofincidents< 0) {
                $checker['numofincidents'] = $x;
            }
            $projectID = $projectid;
            $number_of_deaths = $numofdeaths;
            $uploadedBy = $userid;
            $x++;

            if ($x!=2){
            $controller_result = upload_eventdata($projectID, $region, $year, $month, $incident, $municipality, $barangay, $number_of_deaths, $number_of_incidents, $uploadedBy);}
        }
        echo "<script type='text/javascript'>alert('Event Data per area successfully uploaded!');</script>";
        
        header('Location: visualization_eventdata.php');
    }else{
        echo "<script type='text/javascript'>alert('Please upload a csv file!');</script>";
    }
}

function submit_form_eventdata_area($projectID, $incident, $year, $municipality, $barangay, $number_of_deaths, $uploadedBy){
    $controller_result = uploadeventdata_area($projectID, $incident, $year, $municipality, $barangay, $number_of_deaths, $uploadedBy);
    echo "<script type='text/javascript'>alert('Event Data per area successfully uploaded!');</script>";
    
    if ($controller_result!=FALSE){
    header('Location: visualization_eventdataarea.php');}
}
?>

