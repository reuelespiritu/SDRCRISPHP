<?php

require_once ('model/m_health_infrastructure_damages.php');
require_once ('model/m_water_system_damages.php');
require_once ('model/m_level_of_hospital.php');
require_once ('model/m_infrastructure_damages.php');

function submit_health_infrastructure_damages($projectid, $data, $userid) {
        $fh = fopen($data['tmp_name'], 'r+');
        $lines = array();
        while (($row = fgetcsv($fh, 8192)) !== FALSE) {
            $lines[] = $row;
        }

        $x = 0;
        
    $arr_content = array();
        $checker = array();
        
        foreach ($lines as $arr_result) {
            
            
        if($x>0){
            $year = $arr_result[0];
            if ($year == NULL || $year<0) {
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
            $incident = $arr_result[5];
            if ($incident == NULL || !is_string($incident)) {
                array_push($checker, $x);
            }
            $number_of_incidents = $arr_result[6];
            if ($number_of_incidents == NULL || $number_of_incidents<0) {
                array_push($checker, $x);
            }
            $infradamagetype = $arr_result[7];
            $infradamagetype = compareinfrastructuredamages($infradamagetype);
            
            if ($infradamagetype <= 0) {
                array_push($checker, $x);
            }

            $hospital = $arr_result[8];
            if ($hospital == NULL || !is_string($hospital)) {
                array_push($checker, $x);
            }
            
            $hospitallevel = $arr_result[9];
            $hospitallevel = comparelevelofhospital($hospitallevel);
            if ($hospitallevel <= 0) {
                array_push($checker, $x);
            }

            $watersysdamagetype = $arr_result[10];
          $watersysdamagetype = comparewatersystemdamages($watersysdamagetype);
            if ($watersysdamagetype <= 0) {
                array_push($checker, $x);
            }
      
            $projectID = $projectid;
            $userID = $userid;
            
            $newdata = array(
                'year' => $year,
                'month' => $month,
                'region' => $region,
                'city' => $city,
                'barangay' => $barangay,
                'incident' => $incident,
                'numberofincidents' => $number_of_incidents,
                'infrastructuredamagetype' => $infradamagetype,
                'hospital' => $hospital,
                'hospitallevel' => $hospitallevel,
                'watersystemdamagetype' => $watersysdamagetype,
                'uploadedby' => $userID,
                'project' => $projectID
            );
            array_push($arr_content, $newdata);
        
            }  
            $x++;
}



    if ($checker==NULL) {
        foreach ($arr_content as $line) {

            $year = $line['year'];
            $month = $line['month'];
            $region = $line['region'];
            $city = $line['city'];
            $barangay = $line['barangay'];
            $incident = $line['incident'];
            $number_of_incidents = $line['numberofincidents'];
            $infrastructureDamageType = $line['infrastructuredamagetype'];
            $hospital = $line['hospital'];
            $hospitalLevel = $line['hospitallevel'];
            $waterSystemDamageID = $line['watersystemdamagetype'];
            $uploadedBy = $line['uploadedby'];
            $projectID = $line['project'];


            $con_result=uploadhealthinfrastructuredamages($projectID, $year, $month, $region, $city, $barangay, $incident, $number_of_incidents, $infrastructureDamageType, $hospital, $hospitalLevel, $waterSystemDamageID, $uploadedBy); }
        return $con_result;
    } else {
        
        return $checker;
        
    }

}
function submit_form_health_infrastructure_damages($projectid, $infradamage, $infradamagetype, $hospital, $hospitallevel, $watersysdamage, $watersysdamagetype, $userid){
    $controller_result = uploadhealthinfrastructuredamages($projectid, $infradamage, $infradamagetype, $hospital, $hospitallevel, $watersysdamage, $watersysdamagetype, $userid);
     echo "<script type='text/javascript'>alert('Health Infrastructure Damages entry successfully uploaded!');</script>";
     
     header('Location: visualization_healthinfrastructure.php');
}



function compareinfrastructuredamages($name) {

    $result = getinfrastructuredamagesfromtext($name);

    if ($result != FALSE) {
        foreach ($result as $arr_result) {
            $keyID = $arr_result['infrastructure_damagesID'];
        }
        return $keyID;
    } else {
        return 0;
    }
}

function comparelevelofhospital($name) {

    $result = getlevelofhospitalbytext($name);

    if ($result != FALSE) {
        foreach ($result as $arr_result) {
            $keyID = $arr_result['level_of_hospitalID'];
        }
        return $keyID;
    } else {
        return 0;
    }
}

function comparewatersystemdamages($name) {

    $result = getwatersystemdamagesidfromtext($name);

    if ($result != FALSE) {
        foreach ($result as $arr_result) {
            $keyID = $arr_result['water_system_damagesID'];
        }
        return $keyID;
    } else {
        return 0;
    }
}
?>

