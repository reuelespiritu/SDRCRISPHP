<?php

require_once ('model/m_event_data.php');

function geteventdata_area() {
    $result = array();
    $result = getalleventdata_area();
    return $result;
}

function submit_eventdata_area($projectid, $data, $userid) {
        $fh = fopen($data['tmp_name'], 'r+');
        $lines = array();
        while (($row = fgetcsv($fh, 8192)) !== FALSE) {
            $lines[] = $row;
        }
        $x = 0;
        
    $arr_content = array();
        $checker = array();
        foreach ($lines as $arr_result) {
            
        if ($x > 0) {
            $incident = $arr_result[0];
            if ($incident == NULL || !is_string($incident)) {
                array_push($checker, $x);
            }
            $year = $arr_result[1];
            if ($year == NULL || $year < 0) {
                array_push($checker, $x);
            }
            $month= $arr_result[2];
            if ($month== NULL || $month< 0) {
                array_push($checker, $x);
            }
            $municipality = $arr_result[3];
            if ($municipality == NULL || !is_string($municipality)) {
                array_push($checker, $x);
            }
            $barangay = $arr_result[4];
            if ($barangay == NULL || !is_string($barangay)) {
                array_push($checker, $x);
            }
            $region = $arr_result[5];
            if ($region== NULL || !is_string($region)) {
                array_push($checker, $x);
            }
            $numofdeaths = $arr_result[6];
            if ($numofdeaths < 0) {
                array_push($checker, $x);
            }
            $number_of_incidents= $arr_result[7];
            if ($number_of_incidents< 0) {
                array_push($checker, $x);
            }
            $projectID = $projectid;
            $number_of_deaths = $numofdeaths;
            $uploadedBy = $userid;
            $x++;

            $newdata = array(
                'project' => $projectID,
                'region' => $region,
                'year' => $year,
                'month' => $month,
                'incident' => $incident,
                'municipality' => $municipality,
                'barangay' => $barangay,
                'numberofdeaths' => $number_of_deaths,
                'numberofincidents' => $number_of_incidents,
                'uploadedby' => $uploadedBy
            );
            array_push($arr_content, $newdata);
        }
        $x++;
        }
        

    if ($checker==NULL) {
        foreach ($arr_content as $line) {

            $projectID = $line['project'];
            $region = $line['region'];
            $year = $line['year'];
            $month = $line['month'];
            $incident = $line['incident'];
            $municipality = $line['municipality'];
            $barangay = $line['barangay'];
            $number_of_deaths = $line['numberofdeaths'];
            $number_of_incidents = $line['numberofincidents'];
            $uploadedBy = $line['uploadedby'];
          

upload_eventdata($projectID, $region, $year, $month, $municipality, $incident, $barangay, $number_of_deaths, $number_of_incidents, $uploadedBy);
        }
        return 1;
    } else {
        
        return $checker;
        
    }
}

function submit_form_eventdata_area($projectID, $incident, $year, $municipality, $barangay, $number_of_deaths, $uploadedBy){
    $controller_result = uploadeventdata_area($projectID, $incident, $year, $municipality, $barangay, $number_of_deaths, $uploadedBy);
    echo "<script type='text/javascript'>alert('Event Data per area successfully uploaded!');</script>";
    
    if ($controller_result!=FALSE){
    header('Location: visualization_eventdataarea.php');}
}
?>

