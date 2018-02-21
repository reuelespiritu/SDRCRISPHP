<?php

function getprojectofprojectuser($id) {

    require_once('dbconnect.php');

    $query = "SELECT * FROM project_user WHERE userID = '$id'; ";
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

function set_project_user($userID, $projectID) {
    require_once('dbconnect.php');
    $query = "UPDATE user SET usertype = 4 WHERE userID='$userID'; ";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
    }       
            $query ="INSERT INTO project_user (projectID,userID) VALUES('$projectID','$userID')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}
