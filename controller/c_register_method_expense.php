
<?php

require_once 'model/m_method_of_expense.php';

function submit_methodofexpense($name, $description) {

    $controller_result = setmethodofexpense($name, $description);
     return 1;
}

function generate_all_methodofexpense() {

    $result = array();
    $result = getallmethodofexpense();
    return $result;
}

function delete_methodexpense($deactivate) {

    $controller_result = deactivatemethodofexpense($deactivate);
    return 2;
}

function getupdate_expensemethod($update) {
    $result = array();
    $result = getmethodofexpensebyid($update);
    return $result;
}

function submitupdate_expensemethod($name, $description, $id) {
    $controller_result = updatemethodofexpense($name, $description, $id);
     return 3;
}
