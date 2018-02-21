
<?php

require_once 'model/m_project_budget.php';
require_once 'model/m_method_of_receivingfunding.php';
require_once 'model/m_budget_category.php';

function submit_expense($amount, $remarks, $project, $budgetcategory, $budgetmethod) {

    $controller_result = setprojectbudget($amount, $remarks, $project, $budgetcategory, $budgetmethod);
    echo "<script type='text/javascript'>alert('Budget successfully recorded!');</script>";
}

function generate_all_budget() {

    $result = array();
    $result = getallbudget();
    return $result;
}

function generate_all_budgetcategory() {

    $result = array();
    $result = getallbudgetcategory();
    return $result;
}

function generate_all_budgetmethod() {

    $result = array();
    $result = getallmethodofreceivingfunding();
    return $result;
}
