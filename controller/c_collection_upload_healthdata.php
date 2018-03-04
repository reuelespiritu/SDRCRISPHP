<?php

require_once ('model/m_health_data.php');
require_once ('model/m_diseases.php');

function diseases() {
    $result = array();
    $result = getalldiseases();
    return $result;
}

function submit_healthdata($projectid, $data, $userid) {

    $fh = fopen($data['tmp_name'], 'r+');
    $lines = array();
    while (($row = fgetcsv($fh, 8192)) !== FALSE) {
        $lines[] = $row;
    }

    $x = 0;
    $checker = array();
    $arr_content = array();

    foreach ($lines as $arr_result) {


        if ($x > 0) {
            $year = $arr_result[0];
            if ($year == NULL || !is_string($year)) {
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
            $d = $arr_result[4];
            $disease = comparedisease($d);
            if ($disease <= 0) {
                array_push($checker, $x);
            }
            $infected = $arr_result[5];
            if ($infected <= 0) {
                array_push($checker, $x);
            }
            $communicable = $arr_result[6];
            if ($communicable == 'YES') {
                $communicable = 1;
            } else {
                $communicable = 0;
            }
            if ($communicable < 0) {
                array_push($checker, $x);
            }
            if ($communicable == 1) {
                
                $through = $arr_result[7];
                if ($through == NULL || !is_string($through)) {
                    array_push($checker, $x);
                }
            }

            $projectID = $projectid;
            $uploadedBy = $userid;





            $newdata = array(
                'year' => $year,
                'month' => $month,
                'region' => $region,
                'city' => $city,
                'disease' => $disease,
                'infected' => $infected,
                'uploadedBy' => $uploadedBy,
                'project' => $projectID
            );
            array_push($arr_content, $newdata);
        }

        $x++;
    }


    if ($checker == NULL) {
        foreach ($arr_content as $line) {

            $projectID = $line['project'];
            $year = $line['year'];
            $month = $line['month'];
            $region = $line['region'];
            $city = $line['city'];
            $disease = $line['disease'];
            $infected = $line['infected'];
            $uploadedBy = $line['uploadedBy'];



                        upload_health_data($projectID, $year, $month, $region, $city, $disease, $infected, $uploadedBy);
//Sstill Having Errors from here
//            $z = 0;
//            foreach ($keywordsarray as $key) {
//
//                $result = comparekeyword($key[$z]);
//
//                if ($result > 0) {
//                    
//                } else if (is_string($result)) {
//
//                    return $result;
//                }
//            }
            //To Here
        }
    

        } else {

        return $checker;
    }
}

function submit_form_healthdata_area($projectid, $year, $province, $city, $awdiarrhea, $abdiarrhea, $hepatitis, $typhoidfever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userid) {
    $controller_result = uploadhealtdataarea($projectid, $year, $province, $city, $awdiarrhea, $abdiarrhea, $hepatitis, $typhoidfever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userid);
    echo "<script type='text/javascript'>alert('Health Data per area entry successfully uploaded!');</script>";

    header('Location: visualization_healthdataarea.php');
}

function comparedisease($disease) {

    $result = getdiseasefromtext($disease);

    if ($result != FALSE) {
        foreach ($result as $arr_result) {
            $keyID = $arr_result['diseaseID'];
        }
        return $keyID;
    } else {
        return 0;
    }
}
