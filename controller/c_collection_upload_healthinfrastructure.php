<?php

require_once ('model/m_health_infrastructure_damages.php');

function submit_health_infrastructure_damages($projectid, $data, $userid) {
    if($data['type'] == "application/vnd.ms-excel") {
        $fh = fopen($data['tmp_name'], 'r+');
        $lines = array();
        while (($row = fgetcsv($fh, 8192)) !== FALSE) {
            $lines[] = $row;
        }

        $x = 1;
        $checker = array();
        foreach ($lines as $arr_result) {
            $infradamage = $arr_result[0];
            if ($infradamage == NULL || is_string($infradamage)) {
                $checker['infradamage'] = $x;
            }
            $infradamagetype = $arr_result[1];
            if ($infradamagetype == "Regional") {
                $infradamagetype = 1;
            } else if ($infradamagetype == "Provincial") {
                $infradamagetype = 2;
            } else if ($infradamagetype == "Municipal") {
                $infradamagetype = 3;
            } else if ($infradamagetype == "Barangay") {
                $infradamagetype = 4;
            } else if ($infradamagetype == "Line/Birthing") {
                $infradamagetype = 5;
            }
            if ($infradamagetype < 0) {
                $checker['infradamagetype'] = $x;
            }

            $hospital = $arr_result[2];
            if ($hospital == NULL || is_string($hospital)) {
                $checker['hospital'] = $x;
            }
            $hospitallevel = $arr_result[3];
            if ($hospitallevel == "Primary") {
                $hospitallevel = 1;
            } else if ($hospitallevel == "Secondary") {
                $hospitallevel = 2;
            }
            if ($hospitallevel < 0) {
                $checker['hospitallevel'] = $x;
            }

            $watersysdamage = $arr_result[4];
            if ($watersysdamage == NULL || is_string($watersysdamage)) {
                $checker['watersysdamage'] = $x;
            }
            $watersysdamagetype = $arr_result[5];
            if ($watersysdamagetype == "Sewage System") {
                $watersysdamagetype = 1;
            } else if ($watersysdamagetype == "Waste Manage System") {
                $watersysdamagetype = 2;
            } if ($watersysdamagetype == "Water System") {
                $watersysdamagetype = 3;
            }
            if ($watersysdamagetype < 0) {
                $checker['watersysdamagetype'] = $x;
            }

            $x++;

            $controller_result =uploadhealthinfrastructuredamages($projectID, $year, $month, $region, $municipality, $city, $barangay, $incident, $number_of_incidents, $infrastructureDamageType, $hospital, $hospitalLevel, $waterSystemDamage, $waterSystemDamageID, $uploadedBy);
            
            }
        echo "<script type='text/javascript'>alert('Health Infrastructure Damages successfully uploaded!');</script>";
        
        header('Location: visualization_healthinfrastructure.php');
    }else{
        echo "<script type='text/javascript'>alert('Please Upload a .csv file!');</script>";
    }
}

function submit_form_health_infrastructure_damages($projectid, $infradamage, $infradamagetype, $hospital, $hospitallevel, $watersysdamage, $watersysdamagetype, $userid){
    $controller_result = uploadhealthinfrastructuredamages($projectid, $infradamage, $infradamagetype, $hospital, $hospitallevel, $watersysdamage, $watersysdamagetype, $userid);
     echo "<script type='text/javascript'>alert('Health Infrastructure Damages entry successfully uploaded!');</script>";
     
     header('Location: visualization_healthinfrastructure.php');
}
?>

