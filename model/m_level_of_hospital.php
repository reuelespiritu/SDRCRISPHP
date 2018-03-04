<?php

function getalllevelofhospital() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM level_of_hospital WHERE active = 1";
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

function setlevelofhospital($name) {
    require_once('dbconnect.php');

    $query = "INSERT INTO level_of_hospital (name) VALUES('$name')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}


function deactivatelevelofhospital($id) {

    require_once('dbconnect.php');
    $query = "UPDATE level_of_hospital SET ACTIVE=0 WHERE level_of_hospitalID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getlevelofhospital($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM level_of_hospital WHERE active = 1 AND level_of_hospitalID = '$id'";
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

function updatelevelofhospital($name, $id) {


    require_once('dbconnect.php');


    $query = "UPDATE level_of_hospital SET name='$name'  WHERE level_of_hospitalID= '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}



function getlevelofhospitalbytext($name){
    
    

    require_once('dbconnect.php');

    $query = "SELECT level_of_hospitalID FROM level_of_hospital WHERE name LIKE '$name' AND active = 1";
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
