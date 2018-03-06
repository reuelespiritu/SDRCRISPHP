<?php

require_once ('model/m_health_infrastructure_damages.php');
require_once ('model/m_facilities.php');

function submit_health_infrastructure_damages($projectID, $data, $userid) {
    if ($data['type'] == "application/vnd.ms-excel") {
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
                $year = $arr_result[0];
                if ($year == NULL) {
                    array_push($checker, $x);
                }
                $month = $arr_result[1];
                if ($month == NULL || !is_string($month)) {
                    array_push($checker, $x);
                }
                $region = $arr_result[2];
                if ($region == NULL || !is_string($region)) {
                    array_push($checker, $x);
                }
                $city = $arr_result[3];
                if ($city == NULL || !is_string($city)) {
                    array_push($checker, $x);
                }
                $barangay = $arr_result[4];
                if ($barangay == NULL || !is_string($barangay)) {
                    array_push($checker, $x);
                }
                $d = $arr_result[5];
                $facility = comparefacility($d);
                if ($facility <= 0) {
                    array_push($checker, $x);
                }
                $existing = $arr_result[6];
                if ($existing == NULL || $existing < 0) {
                    array_push($checker, $x);
                }
                $available_for_use = $arr_result[7];
                if ($available_for_use < 0) {
                    array_push($checker, $x);
                }
                $damaged_by_event_incident = $arr_result[8];
                if ($damaged_by_event_incident < 0) {
                    array_push($checker, $x);
                }


                $functional = $arr_result[9];
                if ($functional == "YES") {
                    $functional = 1;
                } else {
                    $functional = 2;
                }
                if ($functional == NULL) {
                    array_push($checker, $x);
                }

                $newdata = array(
                    'year' => $year,
                    'month' => $month,
                    'region' => $region,
                    'city' => $city,
                    'barangay' => $barangay,
                    'facility' => $facility,
                    'existing' => $existing,
                    'available_for_use' => $available_for_use,
                    'damaged_by_event_incident' => $damaged_by_event_incident,
                    'functional' => $functional,
                    'uploadedby' => $userid,
                    'project' => $projectID
                );
                array_push($arr_content, $newdata);
            }
            $x++;
        }

        if ($checker == NULL) {
            foreach ($arr_content as $line) {
                $year = $line['year'];
                $month = $line['month'];
                $region = $line['region'];
                $city = $line['city'];
                $barangay = $line['barangay'];
                $facility = $line['facility'];
                $existing = $line['existing'];
                $available_for_use = $line['available_for_use'];
                $damaged_by_event_incident = $line['damaged_by_event_incident'];
                $functional = $line['functional'];
                $uploadedBy = $line['uploadedby'];
                $projectID = $line['project'];

                uploadhealthinfrastructuredamages($projectID, $year, $month, $region, $city, $barangay, $facility, $existing, $available_for_use, $damaged_by_event_incident, $functional, $uploadedBy);
                }
                return 1;

        } else {
            return $checker;
        }
    }
}

function submit_form_health_infrastructure_damages($projectid, $infradamage, $infradamagetype, $hospital, $hospitallevel, $watersysdamage, $watersysdamagetype, $userid) {
    $controller_result = uploadhealthinfrastructuredamages($projectid, $infradamage, $infradamagetype, $hospital, $hospitallevel, $watersysdamage, $watersysdamagetype, $userid);
    echo "<script type='text/javascript'>alert('Health Infrastructure Damages entry successfully uploaded!');</script>";

    header('Location: visualization_healthinfrastructure.php');
}

function comparefacility($facility) {

    $result = getfacilitybytext($facility);

    if ($result != FALSE) {
        foreach ($result as $arr_result) {
            $keyID = $arr_result['facilitiesID'];
        }
        return $keyID;
    } else {
        return 0;
    }
}
?>

