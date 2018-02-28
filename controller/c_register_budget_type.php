
<?php

require_once 'model/m_budget_category.php';

function submit_budgetcategory($name, $description) {

    $controller_result = setbudgetcategory($name, $description);
    return 1;
}

function generate_all_budgetcategory() {

    $result = array();
    $result = getallbudgetcategory();
    return $result;
}

function delete_budgettype($deactivate) {

    $controller_result = deactivatebudgetcategory($deactivate);
    return 2;
}

function getupdate_budgettype($update) {
    $result = array();
    $result = getbudgetcategory($update);
    return $result;
}

function submitupdate_budgettype($name, $description, $id) {
    $controller_result = updatebudgetcategory($name, $description, $id);
    return 3;
}
