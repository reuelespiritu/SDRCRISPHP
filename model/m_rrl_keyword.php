<?php
function getrrlkeyword($keyword) {
    require_once('dbconnect.php');
    $query = "SELECT keywordID FROM keyword WHERE keyword='$keyword'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return $result;
    }
    $con->close();
}




function setrrlkeyword($keyword){
    require_once('dbconnect.php');
    
    $rrlID = getlast();
    $keywordID = getkeyword($keyword);

    $query = "INSERT INTO rrl (rrlID,keywordID) VALUES('$rrlID', '$keywordID')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {

        return $query;
    }
    $con->close();
}
?>

