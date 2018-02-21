<?php

require_once ('model/m_health_data_per_region.php');

function diseases() {
    $result = array();
    $result = getalldiseases();
    return $result;
}

function submit_healthdata_region($projectid, $data, $userid) {

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
            $region = $arr_result[1];
            if ($region == NULL || is_string($region)) {
                $checker['region'] = $x;
            }
            $awdiarrhea = $arr_result[2];
            if ($awdiarrhea < 0) {
                $checker['awdiarrhea'] = $x;
            }
            $abdiarrhea = $arr_result[3];
            if ($abdiarrhea < 0) {
                $checker['abdiarrhea'] = $x;
            }
            $hepatitis = $arr_result[4];
            if ($hepatitis < 0) {
                $checker['hepatitis'] = $x;
            }
            $typhoidfever = $arr_result[5];
            if ($typhoidfever < 0) {
                $checker['typhoidfever'] = $x;
            }
            $cholera = $arr_result[6];
            if ($cholera < 0) {
                $checker['cholera'] = $x;
            }
            $dengue = $arr_result[7];
            if ($dengue < 0) {
                $checker['dengue'] = $x;
            }
            $malaria = $arr_result[8];
            if ($malaria < 0) {
                $checker['malaria'] = $x;
            }
            $leptospirosis = $arr_result[9];
            if ($leptospirosis < 0) {
                $checker['leptospirosis'] = $x;
            }
            $tetanus = $arr_result[10];
            if ($tetanus < 0) {
                $checker['tetanus'] = $x;
            }
             $projectID = $projectid;
            $userID = $userid;

            $x++;

            $controller_result = uploadhealtdataregion($projectID, $year, $region, $awdiarrhea, $abdiarrhea, $hepatitis, $typhoidfever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userID);
        }
        echo "<script type='text/javascript'>alert('Health Data per region successfully uploaded!');</script>";
        
        header('Location: visualization_healthdataregion.php');
    }else{
        echo "<script type='text/javascript'>alert('Please Upload a .csv file!');</script>";
    }
}

function submit_form_healthdata_region($projectid, $year, $region, $awdiarrhea, $abdiarrhea, $hepatitis, $typhoidfever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userid){
    $controller_result = uploadhealtdataregion($projectid, $year, $region, $awdiarrhea, $abdiarrhea, $hepatitis, $typhoidfever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userid);
    echo "<script type='text/javascript'>alert('Health Data per region entry successfully uploaded!');</script>";
    
    header('Location: visualization_healthdataregion.php');
}
