<?php

require_once ('model/m_health_data.php');

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
            if ($month == NULL || is_string($month)) {
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
            $region = $arr_result[3];
            if ($region == NULL || is_string($region)) {
                $checker['city'] = $x;
            }
            $awdiarrhea = $arr_result[4];
            if ($awdiarrhea < 0) {
                $checker['awdiarrhea'] = $x;
            }
            $abdiarrhea = $arr_result[5];
            if ($abdiarrhea < 0) {
                $checker['abdiarrhea'] = $x;
            }
            $hepatitis = $arr_result[6];
            if ($hepatitis < 0) {
                $checker['hepatitis'] = $x;
            }
            $typhoidfever = $arr_result[7];
            if ($typhoidfever < 0) {
                $checker['typhoidfever'] = $x;
            }
            $cholera = $arr_result[8];
            if ($cholera < 0) {
                $checker['cholera'] = $x;
            }
            $dengue = $arr_result[9];
            if ($dengue < 0) {
                $checker['dengue'] = $x;
            }
            $malaria = $arr_result[10];
            if ($malaria < 0) {
                $checker['malaria'] = $x;
            }
            $leptospirosis = $arr_result[11];
            if ($leptospirosis < 0) {
                $checker['leptospirosis'] = $x;
            }
            $tetanus = $arr_result[12];
            if ($tetanus < 0) {
                $checker['tetanus'] = $x;
            }
            $pneumonia = $arr_result[13];
            if ($pneumonia < 0) {
                $checker['tetanus'] = $x;
            }
            $bronchitis = $arr_result[14];
            if ($bronchitis < 0) {
                $checker['tetanus'] = $x;
            }
            $influenza = $arr_result[15];
            if ($influenza < 0) {
                $checker['tetanus'] = $x;
            }
            $TBrespiratory = $arr_result[16];
            if ($TBrespiratory < 0) {
                $checker['tetanus'] = $x;
            }
            $chickenpox = $arr_result[17];
            if ($chickenpox < 0) {
                $checker['tetanus'] = $x;
            }
            $dengueFever = $arr_result[18];
            if ($dengueFever < 0) {
                $checker['tetanus'] = $x;
            }
            $measles = $arr_result[19];
            if ($measles < 0) {
                $checker['tetanus'] = $x;
            }
            $hypertension = $arr_result[20];
            if ($hypertension < 0) {
                $checker['tetanus'] = $x;
            }
            $diseasesOfTheHeart = $arr_result[21];
            if ($diseasesOfTheHeart < 0) {
                $checker['tetanus'] = $x;
            }
            $respiratoryInfection = $arr_result[22];
            if ($respiratoryInfection < 0) {
                $checker['tetanus'] = $x;
            }
            $diabetes = $arr_result[23];
            if ($diabetes < 0) {
                $checker['tetanus'] = $x;
            }
            $projectID = $projectid;
            $uploadedBy = $userid;

         
            $controller_result = upload_healthdata($projectID, $year, $month, $region, $city, $awdiarrhea, $abdiarrhea, $hepatitis, $typhoidfever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $pneumonia, $bronchitis, $influenza, $TBrespiratory, $chickenpox, $dengueFever, $measles, $hypertension, $diseasesOfTheHeart, $respiratoryInfection, $diabetes, $uploadedBy); 
   }
            $x++;
     
        header('Location: visualization_healthdata.php');
            } else {
        echo "<script type='text/javascript'>alert('Please Upload a .csv file!');</script>";
    }
}

function submit_form_healthdata_area($projectid, $year, $province, $city, $awdiarrhea, $abdiarrhea, $hepatitis, $typhoidfever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userid) {
    $controller_result = uploadhealtdataarea($projectid, $year, $province, $city, $awdiarrhea, $abdiarrhea, $hepatitis, $typhoidfever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userid);
    echo "<script type='text/javascript'>alert('Health Data per area entry successfully uploaded!');</script>";

    header('Location: visualization_healthdataarea.php');
}
