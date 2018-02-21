
<?php

require_once 'model/m_budget_category.php';

function submit_budgetcategory($name, $description) {

    $controller_result = setbudgetcategory($name, $description);
    echo "<script type='text/javascript'>alert('Input successfully recorded!');</script>";
}

function generate_all_budgetcategory() {

    $result = array();
    $result = getallbudgetcategory();
    return $result;
}

function delete_budgettype($deactivate) {

    $controller_result = deactivatebudgetcategory($deactivate);
}

function getupdate_budgettype($update) {
    $result = array();
    $result = getbudgetcategory($update);
    return $result;
}

function submitupdate_budgettype($name, $description, $id) {
    $controller_result = updatebudgetcategory($name, $description, $id);
}
