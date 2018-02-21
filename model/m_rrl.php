<?php

function getallrrl() {
    require_once('dbconnect.php');

    $query = "SELECT rl.*, (SELECT tl.name FROM type_of_literature tl WHERE tl.typeOfLitID=rl.typeID) AS 'type', (SELECT cl.name FROM category_literature cl WHERE cl.categoryID=rl.categoryID) AS 'category' FROM rrl rl WHERE active = 1;";
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

function uploadliterature($projectID, $year, $title, $author, $abstract, $typeID, $categoryID, $source, $keywords, $link, $userID) {
    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');

    $query = "INSERT INTO rrl (projectID,year,title,author,abstract,typeID,categoryID,source,keywords,link,inputted_by,inputted_on) VALUES('$projectID','$year','$title','$author','$abstract','$typeID','$categoryID','$source','$keywords','$link','$userID','$datenow')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {

        return $query;
    }
    $con->close();
}

function deactivateliterature($idrrl) {
    require_once('dbconnect.php');

    $query = "UPDATE rrl SET active = 0 WHERE idrrl = '$idrrl'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
}

?>
