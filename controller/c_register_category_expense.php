
<?php

require_once 'model/m_expense_category.php';

function submit_categoryofexpense($name, $description) {

    $controller_result = setexpensecategory($name, $description);
    return 1;
}

function generate_all_expensecategory() {

    $result = array();
    $result = getallexpensecategory();
    return $result;
}

function delete_categoryexpense($deactivate) {

    $controller_result = deactivateexpensecategory($deactivate);
    
    return 2;
}

function getupdate_expensecategory($update) {
    $result = array();
    $result = getexpensecategory($update);
    return $result;
}

function submitupdate_expensecategory($name, $description, $id) {
    $controller_result = updateexpensecategory($name, $description, $id);
    
    return 3;
}
