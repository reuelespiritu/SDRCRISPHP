<?php

function setuser($firstname, $middlename, $lastname, $email, $password1, $specializations, $masters, $doctorate) {

    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    $query = "INSERT INTO user (firstname,middlename,lastname,email,password,specializations,masters,doctorate,registrationdate) VALUES ('$firstname','$middlename','$lastname','$email','$password1','$specializations','$masters','$doctorate','$datenow')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function setuser_as_principalinvestigator($id) {

    require_once('dbconnect.php');

    $query = "INSERT INTO sdrcris.project_user (projectID,userID) VALUES('*value*','*value*')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function updateuser($firstname, $middlename, $lastname, $email, $password1, $specializations, $masters, $doctorate, $id) {

    require_once('dbconnect.php');
    $query = "UPDATE user SET firstname='$firstname',middlename='$middlename',lastname='$lastname',email='$email',password='$password1',specializations='$specializations',masters='$masters',doctorate='$doctorate' WHERE userID='$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getallusers() {



    require_once('dbconnect.php');

    $query = "SELECT * FROM  user WHERE active = 1";
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

function getuserbyid($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM  user WHERE active = 1 and userID='$id'";
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

function getalluserswithoutusertype() {



    require_once('dbconnect.php');

    $query = "SELECT * FROM sdrcris.user WHERE userID NOT IN (SELECT userID FROM project_user) AND usertype!=1;";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);


        $num_rows = mysqli_num_rows($result);

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

function checklogin($email, $password) {

    require_once('dbconnect.php');

    $query = "SELECT * FROM user WHERE email='$email' AND password = '$password' AND active = 1";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);


        $num_rows = mysqli_num_rows($result);


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

function deactivateuser($id) {


    require_once('dbconnect.php');

    $query = "UPDATE user set active='0' WHERE userID='$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getemail($ID) {
    require_once('dbconnect.php');

    $query = "SELECT email FROM  user WHERE active = 1 and userID='$ID'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return result;
    } else {
        return FALSE;
    }
    $con->close();
}

?>