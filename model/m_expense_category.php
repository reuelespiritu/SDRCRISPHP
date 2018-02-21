<?php

function getallexpensecategory() {



    require_once('dbconnect.php');

    $query = "SELECT * FROM  expense_category WHERE active = 1";
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

function setexpensecategory($name, $description) {

    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    $query = "INSERT INTO expense_category (name,description) VALUES ('$name','$description')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function deactivateexpensecategory($id) {

    require_once('dbconnect.php');
    $query = "UPDATE expense_category SET ACTIVE=0 WHERE expensecategoryID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getexpensecategory($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM  expense_category WHERE active = 1 AND expensecategoryID = '$id'";
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

function updateexpensecategory($name, $description, $id) {


    require_once('dbconnect.php');


    $query = "UPDATE expense_category SET name='$name', description='$description' WHERE expensecategoryID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}
