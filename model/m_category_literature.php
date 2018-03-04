<?php

function getallcategoryliterature() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM category_literature WHERE active = 1";
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

function setcategoryliterature($name,$description) {
    require_once('dbconnect.php');

    $query = "INSERT INTO category_literature (name,description) VALUES('$name','$description')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}


function deactivatecategoryliterature($id) {

    require_once('dbconnect.php');
    $query = "UPDATE category_literature SET ACTIVE=0 WHERE categoryID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getcategoryliterature($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM category_literature WHERE active = 1 AND categoryID = '$id'";
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

function updatecategoryliterature($name, $description, $id) {


    require_once('dbconnect.php');


    $query = "UPDATE category_literature SET name='$name', description='$description' WHERE categoryID '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}


function getcategoryoflitfromtext($category){
    
    

    require_once('dbconnect.php');

    $query = "SELECT categoryID FROM category_literature WHERE name LIKE '$category' AND active = 1";
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
