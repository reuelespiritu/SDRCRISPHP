<?php

function getallwatersystemdamages() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM water_system_damages WHERE active = 1";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);


        $num_rows = mysqli_num_rows($result);
        $query_result = array();

        if ($num_rows > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $query_result[] = $row;
            }
            return $query_result;
        } else {
            return FALSE;
        }
    }
    $con->close();
}

function setwatersystemdamages($name) {
    require_once('dbconnect.php');

    $query = "INSERT INTO water_system_damages (name) VALUES('$name')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}


function deactivatewatersystemdamages($id) {

    require_once('dbconnect.php');
    $query = "UPDATE water_system_damages SET ACTIVE=0 WHERE water_system_damagesID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getwatersystemdamages($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM water_system_damages WHERE active = 1 AND water_system_damagesID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);


        $num_rows = mysqli_num_rows($result);
        $query_result = array();

        if ($num_rows > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $query_result[] = $row;
            }
            return $query_result;
        } else {
            return FALSE;
        }
    }
    $con->close();
}

function updatewayersystemdamages($name, $description, $id) {


    require_once('dbconnect.php');


    $query = "UPDATE water_system_damages SET name='$name' WHERE water_system_damagesID '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}



function getwatersystemdamagesidfromtext($name){
    
    

    require_once('dbconnect.php');

    $query = "SELECT water_system_damagesID FROM water_system_damages WHERE name LIKE '$name' AND active = 1";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);


        $num_rows = mysqli_num_rows($result);
        $query_result = array();

        if ($num_rows > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $query_result[] = $row;
            }
            return $query_result;
        } else {
            return FALSE;
        }
    }
    $con->close();
    
}


?>
