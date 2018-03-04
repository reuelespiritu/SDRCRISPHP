<?php

function getallkeywords() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM keyword WHERE active = 1";
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

function setkeyword($keyword) {
    require_once('dbconnect.php');

    $query = "INSERT INTO keyword (keyword) VALUES('$keyword')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}


function deactivatekeyword($id) {

    require_once('dbconnect.php');
    $query = "UPDATE keyword SET ACTIVE=0 WHERE keywordID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getkeyword($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM keyword WHERE active = 1 AND keywordID = '$id'";
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

function updatekeyword($keyword, $id) {


    require_once('dbconnect.php');


    $query = "UPDATE keyword SET keyword='$keyword' WHERE keywordID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getkeywordidfromtext($keyword){
    
    

    require_once('dbconnect.php');

    $query = "SELECT keywordID FROM sdrcris.keyword WHERE keyword LIKE '$keyword' AND active = 1";
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
