<?php

function getalltypeofliterature() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM type_of_literature WHERE active = 1";
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

function settypeofliterature($name,$description) {
    require_once('dbconnect.php');

    $query = "INSERT INTO type_of_literature (name,description) VALUES('$name','$description')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}


function deactivatetypeofliterature($id) {

    require_once('dbconnect.php');
    $query = "UPDATE type_of_literature SET ACTIVE=0 WHERE typeOfLitID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function gettypeofliterature($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM type_of_literature WHERE active = 1 AND typeOfLitID = '$id'";
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

function updatetypeofliterature($name, $description, $id) {


    require_once('dbconnect.php');


    $query = "UPDATE type_of_literature SET name='$name', description='$description' WHERE typeOfLitID '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}



function gettypeoflitfromtext($type){
    
    

    require_once('dbconnect.php');

    $query = "SELECT typeOfLitID FROM type_of_literature WHERE name LIKE '$type' AND active = 1";
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
