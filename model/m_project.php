<?php

function getallprojects() {

    require_once('dbconnect.php');

    $query = "SELECT * FROM project WHERE active = 1";
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

function getprojectbyid($id) {

    require_once('dbconnect.php');

    $query = "SELECT * FROM project WHERE active = 1 AND projectID='$id'";
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

function getallprojectswithoutpi() {

    require_once('dbconnect.php');

    $query = "SELECT * FROM project p WHERE p.projectID NOT IN (SELECT pu.projectID FROM project_user pu)";
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

function getprojectwithpi($id) {

    require_once('dbconnect.php');

    $query = "SELECT * FROM project WHERE projectID IN (SELECT projectID FROM project_user WHERE userID = '$id' AND active = 1);";
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

function deactivateproject($id) {


    require_once('dbconnect.php');


    $query = "UPDATE project set active='0' WHERE projectID='$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function setproject($name, $description, $startdate, $enddate, $fundingorganization) {


    require_once('dbconnect.php');


    $query = "INSERT INTO project (name,fundingOrganization,description,startdate,enddate) VALUES ('$name','$fundingorganization','$description','$startdate','$enddate')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return $query;
    }
    $con->close();
}

function setprojectprincipalinvestigator($projectID, $userID) {
    require_once('dbconnect.php');
    $query = "UPDATE user SET usertype = 2 WHERE userID='$userID'";

    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
    }

    $query = "INSERT INTO project_user (projectID,userID) VALUES('$projectID','$userID')";

    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;

        $con->close();
    }
}

function updateproject($name, $description, $startdate, $enddate, $id) {


    require_once('dbconnect.php');


    $query = "UPDATE project SET name='$name', description='$description' ,startdate='$startdate',enddate='$enddate' WHERE projectID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}
