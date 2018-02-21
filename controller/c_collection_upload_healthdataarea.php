<?php

require_once ('model/m_health_data_per_area.php');

function diseases() {
    $result = array();
    $result = getalldiseases();
    return $result;
}

function submit_healthdata_area($projectid, $data, $userid) {

    if ($data['type'] == "application/vnd.ms-excel") {
           $fh = fopen($data['tmp_name'], 'r+');
        $lines = array();
        while (($row = fgetcsv($fh, 8192)) !== FALSE) {
            $lines[] = $row;
        }

        $x = 1;
        $checker = array();
        foreach ($lines as $arr_result) {
            $year = $arr_result[0];
            if ($year == NULL || is_string($year)) {
                $checker['year'] = $x;
            }
            $province = $arr_result[1];
            if ($province == NULL || is_string($province)) {
                $checker['province'] = $x;
            }
            $city = $arr_result[2];
            if ($city == NULL || is_string($city)) {
                $checker['city'] = $x;
            }
            $awdiarrhea = $arr_result[3];
            if ($awdiarrhea < 0) {
                $checker['awdiarrhea'] = $x;
            }
            $abdiarrhea = $arr_result[4];
            if ($abdiarrhea < 0) {
                $checker['abdiarrhea'] = $x;
            }
            $hepatitis = $arr_result[5];
            if ($hepatitis < 0) {
                $checker['hepatitis'] = $x;
            }
            $typhoidfever = $arr_result[6];
            if ($typhoidfever < 0) {
                $checker['typhoidfever'] = $x;
            }
            $cholera = $arr_result[7];
            if ($cholera < 0) {
                $checker['cholera'] = $x;
            }
            $dengue = $arr_result[8];
            if ($dengue < 0) {
                $checker['dengue'] = $x;
            }
            $malaria = $arr_result[9];
            if ($malaria < 0) {
                $checker['malaria'] = $x;
            }
            $leptospirosis = $arr_result[10];
            if ($leptospirosis < 0) {
                $checker['leptospirosis'] = $x;
            }
            $tetanus = $arr_result[11];
            if ($tetanus < 0) {
                $checker['tetanus'] = $x;
            }
            $projectID = $projectid;
            $userID = $userid;

            $x++;

            $controller_result = uploadhealtdataarea($projectID, $year, $province, $city, $awdiarrhea, $abdiarrhea, $hepatitis, $typhoidfever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userID);
        }
        echo "<script type='text/javascript'>alert('Health Data per area successfully uploaded!');</script>";

        header('Location: visualization_healthdataarea.php');
    } else {
        echo "<script type='text/javascript'>alert('Please Upload a .csv file!');</script>";
    }
}

function submit_form_healthdata_area($projectid, $year, $province, $city, $awdiarrhea, $abdiarrhea, $hepatitis, $typhoidfever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userid) {
    $controller_result = uploadhealtdataarea($projectid, $year, $province, $city, $awdiarrhea, $abdiarrhea, $hepatitis, $typhoidfever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userid);
    echo "<script type='text/javascript'>alert('Health Data per area entry successfully uploaded!');</script>";

    header('Location: visualization_healthdataarea.php');
}
