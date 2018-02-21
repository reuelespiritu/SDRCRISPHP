<?php

function getallbudgetcategory() {



    require_once('dbconnect.php');

    $query = "SELECT * FROM  budget_category WHERE active = 1";
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

function setbudgetcategory($name, $description) {

    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    $query = "INSERT INTO budget_category (name,description) VALUES ('$name','$description')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function deactivatebudgetcategory($id) {

    require_once('dbconnect.php');
    $query = "UPDATE budget_category SET ACTIVE=0 WHERE budget_categoryID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getbudgetcategory($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM budget_category WHERE active = 1 AND budget_categoryID = '$id'";
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

function updatebudgetcategory($name, $description, $id) {


    require_once('dbconnect.php');


    $query = "UPDATE budget_category SET name='$name', description='$description' WHERE budget_categoryID= '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}
