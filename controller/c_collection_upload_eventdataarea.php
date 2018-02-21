<?php

require_once ('model/m_event_data_per_area.php');

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
            $municipality = $arr_result[2];
            if ($municipality == NULL || is_string($incident)) {
                $checker['municipality'] = $x;
            }
            $barangay = $arr_result[3];
            if ($barangay == NULL || is_string($barangay)) {
                $checker['barangay'] = $x;
            }
            $numofdeaths = $arr_result[4];
            if ($numofdeaths < 0) {
                $checker['numofdeaths'] = $x;
            }
            $projectID = $projectid;
            $number_of_deaths = $numofdeaths;
            $uploadedBy = $userid;
            $x++;

            if ($x!=2){
            $controller_result = uploadeventdata_area($projectID, $incident, $year, $municipality, $barangay, $number_of_deaths, $uploadedBy);}
        }
        echo "<script type='text/javascript'>alert('Event Data per area successfully uploaded!');</script>";
        
        header('Location: visualization_eventdataarea.php');
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

