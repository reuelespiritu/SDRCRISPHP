<?php

require_once ('model/m_event_data_per_region.php');

function geteventdata_region() {
    $result = array();
    $result = getalleventdata_region();
    return $result;
}

function submit_eventdata_region($projectid, $data, $userid) {

    if ($data['type'] == "application/vnd.ms-excel") {
        $fh = fopen($data['tmp_name'], 'r+');
        $lines = array();
        while (($row = fgetcsv($fh, 8192)) !== FALSE) {
            $lines[] = $row;
        }

        $x = 1;
        $checker = array();
        foreach ($lines as $arr_result) {
            $region = $arr_result[0];
            if ($region == NULL || is_string($region)) {
                $checker['region'] = $x;
            }
            $incident = $arr_result[1];
            if ($incident == NULL || is_string($incident)) {
                $checker['incident'] = $x;
            }
            $year = $arr_result[2];
            if ($year == NULL || $year < 0) {
                $checker['year'] = $x;
            }
            $municipality = $arr_result[3];
            if ($municipality == NULL || is_string($incident)) {
                $checker['municipality'] = $x;
            }
            $barangay = $arr_result[4];
            if ($barangay == NULL || is_string($barangay)) {
                $checker['barangay'] = $x;
            }
            $numofdeaths = $arr_result[5];
            if ($numofdeaths < 0) {
                $checker['numofdeaths'] = $x;
            }

            $x++;

            if ($x != 2) {

                $controller_result = uploadeventdata_region($projectid, $region, $incident, $year, $municipality, $barangay, $numofdeaths, $userid);
            }
        }
        echo "<script type='text/javascript'>alert('Event Data per region successfully uploaded!');</script>";

        header('Location: visualization_eventdataregion.php');
    }
    echo "<script type='text/javascript'>alert('Please upload a csv file!');</script>";
}

function submit_form_eventdata_region($projectid, $region, $incident, $year, $municipality, $barangay, $numofdeaths, $userid) {
    $controller_result = uploadeventdata_region($projectid, $region, $incident, $year, $municipality, $barangay, $numofdeaths, $userid);
    echo "<script type='text/javascript'>alert('Event Data p    er region successfully uploaded!');</script>";

    header('Location: visualization_eventdataregion.php');
}
?>

