<?php

function setprojectdata($projectid, $filename, $fileproperties, $data) {


    require_once('dbconnect.php');


    $query = "INSERT INTO project_file (projectID,fileName,fileType,fileData) VALUES ('$projectid','$filename','$fileproperties','$data')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getprojectdatabyprojectid($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM project_file where projectID = '$id' AND active = 1";
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
