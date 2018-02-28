<?php

function getallexpenses() {



    require_once('dbconnect.php');

    $query = "SELECT ec.name as 'expensecategoryname',amount,remarks,me.name as 'expensemethod',date FROM expense_category ec join project_expenses pe on ec.expensecategoryID=pe.expense_category join method_of_expense me on pe.expense_method=me.expensemethodID WHERE PE.active =1";
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

function setprojectexpenses($amount, $remarks, $project, $expensecategory, $expensemethod) {

    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    $query = "INSERT INTO project_expenses (amount,remarks,date,expense_projectID,expense_category,expense_method) VALUES ('$amount','$remarks','$datenow','$project','$expensecategory','$expensemethod]')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function deactivateexpenses($id) {

    require_once('dbconnect.php');
    $query = "UPDATE project_expenses SET ACTIVE=0 WHERE expenseID = '$id'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return TRUE;
    }
    $con->close();
}

function getexpensesbyid($id) {



    require_once('dbconnect.php');

    $query = "SELECT * FROM  project_expenses WHERE active = 1 AND expenseID = '$id'";
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


function getexpensesum() {



    require_once('dbconnect.php');

    $query = "SELECT SUM(amount) as 'amount' FROM project_expenses";
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