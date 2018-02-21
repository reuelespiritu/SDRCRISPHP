<?php

function getallbudget() {



    require_once('dbconnect.php');

    $query = "SELECT pb.amount,remarks,date,bc.name as 'budgetcategoryname',mr.name as 'budgetmethodname' FROM budget_category bc JOIN project_budget pb ON bc.budget_categoryID=pb.budget_type JOIN method_of_receivingfunding mr ON pb.budget_recievedThrough=mr.registration_methodID WHERE PB.ACTIVE=1";
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

function setprojectbudget($amount, $remarks, $budgettype, $project, $budgetmethod) {

    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    $query = "INSERT INTO project_budget (amount,remarks,date,budget_type,budget_projectID,budget_receivedThrough) VALUES ('$amount','$remarks','$datenow','$budgettype','$project','$budgetmethod]')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function deactivatebudget($id) {

    require_once('dbconnect.php');
    $query = "UPDATE project_budget SET ACTIVE=0 WHERE budgetID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getbudgetbyid($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM  project_budget WHERE active = 1 AND budgetID = '$id'";
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
