<?php

function getalltypeofinfrastructuredamages() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM infrastructure_damagesID WHERE active = 1";
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

function setinfrastructuredamages($name) {
    require_once('dbconnect.php');

    $query = "INSERT INTO infrastructure_damages (name) VALUES('$name')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}


function deactivateinfrastructuredamages($id) {

    require_once('dbconnect.php');
    $query = "UPDATE infrastructure_damages SET ACTIVE=0 WHERE infrastructure_damagesID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getinfrastructuredamages($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM infrastructure_damages WHERE active = 1 AND infrastructure_damagesID = '$id'";
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

function updateinfrastructuredamages($name, $id) {


    require_once('dbconnect.php');


    $query = "UPDATE infrastructure_damages SET name='$name' WHERE infrastructure_damagesID '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}



function getinfrastructuredamagesfromtext($name){
    
    

    require_once('dbconnect.php');

    $query = "SELECT infrastructure_damagesID FROM infrastructure_damages WHERE name LIKE '$name' AND active = 1";
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
