<?php
function sumhd($year,$month,$region,$city,$disease,$uploadedBy,$uploadDate) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if ($year&&isset($year)) {$WHERE[] = "hd.year='$year' ";}
    if ($month&&isset($month)) {$WHERE[] = "hd.month LIKE '$month' ";}
    if ($region&&isset($region)) {$WHERE[] = "hd.region LIKE '$region' ";}
    if ($city&&isset($city)) {$WHERE[] = "hd.city LIKE '$city' ";}
    if ($disease&&isset($disease)) {$WHERE[] = "hd.disease LIKE '$disease' ";}
    if ($uploadedBy&&isset($uploadedBy)) {$WHERE[] = "hd.uploadedBy='$uploadedBy' ";}
    if ($uploadDate&&isset($uploadDate)) {$date = date_format($uploadDate,"Y-m-d"); $WHERE[] = "hd.uploadDate LIKE '$date' ";}
    $query = "SELECT (SELECT d.disease FROM diseases d WHERE d.diseaseID=hd.diseaseID) AS 'disease', hd.infected "
            . "FROM health_data hd "
            . "WHERE active=1 ";
        if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
    $con = createconnection();
    $result = mysqli_query($con, $query);
    $query_result[] = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}

function sumed($year,$month,$region,$city,$incident,$barangay,$uploadedBy,$uploadDate) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="ed.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="ed.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="ed.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="ed.municipality LIKE '$city' ";}
    if($incident&&isset($incident)){$WHERE[]="ed.incident LIKE '$incident' ";}
    if($barangay&&isset($barangay)){$WHERE[]="ed.barangay LIKE '$barangay' ";}
    if($uploadedBy&&isset($uploadedBy)){$WHERE[]="ed.uploadedBy='$uploadedBy' ";}
    if($uploadDate&&isset($uploadDate)){$date = date_format($uploadDate,"Y-m-d"); $WHERE[] = "ed.uploadDate LIKE '$date' ";}
    $query = "SELECT DISTINCT ed.incident, SUM(ed.number_of_deaths) AS 'num_of_deaths' "
            . "FROM event_data ed "
            . "WHERE ed.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY ed.incident";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}


function sumhid_existing($year,$month,$region,$city,$barangay,$facility,$uploadedBy,$uploadDate) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="hid.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="hid.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="hid.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="hid.city LIKE '$city' ";}
    if($barangay&&isset($barangay)){$WHERE[]="hid.barangay LIKE '$barangay' ";}
    if($facility&&isset($facility)){$WHERE[]="hid.facility IN (SELECT f.facilitiesID FROM facilities f WHERE f.name='$facility') ";}
    if($uploadedBy&&isset($uploadedBy)){$WHERE[]="hid.uploadedBy='$uploadedBy' ";}
    if($uploadDate&&isset($uploadDate)){$date = date_format($uploadDate,"Y-m-d"); $WHERE[] = "hid.uploadDate LIKE '$date' ";}
    $query = "SELECT (SELECT f.name FROM facilities f WHERE f.facilitiesID=hid.facility) AS 'facility', "
            . "SUM(hid.existing) AS 'existing'"
            . "FROM health_infrastructure_damages hid "
            . "WHERE hid.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
            $query .="GROUP BY hid.facility";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    
    echo json_encode($query_result);
    
    $con->close();
}

function sumhid_available_for_use($year,$month,$region,$city,$barangay,$facility,$uploadedBy,$uploadDate) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="hid.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="hid.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="hid.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="hid.city LIKE '$city' ";}
    if($barangay&&isset($barangay)){$WHERE[]="hid.barangay LIKE '$barangay' ";}
    if($facility&&isset($facility)){$WHERE[]="hid.facility IN (SELECT f.facilitiesID FROM facilities f WHERE f.name='$facility') ";}
    if($uploadedBy&&isset($uploadedBy)){$WHERE[]="hid.uploadedBy='$uploadedBy' ";}
    if($uploadDate&&isset($uploadDate)){$date = date_format($uploadDate,"Y-m-d"); $WHERE[] = "hid.uploadDate LIKE '$date' ";}
    $query = "SELECT (SELECT f.name FROM facilities f WHERE f.facilitiesID=hid.facility) AS 'facility', "
            . "SUM(hid.available_for_use) AS 'available_for_use'"
            . "FROM health_infrastructure_damages hid "
            . "WHERE hid.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY hid.facility";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}

function sumhid_damaged_by_event_incident($year,$month,$region,$city,$barangay,$facility,$uploadedBy,$uploadDate) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="hid.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="hid.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="hid.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="hid.city LIKE '$city' ";}
    if($barangay&&isset($barangay)){$WHERE[]="hid.barangay LIKE '$barangay' ";}
    if($facility&&isset($facility)){$WHERE[]="hid.facility IN (SELECT f.facilitiesID FROM facilities f WHERE f.name='$facility') ";}
    if($uploadedBy&&isset($uploadedBy)){$WHERE[]="hid.uploadedBy='$uploadedBy' ";}
    if($uploadDate&&isset($uploadDate)){$date = date_format($uploadDate,"Y-m-d"); $WHERE[] = "hid.uploadDate LIKE '$date' ";}
        $query = "SELECT (SELECT f.name FROM facilities f WHERE f.facilitiesID=hid.facility) AS 'facility', "
                . "SUM(hid.damaged_by_event_incident) AS 'damaged_by_event_incident'"
                . "FROM health_infrastructure_damages hid "
                . "WHERE hid.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY hid.facility";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}

//analytics_six - NOT DONE
function sumhid_functional($year,$month,$region,$city,$barangay,$facility,$uploadedBy,$uploadDate) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="hid.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="hid.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="hid.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="hid.city LIKE '$city' ";}
    if($barangay&&isset($barangay)){$WHERE[]="hid.barangay LIKE '$barangay' ";}
    if($facility&&isset($facility)){$WHERE[]="hid.facility IN (SELECT f.facilitiesID FROM facilities f WHERE f.name='$facility') ";}
    if($uploadedBy&&isset($uploadedBy)){$WHERE[]="hid.uploadedBy='$uploadedBy' ";}
    if($uploadDate&&isset($uploadDate)){$date = date_format($uploadDate,"Y-m-d"); $WHERE[] = "hid.uploadDate LIKE '$date' ";}
    $query = "SELECT (SELECT f.name FROM facilities f WHERE f.facilitiesID=hid.facility) AS 'facility', "
            . "COUNT(hid.functional) AS 'functional'"
            . "FROM health_infrastructure_damages hid "
            . "WHERE hid.active=1 AND functional=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY hid.facility";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}


//analytics_seven - NOT DONE
function sumhid_nonfunctional($year,$month,$region,$city,$barangay,$facility,$uploadedBy,$uploadDate) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="hid.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="hid.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="hid.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="hid.city LIKE '$city' ";}
    if($barangay&&isset($barangay)){$WHERE[]="hid.barangay LIKE '$barangay' ";}
    if($facility&&isset($facility)){$WHERE[]="hid.facility IN (SELECT f.facilitiesID FROM facilities f WHERE f.name='$facility') ";}
    if($uploadedBy&&isset($uploadedBy)){$WHERE[]="hid.uploadedBy='$uploadedBy' ";}
    if($uploadDate&&isset($uploadDate)){$date = date_format($uploadDate,"Y-m-d"); $WHERE[] = "hid.uploadDate LIKE '$date' ";}
    $query = "SELECT (SELECT f.name FROM facilities f WHERE f.facilitiesID=hid.facility) AS 'facility', "
            . "COUNT(hid.functional) AS 'functional'"
            . "FROM health_infrastructure_damages hid "
            . "WHERE hid.active=1 AND functional=2 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY hid.facility";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}














//TRIAD DATA
//analytics_eight - NOT DONE
//START OF REPORTS BASED FROM EXCEL SHEET "THSIS01 ANALYTICS"
function affectedareas_extremeevents_all($year,$month,$region,$city,$incident,$barangay) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="ed.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="ed.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="ed.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="ed.municipality LIKE '$city' ";}
    if($incident&&isset($incident)){$WHERE[]="ed.incident LIKE '$incident' ";}
    if($barangay&&isset($barangay)){$WHERE[]="ed.barangay LIKE '$barangay' ";}
        $query = "SELECT DISTINCT ed.number_of_incidents ,ed.region "
                . "FROM event_data ed "
                . "WHERE ed.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY ed.region ORDER BY ed.region";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}

//TRIAD DATA
//WAG GALAWIN//
//function infected_hid_extremeevents_all($year,$month,$region,$city,$incident,$barangay) {
//    require_once('model/dbconnect.php');
//    $WHERE = array();
//    if($year&&isset($year)){$WHERE[]="ed.year IN (SELECT hid.year FROM health_infrastructure_damages hid WHERE hid.year='$year') ";}else{$WHERE[]="ed.year IN (SELECT hid.year FROM health_infrastructure_damages hid) ";}
//    if($month&&isset($month)){$WHERE[]="ed.month IN (SELECT hid.month FROM health_infrastructure_damages hid WHERE hid.month LIKE '$month') ";}else{$WHERE[]="ed.month IN (SELECT hid.month FROM health_infrastructure_damages hid) ";}
//    if($region&&isset($region)){$WHERE[]="ed.region IN (SELECT hid.region FROM health_infrastructure_damages hid WHERE hid.region LIKE '$region') ";}else{$WHERE[]="ed.region IN (SELECT hid.region FROM health_infrastructure_damages hid) ";}
//    if($city&&isset($city)){$WHERE[]="ed.municipality IN (SELECT hid.city FROM health_infrastructure_damages hid WHERE hid.city LIKE '$city') ";}else{$WHERE[]="ed.municipality IN (SELECT hid.city FROM health_infrastructure_damages hid) ";}
//    if($incident&&isset($incident)){$WHERE[]="ed.incident LIKE '$incident' ";}
//    if($barangay&&isset($barangay)){$WHERE[]="ed.barangay IN (SELECT hid.barangay FROM health_infrastructure_damages hid WHERE hid.barangay LIKE '$barangay') ";}else{$WHERE[]="ed.barangay IN (SELECT hid.barangay FROM health_infrastructure_damages hid) ";}
//    $query = "SELECT ed.incident, (SELECT d.disease FROM diseases d WHERE d.diseaseID = hd.diseaseID) AS 'disease', hd.infected "
//            . "FROM event_data ed JOIN health_data hd ON ed.projectID=hd.projectID "
//            . "WHERE ed.active=1 ";
//    if(count($WHERE)){
//            $query .="AND" . implode(" ", $WHERE);
//        }
//        $query .="GROUP BY ed.incident";
//    $con = createconnection();
//    $result = mysqli_query($con, $query);
//    
//    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//        $query_result[] = $row;
//    }
//    echo json_encode($query_result);
//    $con->close();
//}

//QUAD DATA
function annual_calamities_area_all($year,$month,$region,$city,$incident,$barangay) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="ed.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="ed.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="ed.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="ed.municipality LIKE '$city' ";}
    if($incident&&isset($incident)){$WHERE[]="ed.incident LIKE '$incident' ";}
    if($barangay&&isset($barangay)){$WHERE[]="ed.barangay LIKE '$barangay' ";}
    $query = "SELECT ed.year, ed.number_of_incidents "
            . "FROM event_data ed "
            . "WHERE ed.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY  ed.incident ORDER BY ed.year desc";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}



//QUAD DATA
function annual_casualties_extremeevents_all($year,$month,$region,$city,$incident,$barangay) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="ed.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="ed.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="ed.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="ed.municipality LIKE '$city' ";}
    if($incident&&isset($incident)){$WHERE[]="ed.incident LIKE '$incident' ";}
    if($barangay&&isset($barangay)){$WHERE[]="ed.barangay LIKE '$barangay' ";}
    $query = "SELECT DISTINCT ed.incident, SUM(ed.number_of_deaths) AS 'num_of_deaths' "
            . "FROM event_data ed "
            . "WHERE ed.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY  ed.incident ";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}

///REUEL
//QUAD DATA
function annual_deaths($year,$month,$region,$city,$incident,$barangay) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="ed.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="ed.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="ed.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="ed.municipality LIKE '$city' ";}
    if($incident&&isset($incident)){$WHERE[]="ed.incident LIKE '$incident' ";}
    if($barangay&&isset($barangay)){$WHERE[]="ed.barangay LIKE '$barangay' ";}
    $query = "SELECT DISTINCT ed.year, SUM(ed.number_of_deaths) AS 'num_of_deaths' "
            . "FROM event_data ed "
            . "WHERE ed.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY  ed.year ";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}


function annual_diseases_calamity_all($year,$month,$region,$city,$incident) {
    require_once('model/dbconnect.php');
     $WHERE = array();
    if($year&&isset($year)){$WHERE[]="ed.year IN (SELECT hd.year FROM health_data hd WHERE hd.year='$year') ";}else{$WHERE[]="ed.year IN (SELECT hd.year FROM health_data hd) ";}
    if($month&&isset($month)){$WHERE[]="ed.month IN (SELECT hd.month FROM health_data hd WHERE hd.month LIKE '$month') ";}else{$WHERE[]="ed.month IN (SELECT hd.month FROM health_data hd) ";}
    if($region&&isset($region)){$WHERE[]="ed.region IN (SELECT hd.region FROM health_data hd WHERE hd.region LIKE '$region') ";}else{$WHERE[]="ed.region IN (SELECT hd.region FROM health_data hd) ";}
    if($city&&isset($city)){$WHERE[]="ed.municipality IN (SELECT hd.city FROM health_data hd WHERE hd.city LIKE '$city') ";}else{$WHERE[]="ed.municipality IN (SELECT hd.city FROM health_data hd) ";}
    if($incident&&isset($incident)){$WHERE[]="ed.incident LIKE '$incident' ";}
    $query = "SELECT DISTINCT ed.incident,ed.year, ed.region, "
            . "(SELECT d.disease FROM diseases d WHERE d.diseaseID IN (SELECT hd.diseaseID FROM health_data hd WHERE hd.year IN (SELECT ed.year FROM event_data ed) AND hd.month IN (SELECT ed.month FROM event_data ed) AND hd.region IN (SELECT ed.region FROM event_data ed) AND hd.city IN (SELECT ed.municipality FROM event_data ed))) AS 'disease', "
            . "(SELECT SUM(hd.infected) FROM health_data hd WHERE hd.year IN (SELECT ed.year FROM event_data ed) AND hd.month IN (SELECT ed.month FROM event_data ed) AND hd.region IN (SELECT ed.region FROM event_data ed) AND hd.city IN (SELECT ed.municipality FROM event_data ed)) AS 'num_of_infected' "
            . "FROM event_data ed JOIN health_data hd ON ed.projectID=hd.projectID "
            . "WHERE ed.active = 1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY ed.incident"
                . "ORDER BY ed.year, SUM(hd.infected) desc";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}


////END
function deaths_extremeevents_all($year,$month,$region,$city,$incident,$barangay) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="ed.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="ed.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="ed.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="ed.municipality LIKE '$city' ";}
    if($incident&&isset($incident)){$WHERE[]="ed.incident LIKE '$incident' ";}
    if($barangay&&isset($barangay)){$WHERE[]="ed.barangay LIKE '$barangay' ";}
    $query = "SELECT DISTINCT ed.incident, ed.region, ed.municipality, ed.barangay, SUM(ed.number_of_deaths) AS 'num_of_deaths' "
            . "FROM event_data ed "
            . "WHERE ed.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY ed.incident, ed.region, ed.municipality ORDER BY SUM(ed.number_of_deaths) desc";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}

//END OF REPORTS
//START OF CORRELATION
function casualties_healthinfradamage_graph($year, $month, $region, $city, $barangay) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="hid.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="hid.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="hid.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="hid.city LIKE '$city' ";}
    if($barangay&&isset($barangay)){$WHERE[]="hid.barangay LIKE '$barangay' ";}
    $query = "SELECT hid.incident, hid.number_of_incidents, "
            . "(SELECT ed.number_of_deaths FROM event_data ed WHERE ed.year IN (SELECT hid.year FROM health_infrastructure_damages hid) AND ed.month IN (SELECT hid.month FROM health_infrastructure_damages hid)AND ed.region IN (SELECT hid.region FROM health_infrastructure_damages hid) AND ed.municipality IN (SELECT hid.city FROM health_infrastructure_damages hid) AND ed.barangay IN (SELECT hid.barangay FROM health_infrastructure_damages hid)) AS 'num_of_deaths' "
            . "FROM health_infrastructure_damages hid WHERE hid.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}

function casualties_healthinfradamage_computation($year, $month, $region, $city, $barangay) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="hid.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="hid.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="hid.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="hid.city LIKE '$city' ";}
    if($barangay&&isset($barangay)){$WHERE[]="hid.barangay LIKE '$barangay' ";}
    $query = "SELECT hid.incident, hid.number_of_incidents, "
            . "(SELECT ed.number_of_deaths FROM event_data ed WHERE ed.year IN (SELECT hid.year FROM health_infrastructure_damages hid) AND ed.month IN (SELECT hid.month FROM health_infrastructure_damages hid)AND ed.region IN (SELECT hid.region FROM health_infrastructure_damages hid) AND ed.municipality IN (SELECT hid.city FROM health_infrastructure_damages hid) AND ed.barangay IN (SELECT hid.barangay FROM health_infrastructure_damages hid)) AS 'num_of_deaths' "
            . "FROM health_infrastructure_damages hid WHERE hid.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $query_result[] = $row;
        }
    }
    $con->close();

    $N = count($query_result);
    foreach ($query_result as $arr) {
        $x += $arr[1];
        $y += $arr[2];
        $xy += $arr[1] * $arr[2];
        $x2 += $arr[1] * $arr[1];
        $y2 += $arr[2] * $arr[2];
    }

    $r = ($N($xy) - (($x)($y))) / (sqrt(($N($x2) - ((pow($x, 2))))($N($y2) - (pow($y, 2)))));

    return $r;
}

////WAG GALAWIN// 
//function watersysdamages_diseases_graph($year, $month, $region, $city, $barangay) {
//    require_once('model/dbconnect.php');
//    $WHERE = array();
//    if($year&&isset($year)){$WHERE[]="hid.year='$year' ";}
//    if($month&&isset($month)){$WHERE[]="hid.month LIKE '$month' ";}
//    if($region&&isset($region)){$WHERE[]="hid.region LIKE '$region' ";}
//    if($city&&isset($city)){$WHERE[]="hid.city LIKE '$city' ";}
//    if($barangay&&isset($barangay)){$WHERE[]="hid.barangay LIKE '$barangay' ";}
//    $query = "SELECT hid.incident, hid.number_of_incidents, "
//            . "(SELECT d.disease FROM diseases d WHERE d.diseaseID=(SELECT hd.diseaseID FROM health_data hd WHERE hd.year IN (SELECT hid.year FROM health_infrastructure_damages hid) AND hd.month IN (SELECT hid.month FROM health_infrastructure_damages hid) AND hd.region IN (SELECT hid.region FROM health_infrastructure_damages hid) AND hd.city IN (SELECT hid.city FROM health_infrastructure_damages hid)) AS 'disease', "
//            . "(SELECT hd.infected FROM health_data hd WHERE hd.year IN (SELECT hid.year FROM health_infrastructure_damages hid) AND hd.month IN (SELECT hid.month FROM health_infrastructure_damages hid) AND hd.region IN (SELECT hid.region FROM health_infrastructure_damages hid) AND hd.city IN (SELECT hid.city FROM health_infrastructure_damages hid)) AS 'num_of_infected' "
//            . "FROM health_infrastructure_damages hid "
//            . "WHERE hid.active=1 ";
//     if(count($WHERE)){
//            $query .="AND" . implode(" ", $WHERE);
//        }
//    $con = createconnection();
//    $result = mysqli_query($con, $query);
//    
//    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//        $query_result[] = $row;
//    }
//    echo json_encode($query_result);
//    $con->close();
//}
//
//function watersysdamages_diseases_computation($year, $month, $region, $city, $barangay) {
//    require_once('model/dbconnect.php');
//    $WHERE = array();
//    if($year&&isset($year)){$WHERE[]="hid.year='$year' ";}
//    if($month&&isset($month)){$WHERE[]="hid.month LIKE '$month' ";}
//    if($region&&isset($region)){$WHERE[]="hid.region LIKE '$region' ";}
//    if($city&&isset($city)){$WHERE[]="hid.city LIKE '$city' ";}
//    if($barangay&&isset($barangay)){$WHERE[]="hid.barangay LIKE '$barangay' ";}
//    $query = "SELECT hid.incident, hid.number_of_incidents, "
//            . "(SELECT d.disease FROM diseases d WHERE d.diseaseID=(SELECT hd.diseaseID FROM health_data hd WHERE hd.year IN (SELECT hid.year FROM health_infrastructure_damages hid) AND hd.month IN (SELECT hid.month FROM health_infrastructure_damages hid) AND hd.region IN (SELECT hid.region FROM health_infrastructure_damages hid) AND hd.city IN (SELECT hid.city FROM health_infrastructure_damages hid)) AS 'disease', "
//            . "(SELECT hd.infected FROM health_data hd WHERE hd.year IN (SELECT hid.year FROM health_infrastructure_damages hid) AND hd.month IN (SELECT hid.month FROM health_infrastructure_damages hid) AND hd.region IN (SELECT hid.region FROM health_infrastructure_damages hid) AND hd.city IN (SELECT hid.city FROM health_infrastructure_damages hid)) AS 'num_of_infected' "
//            . "FROM health_infrastructure_damages hid "
//            . "WHERE hid.active=1 ";
//     if(count($WHERE)){
//            $query .="AND" . implode(" ", $WHERE);
//        } 
//    $con = createconnection();
//    $result = mysqli_query($con, $query);
//    
//    if ($num_rows > 0) {
//        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//            $query_result[] = $row;
//        }
//    }
//    $con->close();
//
//    $N = count($query_result);
//    foreach ($query_result as $arr) {
//        $x += $arr[1];
//        $y += $arr[3];
//        $xy += $arr[1] * $arr[3];
//        $x2 += $arr[1] * $arr[1];
//        $y2 += $arr[3] * $arr[3];
//    }
//
//    $r = ($N($xy) - (($x)($y))) / (sqrt(($N($x2) - ((pow($x, 2))))($N($y2) - (pow($y, 2)))));
//
//    return $r;
//}

function extremeevent_diseases_graph($year, $month, $region, $city, $barangay) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year){$WHERE[]="ed.year='$year' ";}
    if($month){$WHERE[]="ed.month LIKE '$month' ";}
    if($region){$WHERE[]="ed.region LIKE '$region' ";}
    if($city){$WHERE[]="ed.municipality LIKE '$city' ";}
    if($barangay){$WHERE[]="ed.barangay LIKE '$barangay' ";}
    $query = "SELECT ed.incident, ed.number_of_incidents, "
            . "(SELECT d.disease FROM diseases d WHERE d.diseaseID=(SELECT hd.diseaseID FROM health_data hd WHERE hd.year IN (SELECT ed.year FROM event_data ed) AND hd.month IN (SELECT ed.month FROM event_data ed) AND hd.region IN (SELECT ed.region FROM event_data ed) AND hd.city IN (SELECT ed.municipality FROM event_data ed)) AS 'disease', "
            . "(SELECT hd.infected FROM health_data hd WHERE hd.year IN (SELECT ed.year FROM event_data ed) AND hd.month IN (SELECT ed.month FROM event_data ed) AND hd.region IN (SELECT ed.region FROM event_data ed) AND hd.city IN (SELECT ed.municipality FROM event_data ed) AS 'num_of_infected' "
            . "FROM event_data ed WHERE ed.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}

function extremeevent_diseases_computation($year, $month, $region, $city, $barangay) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="ed.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="ed.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="ed.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="ed.municipality LIKE '$city' ";}
    if($barangay&&isset($barangay)){$WHERE[]="ed.barangay LIKE '$barangay' ";}
    $query = "SELECT ed.incident, ed.number_of_incidents, "
            . "(SELECT d.disease FROM diseases d WHERE d.diseaseID=(SELECT hd.diseaseID FROM health_data hd WHERE hd.year IN (SELECT ed.year FROM event_data ed) AND hd.month IN (SELECT ed.month FROM event_data ed) AND hd.region IN (SELECT ed.region FROM event_data ed) AND hd.city IN (SELECT ed.municipality FROM event_data ed)) AS 'disease', "
            . "(SELECT hd.infected FROM health_data hd WHERE hd.year IN (SELECT ed.year FROM event_data ed) AND hd.month IN (SELECT ed.month FROM event_data ed) AND hd.region IN (SELECT ed.region FROM event_data ed) AND hd.city IN (SELECT ed.municipality FROM event_data ed)) AS 'num_of_infected' "
            . "FROM event_data ed WHERE ed.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $query_result[] = $row;
        }
    }
    $con->close();

    $N = count($query_result);
    foreach ($query_result as $arr) {
        $x += $arr[1];
        $y += $arr[3];
        $xy += $arr[1] * $arr[3];
        $x2 += $arr[1] * $arr[1];
        $y2 += $arr[3] * $arr[3];
    }

    $r = ($N($xy) - (($x)($y))) / (sqrt(($N($x2) - ((pow($x, 2))))($N($y2) - (pow($y, 2)))));

    return $r;
}

function extremeevent_deathtoll_graph($year, $month, $region, $city, $barangay) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="ed.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="ed.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="ed.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="ed.municipality LIKE '$city' ";}
    if($barangay&&isset($barangay)){$WHERE[]="ed.barangay LIKE '$barangay' ";}
    $query = "SELECT ed.incident, ed.number_of_incidents, ed.number_of_deaths FROM event_data ed WHERE ed.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}

function extremeevent_deathtoll_computation($year, $month, $region, $city, $barangay) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="ed.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="ed.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="ed.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="ed.municipality LIKE '$city' ";}
    if($barangay&&isset($barangay)){$WHERE[]="ed.barangay LIKE '$barangay' ";}
    $query = "SELECT ed.incident, ed.number_of_incidents, ed.number_of_deaths FROM event_data ed WHERE ed.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $query_result[] = $row;
        }
    }
    $con->close();

    $N = count($query_result);
    foreach ($query_result as $arr) {
        $x += $arr[1];
        $y += $arr[2];
        $xy += $arr[1] * $arr[2];
        $x2 += $arr[1] * $arr[1];
        $y2 += $arr[2] * $arr[2];
    }

    $r = ($N($xy) - (($x)($y))) / (sqrt(($N($x2) - ((pow($x, 2))))($N($y2) - (pow($y, 2)))));

    return $r;
}

function diseases_deathtoll_graph($year, $month, $region, $city) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="hd.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="hd.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="hd.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="hd.city LIKE '$city' ";}
    $query = "SELECT (SELECT d.disease FROM diseases d WHERE d.diseaseID=hd.diseaseID) AS 'disease', "
            . "SUM(hd.infected) AS 'infected', "
            . "(SELECT SUM(ed.number_of_deaths) FROM event_data ed WHERE ed.year IN (SELECT hd.year FROM health_data hd) AND ed.month IN (SELECT hd.month FROM health_data hd) AND ed.region IN (SELECT hd.region FROM health_data hd) AND ed.municipality IN (SELECT hd.city FROM health_data hd)) AS 'num_of_deaths' "
            . "FROM health_data hd WHERE hd.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY hd.diseaseID";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $query_result[] = $row;
    }
    echo json_encode($query_result);
    $con->close();
}

function diseases_deathtoll_computation($year, $month, $region, $city) {
    require_once('model/dbconnect.php');
    $WHERE = array();
    if($year&&isset($year)){$WHERE[]="hd.year='$year' ";}
    if($month&&isset($month)){$WHERE[]="hd.month LIKE '$month' ";}
    if($region&&isset($region)){$WHERE[]="hd.region LIKE '$region' ";}
    if($city&&isset($city)){$WHERE[]="hd.city LIKE '$city' ";}
    $query = "SELECT (SELECT d.disease FROM diseases d WHERE d.diseaseID=hd.diseaseID) AS 'disease', "
            . "SUM(hd.infected) AS 'infected', "
            . "(SELECT SUM(ed.number_of_deaths) FROM event_data ed WHERE ed.year IN (SELECT hd.year FROM health_data hd) AND ed.month IN (SELECT hd.month FROM health_data hd) AND ed.region IN (SELECT hd.region FROM health_data hd) AND ed.municipality IN (SELECT hd.city FROM health_data hd)) AS 'num_of_deaths' "
            . "FROM health_data hd WHERE hd.active=1 ";
    if(count($WHERE)){
            $query .="AND" . implode(" ", $WHERE);
        }
        $query .="GROUP BY hd.diseaseID";
    $con = createconnection();
    $result = mysqli_query($con, $query);
    
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $query_result[] = $row;
        }
    }
    $con->close();

    $N = count($query_result);
    foreach ($query_result as $arr) {
        $x += $arr[1];
        $y += $arr[2];
        $xy += $arr[1] * $arr[2];
        $x2 += $arr[1] * $arr[1];
        $y2 += $arr[2] * $arr[2];
    }

    $r = ($N($xy) - (($x)($y))) / (sqrt(($N($x2) - ((pow($x, 2))))($N($y2) - (pow($y, 2)))));

    return $r;
}

//END OF CORRELATION
?>

