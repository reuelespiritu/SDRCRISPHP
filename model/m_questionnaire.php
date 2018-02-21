<?php

function getallquestionnaire() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM  questionnaire WHERE active = 1";
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

function uploadquestionnaire($projectID, $questionnaireTitle, $questionnaireObjective, $created, $approved, $AnsweredBy, $AnsweredAge, $AnsweredSex) {
    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    $query = "INSERT INTO questionnaire (projectID,questionnaireTitle,questionnaireObjective,created,approved,AnsweredBy,AnsweredAge,AnsweredSex,dateAnswered) VALUES ('$projectID','$questionnaireTitle','$questionnaireObjective','date_format($created, Y-m-d)','date_format($approved, Y-m-d)','$AnsweredBy', '$AnsweredAge', '$AnsweredSex','$datenow')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getquestionnaireID() {
    require_once('dbconnect.php');
    $query = "SELECT questionnaireID FROM questionnaire ORDER BY questionnaireID desc LIMIT 1";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return $result;
    }
    $con->close();
}

function uploadquestionnairequestion($question) {
    require_once('dbconnect.php');
    $questionnaireID = getquestionnaireID();
    $query = "INSERT INTO questionnaire_question (questionnaireID,question) VALUES ('$questionnaireID', '$question')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

//function getquestionID() {
//    require_once('dbconnect.php');
//    $query = "SELECT questionID FROM questionnaire_question ORDER BY questionID desc LIMIT 1";
//    $con = createconnection();
//
//    if (isset($query)) {
//        $result = mysqli_query($con, $query);
//        return $result;
//    }
//    $con->close();
//}

function uploadquestionnairedata($questionID, $data) {
    require_once('dbconnect.php');
//    $questionID = getquestionID();
    $query = "INSERT INTO questionnaire_data (questionID,data) VALUES ('$questionID', '$data')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}


?>

