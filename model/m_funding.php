<?php

function getallfundingorganization() {



    require_once('dbconnect.php');

    $query = "SELECT * FROM funding WHERE active = 1";
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

function setfunding($name, $description, $type) {

    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    $query = "INSERT INTO funding (fundingorganization_name,description,fundingorganization_type) VALUES ('$name','$description','$type')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return $query;
    }
    $con->close();
}

function deactivatefunding($id) {

    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    $query = "UPDATE FUNDING SET ACTIVE=0 WHERE fundingorganizationID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getfundingbyid($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM funding WHERE active = 1 AND fundingorganizationID  = '$id'";
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

function updatefunding($name, $description, $type, $id) {


    require_once('dbconnect.php');


    $query = "UPDATE funding SET fundingorganization_name='$name', description='$description', fundingorganization_type='$type' WHERE fundingorganizationID= '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}
